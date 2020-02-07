<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Mail\ValidationCompleteMail;
use App\User;
use Mail;
use App\HashGenerator;
use App\Models\School;


class UserController extends Controller
{
    private function rules($item, Request $request = null)
    {
        $rules  = ['username'   => ['required','max:50', Rule::unique('users','username')],
                    'email'     => ['required','email', 'unique:users,email'],                
                    'role'      => ['required'] ];

        if (in_array('hei', [$request->input('role')])) 
            $rules['schoolcode'] = 'required';


        if(isset($item)) //Editmode
        {   
            $rules['username']  = ['required', Rule::unique('users','username')->ignore($item->username,'username')];
            $rules['email']     = ['required', Rule::unique('users','email')->ignore($item->email,'email')];

        } else{

            $rules['password']  = ['required','string', 'min:8', 'confirmed'];
        }

        return $rules;
    }


    public function index()
    {
        $data = User::select('users.id','username','email', 'role',
            'schoolcode',
            'school.name as schoolName',
            'users.created_at',
            'users.updated_at')
        ->leftjoin('school','users.schoolcode' , '=', 'school.code')
        ->orderBy('username')->paginate(20);

        return view('dashboard.user.index',['data' => $data]);
    }




    public function create()
    {
        $school = School::select('code','name')->orderBy('name')->get();

        return view('dashboard.user.create', ['school' => $school]);
    }



    public function store(Request $request)
    {
        $request->validate($this->rules(null, $request));

        $data = $this->updateSchoolCode($request->all());

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        
        $request->session()->flash('message', 'Record has been created');

        return redirect()->route('user.index');
    }



    public function show($id)
    {
        //
    }



    public function edit($hash)
    {
        $value = HashGenerator::Decode($hash);
        
        $item = User::where('id', $value)->firstOrFail();

        $school = \App\Models\School::select('code','name')->get();
        
        return view('dashboard.user.edit', [ 'school' => $school, 
           'item' => $item]);                                             
    }


    public function update(Request $request, $id)
    {
        $item = User::where('id',$request->input('id'))->firstOrFail();

        $request->validate($this->rules($item, $request));

        $data = $this->updateSchoolCode($request->all());        
        
        $item->update($data);

        $request->session()->flash('message', 'Record has been successfully Updated');

        return redirect()->route('user.index');
    }



    public function destroy(Request $request)
    {
        $item = User::where('id',$request->input('id'))->firstOrFail();
        
        if($item->username == 'admin')
            abort(401, 'Not Allowed to Delete Admin' );

        $item->delete();

        $request->session()->flash('message', 'Item Deleted Successfully');
        return back();
    }




    private function updateSchoolCode($data)
    {        
        if(strcasecmp('hei', $data['role']) != 0 || $data['schoolcode'] == null)
         $data['schoolcode'] = '';

        return $data;
    }



     public function search(Request $request)
     {
        $request->validate(['search' => 'required']);

        $data = $request->input('search');

        $itemCol = User::select('id','username','email', 'role', 'schoolcode')
        ->where('username', 'like', '%'. $data .'%')
        ->orderBy('username')
        ->take(10)
        ->get();

        $i = 0;
        $result = array();
        foreach($itemCol as $item){
            $result[$i]['id'] = $item->id ;
            $result[$i]['username'] = $item->username;
            $result[$i]['email'] = $item->email;
            $result[$i]['role'] = $item->role;
            $result[$i]['schoolcode'] = $item->schoolcode;
            $result[$i]['key'] = $item->hashId();
            $i++;
        }

        return json_encode($result);
    }
}

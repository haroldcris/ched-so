@extends('layouts.main-template')


@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">

            <div class="card-header bg-info">
                <h4>Modify User Account</h4>
            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="">

                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$item->id}}" />

                    
                        
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Username</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'username', 
                                                                'fieldValue'  => old('username', $item->username),
                                                                'required' => '', 'autofocus' => '' ])                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Email</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field'        => 'email', 
                                                                'fieldValue'    => old('email', $item->email),
                                                                'required'      => '',
                                                                'type'          => 'email' ])
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="role" class="col-md-3 col-form-label text-md-right">Role</label>
                        <div class="col-md-9">              

                            <select id='role' 
                                    name="role" 
                                    class="form-control @error('role') is-invalid @enderror ">
                                    <option value ="" >Choose...</option>
                                    <option @if(old('role', $item->role) == \App\Models\Role::Admin) selected @endif
                                            value ="{{ \App\Models\Role::Admin }}">Admin</option>

                                    <option @if(old('role', $item->role) == \App\Models\Role::HEI) selected @endif
                                            value ="{{ \App\Models\Role::HEI }}">HEI</option>

                                    <option @if(old('role', $item->role) == \App\Models\Role::Supervisor) selected @endif 
                                            value ="{{ \App\Models\Role::Supervisor }}" >Supervisor</option>
                            </select>                                
                            @include('components.form.error', ['field' => 'role'])
                        </div>
                        
                    </div>


                    <div class="form-group row" id ='assigned-school' >                        
                        <label  class="col-md-3 col-form-label text-md-right">Assigned School</label>
                        <div class="col-md-9" >

                            @include('components.form.combobox', ['field'                   => 'schoolcode',
                                                                'collection'                => $school,
                                                                'collectionItemFieldValue'  => 'code',
                                                                'collectionItemDisplayValue' => 'name',
                                                                'selectedValue'             => old('schoolcode', $item->schoolcode),
                                                                'class'                     => 'select2'
                                                                ])
                            
                        </div>
                        </div>
                    </div>

                    <hr/>

                    <div class="card-footer text-right">
                        <a class="btn btn-light btn-lg" 
                            href="{{ route('user.index') }} "> 
                            Cancel
                        </a>
                        &nbsp;
                        <button class="btn btn-lg btn-primary " type="submit" id='submitBtn'>
                            <i class="fa fa-save fa-lg"></i>
                            Save Record
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


@endsection


@section('script')
    <script>
        $('#role').on('change', function (e) {
            let optionSelected = $("option:selected", this);
            let valueSelected = this.value;
            let control = document.getElementById('assigned-school');
            
            control.style.display = valueSelected == 'hei' ? '' : 'none';
        });

        $(function(){
            console.log('triggering change');
            $('#role').trigger('change');
        });        
    </script>
@endsection








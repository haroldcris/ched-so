@extends('layouts.main-template')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('school.index') }}">Schools</a></li>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">

            <div class="card-header bg-info">
                <h4>Modify School Record</h4>
            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="" 
                    id='editForm'>

                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{$item->id}}" />

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Code</label>

                        <div class="col-md-4">
                            @include('components.form.textbox', ['field'        => 'code', 
                                                                 'fieldValue'  => old('code', $item->code),
                                                                 'required'     => '', 
                                                                 'autofocus'    => ''])
                        </div>

                        <label class="col-md-2 col-form-label text-md-right">HEI Type</label>
                        <div class="col-md-3 form-group">

                            <select id="type" 
                                name="type" 
                                class="form-control @error('type') is-invalid @enderror">
                                
                                <option value ="" >Choose...</option>
                                <option value ="LUC"     @if( old('type', $item->type) == 'LUC') selected @endif >LUC</option>
                                <option value ="Private" @if( old('type', $item->type) == 'Private') selected @endif >Private</option>
                                <option value ="CHED"    @if( old('type', $item->type) == 'CHED') selected @endif >CHED</option>
                               
                             </select>

                            @include('components.form.error', ['field' => 'type'])
                        </div>                        
                    </div>
                    


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Name of School</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'name', 
                                                                 'fieldValue'  => old('name',$item->name),
                                                                 'required' => '' ])                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Province</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'province', 
                                                                 'fieldValue'  => old('province',$item->province),
                                                                 'required' => '' ])                                      
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Town</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'town', 
                                                                 'fieldValue'  => old('town',$item->town),
                                                                 'required' => '' ])          
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Contact Person</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'contact_person', 
                                                                 'fieldValue'  => old('contact_person',$item->contact_person),
                                                                 'required' => '' ])          
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Contact Number</label>

                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'contact_number', 
                                                                 'fieldValue'  => old('contact_number', $item->contact_number),
                                                                 'required' => ''])          
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Government Recognition Number</label>

                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'recognition_number', 
                                                                 'fieldValue'  => old('recognition_number', $item->recognition_number),
                                                                  ])          
                        </div>
                    </div>


                    <hr/>



                    <div class="card-footer text-right">
                        <a class="btn btn-light btn-lg" href="{{ route('school.index') }} "> 
                            Cancel
                        </a>

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
</div>

@endsection









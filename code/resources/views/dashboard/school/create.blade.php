@extends('layouts.main-template')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('school.index') }}">Schools</a></li>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">

            <div class="card-header bg-success">
                <h4>Create New School Record</h4>
            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="{{ route ('school.store') }}" 
                    id='editForm'>

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Code</label>

                        <div class="col-md-4">
                            @include('components.form.textbox', ['field'        => 'code', 
                                                                 'fieldValue'  => old('code'),
                                                                 'required'     => '', 
                                                                 'autofocus'    => ''])
                        </div>

                        <label class="col-md-2 col-form-label text-md-right">HEI Type</label>
                        <div class="col-md-3 form-group">

                            <select id="type" 
                                name="type" 
                                class="form-control @error('type') is-invalid @enderror">
                                
                                <option value ="" >Choose...</option>
                                <option value ="LUC"     @if( old('type') == 'LUC') selected @endif >LUC</option>
                                <option value ="Private" @if( old('type') == 'Private') selected @endif >Private</option>
                                <option value ="CHED"    @if( old('type') == 'CHED') selected @endif >CHED</option>
                               
                             </select>

                            @include('components.form.error', ['field' => 'type'])
                        </div>                        
                    </div>
                    


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Name of School</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'name', 
                                                                 'fieldValue'  => old('name'),
                                                                 'required' => '' ])                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Province</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'province', 
                                                                 'fieldValue'  => old('province'),
                                                                 'required' => '' ])                                      
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Town</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'town', 
                                                                 'fieldValue'  => old('town'),
                                                                 'required' => '' ])          
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Contact Person</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'contact_person', 
                                                                 'fieldValue'  => old('contact_person'),
                                                                  'required' => ''])          
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Contact Number</label>

                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'contact_number', 
                                                                 'fieldValue'  => old('contact_number'),
                                                                 'required' => ''])          
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Government Recognition Number</label>

                        <div class="col-md-9">
                             @include('components.form.textbox', ['field' => 'recognition_number', 
                                                                 'fieldValue'  => old('recognition_number'),
                                                                 'required' => '' ])          
                        </div>
                    </div>


                    <hr/>



                    <div class="card-footer text-right">
                        <a class="btn btn-light btn-lg" href="{{ route('school.index') }} "> 
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
</div>

@endsection


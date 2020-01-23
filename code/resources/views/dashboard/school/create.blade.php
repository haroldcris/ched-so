@extends('layouts.main-template')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('schools.index') }}">Schools</a></li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Create New School Record</h4>
            </div>
            <div class="card-body">

                <form method="POST" action="" id='editForm'>
                    @csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Code</label>

                        <div class="col-md-9">
                            <input class="form-control @error('code') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Code" 
                                    name="code" 
                                    value = "{{ old('code') }}"    
                                    required autofocus />
                                    
                            @error('code')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Name of School</label>
                        <div class="col-md-9">
                            <input class="form-control  @error('name') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Name of School" 
                                    value = "{{ old('name') }}"
                                    name="name"
                                    required />
                                
                            @error('name')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    


                    <hr/>

                    <div class="form-group row">
                        <div class="col-md-7 offset-md-3">
                            <a class="btn btn-light" href="{{ route('schools.index') }} "> Return </a>
                            <button class="btn btn-success btn-outline " type="submit" id='submitBtn'>
                                <i class="fa fa-save"></i>
                                Save Record
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection



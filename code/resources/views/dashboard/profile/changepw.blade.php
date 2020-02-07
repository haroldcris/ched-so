@extends('layouts.main-template')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
   <div class="card">

            <div class="card-header bg-success">
                <h4>Change Password</h4>
            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="{{ route ('profile.store') }}" 
                    id='editForm'>

                    @csrf

                    <div class="form-group row">
                       <label class="col-md-3 col-form-label text-md-right">New Password</label>
                    <div class="col-md-5">
                            @include('components.form.textbox', ['field'        => 'password', 
                                                                 'fieldValue'  => old('password'),
                                                                 'required'     => '', 
                                                                 'autofocus'    => '',
                                                                 'type'        => 'password'])
                        </div>
                            
                            @include('components.form.error', ['field' => 'password'])

                                     
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label text-md-right">Confirm Password</label>
                       
                       <div class="col-md-5">
                            @include('components.form.textbox', ['field' => 'password_confirmation', 
                                                                 'fieldValue'  => old('password_confirmation'),
                                                                 'required' => '',
                                                                 'type'  => 'password' ])                            
                        </div>

                            @include('components.form.error', ['field' => 'password_confirmation'])         
                        </div>
                    </div>


                    <hr/>



                    <div class="card-footer text-right">
                        <a class="btn btn-light btn-lg" href=""> 
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
              
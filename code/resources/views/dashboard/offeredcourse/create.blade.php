@extends('layouts.main-template')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">

            <div class="card-header bg-success">
                <h4>Create New Program</h4>
            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="{{ route ('offeredcourse.store') }}" 
                    id='editForm'>

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Program Code</label>

                        <div class="col-md-4">
                            @include('components.form.textbox', ['field'        => 'code', 
                                                                 'fieldValue'  => old('code'),
                                                                 'required'     => '', 
                                                                 'autofocus'    => ''])
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Program Description</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'description', 
                                                                 'fieldValue'  => old('description'),
                                                                 'required' => '' ])                            
                        </div>
                    </div>


                    <hr/>



                    <div class="card-footer text-right">
                        <a class="btn btn-light btn-lg" href="{{ route('offeredcourse.index') }} "> 
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



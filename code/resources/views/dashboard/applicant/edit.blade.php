@extends('layouts.main-template')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('applicant.index') }}">Applicant</a></li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Add Applicant</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="" id='editForm'>
                    @csrf
                        @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">School Code</label>

                        <div class="col-md-9">
                            <input class="form-control @error('schoolcode') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="" 
                                    name="schoolcode" 
                                    value = "{{ old('schoolcode', $data->schoolcode) }}"    
                                    required autofocus />
                                    
                            @error('schoolcode')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Program</label>
                        <div class="col-md-9">
                         <select name="program" class="form-control">

                                    <option value ="" >Choose...</option>

                                    @foreach($program as $item)
                                        <option value ="{{ $item->program }}" @if($data->program == $item->program) selected @endif >{{ $item->program }}</option>
                                    @endforeach

                                  </select>
                        </div>
                    </div>

                       <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Lastname</label>
                        <div class="col-md-9">
                        <input class="form-control  @error('lastname') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="" 
                                    value = "{{ old('lastname', $data->lastname) }}"
                                    name="lastname"
                                    required />
                                
                            @error('lastname')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Firstname</label>
                        <div class="col-md-9">
                        <input class="form-control  @error('firstname') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="" 
                                    value = "{{ old('firstname', $data->firstname) }}"
                                    name="firstname"
                                    required />
                                
                            @error('firstname')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Middlename</label>
                        <div class="col-md-9">
                        <input class="form-control  @error('middlename') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="" 
                                    value = "{{ old('middlename', $data->middlename) }}"
                                    name="middlename"
                                    required />
                                
                            @error('middlename')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Batch</label>
                        <div class="col-md-9">
                        <input class="form-control  @error('batch') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="ex. 2019-2020" 
                                    value = "{{ old('batch', $data->batch) }}"
                                    name="batch"
                                    required />
                                
                            @error('batch')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <hr/>

                    <div class="form-group row">
                        <div class="col-md-7 offset-md-3">
                            <a class="btn btn-light" href="{{ route('applicant.index') }} "> Return </a>
                            <button class="btn btn-success " type="submit" id='submitBtn'>
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


@section('script')
<script>
    $('#editForm').on('submit',function() {
        $('#submitBtn').prop('disabled',true)
                       .html('<i class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></i> Saving...');
    });
</script>

@endsection
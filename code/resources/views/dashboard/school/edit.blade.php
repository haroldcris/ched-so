@extends('layouts.template')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('schools.index') }}">Schools</a></li>
    <li class="breadcrumb-item">{{ $data->name }}</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Edit School Record</h4>
            </div>
            <div class="card-body">

                <form method="POST" action="" id='editForm'>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$data->id}}" />
                    
                    
                    <div class="form-group row">
                        <label class= "col-md-3 col-form-label text-md-right">Code</label>
                        <div class="col-md-9">
                            <input class="form-control @error('code') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Code" 
                                    name="code" 
                                    value = "{{ old('code', $data->code) }}"
                                    required autofocus/>
                                    
                            @error('code')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    


                    <div class="form-group row">
                        <label class= "col-md-3 col-form-label text-md-right"> Name of School</label>
                        <div class="col-md-9">
                            <input class="form-control  @error('name') is-invalid @enderror" 
                                    type="text" 
                                    placeholder="Name of School" 
                                    name="name" 
                                    value = "{{ old('name', $data->name) }}"
                                    required>

                            @error('name')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    


                    <hr/>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <a class="btn btn-light" href="{{ route('schools.index') }} "> Return </a>
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
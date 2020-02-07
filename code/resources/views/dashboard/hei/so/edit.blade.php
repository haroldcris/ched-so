@extends('layouts.main-template')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">

            <div class="card-header bg-success">
                <h4>Create New Application</h4>
            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="" >
                    
                    @method('PUT')

                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}" />

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Program</label>
                        <div class="col-md-9">
                            <select name="program" class="form-control select2  @error('program') is-invalid @enderror " autofocus="">
                        
                                <option value ="" >Choose...</option>
                                @foreach ($program as $item)
                                    <option  @if(old('schoolCourseId', $data->schoolCourseId) == $item->id) selected @endif    value ="{{ $item->id }}" >{{ $item->levelDescription }}: {{ $item->description }} </option>
                                 @endforeach

                              </select>
                           @error('program')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Date of Graduation</label>
                        <div class="col-md-9">
                            <input class="form-control datepicker @error('graduation_date') is-invalid @enderror text-dark " 
                                id='graduation-date'
                                type="text" 
                                placeholder="" 
                                name="graduation_date" 
                                value = "{{ old('graduation_date', $data->graduation_date) }}"    
                                readonly
                                required />
                        
                            @error('graduation_date')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right" >Remarks</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'remarks', 
                                                                'fieldValue'  => old('draft_remarks', $data->draft_remarks),
                                                                 ])                            
                        </div>
                    </div>




                    <hr/>

                    <div class="card-footer text-right">
                        <a class="btn btn-light btn-lg" 
                            href="{{ route('heiso.index') }} "> 
                            Cancel
                        </a>
                        &nbsp;
                        <button class="btn btn-lg btn-primary " type="submit" id='submitBtn'>
                            <i class="fa fa-save fa-lg"></i>
                            Save Draft Record
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
      (function () {
            const input = document.querySelector('.datepicker');
            const datepicker = new TheDatepicker.Datepicker(input);
            datepicker.options.setInputFormat('F d,  Y');
            datepicker.options.setDropdownItemsLimit(1950,2020);
            datepicker.render();            


            $('#graduation-date').datepicker('setDate', '{{ $data->graduation-date }}' );
        })();
    </script> 
@endsection

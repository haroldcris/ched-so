@extends('layouts.main-template')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">

            <div class="card-header bg-success">
                <h4>Modify Application</h4>


            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="" >
                    
                    @method('PUT')

                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}" />

                    <input type="hidden" name="students" id="students" value="{{ old('students', $students) }}" />


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
                                value = "{{ old('graduation_date', \Carbon\Carbon::parse($data->graduation_date)->format('F d, Y')) }}"    
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


                  
                    <div class="card-footer">    
                        <button class="btn btn-sm btn-info" type="button"  id="addStudentBtn"
                                data-toggle="modal" data-target="#basicModal"
                                onclick = "showAddDialog()">
                            <i class="fa fa-plus"></i>
                            Add Applicant
                        </button>
                    </div>

                    <div class="table-responsive">
                         <table class="table table-striped table-bordered">
                            <thead>
                                 <th>Lastname</th>
                                 <th>Firstname</th>
                                 <th>Middlename</th>
                                 <th>NameExtension</th>
                                 <th>Birthdate</th>
                                 <th>Action</th>
                            </thead>

                           <tbody id="applicants">
                           </tbody>
                        </table>
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


@section('modal')

    @component('components.dialog.modal')
        <h5>Add Applicant</h5>
        <br>
        <p class='dialog-body h5 text-dark'></p>

          <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Lastname</label>
                       <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'lastname', 
                                                                'fieldValue'  => old('lastname'),
                                                                'id' =>'lastname', 
                                                                'autofocus' => 'true'
                                                                 ])                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Firstname</label>
                       <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'firstname', 
                                                                'fieldValue'  => old('firstname'),
                                                                'id' =>'firstname'
                                                                 ])                            
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Middlename</label>
                       <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'middlename', 
                                                                'fieldValue'  => old('middlename'),
                                                                'id' =>'middlename'
                                                                 ])                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Name Ext.</label>
                       <div class="col-md-9">
                           <select id='nameextension' 
                                    name="nameextension" 
                                    class="form-control @error('nameextension') is-invalid @enderror ">
                                    <option value ="" >Choose...</option>
                                    <option value = "Jr">Jr.</option>
                                    <option value = "II">II</option>
                                    <option value = "III">III</option>
                                    <option value = "IV">IV</option>

                            </select>                                
                            @include('components.form.error', ['field' => 'role'])
                        </div>
                    </div>
                    
                    <div class="form-group row">
                       <label class="col-md-3 col-form-label text-md-right">Birthdate</label>
                       <div class="col-md-9">
                            <input class="form-control datepicker @error('birthdate') is-invalid @enderror" 
                                type="date" 
                                placeholder="" 
                                name="birthdate" 
                                value = "{{ old('birthdate') }}"    
                                id = "birthdate"
                                required />
                        
                            @error('birthdate')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror                        
                        </div>
                    </div>

    @slot('footer')

            <button id="addStudentBtn" class="btn btn-success" onclick="addStudent()">
             <!--   <i class=""></i> -->
               Add
            </button>&nbsp;&nbsp;

        @endslot
    @endcomponent 
@endsection


@section('script')
    <script>
      (function () {
            const input = document.querySelector('.datepicker');
            const datepicker = new TheDatepicker.Datepicker(input);
            datepicker.options.setInputFormat('F d,  Y');
            datepicker.options.setDropdownItemsLimit(1950,2020);
            datepicker.render();            


            //$('#graduation-date').datepicker('setDate', '{{ $data->graduation_date }}' );            
        })();
    </script> 


    <script>
        var col = {!! json_encode($students) !!};


        function showAddDialog()
        {
            if (col.length >= 3)
            {
                showToastError('You have exceeded the allowed number of Students');
                return;
            }

            $('#modal-dialog').modal({'backdrop':'static'});
            $('#modal-dialog').find('#lastname').focus();
                        
            // let datepicker = new TheDatepicker.Datepicker(input);
            // datepicker.options.setInputFormat('F d,  Y');
            // datepicker.options.setDropdownItemsLimit(1950,2020);
            // datepicker.zIndex = 2048;
            // datepicker.render();         
        }



        function hasBrokenRules()
        {
            let control;

            control = document.getElementById('lastname');
            if (control.value == ""){
                return showError(control,'Lastname is required');
            }

            control = document.getElementById('firstname');
            if (control.value == ""){
                return showError(control,'Firstname is required');
            }

            control = document.getElementById('birthdate');
            if (control.value == ""){
                return showError(control, 'Birthdate is required');
            }

            return false;
        }



        function showError(control, errorMessage){            
            control.setAttribute('class',control.getAttribute('class') + ' is-invalid');
            control.focus();
            showToastError(errorMessage);
            return true;
        }



        function addStudent()
        {
            if( hasBrokenRules() ) 
                return;

            //show Loading Icon
            let ctrl = document.getElementById('addStudentBtn');
            //ctrl.setAttribute('class',ctrl.getAttribute('class') + ' btn-progress');
            
            var student = Object();

            student.lastname = document.getElementById('lastname').value;
            student.firstname = document.getElementById('firstname').value;
            student.middlename = document.getElementById('middlename').value;
            student.nameextension = document.getElementById('nameextension').value;
            student.birthdate = document.getElementById('birthdate').value;

            col.push(student);
            $('#students').val(JSON.stringify(col));
            $('#modal-dialog').modal('hide');

            showToast('Added New Student');
            showData();
            resetData();            
        }



        function resetData()
        {
            $('#lastname').val('');
            $('#firstname').val('');
            $('#middlename').val('');
            $('#nameextension').val('');
            $('#birthdate').val('');
        }



        function showData()
        {
            $('#applicants').html('');

            $.each(col, function (index,value) {

               $('#applicants').append('<tr>' +
                                        '<td>' + value.lastname + '</td>' +
                                        '<td>' + value.firstname + '</td>' +
                                        '<td>' + value.middlename + '</td>' +
                                        '<td>' + value.nameextension + '</td>' +
                                        '<td>' + value.birthdate + '</td>' + 
                                        '<td><button type="button" data-index="' + index + '" class="btn btn-sm btn-danger" onclick = ""> <i class="fas fa-trash"></i> </button> </td> ' +
                                        '</tr>' );
             

            });
        }
        
        $('#students').val(JSON.stringify(col));
        showData();
    </script> 
@endsection

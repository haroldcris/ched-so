@extends('layouts.main-template')

@section('head')

<script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" rel="stylesheet" media="screen">
@endsection 


@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">

            <div class="card-header bg-success">
                <h4>Create New Application</h4>


            </div>
            
            <div class="card-body">

                <form method="POST" 
                    action="{{ route ('heiso.store') }}" >

                    @csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Program</label>
                        <div class="col-md-9">
                            <select name="program" class="form-control select2  @error('program') is-invalid @enderror " autofocus="">
                        
                                <option value ="" >Choose...</option>
                                @foreach ($program as $item)
                                    <option value ="{{ $item->id }}" >{{ $item->levelDescription }}: {{ $item->description }} </option>
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
                            <input class="form-control datepicker @error('graduation_date') is-invalid @enderror" 
                                type="text" 
                                placeholder="" 
                                name="graduation_date" 
                                value = "{{ old('graduation_date') }}"    
                                readonly
                                required />
                        
                            @error('graduation_date')
                                <div class="invalid-feedback" >{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Remarks</label>
                        <div class="col-md-9">
                            @include('components.form.textbox', ['field' => 'remarks', 
                                                                'fieldValue'  => old('remarks'),
                                                                 'id' => 'remarks'])                            
                        </div>
                    </div>

                    <input type="hidden" name="students" id="students">


                    <div class="card-footer text-right">    
                   <button class="btn btn-lg btn-primary" type="button"   
                        data-toggle="modal" data-target="#basicModal"
                         onclick = "$('#modal-dialog').modal({'backdrop':'static'});">
                            <i class="fa fa-plus"></i>
                            Add Applicant
                        </button>
                    </div>

                    <hr/>


                    <div class="table-responsive">
                         <table class="table table-striped table-bordered">
                            <thead>
                               
                                 <th>Lastname</th>
                                 <th>Firstname</th>
                                 <th>Middlename</th>
                                 <th>NameExtension</th>
                                 <th>Birthdate</th>

                            </thead>
                           <tbody id="applicants">
                                


                           </tbody>

                        </table>
                   
                    </div>
                    </div>


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
       

       (function renderCalendar () {
             const input = document.querySelector('.datepicker');
             const datepicker = new TheDatepicker.Datepicker(input);

             datepicker.options.setInputFormat('F d,  Y');
             datepicker.options.setDropdownItemsLimit(1950,2020);
             datepicker.zIndex = 2048;
             datepicker.render();            

         })();


        var col = [];

        function addStudent(){

            if (col.length >= 20)
            {
                alert('You have exceeded the allowed number of Students');
                return;
            }

            var student = Object();

            student.lastname = document.getElementById('lastname').value;
            student.firstname = document.getElementById('firstname').value;
            student.middlename = document.getElementById('middlename').value;
            student.nameextension = document.getElementById('nameextension').value;
            student.birthdate = document.getElementById('birthdate').value;
            col.push(student);
            $('#students').val(JSON.stringify(col));

            //console.log(col);
            $('#modal-dialog').modal('hide');

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
                                        '<td>' + value.birthdate + '</td></tr>' );
             

            });
        }


    </script> 

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
                                                                'id' =>'lastname'
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
                                type="text" 
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

            <button class="btn btn-success" onclick="addStudent()">
             <!--   <i class=""></i> -->
               Add
            </button>&nbsp;&nbsp;

        @endslot
    @endcomponent 
@endsection



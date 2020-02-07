@extends('layouts.main-template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>List of Applicant</h4>
            </div>
            <div class="card-body"> 

              <div class="">
                <a class="btn btn-success" href="{{ route('applicant.create') }}">
                    Add New
                </a>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                           <th>ID</th>
                           <th>Program</th>
                           <th>Fullname</th>
                           <th>Batch</th>
                           <th>Created_at</th>
                           <th>Updated_at</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                    @foreach($applicant as $item)
                    <tr>
                        <td>
                           {{ $item->id }}
                       </td>
                       <td>
                        {{ $item->program }}
                    </td>
                    <td>
                        {{ $item->lastname }}
                        {{ $item->firstname }}
                        {{ $item->middlename }}
                    </td>
                    <td>
                        {{ $item->batch }}
                    </td>
                    <td>
                        {{ $item->created_at->format('d M Y h:i:s A') }}
                    </td>
                    <td>
                        {{ $item->updated_at->format('d M Y h:i:s A') }}
                    </td>
                    <td>

                       <a href="{{ route('applicant.edit', ['hash' =>$item->hashId()]) }}" 
                        class="btn btn-sm btn-pill btn-block btn-outline-info">
                        <span class="fas fa-edit" />
                        Edit
                    </a>

                    <a href="#" class="btn btn-sm btn-pill btn-block btn-outline-danger mt-1"                                     
                    data-name="{{ $item->id }}" 
                    data-url="{{ route('applicant.destroy', ['id'=>$item->id, 'id'=>$item->id])}}"
                    onclick="$('#dialog-body').html(this.dataset.name);
                    $('#deleteForm').attr('action', this.dataset.url);
                    $('#deleteModalDialog').modal({'backdrop':'static'});" >

                    <span class="fas fa-trash"/>
                    Delete
                </a>                               
            </td>
        </tr>
        @endforeach
    </tbody>


</table>
</div>

</div>
</div>
</div>
</div>



<div class="modal" 
id="deleteModalDialog" 
tabindex="-1" role="dialog" 

aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header bg-warning">

            <h5 class="modal-title">Delete Item</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>

        <div class="modal-body" id='dialog-body'>
            You are about to delete:
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            <form action="" 
            method="POST" 
            id="deleteForm" 

            onsubmit="$('#submitBtn').prop('disabled',true)
            .html(`<i class='spinner-border spinner-border-sm'></i> Please Wait...`);">

            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger" id='submitBtn'>
                <i class="fas fa-trash"></i>
                Delete Item
            </button>
        </form>
    </div>

</div>
</div>
</div>
@endsection   


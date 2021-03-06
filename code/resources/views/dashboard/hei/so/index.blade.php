@extends('layouts.main-template')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card card-success">

            <div class="card-header">
                <h4>SO Applications</h4>
                <div class="card-header-action">
                    <a class="btn btn-primary" 
                        href="{{ route('heiso.create') }}" >
                        <i class="fa fa-plus"></i>
                        Create Draft Application
                    </a>

                    <!-- <button class="btn btn-info"
                            data-toggle="modal" data-target="#searchModal" >
                        <i class="fa fa-search"></i>
                        Search
                    </button> -->
                </div>
            </div>

            <div class="card-body">
                
                <div class="row">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            
                
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Application Id</th>
                                <th>Program</th>
                                <th>Date Created</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td class="text-dark h6">
                                    <div class="mb-1">
                                            {{ $item->TrackingHashId() }}    
                                            <span class="badge badge-light pt0 ">Draft</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="small">{{ $item->level_description }}</div>
                                    {{ $item->course_description }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y h:i A') }}
                                </td>

                                <!-- <td class="small">
                                    {{ $item ?? ''->updated_by }}<br/>
                                    {{ $item ?? ''->updated_at->format('d M Y h:i A') }}
                                </td> -->

                                <td>
                                    <div class="btn-group">

                                        <button class="btn btn-sm btn-success "
                                            data-toggle="tooltip" data-title="File Application" data-original-title="" title="" 
                                            data-name="{{ $item->TrackingHashId()  }}"                                             
                                            data-url="{{ route('heiso.submit', ['id'=> $item->id])}}" 
                                            onclick = "$('#modal-dialog .modal-body .dialog-body').html(this.dataset.name);
                                                        $('#submitForm').attr('action', this.dataset.url);
                                                        $('#modal-dialog').modal({'backdrop':'static'});" >

                                            <i class="fa fa-paper-plane"></i>
                                            
                                        </button>  
                                        

                                        <a href="{{ route('heiso.edit', ['hash' => $item->TrackingHashId()]) }}" 
                                            data-toggle="tooltip" data-title="Edit" data-original-title="" title="" 
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                            
                                        </a>


                                        <button class="btn btn-sm btn-danger "
                                            data-toggle="tooltip" data-title="Delete" data-original-title="" title="" 
                                            data-name="{{ $item->TrackingHashId()  }}" 
                                            data-url="{{ route('heiso.destroy', ['id'=>$item->id])}}"
                                            onclick = "$('#dialog-body').html(this.dataset.name);
                                                        $('#deleteForm').attr('action', this.dataset.url);
                                                        $('#deleteModalDialog').modal({'backdrop':'static'});" >

                                            <i class="fas fa-trash"></i>
                                            
                                        </button>                          



                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $data->links() }}

            </div>
        </div>
    </div>
</div>

@endsection




@section('modal')
    @component('components.dialog.modal')
        <p>You are about to submit:</p>

        <p class='dialog-body h5 text-dark'>

        </p>


        @slot('footer')
            <form id='submitForm' action="#"
                method="POST">

                @csrf

                <button type="submit" class="btn btn-success">
                   <i class="fas fa-check"></i>
                   Submit Application
                </button>
            </form>
        @endslot
    @endcomponent






    @include('components.dialog.delete')





    @component('components.dialog.search')
        <div class="form-group">
            
            <label>Enter Search Criteria</label>
            <div class="input-group">

              <input type="text" 
                    class="form-control" 
                    placeholder="" 
                    name="search-data" 
                    id="search-data" autofocus />

                <div class="input-group-append">
                    <button class="btn btn-info" 
                        onclick="search()" 
                        id= 'search-button'>
                      <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </div>                                
            
        <table class="table table-striped table-bordered" id='search-result'>
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>    
        </table>
    @endcomponent


@endsection



@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        let input = document.getElementById('search-data');
        let timeout = null;

        // Listen for keystroke events
        input.addEventListener('keyup', function (e) {

            if (e.keyCode == 13) {
                clearTimeout(timeout);
                search();
            }

            clearTimeout(timeout);
            // Make a new timeout set to go off in 1000ms (1 second)
            timeout = setTimeout(function () {search(); }, 1000);
        });


        function search()
        {
            let data = $('#search-data').val()
            if(data.length == 0)
            {
                console.log('EMPTY');
                return;
            }

            var btn = document.getElementById('search-button');

            showLoadingButton(btn);

            axios.post('{{ route('course.search') }}', { search: data })
                .then (function(result) {
                    hideLoadingButton(btn);
                    //console.log(result);
                    showSearchResult(result.data)
                })
                .catch(function(error){
                    hideLoadingButton(btn);
                    alert(error);
                    console.log('error:' + error);
                });
        }

        function showSearchResult(data){
            let url = "{{ route('course.destroy') }}";
            let urlEdit = "{{ route('course.edit', '') }}";

            let t = $('#search-result').find('tbody');
            t.html(''); //Clear All Row

            if(data.length == 0){
                t.html("<p> ** No Items match your search ** </p>");
                return;
            }
            
            data.forEach(function(item, index , data){
                //console.log(item);                
                t.append(
                    $('<tr>').append(
                        $('<td>').text( item.code), 
                        $('<td>').text( item.description),
                        $('<td>').html(`
                                <div class="btn-group">
                                <a href="` + urlEdit + '/' + item.key + `" 
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>                                        
                                </a>    
                                <button class="btn btn-sm btn-danger "
                                            data-name="` + item.description + `" 
                                            data-url="`+ url + '?id=' + item.id +`"
                                            onclick = "$('#dialog-body').html(this.dataset.name);
                                                        $('#deleteForm').attr('action', this.dataset.url);
                                                        $('#deleteModalDialog').modal({'backdrop':'static'});" >

                                            <i class="fas fa-trash"></i>
                                        </button>     
                                </div>
                        `) 
                    ) //.appendTo('#search-result');
                );
            });
            
        }
    </script>
@endsection

@section('script')
    <script>
      (function () {
            const input = document.querySelector('.datepicker');
            const datepicker = new TheDatepicker.Datepicker(input);
            datepicker.options.setInputFormat('F d,  Y');
            datepicker.options.setDropdownItemsLimit(1950,2020);
            datepicker.render();            

        })();
    </script> 

@endsection

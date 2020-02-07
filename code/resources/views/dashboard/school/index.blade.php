@extends('layouts.main-template')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Educational Institutions</h4>
                <div class="card-header-action">
                    <a class="btn btn-primary" 
                        href="{{ route('school.create') }}" >
                        <i class="fa fa-plus"></i>
                        Create New Record
                    </a>

                    <button class="btn btn-info"
                            data-toggle="modal" data-target="#searchModal" >
                        <i class="fa fa-search"></i>
                        Search
                    </button>
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
                                <th>School Code</th>
                                <th>Name of Institution</th>
                                <th>Type</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>
                                    {{ $item->code }}
                                </td>
                                <td class="text-dark h6">
                                    <div class="mb-1">
                                        {{ $item->name }}    
                                    </div>
                                    <div class= "pl-3 pb-4 small">
                                        <!-- <div class="small mt-2">
                                            <i class="fas fa-layer-group"></i> Type: {{ $item->type}}
                                        </div> -->
                                        
                                        <div class="">
                                            <i class="far fa-file-alt fa-fw"></i> Recognition #: {{ $item->recognition_number}}
                                        </div>                                    

                                        <div class=""> 
                                            <i class="far fa-envelope fa-fw"></i> Address: {{ $item->town }}, {{ $item->province}}</div>
                                    </div>

                                </td>

                                <td>
                                    {{ $item->type }}
                                </td>
                                
                                <td>
                                    {{ $item->created_at->format('d M Y h:i:s A') }}
                                </td>
                                <td>
                                    {{ $item->updated_at->format('d M Y h:i:s A') }}
                                </td>

                                <td>
                                    <div class="btn-group">
                                        
                                        <a href="{{ route('school.edit', ['hash' => $item->hashId()]) }}" 
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                            
                                        </a>


                                        <button class="btn btn-sm btn-danger "
                                            data-name="{{ $item->name }}" 
                                            data-url="{{ route('school.destroy', ['id'=>$item->id])}}"
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

    @include('components.dialog.delete')

    @component('components.dialog.search')
        <div class="form-group">
            <label>Enter Search Criteria</label>
            <div class="input-group">

                <input type="text" class="form-control" placeholder="" name="search-data" id="search-data" autofocus />

                <div class="input-group-append">
                    <button class="btn btn-info" 
                        onclick="search()" id='search-button'>
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </div>                                


        <table class="table table-striped table-bordered" id='search-result'>
            <thead>
                <tr>
                    <th>School Code</th>
                    <th>Name of Institution</th>
                    <th>Type</th>
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

            axios.post('{{ route('school.search') }}', { search: data })
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
            let url = "{{ route('school.destroy') }}";
            let urlEdit = "{{ route('school.edit', '') }}";

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
                        $('<td>').text( item.name),
                        $('<td>').text( item.type),
                        $('<td>').html(`
                                <div class="btn-group">
                                <a href="` + urlEdit + '/' + item.key + `" 
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>                                        
                                </a>    
                                <button class="btn btn-sm btn-danger "
                                            data-name="` + item.name + `" 
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
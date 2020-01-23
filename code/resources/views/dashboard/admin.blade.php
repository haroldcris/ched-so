@extends('layouts.main2-template')

@section('title', '| Dashboard')


@section('sidebar')
    @include('partials.sidebar.admin-sidebar')    
@endsection


@section('content')
    <div class="columns is-marginless is-multiline">
        <div class="column is-12">

            @include('partials.session-message')

            @component('components.notification', 
                [ 'style' => 'success', 
                  'class' => 'column is-4 is-offset-4 has-text-centered'])
                This is a notification
            @endcomponent

            <div class="panel">
                <p class="panel-heading">Dashboard</p>
                <div class="panel-block">            
                    <div class="tile is-ancestor">
                        <div class="tile is-parent is-vertical">
                            <div class="tile is-child notification is-info">
                                You are logged in!
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.main-template')

@section('title', '| Dashboard')


@section('content')
<div class="columns is-marginless is-multiline">
    <div class="column is-12">

        @include('partials.session-message')

        @component('components.notification', 
        [ 'style' => 'success', 
        'class' => 'column is-4 is-offset-4 has-text-centered'])
        <!--  This is a notification -->
        @endcomponent


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Archived Application</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                       <th>Tracking Number</th>
                                       <th>Date Filed</th>
                                       <th>Program</th>
                                       
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               <tr>
                                   <td></td>
                                   
                                   <td></td>
                                   <td></td>
                                   
                                   <td></td>
                                     
                                   
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @endsection
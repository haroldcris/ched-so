@extends('layouts.main-template')

@section('title', '| Dashboard')


@section('content')
<div class="columns is-marginless is-multiline">
    <div class="column is-12">

        @include('partials.session-message')

        @component('components.notification', 
        [ 'style' => 'success', 
        'class' => 'column is-4 is-offset-4 has-text-centered'])
   this is index for pending application
        @endcomponent

 
        @endsection
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

            
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Filed Application</h5>
                          <h2 class="mb-3 font-18">{{  $filed  }}</h2>
                          <a href={{ route('heifiledso.index') }} class="btn btn-outline-primary">Details</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="/img/pending.jpg" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Released Application</h5>
                          <h2 class="mb-3 font-18">{{  $released  }}</h2>
                         <a href="{{ route('heireleasedso.index') }}" class="btn btn-outline-primary">Details</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="/img/approve.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Deficient Application</h5>


                          <h2 class="mb-3 font-18">{{  $deficient  }}</h2>

                          
                         <a href="{{ route('deficientapp.index') }}" class="btn btn-outline-primary">Details</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="/img/deficient.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

            
	@endsection
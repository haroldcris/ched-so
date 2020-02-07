@extends('layouts.main-template')

@section('title', '| Dashboard')


@section('content')
<div class="columns is-marginless is-multiline">
	<div class="column is-12">

		@include('partials.session-message')

		@component('components.notification', 
		[ 'style' => 'success', 
		'class' => 'column is-4 is-offset-4 has-text-centered'])

		@endcomponent

		<div class="col-12 col-md-12 col-lg-4">
			<div class="card author-box">
				<div class="card-body">
					<div class="author-box-center">
						<img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
						<div class="clearfix"></div>
						<div class="author-box-name">
							<a href="#">{{Auth::user()->username}}</a>
						</div>
						<div class="author-box-job">{{Auth::user()->role}}</div>
					</div>
					<div class="text-center">
						<div class="author-box-description">
							@if(\Auth::user()->role == 'hei')
							<p>{{\Auth::user()->school->name}}</p>
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>

    <!-- Profile card -->

    <div class="card">
      <div class="padding-20">
        <ul class="nav nav-tabs" id="myTab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab2" data-toggle="tab"
            href="#about" role="tab" aria-selected="true">About</a></li>
          </ul>

          <div class="tab-content tab-bordered" id="myTab3Content">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
              <div class="row">
                <div class="col-md-3 col-6 b-r">
                  <strong>Address</strong>
                  <br><p class="text-muted">
                    @if(\Auth::user()->role == 'hei')
                    {{Auth::user()->school->province}}
                     {{Auth::user()->school->town}}
                     @endif
                  </p>

                </div>

                <div class="col-md-3 col-6 b-r">
                  <strong>Contact Information</strong>
                  <br><p class="text-muted">
                    @if(\Auth::user()->role == 'hei')
                    {{Auth::user()->school->contact_person}}
                    {{Auth::user()->school->contact_number}}
                    @endif
                  </p>
                </div>

                <div class="col-md-3 col-6 b-r">
                  <strong>Email</strong>
                  <br><p class="text-muted">
                    
                    {{Auth::user()->email}}
              
                  </p>
                </div>

                <div class="col-md-3 col-6">
                  <strong>Government Recognition Number</strong>
                  <br><p class="text-muted">
                    @if(\Auth::user()->role == 'hei')
                      {{Auth::user()->school->recognition_number}}
                      @endif
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    @endsection


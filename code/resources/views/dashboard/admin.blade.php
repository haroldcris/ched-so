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
                          <h5 class="font-15">List of Application</h5>


                          <h2 class="mb-3 font-18">{{  $filed  }}</h2>


                          <a href="{{ route('adminso.index') }}" class="btn btn-outline-primary">Details</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="/img/list.jpg" alt="">
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
                          <h5 class="font-15">Registered Users</h5>


                          <h2 class="mb-3 font-18">{{  $user  }}</h2>


                         <a href="{{ route('user.index')}}" class="btn btn-outline-primary">Details</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="/img/users.png" alt="">
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
                          <h5 class="font-15"> Registered Schools</h5>


                          <h2 class="mb-3 font-18">{{  $school  }}</h2>


                           <a href="{{ route('school.index')}}" class="btn btn-outline-primary">Details</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="/img/schools.png" alt="">
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
                          <h5 class="font-15">Courses<br/><br/></h5>


                          <h2 class="mb-3 font-18">{{  $course  }}<br/></h2>


                           <a href="{{ route('course.index')}}" class="btn btn-outline-primary">Details</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="/img/course.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




        

    </div>
</div>
@endsection
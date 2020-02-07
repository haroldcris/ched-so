@extends('layouts.auth-template')

@section('title', '| Forgot Password')


@section('content')


    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-danger">
              <div class="card-header">
                <h4>Reset Password</h4>

                <div class="card-header-action">
                  <a href="{{ route('login') }}" class="btn btn-light">
                    <i class="fas fa-caret-left"></i>
                    Back to Login
                  </a>
                </div>
              </div>
              <div class="card-body pt-0">

                @if(session('status'))

                    <p>
                        {{ session('status') }}
                    </p>

                    <div class="form-group row mb-0 justify-content-center">                            
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-block" href="/">
                                To Login Page
                            </a>
                        </div>
                    </div>


                @else

                    <p class="text-muted">We will send a link to reset your password</p>

                    <form class='reset-password' id='reset-password-form'
                            method="POST" 
                            action="{{ route('password.email') }}">
                            @csrf
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                tabindex="1" 
                                value = "{{old('email')}}"
                                required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-lg btn-block" tabindex="4">
                                <i>&nbsp;</i>
                                Send Password Reset Link
                            </button>                            
                          </div>
                    </form>

                @endif

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection

@extends('layouts.auth-template')

@section('title', '| Login')

@section('content')

  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">


              <div class="card-header">
              <div class = "row mx-auto">
                      <img src="/img/ched3.png" class="img-responsive">                    
                      </div>                      
              </div>


              <div class="card-body">                
                <p class="text-center h4">Special Order Application</p>
                <hr/>

                <form method="POST" action="{{ route('login') }}" 
                     class="needs-validation" novalidate="">
                
                    @csrf

                  <div class="form-group">
                    <label>Username</label>
                    <input id="username" type="text" class="form-control @error('username')is-invalid @enderror " name="username" tabindex="1" required autofocus > 
                    <div class="invalid-feedback">
                        @error('username')
                            {{$message}}
                        @else
                            Please fill in your username
                        @enderror
                        
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a class="text-small" href="{{ route('password.request') }}">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        @error('password')
                            {{$message}}
                        @else
                            Please fill in your password
                        @enderror
                      
                    </div>
                  </div>




                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      <i class="fa fa-key">&nbsp</i>
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>


@endsection




@section('content1.OLD')

    <section class="hero is-fullheight is-info">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third">
                        <div class="box">
                            <div class="logo">
                                <figure class="image is-3by3">
                                    <img src="/img/ched.png">
                                </figure>
                            </div>

                            <h1 class="is-size-4">CHED</h1>
                            <h1 class="is-size-4">Special Order Application</h1>
                            <hr class="is-marginless"/>
                            <p class="block has-text-centered">Sign in to start</p>

                            <form class="login-form" id="login-form"
                                    method="POST" 
                                    action="{{ route('login') }}">

                                @csrf
                                
                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input class="input @error('username') is-danger @enderror" 
                                                id="username"
                                                type="text" name="username" 
                                                placeholder="Your username" 
                                                value="{{ old('username') }}" required autofocus>
                                                
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </p>
                                                                        
                                    @error('username')
                                        @include('components.form.help',['msg' => $message])
                                    @enderror
                                </div>


                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" id="password"
                                        type="password" name="password" placeholder="Your Password" required>
                                        <span class="icon is-small is-left"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    </p>
                                    @error('password')
                                        @include('components.form.help',['msg' => $message])
                                    @enderror
                                </div>

                                <div class="field">
                                    <div class="control has-text-right">
                                        <button type="submit" class="button is-primary">
                                            <span class="icon is-small">
                                                <i class="fa fa-key" aria-hidden="true"></i>
                                            </span>
                                            <span>&nbsp;Login</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="field is-clearfix">
                                    <p class="control is-pulled-left is-size-7">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                    </p>
                                    <p class="control is-pulled-right is-size-7">
                                        <a class="is-pulled-right has-text-info" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('submit', function (){
            let b = this.querySelector('[type="submit"]');
            let i = b.getElementsByTagName('i');
            if(i.length != 0)
                i[0].setAttribute('class','fa fa-spin fa-spinner');
        });        
    </script>
@endsection
@extends('layouts.guest-template')

@section('title', '| Login')

@section('content')

    <section class="hero is-fullheight is-info">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third">

                        <div class="box">                            


                        @if (session('status'))

                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                            <div class="form-group row mb-0 justify-content-center">                            
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block" href="/">
                                        Go to Log-In Page
                                    </a>
                                </div>
                            </div>

                        @else 

                            <h1 class="is-size-4 ">Reset Password</h1>
                            <hr class="is-marginless"/>
                            <p class="block has-text-centered">Enter your email to reset your password</p>                            

                        

                            <form class='reset-password'
                                    method="POST" 
                                    action="{{ route('password.email') }}">

                                @csrf
                                                        
                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input class="input @error('email') is-danger @enderror" 
                                                id="username"
                                                type="text" name="email" 
                                                placeholder="Email Address" 
                                                value="{{ old('email') }}" required autofocus>
                                                
                                        <span class="icon is-small is-left">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </span>
                                    </p>
                                                                        
                                    @error('email')
                                        @include('components.form.help')
                                    @enderror
                                </div>

                               
                                <div class="field">
                                    <div class="control has-text-right">
                                        <button type="submit" class="button is-primary">
                                            <span class="icon is-small">
                                                <i class="disabled" aria-hidden="true"></i>
                                            </span>
                                            <span>&nbsp;Send Password Reset Link</span>
                                        </button>
                                    </div>
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
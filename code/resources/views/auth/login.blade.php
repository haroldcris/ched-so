@extends('layouts.guest-template')

@section('title', '| Login')

@section('content')

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

                        <!-- <p>New user? Register <a class="has-text-primary" href="{{ route('register') }}" title="Register">here</a></p> -->
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
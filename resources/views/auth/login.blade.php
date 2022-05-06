@extends('layouts.site')

@section('title', 'Login')

@section('content')

<div class="container">
    <h2 class="page-title">Login</h2>
</div>

    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Session Status -->
                    @include('includes.auth-session-status')

                    <!-- Validation Errors -->
                    @include('includes.auth-validation-errors')
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <label for="email">{{ __('Email') }}</label>
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <!-- Password -->

                        <label for="password">{{ __('Password') }}</label>
                        <div>
                            <input id="password" type="password" name="password" required autocomplete="current-password">
                        </div>

                        <!-- Remember Me -->
                        <div>
                            <label for="remember_me">
                                <input id="remember_me" type="checkbox" name="remember">
                                <span>{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div>

                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            <a href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>
                        <div>
                            <button class="btn">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="col">
                    </form>
                </div>
            </div>
    </section>
@endsection

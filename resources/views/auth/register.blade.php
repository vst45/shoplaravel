@extends('layouts.site')

@section('title', 'Register')

@section('content')

    <div class="container">
        <h2 class="page-title">Register</h2>
    </div>

    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Validation Errors -->
                    @include('includes.auth-validation-errors')
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <label for="name">{{ __('Name') }}</label>
                        <div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <label for="email">{{ __('Email') }}</label>
                        <div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required />
                        </div>

                        <!-- Password -->
                        <label for="password">{{ __('Password') }}</label>
                        <div>
                            <input id="password" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required />
                        </div>

                        <div>
                            <a href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>

                        <div>
                            <button class="btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection

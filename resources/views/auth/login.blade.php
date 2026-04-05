@extends('layouts.landing-page')
@section('title', 'Login - ' . (global_setting()->name ?? ''))
@section('content')

<div class="account-section bg-light-2" style="padding-top:60px;padding-bottom:80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9 col-sm-11">

                <div class="account-heading" style="margin-bottom:28px;">
                    <h2 class="account-heading__title heading-md">Welcome back</h2>
                    <p>Enter your account details below to sign in</p>
                </div>

                @if($errors->any())
                <div style="background:#fee2e2;border:1px solid #fca5a5;color:#991b1b;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:14px;">
                    {{ $errors->first() }}
                </div>
                @endif

                @if(session('status'))
                <div style="background:#dcfce7;border:1px solid #86efac;color:#166534;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:14px;">
                    {{ session('status') }}
                </div>
                @endif

                <form class="account_comment-box" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="account_comment-box__form-inner">
                        <div class="account_comment-box__form-input">
                            <h2 class="account-title">Email address</h2>
                            <input class="form-control bg-white" type="email" name="email"
                                value="{{ old('email') }}" placeholder="Enter your email" required autofocus />
                        </div>
                        <div class="account_comment-box__form-input">
                            <h2 class="account-title">Password*</h2>
                            <input class="form-control bg-white" type="password" name="password"
                                placeholder="Enter your password" required />
                        </div>
                        <div class="account-condition-block">
                            <span class="account-condition">
                                <input type="checkbox" id="remember" name="remember" />
                                Remember me
                            </span>
                            @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                            @endif
                        </div>
                        <div class="account_comment-box__form-input-button">
                            <button type="submit" class="btn-masco rounded-pill w-100">Login Now</button>
                            <div class="button-bottom-text">
                                <span>Don't have an account?
                                    <a href="{{ route('restaurant_signup') }}">Create an account</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@include('partials.landing-footer')

@endsection

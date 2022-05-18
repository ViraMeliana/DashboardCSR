@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="#">
                <img src="{{asset('landing-assets/images/logo/logo.png')}}" alt="logo">
            </a>
            <!-- /Brand logo-->

            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    @if($configData['theme'] === 'dark')
                        <img class="img-fluid" src="{{asset('images/pages/register-v2-dark.svg')}}" alt="Register V2" />
                    @else
                        <img class="img-fluid" src="{{asset('images/pages/register-v2.svg')}}" alt="Register V2" />
                    @endif
                </div>
            </div>
            <!-- /Left Text-->

            <!-- Register-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1">Register 🚀</h2>
                    <p class="card-text mb-2">Add new account!</p>
                    <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="mb-1">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required
                                   autofocus placeholder="{{ trans('global.user_name') }}"
                                   value="{{ old('name', null) }}" aria-describedby="name" tabindex="1">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-1">
                            <label for="identity" class="form-label">NIK</label>
                            <input type="text" name="identity" id="identity"
                                   class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" required
                                   autofocus placeholder="NIK"
                                   value="{{ old('identity', null) }}" aria-describedby="identity" tabindex="1">
                            @if($errors->has('identity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('identity') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                   placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}"
                                   aria-describedby="email"
                                   tabindex="2">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="mb-1">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" name="password" id="password"
                                       class="form-control form-control-merge {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       required placeholder="{{ trans('global.login_password') }}"
                                       aria-describedby="password"
                                       tabindex="3">

                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       class="form-control form-control-merge" required
                                       placeholder="{{ trans('global.login_password_confirmation') }}"
                                       aria-describedby="password_confirmation" tabindex="4">
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="register-privacy-policy"
                                       tabindex="5"/>
                                <label class="form-check-label" for="register-privacy-policy">
                                    I agree to <a href="#">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="5">Sign up</button>
                    </form>
                    <p class="text-center mt-2">
                        <span>Already have an account?</span>
                        <a href="{{route('login')}}"><span>&nbsp;Sign in instead</span></a>
                    </p>
                </div>
            </div>
            <!-- /Register-->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/auth-register.js')}}"></script>
@endsection

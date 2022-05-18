@extends('layouts/fullLayoutMaster')

@section('title', 'Forgot Password')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Forgot Password basic -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        <h2 class="brand-text text-primary ms-1">{{ trans('panel.site_title') }}</h2>
                    </a>

                    <h4 class="card-title mb-1">Forgot Password?</h4>
                    <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>

                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="auth-forgot-password-form mt-2" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-1">
                            <input type="email" name="email" id="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                   placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}"
                                   aria-describedby="email"
                                   tabindex="1">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <button class="btn btn-primary w-100" tabindex="2">{{ trans('global.send_password') }}</button>
                    </form>

                    <p class="text-center mt-2">
                        <a href="{{route('login')}}"> <i data-feather="chevron-left"></i> Back to login </a>
                    </p>
                </div>
            </div>
            <!-- /Forgot Password basic -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset(mix('js/scripts/pages/auth-forgot-password.js'))}}"></script>
@endsection

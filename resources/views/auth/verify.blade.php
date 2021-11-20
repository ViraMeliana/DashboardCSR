@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Verify Email Cover')

@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-affiliate"
                     width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7A6FF1" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275"/>
                    <path d="M11.683 12.317l5.759 -5.759"/>
                    <circle cx="5.5" cy="5.5" r="1.5"/>
                    <circle cx="18.5" cy="5.5" r="1.5"/>
                    <circle cx="18.5" cy="18.5" r="1.5"/>
                    <circle cx="8.5" cy="15.5" r="4.5"/>
                </svg>
                <h2 class="brand-text text-primary ms-1">HcM</h2>
            </a>
            <!-- /Brand logo-->

            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    @if($configData['theme'] === 'dark')
                        <img src="{{asset('images/illustration/verify-email-illustration-dark.svg')}}" class="img-fluid" alt="two steps verification" />
                    @else
                        <img src="{{asset('images/illustration/verify-email-illustration.svg')}}" class="img-fluid" alt="two steps verification" />
                    @endif
                </div>
            </div>
            <!-- /Left Text-->

            <!-- verify email cover-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bolder mb-1">Verify your email &#x2709;&#xFE0F;</h2>
                    <p class="card-text mb-2">Account activation link sent to your email address:<span class="fw-bolder"> hello@pixinvent.com</span> Please follow the link inside to continue.</p>
                    <a class="btn btn-primary w-100" href="{{asset('/')}}">Skip for now</a>
                    <p class="text-center mt-2"><span>Didn&apos;t receive an email?</span>
                        <a href="Javascript:void(0)"><span>&nbsp;Resend</span></a>
                    </p>
                </div>
            </div>
            <!-- verify email cover-->
        </div>
    </div>
@endsection

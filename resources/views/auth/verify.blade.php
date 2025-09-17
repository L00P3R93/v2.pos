@extends('layouts.auth.app')

@section('title')
    <title>Verify Email | POS</title>
@endsection

@section('style')
@endsection

@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <div class="row login-wrapper m-0">
                <div class="col-lg-6 p-0">
                    <div class="login-content">
                        <form method="POST" action="{{ route('verification.resend') }}" class="digit-group">
                            @csrf
                            <div class="login-userset">
                                <div class="login-logo logo-normal">
                                    <img src="{{ asset('assets/img/logo/pos-logo-bg-white.png') }}" alt="img">
                                </div>
                                <a href="{{ route('home') }}" class="login-logo logo-white">
                                    <img class="pos-logo" src="{{ asset('assets/img/logo/pos-logo-bg-white.png') }}"  alt="Img">
                                </a>
                                <div>
                                    <div class="login-userheading">
                                        <h3>{{ __('Verify Your Email Address') }}</h3>
                                        <h4>{{ __('Before proceeding, please check your email for a verification link.') }} {{ __('If you did not receive the email') }},</h4>
                                    </div>
                                    <div class="text-center otp-input">
                                        <div>
                                            <div class="mb-3 d-flex justify-content-center">
                                                @if (session('resent'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100">{{ __('Click here to request another') }}</button>
                                    </div>
                                </div>
                                <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                    <p>Copyright &copy; 2025 Pos.Nexus</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="login-img">
                        <img src="{{ asset('assets/img/authentication/authentication-04.svg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection

@section('script')
@endsection

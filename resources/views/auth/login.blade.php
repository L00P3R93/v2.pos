@extends('layouts.auth.app')

@section('title')
    <title>Sign In | POS</title>
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
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="login-userset">
                                <div class="login-logo logo-normal">
                                    <img src="{{ asset('assets/img/logo/pos-logo-bg-white.png') }}" alt="img">
                                </div>
                                <a href="#" class="login-logo logo-white">
                                    <img class="pos-logo" src="{{ asset('assets/img/logo/pos-logo-bg-white.png') }}"  alt="Img">
                                </a>
                                <div class="login-userheading">
                                    <h3>Sign In</h3>
                                    <h4>Access the POS panel using your email and passcode.</h4>
                                </div>
                                @include('layouts._message')
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <input type="email" id="email" name="email" class="form-control border-end-0">
                                        <span class="input-group-text border-start-0">
                                                <i class="ti ti-mail"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" id="password" name="password" class="pass-input form-control">
                                        <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                    </div>
                                </div>
                                <div class="form-login authentication-check">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                    <input id="remember_me" name="remember_me" type="checkbox" checked>
                                                    <span class="checkmarks"></span>Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="#">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-login">
                                    <button type="submit" class="btn btn-login">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="login-img">
                        <img src="{{ asset('assets/img/authentication/authentication-01.svg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection

@section('script')
@endsection

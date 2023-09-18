@extends('layouts.auth')
@section('title') Login @endsection

@section('body')
<div class="authentication-wrapper authentication-cover authentication-bg ">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/img/law-firm-logo.jpg') }}"
                    alt="auth-login-cover" class="img-fluid my-5 auth-illustration">

                {{-- <img src="{{ asset('assets/img/illustrations/bg-shape-image-light.png') }}" alt="auth-login-cover"
                    class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                    data-app-dark-img="illustrations/bg-shape-image-dark.html"> --}}
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">

                <!-- /Logo -->
                <h3 class="mb-1 fw-bold">Welcome to CAMS! 👋</h3>
                <p class="mb-4">Please sign-in to your account and start the adventure</p>

                @if (session('success'))
                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show mb-xl-0"
                    role="alert">
                    <i class="ri-check-line label-icon"></i><strong>Success</strong>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-xl-0"
                    role="alert">
                    <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-xl-0"
                    role="alert">
                    <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif



                <form id="formAuthentication" class="mb-3" action="{{ route('civilian.auth.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter your email or username" autofocus>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            <a href="{{ route('civilian.auth.forgot-password') }}">
                                <small>Forgot Password?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me">
                            <label class="form-check-label" for="remember-me">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">
                        Sign in
                    </button>
                </form>


            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
@endsection

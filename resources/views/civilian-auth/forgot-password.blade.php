@extends('layouts.auth')
@section('title') Forget Password @endsection
@section('body')
<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">

      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
          <img src="{{ asset('assets/img/illustrations/auth-forgot-password-illustration-light.png') }}" alt="auth-forgot-password-cover" class="img-fluid my-5 auth-illustration" data-app-light-img="illustrations/auth-forgot-password-illustration-light.png" data-app-dark-img="illustrations/auth-forgot-password-illustration-dark.html">

          <img src="{{ asset('assets/img/illustrations/bg-shape-image-light.png') }}" alt="auth-forgot-password-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.html">
        </div>
      </div>
      <!-- /Left Text -->

      <!-- Forgot Password -->
      <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">

          <!-- /Logo -->
          <h3 class="mb-1 fw-bold">Forgot Password? 🔒</h3>
          <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-3" role="alert">
                <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-3" role="alert">
                <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
          <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('civilian.auth.sendMail') }}" method="POST" novalidate="novalidate">
            @csrf
            <div class="mb-3 fv-plugins-icon-container">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus="">
            <div class="fv-plugins-message-container invalid-feedback"></div></div>
            <button class="btn btn-primary d-grid w-100 waves-effect waves-light">Send Reset Link</button>
          <input type="hidden"></form>
          <div class="text-center">
            <a href="{{ route('civilian.auth.index') }}" class="d-flex align-items-center justify-content-center">
              <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
@endsection

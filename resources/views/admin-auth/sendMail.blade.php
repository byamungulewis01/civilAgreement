@extends('layouts.admin-auth')
@section('title') Mail Sent @endsection
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
          <!-- Logo -->
          <div class="app-brand mb-4">
            <a href="index-2.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
            <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z" fill="#7367F0"></path>
                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616"></path>
                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd" d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z" fill="#7367F0"></path>
            </svg>
            </span>
            </a>
          </div>
          <!-- /Logo -->
          @if(session('sentEmail'))
          <h4 class="mb-1 pt-2">Verify your email ✉️</h4>
          <p class="text-start mb-4">
            Password reset link have been sent to your email address: {{ session('sentEmail') }} Please follow the link inside to continue.
          </p>
          <a class="btn btn-primary w-100 mb-3" href="{{ route('admin.index') }}">
            Skip for now
          </a>
          <p class="text-center mb-0">Didn't get the mail?
            <a href="javascript:void(0);">
              Resend
            </a>
          </p>
          @endif
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
@endsection

@extends('layouts.auth')
@section('title') Reset Password @endsection

@section('body')
<div class="authentication-wrapper authentication-cover authentication-bg ">
    <div class="authentication-inner row">

      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
          <img src="{{ asset('assets/img/illustrations/auth-reset-password-illustration-light.png') }}" alt="auth-reset-password-cover" class="img-fluid my-5 auth-illustration" data-app-light-img="illustrations/auth-reset-password-illustration-light.png" data-app-dark-img="illustrations/auth-reset-password-illustration-dark.html">

          <img src="{{ asset('assets/img/illustrations/bg-shape-image-light.png') }}" alt="auth-reset-password-cover" class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.html">
        </div>
      </div>
      <!-- /Left Text -->

      <!-- Reset Password -->
      <div class="d-flex col-12 col-lg-5 align-items-center p-4 p-sm-5">
        <div class="w-px-400 mx-auto">

          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
              <div class="alert-body">
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>
                          <i class="ti ti-close"></i> {{ $error }}
                      </li>
                      @endforeach
                  </ul>
              </div>
          </div>
          @endif

          @if (session('error'))
          <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-3" role="alert">
              <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
         @endif
          <!-- /Logo -->
          <h3 class="mb-1 fw-bold">Reset Password 🔒</h3>
          <p class="mb-4">for <span class="fw-bold"> {{ request('email') }}</span></p>
          <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('civilian.auth.changePassword') }}" method="POST" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="mb-3 form-password-toggle fv-plugins-icon-container">
              <label class="form-label" for="password">New Password</label>
              <input type="hidden" name="key" value="{{ request('key') }}&email={{ request('email') }}"/>
              <div class="input-group input-group-merge has-validation">
                <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div><div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="mb-3 form-password-toggle fv-plugins-icon-container">
              <label class="form-label" for="confirm-password">Confirm Password</label>
              <div class="input-group input-group-merge has-validation">
                <input type="password" id="confirm-password" class="form-control" name="password_confirmation" placeholder="············" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div><div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <button class="btn btn-primary d-grid w-100 mb-3 waves-effect waves-light">
              Set new password
            </button>
            <div class="text-center">
              <a href="{{ route('civilian.auth.index') }}">
                <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                Back to login
              </a>
            </div>
          <input type="hidden"></form>
        </div>
      </div>
      <!-- /Reset Password -->
    </div>
  </div>
@endsection

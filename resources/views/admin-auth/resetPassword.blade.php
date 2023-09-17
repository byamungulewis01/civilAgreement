@extends('layouts.admin-auth')
@section('title') Reset Password @endsection
@section('body')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
        <!-- Reset Password -->
      <div class="card">
        <div class="card-body">
          <h4 class="mb-1 pt-2">Reset Password 🔒</h4>
          <p class="mb-4">for <span class="fw-bold">{{ auth()->user()->email }}</span></p>

          @if (session('success'))
          <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show mb-xl-0" role="alert">
              <i class="ri-check-line label-icon"></i><strong>Success</strong>
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
      @if (session('error'))
          <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-xl-0" role="alert">
              <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
          <form id="formAuthentication" action="{{ route('admin.changePasswordStore',auth()->user()->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">New Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password_confirmation">Confirm Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100 mb-3">
              Set new password
            </button>
            <div class="text-center">
              <a href="{{ route('admin.index') }}">
                <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                Back to login
              </a>
            </div>
          </form>
        </div>
      </div>
      <!-- /Reset Password -->
        </div>
    </div>
</div>
<@endsection

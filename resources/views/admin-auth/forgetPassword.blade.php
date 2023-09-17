@extends('layouts.admin-auth')
@section('title') Forget Password @endsection
@section('body')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="card">
                <div class="card-body">

                  <h4 class="mb-1 pt-2">Forgot Password? 🔒</h4>
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
                  <form id="formAuthentication" class="mb-3" action="{{ route('admin.sendMail') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
                  </form>
                  <div class="text-center">
                    <a href="{{ route('admin.index') }}" class="d-flex align-items-center justify-content-center">
                      <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                      Back to login
                    </a>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
<@endsection

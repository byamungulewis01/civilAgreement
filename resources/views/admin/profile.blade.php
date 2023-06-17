@extends('layouts.app')
@section('title') Admin Profile @endsection

@section('body')
<div class="row fv-plugins-icon-container">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4">
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('admin.dash.profile') ? 'active' : '' }}" href="{{ route('admin.dash.profile') }}"><i
                        class="ti-xs ti ti-users me-1"></i> Account</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('admin.dash.security') ? 'active' : '' }}" href="{{ route('admin.dash.security') }}"><i
                        class="ti-xs ti ti-lock me-1"></i> Security</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('admin.dash.delete-account') ? 'active' : '' }}" href="{{ route('admin.dash.delete-account') }}"><i
                        class="ti-xs ti ti-file-description me-1"></i>Deactive Account</a></li>

        </ul>

        @if (Request::routeIs('admin.dash.profile'))
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>

            {{-- error --}}
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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

            {{-- success --}}

            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('admin.dash.updateProfile') }}"
                    class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    @php
                        $fname = explode(' ', auth()->user()->name)[0];
                        $lname = explode(' ', auth()->user()->name)[1];
                    @endphp
                    <div class="row">
                        <div class="mb-3 col-md-6 fv-plugins-icon-container">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstName" name="firstName" value="{{ $fname }}" required
                                autofocus="">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="mb-3 col-md-6 fv-plugins-icon-container">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="lastName" id="lastName" value="{{ $lname }}" required>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">RW (+250)</span>
                                <input type="text" id="phoneNumber" name="phone" class="form-control" value="{{ auth()->user()->phone }}" minlength="9" maxlength="9"
                                   required>
                            </div>
                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save
                            changes</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
            <!-- /Account -->
        </div>
        @endif


        @if (Request::routeIs('admin.dash.security'))
        <div class="card mb-4">
            <h5 class="card-header">Change Password</h5>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-xl-0" role="alert">
                <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('admin.dash.changePassword') }}"
                    class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                            <label class="form-label" for="currentPassword">Current Password</label>
                            <div class="input-group input-group-merge has-validation">
                                <input class="form-control" type="password" name="currentPassword" id="currentPassword"
                                    placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                            <label class="form-label" for="newPassword">New Password</label>
                            <div class="input-group input-group-merge has-validation">
                                <input class="form-control" type="password" id="newPassword" name="password"
                                    placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                            <label class="form-label" for="confirmPassword">Confirm New Password</label>
                            <div class="input-group input-group-merge has-validation">
                                <input class="form-control" type="password" name="password_confirmation" id="confirmPassword"
                                    placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12 mb-4">
                            <h6>Password Requirements:</h6>
                            <ul class="ps-3 mb-0">
                                <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                <li class="mb-1">At least one lowercase character</li>
                                <li>At least one number, symbol, or whitespace character</li>
                            </ul>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save
                                changes</button>
                            <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
                        </div>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
        @endif


        @if (Request::routeIs('admin.dash.delete-account'))
        <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <form id="formAccountDeactivation" action="{{ route('admin.dash.delete-account-store') }}" method="POST"
                    class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                            <label class="form-label" for="password">Provide Password</label>
                            <div class="input-group input-group-merge has-validation">
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="············">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback"></div>

                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-xl-0" role="alert">
                                <i class="ri-error-warning-line label-icon"></i><strong>Danger</strong>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                           @endif
                           
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account waves-effect waves-light">Deactivate
                        Account</button>
                    <input type="hidden">
                </form>
            </div>
        </div>
        @endif


    </div>
</div>
@endsection

@section('js')
<script>
//  phoneNumber
    $("#phoneNumber").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });


</script>

@endsection

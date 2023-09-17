@extends('layouts.app')
@section('title') Admin Dashboard @endsection

@section('body')
@php
use App\Models\Agreement;
@endphp
<div class="row">
    <div class="col-xl-4 mb-4 col-lg-5 col-12">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-7">
                    <div class="card-body text-nowrap">
                        @php
                        $fname = explode(' ', auth()->user()->name)[0];
                        $lname = explode(' ', auth()->user()->name)[1];
                        @endphp
                        <h5 class="card-title mb-0">Welcome Back {{ $lname }}! </h5>
                        <p class="mb-2">Enjoy modern agreements </p>
                        {{-- <h4 class="text-primary mb-1">$48.9k</h4> --}}
                        <a href="{{ route('admin.dash.profile') }}"
                            class="btn btn-primary waves-effect waves-light">View Profile</a>
                    </div>
                </div>
                <div class="col-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="140"
                            alt="view sales">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View sales -->

    <!-- Statistics -->
    <div class="col-xl-8 mb-4 col-lg-7 col-12">
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0">Statistics</h5>
                    <small class="text-muted">Updated 1 Year ago</small>
                </div>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                {{-- <i class="ti ti-chart-pie-2 ti-sm"></i> --}}
                                <i class="ti ti-layout-kanban"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0"> {{ Agreement::where('status','pending')->count() }}</h5>
                                <small>Pending</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-components"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ Agreement::where('status','accepted')->count() }}</h5>
                                <small>Accepted</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                    class="ti ti-text-wrap-disabled"></i></div>
                            <div class="card-info">
                                <h5 class="mb-0"> {{ Agreement::where('status','rejected')->count() }}</h5>
                                <small>Rejected</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-checkbox"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ Agreement::where('status','completed')->count() }}</h5>
                                <small>Completed</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics -->

</div>
@endsection

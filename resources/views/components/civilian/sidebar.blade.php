@php
use App\Models\Agreement;
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('civilian.dash.index') }}" class="app-brand-link">

            <a href="" class="app-brand-link">
                <img src="{{ asset('assets/img/logo/citizen.png') }}" class="mt-1" alt="RBA Logo" width="170">
            </a>
            {{-- <span class="app-brand-text demo menu-text fw-bold">Citizen Agreement</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::routeIs('civilian.dash.index') ? 'active' : '' }}">
            <a href="{{ route('civilian.dash.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>

            </a>

        </li>

        <!-- Cards -->
        <li
            class="menu-item {{ in_array(Route::currentRouteName(), ['civilian.agreement.create','civilian.agreement.index']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div data-i18n="Agreements">Agreements</div>
                <div class="badge bg-label-primary rounded-pill ms-auto">
                    {{ Agreement::where(function ($query) {$user_id = auth()->guard('civilian')->user()->id;
                    $query->where('partyOne', $user_id)->orWhere('partyTwo', $user_id);})->count() }}
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('civilian.agreement.index') ? 'active' : '' }}">
                    <a href="{{ route('civilian.agreement.index') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('civilian.agreement.create') ? 'active' : '' }}">
                    <a href="{{ route('civilian.agreement.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item {{ Request::routeIs('civilian.agreement.pending') ? 'active' : '' }}">
            <a href="{{ route('civilian.agreement.pending') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                <div data-i18n="Pending">Pending</div>
                <div class="badge bg-label-dark rounded-pill ms-auto">
                    {{ Agreement::where(function ($query) {$user_id = auth()->guard('civilian')->user()->id;
                    $query->where('partyOne', $user_id)->orWhere('partyTwo',
                    $user_id);})->where('status','pending')->count() }}
                </div>
            </a>
        </li>

        <li class="menu-item {{ Request::routeIs('civilian.agreement.accepted') ? 'active' : '' }}">
            <a href="{{ route('civilian.agreement.accepted') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-components"></i>
                <div data-i18n="Accepted">Accepted</div>
                <div class="badge bg-label-secondary rounded-pill ms-auto">
                    {{ Agreement::where(function ($query) {$user_id = auth()->guard('civilian')->user()->id;
                    $query->where('partyOne', $user_id)->orWhere('partyTwo',
                    $user_id);})->where('status','accepted')->count() }}
                </div>
            </a>
        </li>



        <li class="menu-item {{ Request::routeIs('civilian.agreement.rejected') ? 'active' : '' }}">
            <a href="{{ route('civilian.agreement.rejected') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                <div data-i18n="Rejected">Rejected</div>
                <div class="badge bg-label-danger rounded-pill ms-auto">
                    {{ Agreement::where(function ($query) {$user_id = auth()->guard('civilian')->user()->id;
                    $query->where('partyOne', $user_id)->orWhere('partyTwo',
                    $user_id);})->where('status','rejected')->count() }}
                </div>
            </a>
        </li>
        <li class="menu-item {{ Request::routeIs('civilian.agreement.completed') ? 'active' : '' }}">
            <a href="{{ route('civilian.agreement.completed') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-checkbox"></i>
                <div data-i18n="Completed">Completed</div>
                <div class="badge bg-label-success rounded-pill ms-auto">
                    {{
                    Agreement::where(function ($query) {$user_id = auth()->guard('civilian')->user()->id;
                    $query->where('partyOne', $user_id)->orWhere('partyTwo', $user_id);})->where('status',
                    'completed')->count() }}
                </div>
            </a>
        </li>


        </li>
    </ul>



</aside>

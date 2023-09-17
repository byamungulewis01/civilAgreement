<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="{{ route('admin.dash.index') }}" class="app-brand-link">
            <a href="" class="app-brand-link">
                <img src="{{ asset('assets/img/logo/citizen.png') }}" class="mt-1" alt="RBA Logo" width="170">
            </a>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::routeIs('admin.dash.index') ? 'active' : '' }}">
            <a href="{{ route('admin.dash.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>

            </a>

        </li>
        @unless (auth()->user()->role == 'judge')
        <li
            class="menu-item {{ in_array(Route::currentRouteName(), ['admin.users.index','admin.users.active','admin.users.inactive','admin.users.disactive']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('admin.users.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <div data-i18n="All Users">All Users</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.users.active') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.active') }}" class="menu-link">
                        <div data-i18n="Active Users">Active Users</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.users.inactive') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.inactive') }}" class="menu-link">
                        <div data-i18n="Inactive Users">Inactive Users</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.users.disactive') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.disactive') }}" class="menu-link">
                        <div data-i18n="Disactive Users">Disactive Users</div>
                    </a>
                </li>

            </ul>
        </li>
        @endunless
        <li
            class="menu-item {{ in_array(Route::currentRouteName(), ['admin.civilian.index','admin.civilian.active','admin.civilian.inactive','admin.civilian.disactive']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div data-i18n="Citizen">Citizen</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('admin.civilian.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.civilian.index') }}" class="menu-link">
                        <div data-i18n="All Citizen">All Citizen</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.civilian.active') ? 'active' : '' }}">
                    <a href="{{ route('admin.civilian.active') }}" class="menu-link">
                        <div data-i18n="Active Citizen">Active Citizen</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.civilian.inactive') ? 'active' : '' }}">
                    <a href="{{ route('admin.civilian.inactive') }}" class="menu-link">
                        <div data-i18n="Inactive Citizen">Inactive Citizen</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.civilian.disactive') ? 'active' : '' }}">
                    <a href="{{ route('admin.civilian.disactive') }}" class="menu-link">
                        <div data-i18n="Disactive Citizen">Disactive Citizen</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item {{ in_array(Route::currentRouteName(), ['admin.agreements.index','admin.agreements.pending','admin.agreements.accepted','admin.agreements.completed']) ? 'open' : '' }}"
            style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div data-i18n="Agreements">Agreements</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('admin.agreements.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.agreements.index') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.agreements.pending') ? 'active' : '' }}">
                    <a href="{{ route('admin.agreements.pending') }}" class="menu-link">
                        <div data-i18n="Pending">Pending</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.agreements.accepted') ? 'active' : '' }}">
                    <a href="{{ route('admin.agreements.accepted') }}" class="menu-link">
                        <div data-i18n="Accepted">Accepted</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.agreements.completed') ? 'active' : '' }}">
                    <a href="{{ route('admin.agreements.completed') }}" class="menu-link">
                        <div data-i18n="Completed">Completed</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>



</aside>

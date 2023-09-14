<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="{{ route('admin.dash.index') }}" class="app-brand-link">
            {{-- <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span> --}}
            <span class="app-brand-text demo menu-text fw-bold">Citizen Agreement</span>
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
        <li class="menu-item {{ in_array(Route::currentRouteName(), ['admin.agreements.index','admin.agreements.pending','admin.agreements.fail','admin.agreements.completed']) ? 'open' : '' }}"
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
                <li class="menu-item {{ Request::routeIs('admin.agreements.fail') ? 'active' : '' }}">
                    <a href="{{ route('admin.agreements.fail') }}" class="menu-link">
                        <div data-i18n="Fail">Fail</div>
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

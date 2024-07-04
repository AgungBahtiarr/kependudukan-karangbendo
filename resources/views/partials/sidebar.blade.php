<div class="iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <img src="{{ asset('assets/images/logo/logo-banyuwangi.svg') }}" class="img-fluid rounded-normal light-logo" alt="logo" style="width: 40px; height: auto;">
            <img src=" {{ asset('assets/images/logo/logo-banyuwangi.svg') }}" class="img-fluid rounded-normal darkmode-logo" alt="logo" style="width: 40px; height: auto;">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>

    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @can('dashboard_access')
                <li class="{{ Request::is('/') ? 'aktif' : ''}}">
                    <a href="{{ url('/') }}">
                        <i class="las la-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endcan

                @can('read_users')
                <li class="{{ isActiveSidebar(route('users.index')) }}">
                    <a href="{{ route('users.index') }}">
                        <i class="ri-edit-box-line"></i>
                        <span>Data Kader</span>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
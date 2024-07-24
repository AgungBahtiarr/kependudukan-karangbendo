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
                <li class="{{ Request::is('/') ? 'active' : ''}}">
                    <a href="{{ url('/') }}">
                        <i class="ri-home-4-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endcan

                @can('read_users')
                <li class="{{ isActiveSidebar(route('users.index')) }}">
                    <a href="{{ route('users.index') }}">
                        <i class="ri-account-circle-fill"></i>
                        <span>Akun Kader</span>
                    </a>
                </li>
                @endcan

                @can('read_wargas')
                <li class="{{ isActiveSidebar(route('wargas.index')) }}">
                    <a href="{{ route('wargas.index') }}">
                        <i class="ri-team-fill"></i>
                        <span>Data Warga</span>
                    </a>
                </li>
                @endcan

                @can('read_cargas')
                <li class="{{ isActiveSidebar(route('cargas.index')) }}">
                    <a href="{{ route('cargas.index') }}">
                        <i class="ri-booklet-fill"></i>
                        <span>Catatan Keluarga</span>
                    </a>
                </li>
                @endcan

                @can('read_bansos')
                <li class="{{ isActiveSidebar(route('bansos.index')) }}">
                    <a href="{{ route('bansos.index') }}">
                        <i class="ri-hand-heart-fill"></i>
                        <span>Bantuan Sosial</span>
                    </a>
                </li>
                @endcan

                @can('logout')
                <li class="{{ isActiveSidebar(route('logout')) }}">
                    <a href="{{ route('logout') }}" onclick="return confirm('Apakah Anda yakin ingin logout ini?');">
                        <i class="ri-logout-box-r-fill"></i>
                        <span>Logout</span>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
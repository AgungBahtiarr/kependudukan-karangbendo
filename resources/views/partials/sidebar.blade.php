<div class="iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <img src="{{ asset('assets/images/logo/logo-color.png') }}" class="img-fluid rounded-normal light-logo" alt="logo" style="width: 40px; height: auto;">
            <img src=" {{ asset('assets/images/logo/logo-white.png') }}" class="img-fluid rounded-normal darkmode-logo" alt="logo" style="width: 40px; height: auto;">
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
                        <i class="las la-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endcan

                @can('read_all_reportings')
                <li class="{{ isActiveSidebar(route('reportings.all')) }}">
                    <a href="{{ route('reportings.all') }}">
                        <i class="ri-edit-box-line"></i>
                        <span>Pengaduan</span>
                    </a>
                </li>
                @endcan

                @can('read_reportings')
                <li class=" ">
                    <a href="#widget" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="ri-edit-box-line"></i><span>Pengaduan</span>
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                    </a>
                    <ul id="widget" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ isActiveSidebar(route('reportings.user')) }}">
                            <a href="{{ route('reportings.user') }}">
                                <i class="ri-folder-chart-line"></i><span>Data Pengaduan</span>
                            </a>
                        </li>
                        <li class="{{ isActiveSidebar(route('reportings.create')) }}">
                            <a href="{{ route('reportings.create') }}">
                                <i class="ri-add-circle-line"></i><span>Tambah Pengaduan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('read_counselings')
                <li class="{{ isActiveSidebar(route('counselings.index')) }}">
                    <a href="{{ route('counselings.index') }}">
                        <i class="ri-message-line"></i>
                        <span>Konseling</span>
                    </a>
                </li>
                @endcan

                @can('emergency_call_access')
                <li class="{{ isActiveSidebar(route('emergency_call')) }}">
                    <a href="{{ route('emergency_call') }}">
                        <i class="ri-whatsapp-line"></i>
                        <span>Panggilan Darurat</span>
                    </a>
                </li>
                @endcan

                @can('read_users')
                <li class="{{ isActiveSidebar(route('users.index')) }}">
                    <a href="{{ route('users.index') }}">
                        <i class="ri-group-line"></i>
                        <span>Manajemen Petugas</span>
                    </a>
                </li>
                @endcan

                @can('update_profile')
                <li class="{{ isActiveSidebar(route('users.profile')) }}">
                    <a href="{{ route('users.profile') }}">
                        <i class="ri-folder-user-line"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
                @endcan

                @can('logout')
                <li class="{{ isActiveSidebar(route('logout')) }}">
                    <a href="{{ route('logout') }}">
                        <i class="ri-logout-box-r-line"></i>
                        <span>Logout</span>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
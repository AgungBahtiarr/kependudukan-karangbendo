<div class="iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="header-logo">
            <img src="{{ asset('assets/images/logo/logo-banyuwangi.svg') }}" class="img-fluid rounded-normal light-logo"
                alt="logo" style="width: 40px; height: auto;">
            <img src=" {{ asset('assets/images/logo/logo-banyuwangi.svg') }}"
                class="img-fluid rounded-normal darkmode-logo" alt="logo" style="width: 40px; height: auto;">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @can('dashboard_access')
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
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
                        <a href="#" id="widgetToggle"
                            class="flex items-center py-3 px-2 text-base font-normal text-gray-900 rounded-lg dark:text-white">
                            <i class="ri-hand-heart-fill pl-[10px]"></i>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap">Bantuan Sosial</span>
                            <i id="widgetArrow" class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul id="widgetSubmenu" class="hidden py-2 space-y-2">

                            <li class="{{ isActiveSidebar(route('bansos.index')) }}">
                                <a href="{{ route('bansos.index') }}">
                                    <i class="ri-user-follow-line"></i>
                                    <span>Penerima Bantuan</span>
                                </a>
                            </li>
                            <li class="{{ isActiveSidebar(route('programbansos.index')) }}">
                                <a href="{{ route('programbansos.index') }}">
                                    <i class="ri-file-text-line"></i>
                                    <span>Program Bansos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('read_kematians')
                    <li class="{{ isActiveSidebar(route('kematian.index')) }}">
                        <a href="{{ route('kematian.index') }}">
                            <i class="ri-honour-fill"></i>
                            <span>Kematian</span>
                        </a>
                    </li>
                @endcan


                @can('read_laporan')
                    <li class="{{ isActiveSidebar(route('laporan.index')) }}">
                        <a href="#" id="widgetToggle2"
                            class="flex items-center py-3 px-2 text-base font-normal text-gray-900 rounded-lg dark:text-white">
                            <i class="ri-file-chart-fill pl-[10px]"></i>
                            <span class="flex-1 ml-2 text-left whitespace-nowrap">Laporan</span>
                            <i id="widgetArrow2" class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul id="widgetSubmenu2" class="hidden py-2 space-y-2">
                            <li class="{{ isActiveSidebar(route('laporan.index')) }}">
                                <a href="{{ route('laporan.index') }}">
                                    <i class="ri-file-chart-fill"></i>
                                    <span>Warga</span>
                                </a>
                            </li>
                            <li class="{{ isActiveSidebar(route('laporan.cargas')) }}">
                                <a href="{{ route('laporan.cargas') }}">
                                    <i class="ri-file-chart-fill"></i>
                                    <span>Rumah Tangga</span>
                                </a>
                            </li>
                        </ul>
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

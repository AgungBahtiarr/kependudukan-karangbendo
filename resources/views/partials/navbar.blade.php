<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="{{ route('dashboard') }}" class="header-logo">
                    <img src="{{ asset('assets/images/logo/logo-color.png') }}" class="img-fluid rounded-normal light-logo" alt="logo" style="width: 40px; height: auto;">
                    <img src=" {{ asset('assets/images/logo/logo-white.png') }}" class="img-fluid rounded-normal darkmode-logo" alt="logo" style="width: 40px; height: auto;">
                </a>
            </div>

            <!-- Unused Search Bar -->
            <div class="iq-search-bar device-search">
            </div>

            <div class="d-flex align-items-center">
                <div class="change-mode">
                    <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                        <div class="custom-switch-inner">
                            <p class="mb-0"> </p>
                            <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                            <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">

                        <!-- Unused Search Bar -->
                        <li class="nav-item nav-icon search-content">
                        </li>

                        <!-- Unused Notifications -->
                        <li class="nav-item nav-icon dropdown">
                        </li>

                        <!-- Fullscreen -->
                        <li class="nav-item iq-full-screen"><a href="#" class="" id="btnFullscreen"><i class="ri-drag-move-2-fill"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
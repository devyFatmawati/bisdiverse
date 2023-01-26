<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl"
        role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="/">
                        <span class="brand-logo">
                            <img src="../../../favicon.png" alt="">
                        </span>
                        <img src="../../../logo_tulisan.png" height="30"alt="">
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('/', 'dashboard', 'home') ? 'active' : 'nav-item' }}"><a
                        class="nav-link d-flex align-items-center" href="/"><i data-feather="home"></i><span
                            class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a
                        class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown"><i data-feather="book-open"></i><span
                            data-i18n="Charts &amp; Maps">Akademik</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        @if (Module::collections()->has('Magang'))
                            <li class="{{ Request::is('magang*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                    class="dropdown-item d-flex align-items-center" href="/magang" data-bs-toggle=""
                                    data-i18n="Leaflet Maps"><i data-feather="circle"></i><span
                                        data-i18n="Leaflet Maps">Magang</span></a>
                            </li>
                        @endif
                        @if (Module::collections()->has('Seminar'))
                            <li class="{{ Request::is('seminar*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                    class="dropdown-item d-flex align-items-center" href="/seminar" data-bs-toggle=""
                                    data-i18n="Leaflet Maps"><i data-feather="circle"></i><span
                                        data-i18n="Leaflet Maps">Seminar</span></a>
                            </li>
                        @endif
                        @if (Module::collections()->has('Judulskripsi'))
                            <li class="{{ Request::is('judulskripsi*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                    class="dropdown-item d-flex align-items-center" href="/judulskripsi" data-bs-toggle=""
                                    data-i18n="Leaflet Maps"><i data-feather="circle"></i><span
                                        data-i18n="Leaflet Maps">Judul Skripsi</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->

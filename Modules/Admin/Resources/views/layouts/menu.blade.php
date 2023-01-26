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
                <li class="{{ Request::is('/', 'admin') ? 'active' : 'nav-item' }}"><a
                        class="toggle nav-link d-flex align-items-center" href="/"><i
                            data-feather="home"></i><span data-i18n="Dashboards">Dashboard</span></a>
                </li>
                @if (Module::collections()->has('PresensiUjian'))
                    <li class="{{ Request::is('admin/rfid*') ? 'active' : 'nav-item' }}"><a
                            class="toggle nav-link d-flex align-items-center" href="/admin/rfid"><i
                                data-feather="credit-card"></i><span data-i18n="layers">RFID Mahasiswa</span></a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a
                            class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                            data-bs-toggle="dropdown"><i data-feather="file-text"></i><span
                                data-i18n="Pages">Absensi</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('admin/lihat-presensi*') ? 'active' : 'nav-item' }}"
                                data-menu=""><a class="dropdown-item d-flex align-items-center"
                                    href="/admin/lihat-presensi" data-bs-toggle="" data-i18n="Profile"><i
                                        data-feather="user"></i><span data-i18n="Profile">Lihat
                                        Absensi</span></a>
                            </li>
                            <li class="{{ Request::is('admin/rekap-presensi*') ? 'active' : 'nav-item' }}"
                                data-menu=""><a class="dropdown-item d-flex align-items-center"
                                    href="/admin/rekap-presensi" data-bs-toggle="" data-i18n="FAQ"><i
                                        data-feather="book-open"></i><span data-i18n="FAQ">Rekap Absensi</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Module::collections()->has('Magang'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a
                            class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                            data-bs-toggle="dropdown"><i data-feather="layers"></i><span
                                data-i18n="Charts &amp; Maps">Magang</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li class="{{ Request::is('magang/pembimbing*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                    class="dropdown-item d-flex align-items-center" href="/magang/pembimbing"
                                    data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                        data-i18n="Leaflet Maps">Dosen Pembimbing Magang</span></a>
                            </li>
                            <li class="{{ Request::is('magang/pengajuan*') ? 'active' : 'nav-item' }}"data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="/magang/pengajuan"
                                    data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span
                                        data-i18n="Leaflet Maps">Pengajuan Magang</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Module::collections()->has('Seminar'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a
                            class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                            data-bs-toggle="dropdown"><i data-feather="airplay"></i><span
                                data-i18n="Charts &amp; Maps">Seminar</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            {{-- <li class="{{ Request::is('seminar/pembimbing*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                    class="dropdown-item d-flex align-items-center" href="/seminar/pembimbing"
                                    data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                        data-i18n="Leaflet Maps">Dosen Pembimbing Seminar</span></a>
                            </li> --}}
                            <li class="{{ Request::is('seminar/pengajuan*') ? 'active' : 'nav-item' }}"data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="/seminar/pengajuan"
                                    data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span
                                        data-i18n="Leaflet Maps">Pengajuan Seminar</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Module::collections()->has('Judulskripsi'))
                    <li class="dropdown nav-item" data-menu="dropdown"><a
                            class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                            data-bs-toggle="dropdown"><i data-feather="book"></i><span
                                data-i18n="Charts &amp; Maps">Judul Skripsi</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            {{-- <li class="{{ Request::is('Judulskripsi/pembimbing*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                    class="dropdown-item d-flex align-items-center" href="/Judulskripsi/pembimbing"
                                    data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                        data-i18n="Leaflet Maps">Dosen Pembimbing Judulskripsi</span></a>
                            </li> --}}
                            <li class="{{ Request::is('judulskripsi/pengajuan*') ? 'active' : 'nav-item' }}"data-menu="">
                                <a class="dropdown-item d-flex align-items-center" href="/judulskripsi/pengajuan"
                                    data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="file-text"></i><span
                                        data-i18n="Leaflet Maps">Pengajuan Judul Skripsi</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown nav-item" data-menu="dropdown"><a
                        class="dropdown-toggle nav-link d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown"><i data-feather="settings"></i><span
                            data-i18n="Charts &amp; Maps">Pengaturan</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li class="{{ Request::is('admin/dosen*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/dosen" data-bs-toggle=""
                                data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                    data-i18n="Leaflet Maps">Dosen</span></a>
                        </li>
                        <li class="{{ Request::is('admin/mahasiswa*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/mahasiswa"
                                data-bs-toggle="" data-i18n="Leaflet Maps"><i data-feather="user"></i><span
                                    data-i18n="Leaflet Maps">Mahasiswa</span></a>
                        </li>
                        <li class="{{ Request::is('admin/kelas*') ? 'active' : 'nav-item' }}"data-menu=""><a
                                class="dropdown-item d-flex align-items-center" href="/admin/kelas" data-bs-toggle=""
                                data-i18n="Profile"><i data-feather="bookmark"></i><span
                                    data-i18n="Profile">Kelas</span></a>
                        </li>
                        <li
                            class="{{ Request::is('admin/ruangan*') ? 'active' : 'nav-item' }}"data-menu=" data-menu=">
                            <a class="dropdown-item d-flex align-items-center" href="/admin/ruangan"
                                data-bs-toggle="" data-i18n="FAQ"><i data-feather="box"></i><span
                                    data-i18n="FAQ">Ruangan</span></a>
                        </li>
                        <li
                            class="{{ Request::is('admin/matkul*') ? 'active' : 'nav-item' }}"data-menu=" data-menu=">
                            <a class="dropdown-item d-flex align-items-center" href="/admin/matkul" data-bs-toggle=""
                                data-i18n="Profile"><i data-feather="book"></i><span data-i18n="Profile">Mata
                                    Kuliah</span></a>
                        </li>
                        <li class="{{ Request::is('admin/user*') ? 'active' : 'nav-item' }}"data-menu=" data-menu=">
                            <a class="dropdown-item d-flex align-items-center" href="/admin/user-mahasiswa"
                                data-bs-toggle="" data-i18n="Profile"><i data-feather="users"></i><span
                                    data-i18n="users">User</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->

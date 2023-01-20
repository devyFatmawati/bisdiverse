<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Presensi</title>
    <link rel="apple-touch-icon" href="../../../favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-misc.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Coming soon page-->
                <div class="misc-wrapper"><a class="brand-logo" href="/">
                        <img src="../../../LOGO.png" height="50" alt="">
                        <h2 class="brand-text text-primary ms-1"></h2>
                    </a>
                    <div class="misc-inner p-2 p-sm-3">
                        <div class="w-100">
                            <h2 class="mb-1 text-center">Halo Mahasiswa 🚀</h2>
                            <p class="mb-3 text-center">Silahkan Tempelkan Kartu Anda Pada Alat Yang Disediakan</p>
                            <p class="mt-3 mb-1 text-center">Atau Masukan Nomor Kartu Anda</p>
                            <form class="row row-cols-md-auto row justify-content-center align-items-center m-0 mb-2 gx-3" action="/presensiujian">
                                <div class="col-12 m-0 mb-1">
                                    <input class="form-control @error('no_rfid') is-invalid @enderror" autofocus name="no_rfid" type="text" placeholder="Masukan Nomor Kartu Anda" required />
                                </div>
                                <div class="col-12 d-md-block d-grid ps-md-0 ps-auto">
                                    <button class="btn btn-primary mb-1 btn-sm-block" type="submit">Absen</button>
                                </div>
                            </form>
                            @if ($response == 'succes')
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">{{ Carbon\Carbon::parse($jadwal->tanggal_ujian)->isoformat('dddd') }}</h6>
                                            <h3 class="mb-0">24</h3>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="card-title mb-25">{{ $jadwal->matkul->nama }}</h4>
                                            <p class="card-text mb-0">{{ $jadwal->dosen->nama }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">{{ $mahasiswa->nama }}</h6>
                                            <small>{{ $mahasiswa->npm }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Kelas {{ $mahasiswa->kelas }}</h6>
                                            <small>Angkatan {{ $mahasiswa->tahun_masuk }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">{{ $jadwal->ruangan }}</h6>
                                            <small>Gedung {{ $jadwal->ruangan }}, Lantai {{ $jadwal->ruangan }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif($response == 'error')
                            <div class="card card-congratulations bg-danger">
                                <div class="card-body text-center">
                                    <div class="avatar avatar-xl bg-danger shadow">
                                        <div class="avatar-content">
                                            <i data-feather="x-circle" class="font-large-3"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Error</h1>
                                        <p class="card-text m-auto w-75">
                                            {{ $title }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <img class="img-fluid" src="../../../app-assets/images/pages/coming-soon.svg" alt="Coming soon page" />
                            @endif
                        </div>
                    </div>
                </div>
                <!-- / Coming soon page-->
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE11 */
                elem.msRequestFullscreen();
            }
        }
    </script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
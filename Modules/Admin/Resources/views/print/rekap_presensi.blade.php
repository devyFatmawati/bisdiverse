<!DOCTYPE html>
<html class="loading" lang="id" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Print Presensi</title>
    <link rel="apple-touch-icon" href="../../../favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice-print.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

    <style type="text/css">
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="invoice-header d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex">
                                <img src="../../../logounpak.png" height="100" alt="">
                                {{-- <h3 class="text-primary fw-bold ms-1"></h3> --}}
                            </div>
                        </div>
                        <div>
                            <div class="d-flex text-center">
                                <div class="text-primary fw-bold ms-1">
                                    <h1>
                                        UNIVERSITAS PAKUAN
                                    </h1>
                                    <h2>
                                        FAKULTAS EKONOMI DAN BISNIS
                                    </h2>
                                    <h5>
                                        Jl. Pakuan PO. BOX 452 Bogor 16143 Telp.
                                        (0251) 8314918
                                        (Hunting)
                                    </h5>
                                    <h5>
                                        Website:https://feb.unpak.ac.id/ e-mail:
                                        fekonomi@unpak.ac.id
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex">
                                <img src="../../../LOGO2.png" height="100" alt="">
                            </div>
                        </div>
                        <div class="mt-md-0">
                            {{-- <h4 class="fw-bold text-end mb-1">INVOICE #3492</h4>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">Date Issued:</span>
                                <span class="fw-bold"> 25/08/2020</span>
                            </div>
                            <div class="invoice-date-wrapper">
                                <span class="invoice-date-title">Due Date:</span>
                                <span class="fw-bold">29/08/2020</span>
                            </div> --}}
                        </div>
                    </div>

                    <hr class="" />
                    <div class="row pb-2">
                        {{-- <div class="col-sm-6">
                            <h6 class="mb-1">Invoice To:</h6>
                            <p class="mb-25">Thomas shelby</p>
                            <p class="mb-25">Shelby Company Limited</p>
                            <p class="mb-25">Small Heath, B10 0HF, UK</p>
                            <p class="mb-25">718-986-6062</p>
                            <p class="mb-0">peakyFBlinders@gmail.com</p>
                        </div> --}}
                        <div class="col-sm-6 mt-sm-0">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-1"><strong>Mata Kuliah</strong></td>
                                        <td>: {{ $ujian->matkul->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1"><strong>Hari/Tanggal</strong></td>
                                        <td>: {{ $tgl_ujian->format('l/d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1"><strong>Waktu/Ruangan</strong></td>
                                        <td>: {{ $ujian->jam_mulai_ujian }} -
                                            {{ $ujian->jam_berakhir_ujian }}/{{ $ujian->ruangan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1"><strong>Dosen/Penguji</strong></td>
                                        <td>: {{ $ujian->dosen->nama }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="py-1" style="text-align: center">No</th>
                                    <th class="py-1" style="text-align: center">NPM</th>
                                    <th class="py-1">Nama</th>
                                    <th class="py-1" style="text-align: center">Tgl</th>
                                    <th class="py-1" style="text-align: center">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presensis as $presensi)
                                    <tr>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td style="text-align: center">{{ $presensi->npm }}</td>
                                        <td>{{ $presensi->nama }}</td>
                                        <td style="text-align: center">{{ $presensi->created_at->format('d-m-Y') }}</td>
                                        <td style="text-align: center">{{ $presensi->created_at->format('H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0"><span class="fw-bold">Total Hadir :</span> <span
                                    class="ms-75">{{ $presensis->count() }} Mahasiswa</span></p>
                        </div>
                    </div>

                    <hr class="my-2" />
                    <div class="row">
                        <div class="col-sm-6 ml-0">
                            <div class="table-responsive mt-2">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <p>Bogor, {{ Carbon\Carbon::now()->format('d-m-Y') }}</p>
                                                <p>Ketua Program Studi Bisnis Digital</p>
                                                <br>
                                                <br>
                                                <br>
                                                <p>Dion Achmad Armadi, S.E., M.Si.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

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
    <script src="../../../app-assets/js/scripts/pages/app-invoice-print.min.js"></script>
    <!-- END: Page JS-->

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

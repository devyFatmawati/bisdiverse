@extends('layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- Knowledge base Jumbotron -->
                <section id="knowledge-base-search">
                    <div class="row">
                        <div class="col-12">
                            <div class="card knowledge-base-bg text-center"
                                style="background-image: url('../../../app-assets/images/banner/banner.png')">
                                <div class="card-body">
                                    <h2 class="text-primary">Selamat Datang Di Bisdiverse</h2>
                                    <p class="card-text mb-2">
                                        <span>Sistem Terintegrasi </span><span class="fw-bolder">Prodi Bisnis Digital
                                            Universitas Pakuan</span>
                                    </p>
                                    <form class="kb-search-input">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="search"></i></span>
                                            <input type="text" class="form-control" id="searchbar"
                                                placeholder="Ask a question..." />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Knowledge base Jumbotron -->

                <!-- Knowledge base -->
                <section id="knowledge-base-content">
                    <div class="row kb-search-content-info match-height">

                        <!-- api -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="/profile">
                                    <img src="../../../app-assets/images/illustration/api.svg" class="card-img-top"
                                        alt="knowledge-base-image" />
                                    <div class="card-body text-center">
                                        <h4>Profile</h4>
                                        <p class="text-body mt-1 mb-0">Merubah Profile Pribadi Kamu</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- email -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a data-bs-toggle="modal" data-bs-target="#jadwal">
                                    <img src="../../../app-assets/images/illustration/email.svg" class="card-img-top"
                                        alt="knowledge-base-image" />
                                    <div class="card-body text-center">
                                        <h4>Cek Jadwal</h4>
                                        <p class="text-body mt-1 mb-0">Lihat Jadwal Matkul Atau Ujian Kamu Disini</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- demand -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a data-bs-toggle="modal" data-bs-target="#pengajuan">
                                    <img src="../../../app-assets/images/illustration/demand.svg" class="card-img-top"
                                        alt="knowledge-base-image" />
                                    <div class="card-body text-center">
                                        <h4>Pengajuan</h4>
                                        <p class="text-body mt-1 mb-0">Ajukan Berbagai Hal Melalui Satu Platform</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- no result -->
                        <div class="col-12 text-center no-result no-items">
                            <h4 class="mt-4">Search result not found!!</h4>
                        </div>
                    </div>
                </section>
                <!-- Knowledge base ends -->

                <!-- modals -->
                <div class="modal fade" id="pengajuan" tabindex="-1" aria-labelledby="pilihPendapatanTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pilihPendapatanTitle">
                                    Pilih Apa Yang Mau Kamu Ajuin
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    @if (Module::collections()->has('Magang'))
                                        <div class="col-md-6 mt-2">
                                            <a href="/magang" class="btn btn-primary btn-block form-control">Magang
                                            </a>
                                        </div>
                                    @endif
                                    @if (Module::collections()->has('Seminar'))
                                    <div class="col-md-6 mt-2">
                                        <a href="/seminar" class="btn btn-primary btn-block form-control">Seminar
                                        </a>
                                    </div>
                                    @endif
                                    <div class="col-md-6 mt-2">
                                        <a href="/pengajuan" class="btn btn-primary btn-block form-control">Proposal
                                        </a>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <a href="/pengajuan" class="btn btn-primary btn-block form-control">Judul Skripsi
                                        </a>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <a href="/pengajuan" class="btn btn-primary btn-block form-control">Sidang Skripsi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="jadwal" tabindex="-1" aria-labelledby="pilihPendapatanTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pilihPendapatanTitle">
                                    Kamu Mau Lihat Jadwal Apa ?
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <a href="/jadwal" class="btn btn-primary btn-block form-control">Matkul
                                        </a>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <a href="/jadwal" class="btn btn-primary btn-block form-control">UTS
                                        </a>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <a href="/jadwal" class="btn btn-primary btn-block form-control">UAS
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@extends('mahasiswa::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Magang</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Akademik</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Magang</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Card Advance -->


                @if ($magang)
                    <div class="row match-height">
                        <!-- Developer Meetup Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic"
                                        height="170" />
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">IPK</h6>
                                            <h3 class="mb-0">{{ $magang->mahasiswa->ipk }}</h3>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="card-title mb-25">{{ $magang->mahasiswa->nama }}</h4>
                                            <p class="card-text mb-0">Instansi : {{ $magang->instansi }}</p>
                                            <p class="card-text mb-0">Departemen : {{ $magang->departemen }}</p>
                                            <p class="card-text mb-0">Posisi : {{ $magang->posisi }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Pembimbing</h6>
                                            <small>{{ $magang->dosen->nama }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Alamat Instansi</h6>
                                            <small>{{ $magang->alamat_instansi }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="award" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Status Pengajuan</h6>
                                            <small>
                                                @if ($magang->status == 'Diajukan Mahasiswa')
                                                    <span class="badge bg-primary">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditinjau TU')
                                                    <span class="badge bg-info">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Diverifikasi TU')
                                                    <span class="badge bg-success">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditolak TU')
                                                    <span class="badge bg-danger">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditinjau Kaprodi')
                                                    <span class="badge bg-info">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Disetujui Kaprodi')
                                                    <span class="badge bg-success">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditolak Kaprodi')
                                                    <span class="badge bg-danger">{{ $magang->status }}</span>
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center mb-1">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#suratpermohonan">lihat Surat Permohonan</button>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        @if ($magang->status == 'Ditolak TU')
                                            <button href="" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#pengajuanmagang">Buat Ulang Pengajuan</button>
                                        @elseif ($magang->status == 'Ditolak Kaprodi')
                                            <button href="" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#pengajuanmagang">Buat Ulang Pengajuan</button>
                                        @elseif ($magang->status == 'Disetujui Kaprodi')
                                            <a href="/magang/printsuratrekomendasi/{{ $magang->id }}" class="btn btn-primary">Cetak Surat Rekomendasi</a>
                                        @else
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade text-start" id="suratpermohonan" tabindex="-1"
                                aria-labelledby="myModalLabel16" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel16">Surat Permohonan Magang</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe src="{{ asset('storage/' . $magang->surat_permohonan) }}"
                                                width="100%" height="500" style="border:0px"></iframe>
                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Developer Meetup Card -->

                        <!-- User Timeline Card -->
                        <div class="col-lg-8 col-12">
                            <div class="card card-user-timeline">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="list" class="user-timeline-title-icon"></i>
                                        <h4 class="card-title">History Pengajuan Magang</h4>
                                    </div>
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline">
                                        @foreach ($historys as $history)
                                            <li class="timeline-item">
                                                @if ($history->status == 'Diajukan')
                                                    <span class="timeline-point timeline-point-primary">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                @elseif ($history->status == 'Ditinjau')
                                                    <span class="timeline-point timeline-point-info">
                                                        <i data-feather="eye"></i>
                                                    </span>
                                                @elseif ($history->status == 'Diverifikasi')
                                                    <span class="timeline-point timeline-point-success">
                                                        <i data-feather="check"></i>
                                                    </span>
                                                @elseif ($history->status == 'Ditolak')
                                                    <span class="timeline-point timeline-point-danger">
                                                        <i data-feather="x"></i>
                                                    </span>
                                                @elseif ($history->status == 'Disetujui')
                                                    <span class="timeline-point timeline-point-success">
                                                        <i data-feather="check-circle"></i>
                                                    </span>
                                                @endif
                                                <div class="timeline-event">
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6 class="mb-50">
                                                            @if ($history->status == 'Diajukan')
                                                                <span
                                                                    class="badge bg-primary">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Ditinjau')
                                                                <span class="badge bg-info">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Diverifikasi')
                                                                <span
                                                                    class="badge bg-success">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Ditolak')
                                                                <span
                                                                    class="badge bg-danger">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Disetujui')
                                                                <span
                                                                    class="badge bg-success">{{ $history->status }}</span>
                                                            @endif
                                                            {{ $history->jabatan }}
                                                        </h6>
                                                        <span
                                                            class="timeline-event-time">{{ $history->created_at->diffforhumans() }}</span>
                                                    </div>
                                                    @if (isset($history->catatan))
                                                        <p>Catatan : {{ $history->catatan }}</p>
                                                    @endif
                                                    <hr />
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <span>
                                                                <p class="mb-0">
                                                                    {{ $history->created_at->isoformat('dddd, D MMMM Y') }}
                                                                </p>
                                                                <span class="text-muted">Jam :
                                                                    {{ $history->created_at->format('H:i') }}</span>
                                                            </span>
                                                        </div>
                                                        {{-- <div
                                                            class="d-flex align-items-center cursor-pointer mt-sm-0 mt-50">
                                                            <i data-feather="message-square" class="me-1"></i>
                                                            <i data-feather="phone-call"></i>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <!--/ User Timeline Card -->
                    </div>
                @else
                    <div class="row match-height">
                        <!-- pricing free trial -->
                        <div class="pricing-free-trial">
                            <div class="row">
                                <div class="col-12 col-lg-10 col-lg-offset-3 mx-auto">
                                    <div class="pricing-trial-content d-flex justify-content-between">
                                        <div class="text-center text-md-start mt-3">
                                            <h3 class="text-primary">Halo {{ Auth::user()->name }} Kamu Belum Punya
                                                Pengajuan Magang
                                            </h3>
                                            <h5>Silahkan Klik Tombol Dibawah ini Untuk Mengajukan Magang.</h5>
                                            <button type="button" class="btn btn-primary mt-2 mt-lg-3"
                                                data-bs-toggle="modal" data-bs-target="#pengajuanmagang">Ajukan
                                                Magang</button>
                                        </div>
                                        <!-- image -->
                                        <img src="../../../app-assets/images/illustration/pricing-Illustration.svg"
                                            class="pricing-trial-img img-fluid" alt="svg img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ pricing free trial -->
                    </div>
                @endif


                <!--/ Card Advance -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- add new card modal  -->
    <div class="modal fade" id="pengajuanmagang" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h1 class="text-center mb-1" id="addNewCardTitle">Form Pengajuan Magang</h1>
                    <p class="text-center">Silahkan isi Form Pengajuan Berikut</p>

                    <!-- form -->
                    <form class="row gy-1 gx-2 mt-75" action="/magang" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="select2-basic">Pilih Dosen Pembimbing</label>
                            <select class="select2 form-select" id="select2-basic" name="dosen_kds" required>
                                <option label=""></option>
                                @foreach ($dosenpembimbings as $dosen)
                                    <option value="{{ $dosen->dosen_kds }}">{{ $dosen->dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="modalAddCardName">Nama Instansi</label>
                            <input type="text" id="modalAddCardName" class="form-control" name='instansi'
                                placeholder="Nama Instansi" required />
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="modalAddCardName">Departemen</label>
                            <input type="text" id="modalAddCardName" class="form-control" name='departemen'
                                placeholder="Departemen" required />
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="modalAddCardName">Posisi</label>
                            <input type="text" id="modalAddCardName" class="form-control" name='posisi'
                                placeholder="Posisi" required />
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="modalAddCardName">No Telp Instansi</label>
                            <input type="number" id="modalAddCardName" class="form-control" name='no_telp'
                                placeholder="No Telp Instansi" required />
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Alamat Instansi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"
                                name="alamat_instansi" required></textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="modalAddCardName">Upload Surat Permohonan</label>
                            <input type="file" id="modalAddCardName" class="form-control" name='surat_permohonan'
                                accept=".pdf" required />
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Catatan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan Anda"
                                name="catatan"></textarea>
                        </div>

                        <input type="hidden" value="{{ $mahasiswa->npm }}" name='mahasiswa_npm'>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ add new card modal  -->
@endsection

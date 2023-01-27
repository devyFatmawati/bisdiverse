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
                            <h2 class="content-header-title float-start mb-0">Seminar</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Akademik</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Seminar</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                @if ($judul)
                    @if ($seminar)
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
                                                <h3 class="mb-0">{{ $seminar->mahasiswa->ipk }}</h3>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="card-title mb-25">{{ $seminar->mahasiswa->nama }}</h4>
                                                <h4 class="card-title mb-25">{{ $seminar->mahasiswa_npm }}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row meetings">
                                            <div class="content-body">
                                                <h4 class="mb-0">Judul Penelitian : {{ $seminar->judul_penelitian }}</h4>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row meetings">
                                            <div class="avatar bg-light-primary rounded me-1">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon font-medium-3"></i>
                                                </div>
                                            </div>
                                            <div class="content-body">
                                                <h6 class="mb-0">Ketua Dosen Pembimbing</h6>
                                                <small>{{ $seminar->ketuadosen->nama }}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row meetings">
                                            <div class="avatar bg-light-primary rounded me-1">
                                                <div class="avatar-content">
                                                    <i data-feather="users" class="avatar-icon font-medium-3"></i>
                                                </div>
                                            </div>
                                            <div class="content-body">
                                                <h6 class="mb-0">Anggota Dosen Pembimbing</h6>
                                                <small>{{ $seminar->anggotaadosen->nama }}</small>
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
                                                    @if ($seminar->status == 'Diajukan Mahasiswa')
                                                        <span class="badge bg-primary">{{ $seminar->status }}</span>
                                                    @elseif ($seminar->status == 'Ditinjau TU')
                                                        <span class="badge bg-info">{{ $seminar->status }}</span>
                                                    @elseif ($seminar->status == 'Diverifikasi TU')
                                                        <span class="badge bg-success">{{ $seminar->status }}</span>
                                                    @elseif ($seminar->status == 'Ditolak TU')
                                                        <span class="badge bg-danger">{{ $seminar->status }}</span>
                                                    @elseif ($seminar->status == 'Ditinjau Kaprodi')
                                                        <span class="badge bg-info">{{ $seminar->status }}</span>
                                                    @elseif ($seminar->status == 'Disetujui Kaprodi')
                                                        <span class="badge bg-success">{{ $seminar->status }}</span>
                                                    @elseif ($seminar->status == 'Ditolak Kaprodi')
                                                        <span class="badge bg-danger">{{ $seminar->status }}</span>
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                        <hr>
                                        <hr>
                                        <div class="text-center">
                                            @if ($seminar->status == 'Ditolak TU')
                                                <button href="" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#pengajuanseminar">Buat Ulang Pengajuan</button>
                                            @elseif ($seminar->status == 'Ditolak Kaprodi')
                                                <button href="" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#pengajuanseminar">Buat Ulang Pengajuan</button>
                                            @elseif ($seminar->status == 'Disetujui Kaprodi')
                                                <a href="/seminar/printsuratrekomendasi/{{ $seminar->id }}"
                                                    class="btn btn-primary">Cetak
                                                    Surat Seminar</a>
                                            @else
                                            @endif
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
                                            <h4 class="card-title">History Pengajuan Seminar</h4>
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
                                                                    <span
                                                                        class="badge bg-info">{{ $history->status }}</span>
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
                                                    Pengajuan Seminar
                                                </h3>
                                                <h5>Silahkan Klik Tombol Dibawah ini Untuk Mengajukan Seminar.</h5>
                                                <button type="button" class="btn btn-primary mt-2 mt-lg-3"
                                                    data-bs-toggle="modal" data-bs-target="#pengajuanseminar">Ajukan
                                                    Seminar</button>
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

                        <div class="modal fade" id="pengajuanseminar" tabindex="-1" aria-labelledby="addNewCardTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                        <h1 class="text-center mb-1" id="addNewCardTitle">Form Pengajuan Seminar </h1>
                                        <p class="text-center">Silahkan isi Form Pengajuan Berikut</p>

                                        <!-- form -->
                                        <form class="row gy-1 gx-2 mt-75" action="/seminar" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-12">
                                                <label class="form-label" for="modalAddCardName">Judul Penelitian</label>
                                                <input type="text" id="modalAddCardName" class="form-control"
                                                    name='judul_penelitian' placeholder="Judul Penelitian"
                                                    value="{{ $judul->judul_penelitian }}"required />
                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Konsentrasi</label>
                                                    <select class="select2 form-select" id="select2-basic"
                                                        name="konsentrasi" required>
                                                        <option value="{{ $judul->konsentrasi }}">
                                                            {{ $judul->konsentrasi }}</option>
                                                        <option>Entrepreneur</option>
                                                        <option>Data Analyst</option>
                                                        <option>Digital Marketing</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label" for="select2-basic">Pilih Ketua Komisi Dosen
                                                        Pembimbing</label>
                                                    <select class="select2 form-select" id="select2-basic"
                                                        name="kds_dosen" required>
                                                        <option value="{{ $judul->kds_dosen }}">
                                                            {{ $judul->ketuadosen->nama }}</option>
                                                        <option label="">Pilih Dosen Pembimbing 1 </option>
                                                        @foreach ($dosenpembimbings as $dosen)
                                                            <option value="{{ $dosen->dosen_kds }}">
                                                                {{ $dosen->dosen->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label" for="select2-basic">Pilih Anggota Komisi
                                                        Dosen
                                                        Pembimbing</label>
                                                    <select class="select2 form-select" id="select2-basic"
                                                        name="anggota_dosen" required>
                                                        <option value="{{ $judul->anggota_dosen }}">
                                                            {{ $judul->anggotaadosen->nama }}</option>
                                                        <option label="">Pilih Dosen Pembimbing 2</option>
                                                        @foreach ($dosenpembimbings as $dosen)
                                                            <option value="{{ $dosen->dosen_kds }}">
                                                                {{ $dosen->dosen->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Upload
                                                        Proposal</label>
                                                    <input type="file" id="modalAddCardName" class="form-control"
                                                        name='proposal' accept=".pdf" required />
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Upload PPT</label>
                                                    <input type="file" id="modalAddCardName" class="form-control"
                                                        name='ppt' accept=".pdf" required />
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Upload Transkip
                                                        Nilai</label>
                                                    <input type="file" id="modalAddCardName" class="form-control"
                                                        name='transkip' accept=".pdf" required />
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Upload PEEC</label>
                                                    <input type="file" id="modalAddCardName" class="form-control"
                                                        name='peec' accept=".pdf" required />
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Upload SKPI</label>
                                                    <input type="file" id="modalAddCardName" class="form-control"
                                                        name='skpi' accept=".pdf" required />
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Upload Pembayaran
                                                        SPP</label>
                                                    <input type="file" id="modalAddCardName" class="form-control"
                                                        name='spp' accept=".pdf" required />
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label" for="modalAddCardName">Upload Pembayaran
                                                        SKS</label>
                                                    <input type="file" id="modalAddCardName" class="form-control"
                                                        name='sks' accept=".pdf" required />
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="form-label"
                                                        for="exampleFormControlTextarea1">Catatan</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan Anda"
                                                        name="catatan"></textarea>
                                                </div>

                                                <input type="hidden" value="{{ $mahasiswa->npm }}"
                                                    name='mahasiswa_npm'>
                                                <input type="hidden" value="{{ $judul->id }}"
                                                    name='judul_skripsi_id'>

                                                <div class="col-12 text-center">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mt-1">Submit</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-1"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Cancel
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- add new card modal  -->
                @else
                    <div class="row match-height">
                        <!-- pricing free trial -->
                        <div class="pricing-free-trial">
                            <div class="row">
                                <div class="col-12 col-lg-10 col-lg-offset-3 mx-auto">
                                    <div class="pricing-trial-content d-flex justify-content-between">
                                        <div class="text-center text-md-start mt-3">
                                            <h3 class="text-primary">Halo {{ Auth::user()->name }} Kamu Belum Punya
                                                Pengajuan Judul Skripsi
                                            </h3>
                                            <h4 class="text-primary">Atau Mungkin Pengajuan Judul Kamu Belum Disetujui
                                            </h4>
                                            <h5>Silahkan Klik Tombol Dibawah ini Untuk Mengajukan Judul Skripsi.</h5>
                                            <button type="button" class="btn btn-primary mt-2 mt-lg-3"
                                                data-bs-toggle="modal" data-bs-target="#pengajuanjudulskripsi">Ajukan
                                                Judul Skripsi</button>
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
                <div class="modal fade" id="pengajuanjudulskripsi" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h1 class="text-center mb-1" id="addNewCardTitle">Form Pengajuan Judul Skripsi </h1>
                                <p class="text-center">Silahkan isi Form Pengajuan Berikut</p>

                                <!-- form -->
                                <form class="row gy-1 gx-2 mt-75" action="/judulskripsi" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <label class="form-label" for="modalAddCardName">Judul Penelitian</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Judul Penelitian"
                                            name="judul_penelitian"></textarea>
                                        <div class="col-md-12">
                                            <label class="form-label" for="modalAddCardName">Konsentrasi</label>
                                            <select class="select2 form-select" id="select2-basic" name="konsentrasi"
                                                required>
                                                <option label="">Pilih Konsentrasi</option>
                                                <option>Entrepreneur</option>
                                                <option>Data Analyst</option>
                                                <option>Digital Marketing</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="select2-basic">Pilih Ketua Komisi Dosen
                                                Pembimbing</label>
                                            <select class="select2 form-select" id="select2-basic" name="kds_dosen"
                                                required>
                                                <option label="">Pilih DOsen Pembimbing 1 </option>
                                                @foreach ($dosenpembimbings as $dosen)
                                                    <option value="{{ $dosen->dosen_kds }}">{{ $dosen->dosen->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="select2-basic">Pilih Anggota Komisi Dosen
                                                Pembimbing</label>
                                            <select class="select2 form-select" id="select2-basic" name="anggota_dosen"
                                                required>
                                                <option label="">Pilih Dosen Pembimbing 2</option>
                                                @foreach ($dosenpembimbings as $dosen)
                                                    <option value="{{ $dosen->dosen_kds }}">{{ $dosen->dosen->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="exampleFormControlTextarea1">Catatan</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan Anda"
                                                name="catatan"></textarea>
                                        </div>

                                        <input type="hidden" value="{{ $mahasiswa->npm }}" name='mahasiswa_npm'>

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                Cancel
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ add new card modal  -->
        @endsection

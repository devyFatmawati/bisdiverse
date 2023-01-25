@extends('admin::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Lihat Pengajuan Seminar</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Seminar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pengajuan Seminar</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Card Advance -->


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
                                            <p class="card-text mb-0">Konsentrasi : {{ $seminar->konsentrasi }} </p>
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
                                            <h6 class="mb-0">Angggota Dosen Pembimbing</h6>
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
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="clipboard" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Dokumen</h6>
                                            <small>Kelengkapan Dokumen Mahasiswa</small>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                        <div class="text-center mb-1">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#proposal">Proposal</button>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#ppt">PPT</button>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#transkip">Transkip</button>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#peec">PEEC</button>
                                        </div>
                                        <div class="text-center mb-1">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#skip">SKIP</button>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#spp">SPP</button>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#sks">SPP</button>
                                        </div>
                                </div>
                                <div class="text-center mb-1">
                                    <button class="btn btn-outline-danger me-1" data-bs-toggle="modal"
                                        data-bs-target="#tolak">Tolak</button>
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#verifikasi">Setujui</button>
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
                                                                <span class="badge bg-info">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Diverifikasi')
                                                                <span
                                                                    class="badge bg-success">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Ditolak')
                                                                <span class="badge bg-danger">{{ $history->status }}</span>
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
                @endif


                <!--/ Card Advance -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Modal -->
    <div class="modal fade text-start" id="proposal" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Proposal Seminar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $seminar->proposal) }}" width="100%" height="500"
                        style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="ppt" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">PPT Seminar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $seminar->ppt) }}" width="100%" height="500"
                        style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="transkip" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Transkip Nilai</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $seminar->transkip) }}" width="100%" height="500"
                        style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="peec" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">PEEC</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $seminar->peec) }}" width="100%" height="500"
                        style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="skip" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">SKIP</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $seminar->skip) }}" width="100%" height="500"
                        style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="spp" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Bukti Pembayaran SPP</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $seminar->spp) }}" width="100%" height="500"
                        style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="sks" tabindex="-1" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Bukti Pembayaran SKS</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $seminar->sks) }}" width="100%" height="500"
                        style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-start" id="tolak" tabindex="-1" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Apakah Anda Yakin Ingin Menolak Pengajuan Seminar ini ?
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/seminar/pengajuan" method='POST'>
                    @csrf
                    <div class="modal-body">
                        <label>Catatan : </label>
                        <div class="mb-1">
                            <textarea class="form-control" rows="3" placeholder="Berikan Catatan Anda"
                                name="catatan" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="Ditolak">
                    <input type="hidden" name="jabatan" value="TU">
                    <input type="hidden" name="seminar_id" value="{{ $seminar->id }}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-start" id="verifikasi" tabindex="-1" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Apakah Anda Yakin Ingin Setujui Pengajuan Seminar ini ?
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/seminar/pengajuan" method='POST'>
                    @csrf
                    <div class="modal-body">
                        <label>Catatan : </label>
                        <div class="mb-1">
                            <textarea class="form-control" rows="3" placeholder="Berikan Catatan Anda"
                                name="catatan"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="Diverifikasi">
                    <input type="hidden" name="jabatan" value="TU">
                    <input type="hidden" name="seminar_id" value="{{ $seminar->id }}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

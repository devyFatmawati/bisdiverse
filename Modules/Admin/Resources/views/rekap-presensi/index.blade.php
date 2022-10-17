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
                            <h2 class="content-header-title float-start mb-0">Rekap Absensi</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/rekap_absensi">Absensi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Rekap Absensi</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                        class="me-1" data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                        class="me-1" data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                    href="app-email.html"><i class="me-1" data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                    href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <section class="basic-select2">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rekap Absensi</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/admin/rekap-presensi">
                                        <div class="row">
                                            <!-- Basic -->
                                            <div class="col-md-4 mb-1">
                                                <label class="form-label" for="matkul">Mata Kuliah</label>
                                                <select class="select2 form-select" id="matkul" name="matkul" required>
                                                    <option>Silahkan Pilih Matakuliah</option>
                                                    @foreach ($matkuls as $matkul)
                                                        <option value="{{ $matkul->id }}">{{ $matkul->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label class="form-label" for="kelas">Kelas</label>
                                                <select class="select2 form-select" id="kelas" name="kelas">
                                                    <option>Silahkan Pilih Kelas</option>
                                                    @foreach ($kelass as $kelas)
                                                        <option value="{{ $kelas->id }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Tangal</label>
                                                    <input type="date" id="last-name-column" class="form-control"
                                                        placeholder="Last Name" name="tanggal"
                                                        value="{{ request('tanggal') }}" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->
                @if ($presensis)
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-9">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">No RFID</th>
                                                <th style="text-align: center">Nama</th>
                                                <th style="text-align: center">NPM</th>
                                                <th style="text-align: center">Kelas</th>
                                                <th style="text-align: center">Matkul</th>
                                                {{-- <th>Dosen Penguji</th> --}}
                                                <th style="text-align: center">Jam Absensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($presensis as $presensi)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $presensi->no_rfid }}</td>
                                                    <td>{{ $presensi->nama }}</td>
                                                    <td style="text-align: center">{{ $presensi->npm }}</td>
                                                    <td style="text-align: center">{{ $presensi->kelas->kelas }}</td>
                                                    <td style="text-align: center">{{ $presensi->matkul->nama }}</td>
                                                    {{-- <td>{{ $presensi->dosen->nama }}</td> --}}
                                                    <td style="text-align: center">
                                                        {{ $presensi->created_at->format('H:i') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Invoice Actions -->
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 style="text-align: center">Print Rekap Presensi</h3>
                                        <hr class="mb-2 mt-2">
                                        <form action="/admin/print-presensi">
                                            <input type="hidden" name="matkul" value="{{ request('matkul') }}">
                                            <input type="hidden" name="kelas" value="{{ request('kelas') }}">
                                            <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
                                            <button type="submit"
                                                class="btn btn-outline-secondary w-100 mb-75">Cetak</button>
                                        </form>
                                        {{-- <a class="btn btn-outline-secondary w-100 mb-75" href="./app-invoice-print.html" target="_blank"> Print </a> --}}
                                        {{-- <a class="btn btn-outline-secondary w-100 mb-75" href="./app-invoice-edit.html"> Edit </a> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Actions -->
                        </div>
                    </section>
                @endif


            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- END: Content-->
@endsection

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
                            <h2 class="content-header-title float-start mb-0">Daftarkan RFID Mahasiswa</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">RFID Mahasiswa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/admin">Data Mahasiswa Terdaftar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/admin">Tambah Data</a>
                                    </li>
                                    <li class="breadcrumb-item active">Daftarkan
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambahkan RFID Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/rfid/{{ $no_rfid->id }}">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No RFID</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        value="{{ $no_rfid->no_rfid }}" name="no_rfid" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="mahasiswa">Mahasiswa</label>
                                                    <select class="select2 w-100" name="mahasiswa_id" id="mahasiswa"
                                                        required>
                                                        <option label="mahasiswa"></option>
                                                        @foreach ($mahasiswas as $mahasiswa)
                                                            <option value="{{ $mahasiswa->id }}">({{ $mahasiswa->npm }})
                                                                {{ $mahasiswa->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">NPM</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan NPM" name="npm" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kelas">Kelas</label>
                                                    <select class="select2 w-100" name="kelas_id" id="kelas">
                                                        <option label="kelas"></option>
                                                        @foreach ($kelass as $kelas)
                                                            <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
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
            </div>
        </div>
    </div>
@endsection

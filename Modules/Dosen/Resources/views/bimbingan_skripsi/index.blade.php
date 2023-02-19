@extends('dosen::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Dosen Pembimbing</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Skripsi</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Dosen Pembimbing Skripsi</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <a href="/judulskripsi/pembimbing/create" class="btn-icon btn btn-primary btn-round btn-lg"
                                type="button"><span>Tambah Data</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">NPM </th>
                                            <th style="text-align: center">Nama Mahasiswa</th>
                                            <th style="text-align: center">Konsentrasi</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bimbingans as $bimbingan)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $bimbingan->mahasiswa_npm}}</td>
                                                <td style="text-align: center"></td>
                                                <td style="text-align: center">{{ $bimbingan->konsentrasi }}</td>
                                                <td style="text-align: center"><a href="/judulskripsi/bimbingan/{{ $bimbingan->id }}" class="btn btn-primary me-1">Lihat</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

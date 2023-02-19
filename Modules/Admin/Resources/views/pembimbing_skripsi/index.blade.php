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
                                            <th style="text-align: center">NIDN / NIDK</th>
                                            <th style="text-align: center">Nama Dosen</th>
                                            <th style="text-align: center">Kode Dosen</th>
                                            <th style="text-align: center">Mahasiswa Bimbingan</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosens as $dosen)
                                        @php
                                            $kds_dosen=Modules\Judulskripsi\Entities\Judulskripsi::where('kds_dosen',$dosen->dosen->kds)->count();
                                            $anggota_dosen=Modules\Judulskripsi\Entities\Judulskripsi::where('anggota_dosen',$dosen->dosen->kds)->count();
                                        @endphp
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $dosen->dosen->nidn_nidk }}</td>
                                                <td>{{ $dosen->dosen->nama }}</td>
                                                <td style="text-align: center">{{ $dosen->dosen->kds }}</td>
                                                <td style="text-align: center">{{ $kds_dosen + $anggota_dosen }}</td>
                                                <td style="text-align: center"><a href="/judulskripsi/pembimbing/{{ $dosen->dosen->kds }}" class="btn btn-primary me-1">Lihat</a></td>
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

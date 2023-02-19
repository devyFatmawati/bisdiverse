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
            </div>
            <div class="content-body">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="/judulskripsi/pembimbing" method="POST">
                                    @csrf
                                    <div class="card-header">
                                        <h4 class="card-title">Input Dosen Pembimbing</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            Silahkan Ceklis Dosen Yang Ingin Dijadikan Pembimbing
                                        </p>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th style="text-align: center">No</th>
                                                    <th style="text-align: center">NIDN / NIDK</th>
                                                    <th style="text-align: center">Nama Dosen</th>
                                                    <th style="text-align: center">Batas Mahasiswa</th>
                                                    <th style="text-align: center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dosens as $dosen)
                                                    @php
                                                        $cek = Modules\judulskripsi\Entities\DosenPembimbingSkripsi::where('dosen_kds', $dosen->kds)
                                                            ->get()
                                                            ->first();

                                                            @endphp
                                                    <tr>
                                                        <td></td>
                                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                                        <td style="text-align: center">{{ $dosen->kds }}</td>
                                                        <td>{{ $dosen->nama }}</td>
                                                        <td style="text-align: center">
                                                            <div>
                                                                <input type="number" class="form-control"
                                                                    name="pembimbing[{{ $loop->iteration }}][batas_mahasiswa]"
                                                                    placeholder="Masukan Jumlah Total Mahasiswa"
                                                                    value=@if ($cek) {{ $cek->batas_mahasiswa }}
                                                                    @else
                                                                    {{ '20' }} @endif />
                                                                <input type="hidden" class="form-control"
                                                                    name="pembimbing[{{ $loop->iteration }}][dosen_kds]"
                                                                    placeholder="Masukan Jumlah Total Mahasiswa"
                                                                    value="{{ $dosen->kds }}" />
                                                            </div>
                                                        </td>
                                                        <td style="text-align: center">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customCheck2"
                                                                    name='pembimbing[{{ $loop->iteration }}][jadikan_pembimbing]'
                                                                    @if (isset($cek)) @checked(true) @endif />
                                                                <label class="form-check-label" for="customCheck2">Jadikan
                                                                    Pembimbing</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body text-end">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

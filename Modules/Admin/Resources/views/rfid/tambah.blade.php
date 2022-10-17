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
                            <h2 class="content-header-title float-start mb-0">Data RFID</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">RFID Mahasiswa</a></li>
                                    <li class="breadcrumb-item"><a href="#">Data Mahasiswa Terdaftar</a></li>
                                    <li class="breadcrumb-item">Tambah Data</li>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Column Search -->
                <section class="validations" id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Kartu</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/rfid">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode RFID</label>
                                                    <input type="number" id="first-name-column"
                                                        placeholder="Kode" name="no_rfid" autofocus
                                                        value="{{ old('no_rfid') }}" class="form-control @error('no_rfid') is-invalid @enderror" />
                                                        @error('no_rfid')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
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
                <section id="column-search-datatable">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="card card-revenue-budget">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th style="text-align: center">No Kartu</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kartus as $kartu)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $kartu->no_rfid }}</td>
                                                <td style="text-align: center"><a
                                                        href="/admin/rfid/{{ $kartu->id }}/edit"
                                                        class="btn-icon btn btn-primary btn-round btn-ml"
                                                        type="button">Daftarkan</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Column Search -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

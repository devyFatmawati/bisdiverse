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
                            <h2 class="content-header-title float-start mb-0">Data Mahasiswa</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Mahasiswa</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Mahasiswa
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <a href="/admin/mahasiswa/create" class="btn-icon btn btn-primary btn-round btn-lg"
                                type="button"><span>Tambah Data</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Column Search -->
                <section id="column-search-datatable">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="card card-revenue-budget">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center"></th>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Nama</th>
                                            <th style="text-align: center">NPM</th>
                                            <th style="text-align: center">Kelas</th>
                                            <th style="text-align: center">No KTP</th>
                                            <th style="text-align: center">Tempat / Tgl Lahir</th>
                                            <th style="text-align: center">Alamat</th>
                                            <th style="text-align: center">No Telp</th>
                                            <th style="text-align: center">Nama Ibu Kandung</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: left">{{ $mahasiswa->nama }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->npm }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->kelas }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->no_ktp }}</td>
                                                <td style="text-align: center">
                                                    {{ $mahasiswa->tempat_lahir }}/{{ $mahasiswa->tgl_lahir }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->Alamat }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->no_telp }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->ibu_kandung }}</td>
                                                <td style="text-align: center">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                            data-bs-toggle="dropdown">
                                                            <span class="badge rounded-pill badge-light-primary me-1"><i
                                                                    data-feather="more-vertical"></i>Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="/admin/mahasiswa/{{ $mahasiswa->id }}/edit">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                            <form action="/admin/mahasiswa/{{ $mahasiswa->id }}"
                                                                method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                                    <i data-feather="trash" class="me-50"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
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

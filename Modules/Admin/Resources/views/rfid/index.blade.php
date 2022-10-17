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
                            <h2 class="content-header-title float-start mb-0">RFID Mahasiswa</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">RFID Mahasiswa</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Mahasiswa Terdaftar
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <a href="/admin/rfid/create" class="btn-icon btn btn-primary btn-round btn-lg"
                                type="button">Tambah
                                Data</a>
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
                                            <th style="text-align: center">No RFID</th>
                                            <th style="text-align: center">Nama</th>
                                            <th style="text-align: center">NPM</th>
                                            <th style="text-align: center">Kelas</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rfids as $rfid)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $rfid->no_rfid }}</td>
                                                <td style="text-align: left">
                                                    @if ($rfid->mahasiswa)
                                                        {{ $rfid->mahasiswa->nama }}
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($rfid->mahasiswa)
                                                        {{ $rfid->mahasiswa->npm }}
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($rfid->mahasiswa)
                                                        {{ $rfid->mahasiswa->kelas->kelas }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="/admin/rfid/{{ $rfid->id }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="dropdown-item" href="#"
                                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </form>
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

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
                            <h2 class="content-header-title float-start mb-0">Data User</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">User</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data User
                                    </li>
                                </ol>
                            </div>
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
                                            <th style="text-align: center">Email</th>
                                            <th style="text-align: center">Role</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @php
                                                $role = App\Models\Role::where('user_id', $user->id)
                                                    ->get()
                                                    ->first();
                                            @endphp
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: left">{{ $user->name }}</td>
                                                <td style="text-align: left">{{ $user->email }}</td>
                                                <td style="text-align: left">
                                                    @if (isset($role))
                                                        @if ($role->jabatan_id == '0')
                                                            Admin
                                                        @elseif ($role->jabatan_id == '1')
                                                            Kaprodi
                                                        @elseif ($role->jabatan_id == '2')
                                                            Dosen
                                                        @elseif ($role->jabatan_id == '3')
                                                            Mahasiswa
                                                        @else
                                                            Tidak Terdeteksi
                                                        @endif
                                                    @else
                                                        Belum Terdaftar
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                            data-bs-toggle="dropdown">
                                                            <span class="badge rounded-pill badge-light-primary me-1"><i
                                                                    data-feather="more-vertical"></i>Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="/admin/user-mahasiswa/create">
                                                                <input type="hidden" name='user' value="{{ $user->id }}">
                                                                <button type="submit" class="dropdown-item">
                                                                    <i data-feather="edit" class="me-50"></i>
                                                                    <span>Jadikan Mahasiswa</span>
                                                                </button>
                                                            </form>
                                                            <form action="/admin/user-dosen/create">
                                                                <input type="hidden" name='user' value="{{ $user->id }}">
                                                                <button type="submit" class="dropdown-item">
                                                                    <i data-feather="edit" class="me-50"></i>
                                                                    <span>Jadikan Dosen</span>
                                                                </button>
                                                            </form>
                                                            <form action="/admin/user-kaprodi/create">
                                                                <input type="hidden" name='user' value="{{ $user->id }}">
                                                                <button type="submit" class="dropdown-item">
                                                                    <i data-feather="edit" class="me-50"></i>
                                                                    <span>Jadikan Kaprodi</span>
                                                                </button>
                                                            </form>
                                                            <form action=" ">
                                                                <input type="hidden" name='user' value="{{ $user->id }}">
                                                                <button type="submit" class="dropdown-item">
                                                                    <i data-feather="edit" class="me-50"></i>
                                                                    <span>Jadikan Admin</span>
                                                                </button>
                                                            </form>
                                                            <form action="/admin/user-mahasiswa/{{ $user->id }}"
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

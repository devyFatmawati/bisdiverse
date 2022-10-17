@extends('layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <a href="javascript:;" data-bs-target="#editPhoto" data-bs-toggle="modal">
                                                <img class="img-fluid rounded mt-3 mb-2"
                                                    src="{{ asset('storage/' . Auth::user()->foto) }}" height="110"
                                                    width="110" alt="User avatar" />
                                            </a>
                                            <div class="user-info text-center">
                                                <h4>{{ $user->name }}</h4>
                                                @if ($role->jabatan_id == 0)
                                                    <span class="badge bg-light-secondary">Admin</span>
                                                @elseif ($role->jabatan_id == 1)
                                                    <span class="badge bg-light-secondary">AO</span>
                                                @elseif ($role->jabatan_id == 2)
                                                    <span class="badge bg-light-secondary">Kabag</span>
                                                @elseif ($role->jabatan_id == 3)
                                                    <span class="badge bg-light-secondary">Analis</span>
                                                @elseif ($role->jabatan_id == 4)
                                                    <span class="badge bg-light-secondary">Direktur Bisnis</span>
                                                @endif
                                                {{-- <span class="badge bg-light-secondary">{{ $user->email }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Nama : </span>
                                                <span>{{ Auth::user()->name }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Email:</span>
                                                <span>{{ Auth::user()->email }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Status:</span>
                                                <span class="badge bg-light-success">Active</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Role:</span>
                                                @if ($role->role_id == 0)
                                                    <span>Admin</span>
                                                @elseif ($role->role_id == 1)
                                                    <span>User</span>
                                                @endif
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Divisi:</span>
                                                @if ($role->divisi_id == 0)
                                                    <span>Admin</span>
                                                @elseif ($role->divisi_id == 1)
                                                    <span>SKPD</span>
                                                @elseif ($role->divisi_id == 2)
                                                    <span>Pasar</span>
                                                @elseif ($role->divisi_id == 3)
                                                    <span>UMKM</span>
                                                @elseif ($role->divisi_id == 4)
                                                    <span>PPR</span>
                                                @endif
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Jabatan:</span>
                                                @if ($role->jabatan_id == 0)
                                                    <span>Admin</span>
                                                @elseif ($role->jabatan_id == 1)
                                                    <span>AO</span>
                                                @elseif ($role->jabatan_id == 2)
                                                    <span>Kabag</span>
                                                @elseif ($role->jabatan_id == 3)
                                                    <span>Analis</span>
                                                @elseif ($role->jabatan_id == 4)
                                                    <span>Direktur Bisnis</span>
                                                @endif
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser"
                                                data-bs-toggle="modal">
                                                Edit Profile
                                            </a>
                                            <a href="javascript:;" class="btn btn-outline-danger suspend-user"
                                                data-bs-target="#editPassword" data-bs-toggle="modal">Reset Password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">


                        </div>
                        <!--/ User Content -->
                    </div>
                </section>
                <!-- Edit User Modal -->
                <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Edit User</h1>
                                    {{-- <p>Updating user details will receive a privacy audit.</p> --}}
                                </div>
                                <form action="/profile/{{ $user->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="code" value="1">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserFirstName">Nama</label>
                                        <input type="text" id="modalEditUserFirstName" name="name"
                                            class="form-control" placeholder="John" value="{{ Auth::user()->name }}"
                                            data-msg="Masukan Nama Anda" required />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="modalEditUserName">Email</label>
                                        <input type="text" id="modalEditUserName" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}" data-msg="Masukan Nama Anda" required />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit User Modal -->
                <!-- Edit Password Modal -->
                <div class="modal fade" id="editPassword" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Edit Password</h1>
                                    {{-- <p>Updating user details will receive a privacy audit.</p> --}}
                                </div>
                                <form id="editUserForm" method="POST" class="row gy-1 pt-75"
                                    action="/profile/{{ $user->id }}">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="code" value="2">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserFirstName">Password
                                            Lama</label>
                                        <input type="password" id="modalEditUserFirstName" name="password_lama"
                                            class="form-control" data-msg="Masukan Password Lama" required />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserLastName">Password Baru</label>
                                        <input type="password" id="modalEditUserLastName" name="password_baru"
                                            class="form-control" data-msg="Masukan Password Baru" required />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit Password Modal -->
                <!-- Edit foto Modal -->
                <div class="modal fade" id="editPhoto" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Edit Photo</h1>
                                    {{-- <p>Updating user details will receive a privacy audit.</p> --}}
                                </div>
                                <form action="/profile/{{ $user->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="code" value="3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserFirstName">Input Foto Baru</label>
                                        <input type="file" id="modalEditUserFirstName" name="foto"
                                            class="form-control" data-msg="Masukan Foto" required />
                                        <input type="hidden" id="EditUserFirstName" name="foto_lama"
                                            value="{{ Auth::user()->foto }}" class="form-control" />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit foto Modal -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@extends($extend . 'layouts.main')

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
                                                @if (isset($role))
                                                    @if ($role->jabatan_id == 0)
                                                        <span class="badge bg-light-secondary">Admin</span>
                                                    @elseif ($role->jabatan_id == 1)
                                                        <span class="badge bg-light-secondary">Kaprodi</span>
                                                    @elseif ($role->jabatan_id == 2)
                                                        <span class="badge bg-light-secondary">Dosen</span>
                                                    @elseif ($role->jabatan_id == 3)
                                                        <span class="badge bg-light-secondary">Mahasiswa</span>
                                                    @endif
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
                                                @if (isset($role))
                                                    @if ($role->role_id == 0)
                                                        <span>Admin</span>
                                                    @elseif ($role->role_id == 1)
                                                        <span>User</span>
                                                    @endif
                                                @endif
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Jabatan:</span>
                                                @if (isset($role))
                                                    @if ($role->jabatan_id == 0)
                                                        <span>Admin</span>
                                                    @elseif ($role->jabatan_id == 1)
                                                        <span>Kaprodi</span>
                                                    @elseif ($role->jabatan_id == 2)
                                                        <span>Dosen</span>
                                                    @elseif ($role->jabatan_id == 3)
                                                        <span>Mahasiswa</span>
                                                    @endif
                                                @endif
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser"
                                                data-bs-toggle="modal">
                                                Ubah Email
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
                        @if (isset($role))
                            @if ($role->jabatan_id == 1)
                            @elseif ($role->jabatan_id == 2)

                            @elseif ($role->jabatan_id == 3)
                                <div class="col-xl-8 col-lg-7 col-md-7 order-2 order-md-1">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Data Profile Anda</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="/mahasiswa/profile/{{ $data->id }}" method="POST">
                                                @method('put')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="nama">Nama</label>
                                                            <input type="text" id="nama" class="form-control"
                                                                placeholder="Nama" name="nama"
                                                                value="{{ $data->nama }}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="npm">NPM</label>
                                                            <input type="number" id="npm" class="form-control"
                                                                placeholder="Nomor Pokok Mahasiswa" name="npm"
                                                                value="{{ $data->npm }}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="tahun_masuk">Tahun Masuk</label>
                                                            <input type="text" id="tahun_masuk" class="form-control"
                                                                placeholder="Tahun Masuk" name="tahun_masuk"
                                                                value="{{ $data->tahun_masuk }}" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="kelas">Kelas</label>
                                                            <input type="text" id="kelas" class="form-control"
                                                                name="kelas" placeholder="Kelas"
                                                                value="{{ $data->kelas }}" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="konsentrasi">Konsentrasi</label>
                                                            <select class="select2 form-select" id="konsentrasi"
                                                                name="konsentrasi" required>
                                                                @if ($data->konsentrasi)
                                                                    <option value="{{ $data->konsentrasi }}" selected>
                                                                        {{ $data->konsentrasi }}
                                                                    </option>
                                                                @else
                                                                    <option label=""></option>
                                                                    <option>Entrepreneur</option>
                                                                    <option>Digital Marketing</option>
                                                                    <option>Data Analyst</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="ipk">IPK</label>
                                                            <input type="number" id="ipk" class="form-control"
                                                                name="ipk" placeholder="IPK"
                                                                value="{{ $data->ipk }}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="no_ktp">Nomor KTP</label>
                                                            <input type="number" id="no_ktp" class="form-control"
                                                                name="no_ktp" placeholder="Nomor KTP"
                                                                value="{{ $data->no_ktp }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamat">Alamat</label>
                                                            <input type="text" id="alamat" class="form-control"
                                                                name="alamat" placeholder="Alamat"
                                                                value="{{ $data->alamat }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="provinsi">Provinsi</label>
                                                            <input type="text" id="provinsi" class="form-control"
                                                                name="provinsi" placeholder="Provinsi"
                                                                value="{{ $data->provinsi }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label"
                                                                for="kabkota">Kabupaten/Kota</label>
                                                            <input type="text" id="kabkota" class="form-control"
                                                                name="kabkota" placeholder="Kabupaten/Kota"
                                                                value="{{ $data->kabkota }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="kecamatan">Kecamatan</label>
                                                            <input type="text" id="kecamatan" class="form-control"
                                                                name="kecamatan" placeholder="Kecamatan"
                                                                value="{{ $data->kecamatan }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="desa">Desa</label>
                                                            <input type="text" id="desa" class="form-control"
                                                                name="desa" placeholder="Desa"
                                                                value="{{ $data->desa }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="rt">RT</label>
                                                            <input type="number" id="rt" class="form-control"
                                                                name="rt" placeholder="RT"
                                                                value="{{ $data->rt }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="rw">RW</label>
                                                            <input type="number" id="rw" class="form-control"
                                                                name="rw" placeholder="RW"
                                                                value="{{ $data->rw }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="kode_pos">Kode Pos</label>
                                                            <input type="number" id="kode_pos" class="form-control"
                                                                name="kode_pos" placeholder="Kode Pos"
                                                                value="{{ $data->kode_pos }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="no_telp">No Telp</label>
                                                            <input type="number" id="no_telp" class="form-control"
                                                                name="no_telp" placeholder="No Telp" minlength="10"
                                                                maxlength="12" value="{{ $data->kabkota }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="tempat_lahir">Tempat
                                                                Lahir</label>
                                                            <input type="text" id="tempat_lahir" class="form-control"
                                                                name="tempat_lahir" placeholder="Tempat Lahir"
                                                                value="{{ $data->tempat_lahir }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="tgl_lahir">Tanggal
                                                                Lahir</label>
                                                            <input type="date" id="tgl_lahir" class="form-control"
                                                                name="tgl_lahir" placeholder="Tanggal Lahir"
                                                                value="{{ $data->tgl_lahir }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="ibu_kandung">Nama Ibu
                                                                Kandung</label>
                                                            <input type="text" id="ibu_kandung" class="form-control"
                                                                name="ibu_kandung" placeholder="Nama Ibu Kandung"
                                                                value="{{ $data->ibu_kandung }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="nama_ot">Nama Orang
                                                                Terdekat</label>
                                                            <input type="text" id="nama_ot" class="form-control"
                                                                name="nama_ot" placeholder="Nama Orang Terdekat"
                                                                value="{{ $data->nama_ot }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="hubungan_ot">Hubungan Dengan
                                                                Orang
                                                                Terdekat</label>
                                                            <input type="text" id="hubungan_ot" class="form-control"
                                                                name="hubungan_ot"
                                                                placeholder="Hubungan Dengan Orang Terdekat"
                                                                value="{{ $data->hubungan_ot }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="no_telp_ot">No Telp Orang
                                                                Terdekat</label>
                                                            <input type="text" id="no_telp_ot" class="form-control"
                                                                name="no_telp_ot" placeholder="No Telp Orang Terdekat"
                                                                value="{{ $data->no_telp_ot }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="asal_sekolah">Asal
                                                                Sekolah</label>
                                                            <input type="text" id="asal_sekolah" class="form-control"
                                                                name="asal_sekolah" placeholder="Asal Sekolah"
                                                                value="{{ $data->asal_sekolah }}" />
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                                                    <div class="col-12">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-secondary">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                        @endif
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
                                        @if (isset($role))
                                            @if ($role->jabatan_id == 0)
                                                <label class="form-label" for="modalEditUserFirstName">Nama</label>
                                                <input type="text" id="modalEditUserFirstName" name="name"
                                                    class="form-control" placeholder="John"
                                                    value="{{ Auth::user()->name }}" data-msg="Masukan Nama Anda"
                                                    required />
                                            @else
                                                {{-- <label class="form-label" for="modalEditUserFirstName">Nama</label> --}}
                                                <input type="hidden" id="modalEditUserFirstName" name="name"
                                                    class="form-control" placeholder="John"
                                                    value="{{ Auth::user()->name }}" data-msg="Masukan Nama Anda"
                                                    required />
                                            @endif
                                        @else
                                            <label class="form-label" for="modalEditUserFirstName">Nama</label>
                                            <input type="text" id="modalEditUserFirstName" name="name"
                                                class="form-control" placeholder="John" value="{{ Auth::user()->name }}"
                                                data-msg="Masukan Nama Anda" required />
                                        @endif
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

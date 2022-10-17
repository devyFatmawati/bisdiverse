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
                                    <li class="breadcrumb-item active"><a href="#">Mahasiswa</a>
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
                                    <h4 class="card-title">Tambahkan Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/mahasiswa">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama Mahasiswa</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Nama Mahasiswa" name="nama" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">NPM</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan NPM" name="npm" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kelas">Kelas</label>
                                                    <select class="select2 w-100" name="kelas_id" id="kelas" required>
                                                        <option label="kelas"></option>
                                                        @foreach ($kelass as $kelas)
                                                            <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No KTP</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan No KTP Mahasiswa" name="no_ktp" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Alamat</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Alamat Mahasiswa" name="alamat" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kab/Kota</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Kab/Kota Alamat6 Mahasiswa" name="kabkota" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kecamatan</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Kecamatan Alamat Mahasiswa" name="kecamatan" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Desa/Kelurahan</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Desa/Kelurahan Alamat Mahasiswa"
                                                        name="desa" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">RT</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan RT Alamat Mahasiswa" name="rt" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">RW</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan RW Alamat Mahasiswa" name="rw" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode
                                                        POS</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Kode POS Alamat Mahasiswa" name="kode_pos" />
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No Telephone</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan No Telp Mahasiswa" name="no_telp" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tempat
                                                        Lahir</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Tempat Lahir Mahasiswa"
                                                        name="tempat_lahir" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tanggal
                                                        Lahir</label>
                                                    <input type="date" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Tanggal Lahir Mahasiswa" name="tgl_lahir" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Ibu
                                                        Kandung</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Nama Ibu Kandung Mahasiswa"
                                                        name="ibu_kandung" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama
                                                        Ortu/Wali</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Nama Ortu/Wali Mahasiswa (Selain ibu)"
                                                        name="nama_ot" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Hubungan
                                                        Ortu/Wali</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Masukan Hubungan Ortu/Wali Mahasiswa"
                                                        name="hubungan_ot" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No. Telp Orang
                                                        Tua</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Masukan No. Telp Orang Tua Mahasiswa"
                                                        name="no_telp_ot" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Asal
                                                        Sekolah</label>
                                                    <input type="teks" id="first-name-column" class="form-control"
                                                        placeholder="Masukan sal Sekolah Mahasiswa" name="asal_sekolah" />
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
            </div>
        </div>
    </div>
@endsection

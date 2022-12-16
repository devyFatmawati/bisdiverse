@extends('admin::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        {{-- card selamat datang --}}
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <h1 class="mb-3 mt-3"><a href="#">Selamat Datang</a></h3>
                                        <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" />
                                </div>
                            </div>
                        </div>
                        {{-- akhir card selamat datang --}}

                    </div>

                    <div class="row match-height">
                        <div class="col-lg-3 col-12">
                            <div class="card card-developer-meetup mb-1">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    {{-- <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" /> --}}
                                    <h2 class="mb-3 mt-3"><a href="#">Jadwal Ujian</a></h3>
                                </div>
                            </div>
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <button type="button" class="btn btn-primary mb-5 mt-4" data-bs-toggle="modal"
                                        data-bs-target="#editUser">Tambah Jadwal</button>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <img src="../../../app-assets/images/pages/calendar-illustration.png" alt="Meeting Pic"
                                        height="170" />
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Report Card -->
                        <div class="col-lg-9 col-12">
                            <div class="card card-revenue-budget">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">no</th>
                                            <th style="text-align: center">Tanggal Ujian</th>
                                            <th style="text-align: center">Waktu</th>
                                            <th style="text-align: center">Kode Matkul</th>
                                            <th style="text-align: center">Nama Matkul</th>
                                            <th style="text-align: center">Dosen Penguji</th>
                                            <th style="text-align: center">Kelas</th>
                                            <th style="text-align: center">Ruangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwals as $jadwal)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $jadwal->tgl_ujian }}</td>
                                                <td style="text-align: center">{{ $jadwal->jam_mulai_ujian }} -
                                                    {{ $jadwal->jam_berakhir_ujian }}</td>
                                                <td style="text-align: center">{{ $jadwal->matkul_kode }}</td>
                                                <td>{{ $jadwal->matkul->nama }}</td>
                                                <td>{{ $jadwal->dosen->nama }}</td>
                                                <td style="text-align: center">{{ $jadwal->kelas }}</td>
                                                <td style="text-align: center">{{ $jadwal->ruangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Revenue Report Card -->
                    </div>

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
                                        <h1 class="mb-1">Tambahkan Jadwal</h1>
                                        <p>Silahkan Isi Form Dibawah Ini Untuk Membuat Jadwal Ujian.</p>
                                    </div>
                                    <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="/admin">
                                        @csrf
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="jenis">Jenis Ujian</label>
                                            <select id="jenis" name="jenis_ujian" class="form-select"
                                                aria-label="Default select example" required>
                                                <option label="" ></option>
                                                <option>UTS</option>
                                                <option>UAS</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="matkul">Matakuliah</label>
                                            <select id="matkul" name="matkul_kode" class="form-select"
                                                aria-label="Default select example" required>
                                                <option label=""></option>
                                                @foreach ($matkuls as $matkul)
                                                    <option value="{{ $matkul->kode }}">{{ $matkul->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="tgl_ujian">Tanggal Ujian</label>
                                            <input type="date" id="tgl_ujian" name="tgl_ujian" class="form-control" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="jam_mulai_ujian">Jam Mulai Ujian</label>
                                            <input type="time" id="jam_mulai_ujian" name="jam_mulai_ujian"
                                                class="form-control" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="jam_berakhir_ujian">Jam Berakhir Ujian</label>
                                            <input type="time" id="jam_berakhir_ujian" name="jam_berakhir_ujian"
                                                class="form-control" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="kelas_id">Kelas</label>
                                            <select id="kelas_id" name="kelas" class="form-select"
                                                aria-label="Default select example" required>
                                                <option selected>Silahkan Pilih Kelas</option>
                                                <option >A</option>
                                                <option >B</option>
                                                <option >C</option>
                                                <option >D</option>
                                                <option >E</option>
                                                <option >F</option>
                                                <option >G</option>
                                                <option >H</option>
                                                <option >I</option>
                                                <option >J</option>
                                                <option >K</option>
                                                <option >L</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="dosen_id">Dosen Penguji</label>
                                            <select id="dosen_id" name="dosen_kds" class="form-select"
                                                aria-label="Default select example" required>
                                                <option selected>Silahkan Pilih Dosen</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->kds }}">{{ $dosen->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="ruangan_id">Ruang Ujian</label>
                                            <select id="ruangan_id" name="ruangan" class="form-select"
                                                aria-label="Default select example" required>
                                                <option selected>Silahkan Pilih Ruangan</option>
                                                @foreach ($ruangans as $ruangan)
                                                    <option value="{{ $ruangan->ruangan }}">{{ $ruangan->ruangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                            <button type="reset" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                Batalkan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Edit User Modal -->

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

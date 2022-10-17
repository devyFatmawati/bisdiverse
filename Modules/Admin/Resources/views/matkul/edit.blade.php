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
                            <h2 class="content-header-title float-start mb-0">Edit Matkul</h2>
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
                                    <h4 class="card-title">Edit Matkul</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/matkul/{{ $matkul->id }}">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode
                                                        Matakuliah</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Kode" name="kode" value="{{ $matkul->kode }}"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="semester">Semester</label>
                                                    <select class="select2 w-100" name="semester" id="semester" required>
                                                        @if (old('semester', $matkul->semester) == $matkul->id)
                                                            <option value="{{ $matkul->semester }}" selected>
                                                                {{ $matkul->semester }}</option>
                                                        @else
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Nama Matakuliah</label>
                                                    <input type="text" id="last-name-column" class="form-control"
                                                        placeholder="Nama" name="nama" value="{{ $matkul->nama }}"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">SKS</label>
                                                    <input type="text" id="last-name-column" class="form-control"
                                                        placeholder="SKS" name="sks" value="{{ $matkul->sks }}"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="dosen">Dosen</label>
                                                    <select class="select2 w-100" name="dosen_id" id="dosen" required>
                                                        @foreach ($dosens as $dosen)
                                                            @if (old('dosen_id', $matkul->dosen_id) == $dosen->id)
                                                                <option value="{{ $dosen->id }}" selected>
                                                                    {{ $dosen->nama }}</option>
                                                            @else
                                                                <option value="{{ $dosen->id }}">{{ $dosen->nama }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
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

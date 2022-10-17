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
                            <h2 class="content-header-title float-start mb-0">Edit Ruangan</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Ruangan</a>
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
                                    <h4 class="card-title">Edit Ruangan</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/ruangan/{{ $ruangan->id }}">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama Ruangan</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Nama Ruangan" value="{{ $ruangan->ruangan }}"
                                                        name="ruangan" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama Gedung</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Nama Gedung" value="{{ $ruangan->gedung }}"
                                                        name="gedung" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Lantai</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Lantai" value="{{ $ruangan->lantai }}"
                                                        name="lantai" />
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

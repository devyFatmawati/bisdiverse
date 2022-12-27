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
                            <h2 class="content-header-title float-start mb-0">Daftarkan {{ $user->name }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">User</a>
                                    </li>
                                    <li class="breadcrumb-item active">Verifikasi User
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Card Advance -->

                <div class="row match-height">
                    {{-- <!-- Congratulations Card -->
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="../../../app-assets/images/elements/decore-left.png"
                                    class="congratulations-img-left" alt="card-img-left" />
                                <img src="../../../app-assets/images/elements/decore-right.png"
                                    class="congratulations-img-right" alt="card-img-right" />
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <i data-feather="award" class="font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Congratulations John,</h1>
                                    <p class="card-text m-auto w-75">
                                        You have done <strong>57.6%</strong> more sales today. Check your new badge in your
                                        profile.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Congratulations Card --> --}}

                    <div class="col-12 col-md-6 col-lg-3">
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <!-- Select2 Start  -->
                        <section class="basic-select2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Silahkan Pilih Mahasiswa Untuk User ini</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <form action="/admin/user-mahasiswa" method="POST">
                                                    @csrf
                                                    <!-- Basic -->
                                                    <div class="col-md-12 mb-1">
                                                        <label class="form-label" for="select2-basic">Pilih Dosen</label>
                                                        <select class="select2 form-select" id="select2-basic"
                                                            name="mahasiswa_id" required>
                                                            {{-- <option label=''></option> --}}
                                                            @foreach ($dosens as $dosen)
                                                                <option value="{{ $dosen->id }}">
                                                                    {{ $dosen->kds }} - ({{ $dosen->nama }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-secondary">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Select2 End -->
                    </div>
                </div>

                <!--/ Card Advance -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

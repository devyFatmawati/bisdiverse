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
                        <div class="col-lg-12 col-12">
                            <div>
                                <video autoplay="true" id="video-webcam">
                                    Browser tidak mendukung
                                </video>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

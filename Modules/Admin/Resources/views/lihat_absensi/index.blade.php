@extends('admin::layouts.main')

@section('content')
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Lihat Absensi</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Absensi</a>
                    </li>
                    <li class="breadcrumb-item - active">Lihat Absensi
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <table class="datatables-basic table">
          <thead>
            <tr>
              <th style="text-align: center">No</th>
              <th style="text-align: center">No RFID</th>
              <th style="text-align: center">Nama</th>
              <th style="text-align: center">NPM</th>
              <th style="text-align: center">Kelas</th>
              <th style="text-align: center">Matkul</th>
              {{-- <th>Dosen Penguji</th> --}}
              <th style="text-align: center">Jam Absensi</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($presensis as $presensi)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td style="text-align: center">{{ $presensi->no_rfid }}</td>
                    <td>{{ $presensi->nama }}</td>
                    <td style="text-align: center">{{ $presensi->npm }}</td>
                    <td style="text-align: center">{{ $presensi->kelas }}</td>
                    <td style="text-align: center">{{ $presensi->matkul->nama }}</td>
                    {{-- <td>{{ $presensi->dosen->nama }}</td> --}}
                    <td style="text-align: center">{{ $presensi->created_at->format('H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!--/ Basic table -->

        </div>
      </div>
    </div>
@endsection


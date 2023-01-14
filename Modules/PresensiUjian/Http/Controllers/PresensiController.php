<?php

namespace Modules\PresensiUjian\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Imports\PresensiImport;
use Modules\Admin\Entities\Rfid;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Presensi;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Admin\Entities\JadwalUjian;
use Illuminate\Contracts\Support\Renderable;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $jadwal = 0;
        $mahasiswa = 0;
        if (request('no_rfid')) {
            $rfid = request('no_rfid');
            $cekrfid = Mahasiswa::select()->where('no_rfid', $rfid)->orWhere('no_rfid_cadangan', $rfid)->get();
            $mahasiswa = $cekrfid->first();
            if ($cekrfid->count() > 0) {
//                 $cekpresensi = Presensi::select()->where('nama', $mahasiswa->nama)->where('npm', $mahasiswa->npm)->get();
                $date_now = Carbon::now()->format('Y-m-d');
                $jam_now = Carbon::now()->format('H:i:s');
                $jam_now_string = Carbon::now()->toDateTimeString();
                $jadwal_ujian = JadwalUjian::select()->wheredate('tgl_ujian', $date_now)->wheretime('jam_mulai_ujian', '<=', $jam_now)->wheretime('jam_berakhir_ujian', '>=', $jam_now)->where('kelas', $mahasiswa->kelas.' '.$mahasiswa->tahun_masuk)->get();
                if ($jadwal_ujian) {
                    if ($jadwal_ujian->first()) {
                        $masuk = $jadwal_ujian->first()->jam_mulai_ujian;
                        if ($masuk) {
                            $waktu_sekarang = strtotime($jam_now);
                            $waktu_masuk = strtotime($masuk);
                            $waktu_berakhir = strtotime($jadwal_ujian->first()->jam_berakhir_ujian);
                            if ($waktu_sekarang >= $waktu_masuk && $waktu_sekarang <= $waktu_berakhir) {
                                $cekpresensi = Presensi::select()->where('nama', $mahasiswa->nama)->where('npm', $mahasiswa->npm)->where('matkul_id', $jadwal_ujian->first()->matkul_id)->get();
                                if ($cekpresensi->count() == 0) {
                                    // $mahasiswa = Mahasiswa::select()->where('id', $mahasiswa->mahasiswa_id)->get()->first();
                                    // return $mahasiswa;
                                    $data = Presensi::create([
                                        'nama' => $mahasiswa->nama,
                                        'npm' => $mahasiswa->npm,
                                        'kelas' => $mahasiswa->kelas,
                                        'kelas_ujian' => $mahasiswa->kelas_ujian,
                                        'matkul_kode' => $jadwal_ujian->first()->matkul_kode,
                                        'no_rfid' => $rfid,
                                        'jenis_ujian' => $jadwal_ujian->first()->jenis_ujian
                                    ]);
                                    if ($data) {
                                        $response = 'succes';
                                        $title = 'Anda Masuk Tepat Waktu';
                                        $jadwal = $jadwal_ujian->first();
                                        $mahasiswa = $mahasiswa;
                                    } else {
                                        $response = 'error';
                                        $title = 'Maaf Ya Server Nya Lagi Down';
                                    }
                                } else {
                                    $response = 'error';
                                    $title = 'Anda Sudah Absensi';
                                }
                            } else {
                                $response = 'error';
                                $title = 'Waktu Ujian Sudah Terlewat Anda Tidak Bisa Absen';
                            }
                        } else {
                            $response = 'error';
                            $title = 'Terjadi Masalah Pada Data Anda';
                        }
                    } else {
                        $response = 'error';
                        $title = 'Anda Tidak Memiliki Ujian Di jam Ini';
                    }
                } else {
                    $response = 'error';
                    $title = 'Anda Tidak Memiliki Jadwal Ujian Saat Ini';
                }
            } else {
                $response = 'error';
                $title = 'Kartu Anda Belum Terdaftar';
            }
        } else {
            $response = ' ';
            $title = 'Silahkan Tempelkan Kartu Anda Pada Alat Yang Disediakan';
        }
        // if (Request('no_rfid')) {
        //     $rfid = request('no_rfid');
        //     $cekrfid = Rfid::select()->where('no_rfid', $rfid)->where('mahasiswa_id', '!=', ' ')->get();
        //     $mahasiswa = Rfid::select()->where('no_rfid', $rfid)->get()->first();
        //     $cekpresensi = Presensi::select()->where('no_rfid', $rfid)->get();
        //     if ($cekrfid->count() > 0) {
        //         $date_now = Carbon::now()->format('Y-m-d');
        //         $jam_now = Carbon::now()->format('H:i:s');
        //         $jam_now_string = Carbon::now()->toDateTimeString();
        //         $jadwal_ujian = JadwalUjian::select()->wheredate('tgl_ujian', $date_now)->wheretime('jam_mulai_ujian', '<=', $jam_now)->wheretime('jam_berakhir_ujian', '>=', $jam_now)->where('kelas_id', $mahasiswa->mahasiswa->kelas_id)->get();
        //         if ($jadwal_ujian) {
        //             if ($jadwal_ujian->first()) {
        //                 $masuk = $jadwal_ujian->first()->jam_mulai_ujian;
        //                 if ($masuk) {
        //                     $waktu_sekarang = strtotime($jam_now);
        //                     $waktu_masuk = strtotime($masuk);
        //                     $waktu_berakhir = strtotime($jadwal_ujian->first()->jam_berakhir_ujian);
        //                     if ($waktu_sekarang >= $waktu_masuk && $waktu_sekarang <= $waktu_berakhir) {
        //                         $cekpresensi = Presensi::select()->where('no_rfid', $rfid)->where('matkul_id', $jadwal_ujian->first()->matkul_id)->get();
        //                         if ($cekpresensi->count() == 0) {
        //                             $mahasiswa = Mahasiswa::select()->where('id', $mahasiswa->mahasiswa_id)->get()->first();
        //                             $data = Presensi::create([
        //                                 'nama' => $mahasiswa->nama,
        //                                 'npm' => $mahasiswa->npm,
        //                                 'kelas_id' => $mahasiswa->kelas_id,
        //                                 'matkul_id' => $jadwal_ujian->first()->matkul_id,
        //                                 'no_rfid' => $rfid,
        //                                 'jenis_ujian' => $jadwal_ujian->first()->jenis_ujian
        //                             ]);
        //                             if ($data) {
        //                                 $response = 'succes';
        //                                 $title = 'Anda Masuk Tepat Waktu';
        //                                 $jadwal = $jadwal_ujian->first();
        //                             } else {
        //                                 $response = 'error';
        //                                 $title = 'Maaf Ya Server Nya Lagi Down';
        //                             }
        //                         } else {
        //                             $response = 'error';
        //                             $title = 'Anda Sudah Absensi';
        //                         }
        //                     } else {
        //                         $response = 'error';
        //                         $title = 'Waktu Ujian Sudah Terlewat Anda Tidak Bisa Absen';
        //                     }
        //                 } else {
        //                     $response = 'error';
        //                     $title = 'Terjadi Masalah Pada Data Anda';
        //                 }
        //             } else {
        //                 $response = 'error';
        //                 $title = 'Anda Tidak Memiliki Ujian Di jam Ini';
        //             }
        //         } else {
        //             $response = 'error';
        //             $title = 'Anda Tidak Memiliki Jadwal Ujian Saat Ini';
        //         }
        //     } else {
        //         $response = 'error';
        //         $title = 'Kartu Anda Belum Terdaftar';
        //     }
        // } else {
        //     $response = ' ';
        //     $title = 'Silahkan Tempelkan Kartu Anda Pada Alat Yang Disediakan';
        // }
        return view('presensiujian::index', [
            'response' => $response,
            'title' => $title,
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('presensiujian::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Excel::import(new PresensiImport, request()->file('presensi'));
        return redirect()->back()->with('success', 'Data Presensi berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('presensiujian::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('presensiujian::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

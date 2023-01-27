<?php

namespace Modules\Judulskripsi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Judulskripsi\Entities\HistoryPengajuanJudul;
use Modules\Judulskripsi\Entities\JudulSkripsi;

class VerifikasiPengajuanJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
    return view('admin::pengajuan_judulskripsi.index', [
        'mahasiswas' => JudulSkripsi::select()->whereIn('status', ['Diajukan Mahasiswa', 'Ditinjau TU'])->get(),
    ]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('judulskripsi::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        $id = $request->judul_skripsi_id;
        JudulSkripsi::where('id', $id)->update([
            'status' => $request->status.' '.'TU',
        ]);

        HistoryPengajuanJudul::create([
            'judul_skripsi_id' => $id,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'catatan' => $request->catatan,
        ]);
        return redirect('/judulskripsi/pengajuan')->with('success', 'Pengajuan Judul Skripsi Telah ' . $request->status);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       $judul = JudulSkripsi::where('id', $id)->get()->first();
        $mahasiswa = Mahasiswa::select()->where('npm',$judul->mahasiswa_npm)->get()->first();

        JudulSkripsi::where('id', $id)->update([
            'status' => 'Ditinjau TU',
        ]);

        $cekhistory = HistoryPengajuanJudul::select()->where('judul_skripsi_id', $id)->where('status', 'Ditinjau')->where('Jabatan', 'TU')->get();
        if ($cekhistory->count() == 0) {
            HistoryPengajuanJudul::create([
                'judul' => $id,
                'status' => 'Ditinjau',
                'jabatan' => 'TU',
            ]);
        }
        return view('admin::pengajuan_judulskripsi.lihat', [
            'judul' =>$judul,
            'mahasiswa' => $mahasiswa,
            'historys' => HistoryPengajuanJudul::select()->where('judul_skripsi_id',$judul->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('judulskripsi::edit');
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

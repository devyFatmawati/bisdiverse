<?php

namespace Modules\Judulskripsi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Judulskripsi\Entities\HistoryPengajuanJudul;
use Modules\Judulskripsi\Entities\JudulSkripsi;
use Modules\Magang\Entities\DosenPembimbingMagang;

class JudulskripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $mahasiswa=Mahasiswa::where('id',$user_id)->get()->first();
        $judul= JudulSkripsi::select()->where('mahasiswa_npm', $mahasiswa->npm)->latest()->first();
        if($judul==null){
            $history=null;
        }else{
        $history= HistoryPengajuanJudul::select()->where('judul_skripsi_id', $judul->id)->get();
        }
        // return $judul;
        return view('mahasiswa::judulskripsi.index',[
            'judul'=>$judul,
            'dosenpembimbings'=>DosenPembimbingMagang::all(),
            'mahasiswa'=>$mahasiswa,
            'historys'=>$history,
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
        // dd($request);
        // return $request->file('surat_permohonan');
        $hitung = JudulSkripsi::select()->orderBy('id', 'desc')->get()->first();
        if(isset($hitung)){
            $id = $hitung->id + 1;
        }else{
            $id=1;
        }


        JudulSkripsi::create([
            'id'=>$id,
            'kds_dosen'=>$request->kds_dosen,
            'anggota_dosen'=>$request->anggota_dosen,
            'mahasiswa_npm'=>$request->mahasiswa_npm,
            'judul_penelitian'=>$request->judul_penelitian,
            'konsentrasi'=>$request->konsentrasi,
            'status'=>'Diajukan Mahasiswa',
        ]);

        HistoryPengajuanJudul::create([
            'judul_skripsi_id'=>$id,
            'status'=>'Diajukan',
            'jabatan'=>'Mahasiswa',
            'catatan'=>$request->catatan,
        ]);

        return redirect('/judulskripsi')->with('success', 'Pengajuan Judul Skripsi Anda Sedang Diproses');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('judulskripsi::show');
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

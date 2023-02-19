<?php

namespace Modules\Judulskripsi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Judulskripsi\Entities\HistoryPengajuanJudul;
use Modules\Judulskripsi\Entities\JudulSkripsi;

class DosenBimbinganMahasiswaSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $dosen=Dosen::where('user_id',$user_id)->get()->first();
        $bimbingan = DB::table('judul_skripsis')->select()->whereIn('status', ['Disetujui Kaprodi'])
        ->where('judul_skripsis.kds_dosen' ,'=', $dosen->kds)
        ->Orwhere('judul_skripsis.anggota_dosen' ,'=', $dosen->kds)
        ->get();
        // return $bimbingan;
        // $history= HistoryPengajuanJudul::select()->where('judul_skripsi_id', $bimbingan->id)->get();
        
        return view('dosen::bimbingan_skripsi.index',[
            'bimbingans'=>$bimbingan,
            // 'historys'=>$history,
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
        //
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

 
         return view('dosen::bimbingan_skripsi.lihat', [
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

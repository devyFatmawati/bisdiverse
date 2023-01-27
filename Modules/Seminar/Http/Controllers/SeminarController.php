<?php

namespace Modules\Seminar\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Judulskripsi\Entities\HistoryPengajuanJudul;
use Modules\Judulskripsi\Entities\JudulSkripsi;
use Modules\Magang\Entities\DosenPembimbingMagang;
use Modules\Seminar\Entities\HistoryPengajuanSeminar;
use Modules\Seminar\Entities\Seminar;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $mahasiswa=Mahasiswa::where('id',$user_id)->get()->first();
        $judul= JudulSkripsi::select()->where('mahasiswa_npm', $mahasiswa->npm)->whereIn('status', ['Disetujui Kaprodi'])->latest()->first();
        $seminar= Seminar::select()->where('mahasiswa_npm', $mahasiswa->npm)->latest()->first();
        if($seminar==null){
            $history=null;
        }else{
        $history= HistoryPengajuanSeminar::select()->where('seminar_id', $seminar->id)->get();
        }
        // return $seminar;
        return view('mahasiswa::seminar.index',[
            'seminar'=>$seminar,
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
        $hitung = Seminar::select()->orderBy('id', 'desc')->get()->first();
        if(isset($hitung)){
            $id = $hitung->id + 1;
        }else{
            $id=1;
        }

        if ($request->file('proposal')) {
            $proposal = $request->file('proposal')->store('surat-permohonan-seminar');
        }
        if ($request->file('ppt')) {
            $ppt = $request->file('ppt')->store('surat-permohonan-seminar');
        }
        if ($request->file('transkip')) {
            $transkip = $request->file('transkip')->store('surat-permohonan-seminar');
        }
        if ($request->file('peec')) {
            $peec = $request->file('peec')->store('surat-permohonan-seminar');
        }
        if ($request->file('skpi')) {
            $skpi = $request->file('skpi')->store('surat-permohonan-seminar');
        }
        if ($request->file('spp')) {
            $spp = $request->file('spp')->store('surat-permohonan-seminar');
        }
        if ($request->file('sks')) {
            $sks = $request->file('sks')->store('surat-permohonan-seminar');
        }

        Seminar::create([
            'id'=>$id,
            'kds_dosen'=>$request->kds_dosen,
            'anggota_dosen'=>$request->anggota_dosen,
            'mahasiswa_npm'=>$request->mahasiswa_npm,
            'judul_penelitian'=>$request->judul_penelitian,
            'konsentrasi'=>$request->konsentrasi,
            'proposal'=>$proposal,
            'ppt'=>$ppt,
            'transkip'=>$transkip,
            'peec'=>$peec,
            'skpi'=>$skpi,
            'spp'=>$spp,
            'sks'=>$sks,
            'judul_skripsi_id'=>$request->judul_skripsi_id,
            'status'=>'Diajukan Mahasiswa',
        ]);

        HistoryPengajuanSeminar::create([
            'seminar_id'=>$id,
            'status'=>'Diajukan',
            'jabatan'=>'Mahasiswa',
            'catatan'=>$request->catatan,
        ]);

        return redirect('/seminar')->with('success', 'Pengajuan Seminar Anda Sedang Diproses');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('seminar::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('seminar::edit');
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
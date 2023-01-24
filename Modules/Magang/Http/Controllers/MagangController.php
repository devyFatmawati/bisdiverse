<?php

namespace Modules\Magang\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Mahasiswa;
use Illuminate\Contracts\Support\Renderable;
use Modules\Magang\Entities\DosenPembimbingMagang;
use Modules\Magang\Entities\HistoryPengajuanMagang;
use Modules\Magang\Entities\Magang;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $mahasiswa=Mahasiswa::where('id',$user_id)->get()->first();
        $magang= Magang::select()->where('mahasiswa_npm', $mahasiswa->npm)->latest()->first();
        if($magang==null){
            $history=null;
        }else{
        $history= HistoryPengajuanMagang::select()->where('magang_id', $magang->id)->get();
        }
        return view('mahasiswa::magang.index',[
            'magang'=>$magang,
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
        return view('mahasiswa::magang.pengajuan_magang',[

        ]);
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
        $hitung = Magang::select()->orderBy('id', 'desc')->get()->first();
        if(isset($hitung)){
            $id = $hitung->id + 1;
        }else{
            $id=1;
        }

        if ($request->file('surat_permohonan')) {
            $surat_permohonan = $request->file('surat_permohonan')->store('surat-permohonan-magang');
        }

        Magang::create([
            'id'=>$id,
            'dosen_kds'=>$request->dosen_kds,
            'mahasiswa_npm'=>$request->mahasiswa_npm,
            'instansi'=>$request->instansi,
            'departemen'=>$request->departemen,
            'posisi'=>$request->posisi,
            'no_telp'=>$request->no_telp,
            'alamat_instansi'=>$request->alamat_instansi,
            'surat_permohonan'=>$surat_permohonan,
            'status'=>'Diajukan Mahasiswa',
        ]);

        HistoryPengajuanMagang::create([
            'magang_id'=>$id,
            'status'=>'Diajukan',
            'jabatan'=>'Mahasiswa',
            'catatan'=>$request->catatan,
        ]);

        return redirect('/magang')->with('success', 'Pengajuan Magang Anda Sedang Diproses');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('magang::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('magang::edit');
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

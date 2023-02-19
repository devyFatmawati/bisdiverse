<?php

namespace Modules\Judulskripsi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Dosen;
use Modules\Judulskripsi\Entities\DosenPembimbingSkripsi;
use Modules\Judulskripsi\Entities\JudulSkripsi;

class PembimbingSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::pembimbing_skripsi.index',[
            'dosens'=>DosenPembimbingSkripsi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::pembimbing_skripsi.tambah',[
            'dosens'=>Dosen::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        DB::table('dosen_pembimbing_skripsis')->truncate();
        foreach ($request->pembimbing as $key => $value) {
            if (isset($value['jadikan_pembimbing'])){
                DosenPembimbingSkripsi::create([
                    'dosen_kds' => $value['dosen_kds'],
                    'batas_mahasiswa' => $value['batas_mahasiswa'],
                ]);
            }
        }
        return redirect('/judulskripsi/pembimbing')->with('success', 'Data Dosen Pembimbing Berhasil Ditambahkan');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // return $mahasiswas ;
        return view('admin::pembimbing_skripsi.lihat',[
            'mahasiswas'=>JudulSkripsi::where('kds_dosen',$id)->orWhere('anggota_dosen',$id)->get(),
            'dosen'=>Dosen::where('kds',$id)->get()->first(),
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

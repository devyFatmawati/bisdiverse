<?php

namespace Modules\Magang\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Dosen;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Modules\Magang\Entities\DosenPembimbingMagang;
use Modules\Magang\Entities\Magang;

class PembimbingMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::pembimbing_magang.index',[
            'dosens'=>DosenPembimbingMagang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::pembimbing_magang.tambah',[
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
        DB::table('dosen_pembimbing_magangs')->truncate();
        foreach ($request->pembimbing as $key => $value) {
            if (isset($value['jadikan_pembimbing'])){
                DosenPembimbingMagang::create([
                    'dosen_kds' => $value['dosen_kds'],
                    'batas_mahasiswa' => $value['batas_mahasiswa'],
                ]);
            }
        }
        return redirect()->back()->with('success', 'Data Dosen Pembimbing Berhasil Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // return $id;
        return view('admin::pembimbing_magang.lihat',[
            'dosen'=>Dosen::where('kds',$id)->get()->first(),
            'mahasiswas'=>Magang::where('dosen_kds',$id)->get(),
        ]);
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

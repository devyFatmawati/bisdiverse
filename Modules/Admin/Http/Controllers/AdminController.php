<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Kelas;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Matkul;
use Modules\Admin\Entities\Ruangan;
use Modules\Admin\Entities\JadwalUjian;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::dashboard',[
            'jadwals' => JadwalUjian::all(),
            'matkuls' => Matkul::all(),
            'dosens' => Dosen::all(),
            'ruangans' => Ruangan::all(),
            'kelass' => Kelas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'matkul_kode' => 'required',
            'tgl_ujian' => 'required',
            'jenis_ujian' => 'required',
            'jam_mulai_ujian' => 'required',
            'jam_berakhir_ujian' => 'required',
            'kelas' => 'required',
            'dosen_kds' => 'required',
            'ruangan' => 'required',
        ]);

        $input = $request->all();

        JadwalUjian::create($input);
        return redirect()->back()->with('success', 'Data Jadwal Ujian Berhasil Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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

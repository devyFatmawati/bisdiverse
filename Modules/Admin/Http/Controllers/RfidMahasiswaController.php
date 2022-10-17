<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Rfid;
use Modules\Admin\Entities\Kelas;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Mahasiswa;
use Illuminate\Contracts\Support\Renderable;

class RfidMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::rfid.index', [
            'rfids' => Rfid::select()->where('mahasiswa_id','!='," ")->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::rfid.tambah', [
            'kartus' => Rfid::select()->where('mahasiswa_id'," ")->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_rfid' => 'required|unique:Rfids',
        ]);

        $input = $request->all();

        Rfid::create($input);
        return redirect('/admin/rfid/create');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::rfid.daftar', [
            'kelass' => Kelas::all(),
            'mahasiswas' => Mahasiswa::all(),
            'no_rfid' => Rfid::select()->where('id', $id)->get()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'mahasiswa_id' => 'required',
        ];

        $input = $request->validate($rules);

        Rfid::where('id', $id)
            ->update($input);
        return redirect('/admin/rfid/create')->with('success', 'Data RFID Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Rfid::destroy('id', $id);
        return redirect('/admin/rfid')->with('success', 'Data berhasil di Hapus');
    }
}

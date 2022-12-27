<?php

namespace Modules\Mahasiswa\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Mahasiswa;
use Illuminate\Contracts\Support\Renderable;

class ProfileMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('mahasiswa::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('mahasiswa::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('mahasiswa::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('mahasiswa::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $rules = [
            'nama' => 'required',
            'npm' => 'required',
            'konsentrasi' => 'nullable',
            'ipk' => 'nullable',
            'no_ktp' => 'nullable',
            'alamat' => 'nullable',
            'provinsi' => 'nullable',
            'kabkota' => 'nullable',
            'kecamatan' => 'nullable',
            'desa' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'kode_pos' => 'nullable',
            'no_telp' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tgl_lahir' => 'nullable',
            'ibu_kandung' => 'nullable',
            'nama_ot' => 'nullable',
            'hubungan_ot' => 'nullable',
            'no_telp_ot' => 'nullable',
            'asal_sekolah' => 'nullable',
        ];

        $input = $request->validate($rules);

        Mahasiswa::where('id', $id)
        ->update($input);

        User::where('id', $request->user_id)
        ->update([
            'name'=>$request->nama,
        ]);

        return redirect('/profile')->with('success', 'Data Profile Kamu Berhasil Diubah');
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

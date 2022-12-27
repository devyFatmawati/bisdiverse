<?php

namespace Modules\Magang\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Magang\Entities\Magang;
use Modules\Admin\Entities\Mahasiswa;
use Illuminate\Contracts\Support\Renderable;

class PrintSuratRekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('magang::create');
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
        $magang = Magang::where('id', $id)->get()->first();
        $mahasiswa = Mahasiswa::select()->where('npm', $magang->mahasiswa_npm)->get()->first();

        // Magang::where('id', $id)->update([
        //     'status' => 'Ditinjau TU',
        // ]);

        // $cekhistory = HistoryPengajuanMagang::select()->where('magang_id', $id)->where('status', 'Ditinjau')->where('Jabatan', 'TU')->get();
        // if ($cekhistory->count() == 0) {
        //     HistoryPengajuanMagang::create([
        //         'magang_id' => $id,
        //         'status' => 'Ditinjau',
        //         'jabatan' => 'TU',
        //     ]);
        // }
        return view('magang::print_surat_rekomendasi', [
            'magang' => $magang,
            'mahasiswa' => $mahasiswa,
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

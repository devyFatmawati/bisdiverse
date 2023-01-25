<?php

namespace Modules\Seminar\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Seminar\Entities\HistoryPengajuanSeminar;
use Modules\Seminar\Entities\Seminar;

class VerifikasiPengajuanSeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::pengajuan_seminar.index', [
            'mahasiswas' => Seminar::select()->whereIn('status', ['Diajukan Mahasiswa', 'Ditinjau TU'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('seminar::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        $id = $request->seminar_id;
        Seminar::where('id', $id)->update([
            'status' => $request->status.' '.'TU',
        ]);

        HistoryPengajuanSeminar::create([
            'Seminar_id' => $id,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'catatan' => $request->catatan,
        ]);
        return redirect('/seminar/pengajuan')->with('success', 'Pengajuan Seminar Telah ' . $request->status);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $seminar = Seminar::where('id', $id)->get()->first();
        $mahasiswa = Mahasiswa::select()->where('npm', $seminar->mahasiswa_npm)->get()->first();

        seminar::where('id', $id)->update([
            'status' => 'Ditinjau TU',
        ]);

        $cekhistory = HistoryPengajuanSeminar::select()->where('seminar_id', $id)->where('status', 'Ditinjau')->where('Jabatan', 'TU')->get();
        if ($cekhistory->count() == 0) {
            HistoryPengajuanSeminar::create([
                'seminar_id' => $id,
                'status' => 'Ditinjau',
                'jabatan' => 'TU',
            ]);
        }
        return view('admin::pengajuan_seminar.lihat', [
            'seminar' => $seminar,
            'mahasiswa' => $mahasiswa,
            'historys' => HistoryPengajuanSeminar::select()->where('seminar_id', $seminar->id)->get(),
        ]);
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

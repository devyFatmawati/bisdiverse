<?php

namespace Modules\Seminar\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Seminar\Entities\HistoryPengajuanSeminar;
use Modules\Seminar\Entities\Seminar;

class SetujuiPengajuanSeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('kaprodi::seminar.pengajuan', [
            'mahasiswas' => Seminar::select()->whereIn('status', ['Diverifikasi TU', 'Ditinjau Kaprodi'])->get(),
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
        $id = $request->seminar_id;
        Seminar::where('id', $id)->update([
            'status' => $request->status . ' ' . 'Kaprodi',
        ]);

        HistoryPengajuanSeminar::create([
            'seminar_id' => $id,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'catatan' => $request->catatan,
        ]);
        return redirect('/seminar/pengajuan-seminar')->with('success', 'Pengajuan seminar Telah ' . $request->status);
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

        $cekstatus = Seminar::select()->where('id', $id)->where('status', 'Disetujui Kaprodi')->get();
        if (isset($cekstatus)) {
        } else {
            Seminar::where('id', $id)->update([
                'status' => 'Ditinjau Kaprodi',
            ]);
        }

        $cekhistory = HistoryPengajuanSeminar::select()->where('seminar_id', $id)->where('status', 'Ditinjau')->where('Jabatan', 'Kaprodi')->get();
        if ($cekhistory->count() == 0) {
            HistoryPengajuanSeminar::create([
                'seminar_id' => $id,
                'status' => 'Ditinjau',
                'jabatan' => 'Kaprodi',
            ]);
        }
        return view('kaprodi::seminar.lihat', [
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

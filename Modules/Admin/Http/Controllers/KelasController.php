<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Kelas;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::kelas.index', [
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
        // return $request;
        $request->validate([
            'kelas' => 'required',
            'tahun' => 'required',
        ]);

        $input = $request->all();

        Kelas::create($input);
        return redirect('/admin/kelas')->with('success', 'Berhasil Data Kelas Berhasil Di input');
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
        return view('admin::kelas.edit', [
            'kelas' => Kelas::select()->where('id', $id)->get()->first(),
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
            'kelas' => 'required',
            'tahun' => 'required',
        ];

        $input = $request->validate($rules);

        Kelas::where('id', $id)
            ->update($input);
        return redirect('/admin/kelas')->with('success', 'Data Kelas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Kelas::destroy('id', $id);
        return redirect('/admin/kelas')->with('success', 'Data berhasil di Hapus');
    }
}

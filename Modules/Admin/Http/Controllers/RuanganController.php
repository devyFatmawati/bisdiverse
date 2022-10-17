<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Ruangan;
use Illuminate\Contracts\Support\Renderable;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::ruangan.index', [
            'ruangans' => Ruangan::all(),
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
            'ruangan' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
        ]);

        $input = $request->all();

        Ruangan::create($input);
        return redirect('/admin/ruangan')->with('success', 'Data Ruangan Berhasil Ditambahkan');
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
        return view('admin::ruangan.edit', [
            'ruangan' => Ruangan::select()->where('id', $id)->get()->first(),
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
            'ruangan' => 'required',
            'gedung' => 'required',
            'lantai' => 'required',
        ];

        $input = $request->validate($rules);

        Ruangan::where('id', $id)
            ->update($input);
        return redirect('/admin/ruangan')->with('success', 'Data Ruangan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Ruangan::destroy('id', $id);
        return redirect('/admin/ruangan')->with('success', 'Data berhasil di Hapus');
    }
}

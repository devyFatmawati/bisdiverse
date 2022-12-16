<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MatkulImport;
use Modules\Admin\Entities\Dosen;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Matkul;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Support\Renderable;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::matkul.index', [
            'matkuls' => Matkul::all(),
            'dosens' => Dosen::all(),
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
        if ($request->matkul) {
            Excel::import(new MatkulImport, request()->file('matkul'));
            return redirect()->back()->with('success', 'Data Matkul Berhasil Ditambahkan');
        } else {
            $request->validate([
                'semester' => 'required',
                'kode' => 'required',
                'nama' => 'required',
                'sks' => 'required',
                'dosen_kds' => 'required',
            ]);

            $input = $request->all();

            Matkul::create($input);
            return redirect()->back()->with('success', 'Data Matkul Berhasil Ditambahkan');
        }
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
        return view('admin::matkul.edit', [
            'matkul' => Matkul::select()->where('id', $id)->get()->first(),
            'dosens' => Dosen::all(),
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
            'semester' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required',
            'dosen_kds' => 'required',
        ];

        $input = $request->validate($rules);

        Matkul::where('id', $id)
            ->update($input);
        return redirect('/admin/matkul')->with('success', 'Data Mata Kuliah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Matkul::destroy('id', $id);
        return redirect('/admin/matkul')->with('success', 'Data berhasil di Hapus');
    }
}

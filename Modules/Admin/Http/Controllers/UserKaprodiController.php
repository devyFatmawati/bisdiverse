<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Dosen;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class UserKaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user_id = request('user');
        return view('admin::user.kaprodi', [
            'user' => User::select()->where('id', $user_id)->get()->first(),
            'dosens' => Dosen::select()->where('user_id', null)->get(),
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
        $rules = [
            'user_id' => 'required',
        ];

        $input = $request->validate($rules);
        $nama=Dosen::select()->where('id',$request->dosen_id)->get()->first();
        Dosen::where('id', $request->dosen_id)
        ->update($input);
        Role::create([
            'user_id' => $request->user_id,
            'role_id' => 1,
            'jabatan_id' => 1,
        ]);
        return redirect('/admin/user-mahasiswa')->with('success', $nama->nama.' '.'Sekarang Menjadi Kaprodi');
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

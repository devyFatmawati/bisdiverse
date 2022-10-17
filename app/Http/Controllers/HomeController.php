<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()){
            $role=Role::select()->where('user_id',Auth::user()->id)->get()->first();
        }else{
            $role=false;
        }

        $url='/';

        if ($role){
            if ($role->jabatan_id==0) {
                    $url='/admin';
            }
            elseif ($role->jabatan_id==1) {
                    $url='/mahasiswa';
            }
            elseif ($role->jabatan_id==2) {
                    $url='/umkm';
            }
            elseif ($role->jabatan_id==3) {
                    $url='/ppr';
            }
            elseif ($role->jabatan_id==4) {
                    $url='/staff';
            }
            else{
                $url='/';
            }
        }
        else{
            return view('index');
        }
        return Redirect($url);
    }
}

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
        if (Auth::user()) {
            $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();
        } else {
            $role = false;
        }

        $url = '/';

        if ($role) {
            if ($role->jabatan_id == 0) {
                $url = '/admin';
            } elseif ($role->jabatan_id == 1) {
                $url = '/kaprodi';
            } elseif ($role->jabatan_id == 2) {
                $url = '/dosen';
            } elseif ($role->jabatan_id == 3) {
                $url = '/mahasiswa';
            } else {
                $url = '/';
            }
        } else {
            return view('index');
        }
        return Redirect($url);
    }
}

<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\adminModels;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthentikasiContoller extends Controller
{
    public function index()
    {
        return view('admin/auth/login');
    }

    public function loginPost(Request $Req)
    {
        $username = $Req->username;
        $pass     = $Req->pass;

        $data = AdminModels::where('admin_username', '=', $username)->first();


        if ($data == true) {
            if (Hash::check($pass, $data->admin_password)) {
                // Auth::login($data);
                // Auth::attempt(['email' => $username, 'password' => $pass]);
                session(['admin' => $data]);
                return redirect()->route('Home')->with('berhasil', 'Selamat Datang ');
            } else {
                return back()->with('gagal', 'Password Salah');
            }
        } else {
            return back()->with('invalid', 'Username Dan Password Salah');
        }
    }

    public function logout(Request $req)
    {
        // Auth::logout();
        $req->session()->forget('admin');
        return redirect()->route('login-admin')->with('logout', 'Berhasil logout');
    }
}

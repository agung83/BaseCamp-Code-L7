<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//memanggil model
use App\adminModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {

        $dataAdmin = adminModels::all();
        $title = 'Admin';
        return view('admin/page/fileAdmin/view', compact('title', 'dataAdmin'));
    }

    public function datatable()
    {
    }

    public function formSave()
    {
        $title = 'Form Tambah Data';
        return view('admin/page/fileAdmin/formSave', compact('title'));
    }

    public function formEdit($idedit)
    {

        $id = Crypt::decrypt($idedit);
        $title = 'FormEdit';
        $dataEdit = adminModels::where('id', '=', $id)->first();

        return view('admin/page/fileAdmin/formEdit', compact('dataEdit', 'title'));
    }

    public function actionUpdate(Request $req)
    {
        $fotolama = $req->fotolama;
        $foto = $req->file('foto');
        if (empty($foto)) {
            adminModels::where('id', '=', $req->id)->update([
                'admin_nama' => $req->nama,
                'admin_username' => $req->admin_username,
                'admin_password' => Hash::make($req->pass),
                'admin_password_repeat' => Hash::make($req->pass)
            ]);

            return redirect()->route('viewAdmin')->with(['update' => 'Berhasil Di Update']);
        } else {
            File::delete('assets_admin/images/fotoadmin/' . $fotolama);
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $foto->move('assets_admin/images/fotoadmin/', $nama_foto);

            adminModels::where('id', '=', $req->id)->update([
                'admin_nama' => $req->nama,
                'admin_username' => $req->admin_username,
                'admin_password' => Hash::make($req->pass),
                'admin_password_repeat' => Hash::make($req->pass),
                'admin_foto'   => $nama_foto
            ]);

            return redirect()->route('viewAdmin')->with(['update' => 'Berhasil Di Update']);
        }
    }

    public function actionSave(Request $req)
    {
        $this->validate($req, [
            'nama' => ['required', 'max:25', 'string'],
            'admin_username' => ['required', 'max:25', 'string', 'unique:tb_admin'],
            'pass' => ['required', 'max:25', 'string'],
            'foto' => 'image|max:1024|mimes:png,jpg,jpeg,bmp',
        ]);

        $foto = $req->file('foto');
        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        $foto->move('assets_admin/images/fotoadmin/', $nama_foto);
        // dd($tes);
        // exit;



        adminModels::create([
            'admin_nama' => $req->nama,
            'admin_username' => $req->admin_username,
            'admin_password' => Hash::make($req->pass),
            'admin_password_repeat' => Hash::make($req->pass),
            'admin_foto' => $nama_foto
        ]);

        return redirect()->route('viewAdmin')->with(['save' => 'Berhasil Di Tambahkan']);
    }

    public function actionDelete($iddelete)
    {
        $id = Crypt::decrypt($iddelete);

        $gambar = adminModels::where('id', '=', $id)->first();
        File::delete('assets_admin/images/fotoadmin/' . $gambar->admin_foto);

        adminModels::where('id', '=', $id)->delete();

        return redirect()->route('viewAdmin')->with(['delete' => 'Berhasil Dihapus']);
    }
}

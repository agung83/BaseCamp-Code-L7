<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//memanggil model
use App\Http\Requests\admin\KategoriRequest;
use Illuminate\Support\Str;
use App\kategoriModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $dataKategori = DB::table('tbl_kategori')->get();

        // $dataKategori = kategoriModel::all();
        $title = 'Kategori';
        return view('admin/page/fileKategori/view', compact('title', 'dataKategori'));
    }

    public function formAddkategori()
    {
        $title = "Tambah Data Kategori";
        return view('admin/page/fileKategori/formSave', compact('title'));
    }

    public function saveKategori(KategoriRequest $req)
    {

        //validasi ada di htto request kategoriRequest

        $kat = $req->kat;
        $slug = Str::slug($kat);
        DB::table('tbl_kategori')->insert([
            'slug' => $slug,
            'kategori_nama' => $kat
        ]);

        return redirect()->route('viewKategori')->with(['save' => 'Data Berhasil Di Tambahkan']);
    }

    public function formUpdate($slug)
    {
        // $id =  Crypt::decrypt($idupdate);
        //validasi ada di htto request kategoriRequest
        $title = 'Form Update';
        $dataKategori = DB::table('tbl_kategori')->where('slug', $slug)->first();

        return view('admin/page/fileKategori/formUpdate', compact('dataKategori', 'title'));
    }

    public function actionUpdate(kategoriRequest $req)
    {
        $id   = $req->idkategori;
        $kategori_nama = $req->kat;

        DB::table('tbl_kategori')
            ->where('id', $id)
            ->update([
                'kategori_nama' => $kategori_nama
            ]);

        return redirect()->route('viewKategori')->with(['update' => 'berhasil di update bro']);
    }

    public function actionDelete($idhapus)
    {
        $id = Crypt::decrypt($idhapus);
        kategoriModel::where('id', '=', $id)->delete();

        return redirect()->route('viewKategori')->with(['hapus' => 'Data Berhasil Di Hapus']);
    }
}

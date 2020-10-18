<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Requests\admin\BeritaRequest;
use App\Http\Controllers\Controller;
use App\beritaModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class BeritaController extends Controller
{
    public function index()
    {
        $datakategori = DB::table('tbl_kategori')->get();

        // $databerita = beritaModels::join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_berita.kategori_id')->select('tbl_berita.*', 'tbl_kategori.kategori_nama')->get();

        $title = "Berita";
        return view('admin/page/fileBerita/view', ['title' => $title, 'datakategori' => $datakategori]);
    }

    public function saveBerita(BeritaRequest $req)
    {
        //validasi di folder use App\Http\Requests\admin\BeritaRequest;

        $file = $req->file('foto');
        $nama_foto = time() . "_" . $file->getClientOriginalName();
        $file->move('assets_admin/images/foto_berita/', $nama_foto);

        $save =  beritaModels::create([
            'kategori_id'   => $req->kategori,
            'berita_judul'  => $req->judul,
            'berita_tgl'    => $req->tgl,
            'berita_isi'    => $req->isi,
            'berita_foto'   => $nama_foto
        ]);

        if ($save == true) {
            return back()->with('save', 'Berhasil Di Simpan');
        } else {

            return back()->with('error', 'Gagal| Error');
        }
    }


    public function updateBerita(BeritaRequest $req)
    {
        //validasi di folder use App\Http\Requests\admin\BeritaRequest;

        $file = $req->file('foto');

        if (!empty($file)) {
            File::delete('assets_admin/images/foto_berita/' . $req->fotolama);
            $nama_foto = time() . "_" . $file->getClientOriginalName();
            $file->move('assets_admin/images/foto_berita', $nama_foto);

            beritaModels::where('id', '=', $req->id)->update([
                'kategori_id' => $req->kategori,
                'berita_judul' => $req->judul,
                'berita_tgl'   => $req->tgl,
                'berita_isi'   => $req->isi,
                'berita_foto'  => $nama_foto
            ]);

            return back()->with(['update' => 'Data Berhasil Di Update | 1']);
        } else {
            beritaModels::where('id', '=', $req->id)->update([
                'kategori_id' => $req->kategori,
                'berita_judul' => $req->judul,
                'berita_tgl'   => $req->tgl,
                'berita_isi'   => $req->isi,
            ]);

            return back()->with(['update' => 'Data Berhasil Di Update | 2']);
        }
    }

    public function actionDelete(Request $req)
    {
        $gambar = beritaModels::where('id', '=', $req->idhapus)->first();
        File::delete('assets_admin/images/foto_berita/' . $gambar->berita_foto);
        beritaModels::where('id', '=', $req->idhapus)->delete();

        session()->flash('delete', 'berhasil di hapus');

        return back();
    }
}

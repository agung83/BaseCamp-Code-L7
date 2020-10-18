<?php

namespace App\Http\Controllers\Api;

use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\beritaModels;
use Illuminate\Support\Facades\DB;

class LearnController extends Controller
{
    public function apiLearnDataTables()
    {
        $databerita = beritaModels::join('tbl_kategori', 'tbl_kategori.id', '=', 'tbl_berita.kategori_id')->select('tbl_berita.*', 'tbl_kategori.kategori_nama')->get();

        return DataTables()->of($databerita)->toJson();

        // $learn = beritaModels::all();

        // $data = array();
        // $data['success'] = true;
        // $data['alert'] = 'list semua data learn';
        // $data['data']    = $learn;

        // return response()->json($data, 200);
    }

    public function apiedit(Request $request)
    {
        $id = $request->idtampil;

        $dataupdate = DB::table('tbl_berita')->where('id', $id)->first();
        if ($dataupdate == true) {
            return response()->json([
                'success' => true,
                'alert'  => 'Data Ready',
                'data' => $dataupdate
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'alert'  => 'Data tidak ditemukan 404',
                'data' => $dataupdate
            ], 404);
        }
    }
}

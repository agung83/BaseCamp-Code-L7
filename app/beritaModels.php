<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beritaModels extends Model
{
    protected $table = "tbl_berita";

    protected $fillable = [
        "kategori_id", "berita_judul", "berita_tgl", "berita_isi", "berita_foto"
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategoriModel extends Model
{
    protected $table = 'tbl_kategori';

    protected $fillable = [
        "kategori_nama"
    ];
}

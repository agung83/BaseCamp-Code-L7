<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class adminModels extends Authenticatable
{

    use Notifiable;
    protected $table = "tb_admin";

    protected $fillable = [
        "admin_nama", "admin_username", "admin_password",
        "admin_password_repeat", "admin_foto"
    ];
}

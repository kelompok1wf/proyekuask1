<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemiliks';

    protected $primaryKey = 'id_pemilik';

    protected $fillable = [
        'nama_pemilik',
        'username',
        'password',
    ];
}
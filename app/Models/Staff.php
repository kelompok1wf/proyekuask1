<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $primaryKey = 'id_staff';

    protected $fillable = [
        'nama_staff',
        'role_staff',
        'kontak_staff',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}

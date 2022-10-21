<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $fillable = [
        'nama_don','email','alamat_don','pekerjaan','nohp_don','image','email',
    ];
}

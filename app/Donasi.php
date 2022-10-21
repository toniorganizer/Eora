<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $fillable = [
        'id_mhs','id_donatur','jumlah_donasi',
    ];
}

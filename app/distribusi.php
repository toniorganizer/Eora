<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class distribusi extends Model
{
    protected $fillable = [
        'email_mahasiswa','jumlah_donasi','jumlah_distribusi','waktu'
    ];
}

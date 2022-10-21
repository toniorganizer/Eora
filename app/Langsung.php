<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langsung extends Model
{
    protected $fillable = [
        'email_donatur','email_mahasiswa','jumlah_donasi','total','bukti'
    ];
}

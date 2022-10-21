<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'name','email','jurusan','image_mhs','role','nohp_mhs','alamat_mhs',
    ];
}

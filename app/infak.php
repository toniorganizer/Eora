<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class infak extends Model
{
    protected $fillable = [
        'email_donatur','besaran','jumlah_infak',
    ];
}

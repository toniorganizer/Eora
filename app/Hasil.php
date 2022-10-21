<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $fillable = [
        'id','id_adm','email_mhs','role','hasil',
    ];
}

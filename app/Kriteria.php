<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = [
        'email_mhs','id_adm','role','tanggungan','file_tanggungan','nilai','file_nilai','penghasilan','file_penghasilan','ukt','file_ukt','prestasi_akd','file_pekad','prestasi_nonakd','file_penon',
    ];

    protected $primaryKey = 'id_kriteria';
}

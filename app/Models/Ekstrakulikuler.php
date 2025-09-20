<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    //
    protected $table = 'ekstrakulikuler';
    protected $primaryKey = 'id_ekskul';
    // public $incrementing = true;
    // protected $keyType = 'int';

    protected $fillable = [
        'nama_ekskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}

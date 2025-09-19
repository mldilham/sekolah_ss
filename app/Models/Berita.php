<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    // public $incrementing = true;
    // protected $keyType = 'int';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'id_user',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $guarded = [];
    protected $fillable = ['nama_guru','nip','mapel','foto'];
}

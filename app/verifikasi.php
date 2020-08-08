<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verifikasi extends Model
{
    protected $table = 'verifikasi';
    protected $fillable = ['nomor', 'ditujukan', 'tanggal', 'perihal', 'pemeriksa', 'asal', 'isi', 'status'];
}

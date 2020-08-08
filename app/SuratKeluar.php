<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';
    protected $fillable = ['nomor', 'ditujukan', 'tanggal', 'perihal', 'asal', 'isi', 'pemeriksa'];
}

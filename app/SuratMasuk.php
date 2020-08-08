<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';
    protected $fillable = ['nomor', 'asal', 'tanggal', 'ditujukan', 'perihal', 'lampiran'];
}

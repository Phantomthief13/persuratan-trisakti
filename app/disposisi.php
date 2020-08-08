<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class disposisi extends Model
{
    protected $table = 'disposisi';
    protected $fillable = ['nomor', 'asal', 'tanggal', 'ditujukan', 'perihal', 'lampiran', 'status', 'disposisi', 'isi'];
}

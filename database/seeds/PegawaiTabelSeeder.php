<?php

use Illuminate\Database\Seeder;
use App\Pegawai;

class PegawaiTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            "NIP" => "198005051996021002",
            "nama" => "Yulia Latifa",
            "alamat" => "Jakarta Selatan",
            "jabatan" => "Admin Persuratan",
            "tanggal" => "1980-05-05",
            "password" => bcrypt("secret")
        ]);
    }
}
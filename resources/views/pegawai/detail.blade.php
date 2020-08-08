@extends('layouts.main')

@section('tittle')
    DETAIL PEGAWAI
@endsection

@section('content')
<div class="container mt-5">
<div class="card">
  <div class="card-header">
    Detail Pegawai
  </div>
  <div class="card-body">
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nip" value="{{$pegawai->NIP}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nama" value="{{$pegawai->nama}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="tanggal" value="{{$pegawai->tanggal}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="jabatan" value="{{$pegawai->jabatan}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Hak Akses</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="privilege" value="{{$pegawai->privilege}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="alamat" value="{{$pegawai->alamat}}">
        </div>
    </div>
    
    <a href="/pegawai" class="btn btn-dark">Kembali</a>
</div>
</div>
@endsection
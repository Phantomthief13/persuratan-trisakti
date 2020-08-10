@extends('layouts.main')

@section('tittle')
    Edit Pegawai
@endsection

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    FORM EDIT PEGAWAI
  </div>
  <div class="card-body">
  <form method="post" action="/pegawai/update/{{$pegawai->id}}">
  {{ csrf_field() }}
  <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="nip" value="{{$pegawai->NIP}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="nama" value="{{$pegawai->nama}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
        <input type="Date" class="form-control" id="inputPassword" name="tanggal" value="{{$pegawai->tanggal}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="jabatan" value="{{$pegawai->jabatan}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="privilege" class="col-sm-2 col-form-label">Hak Akses</label>
        <div class="col-sm-10">
        <select name="privilege" id="privilege" class="form-control">
            <option value="{{$pegawai->privilege}}">{{$pegawai->privilege}}</option>
            <option value="Admin Persuratan">Admin Persuratan</option>
            <option value="Pimpinan">Pimpinan</option>
            <option value="Pegawai">Pegawai</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="alamat" value="{{$pegawai->privilege}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword" name="password" value="{{$pegawai->password}}">
        </div>
    </div>
    <button class="btn btn-primary" type="submit"> Simpan</button>
    <a href="/pegawai" class="btn btn-dark">Kembali</a>
    </form>
</div>
</div>
@endsection
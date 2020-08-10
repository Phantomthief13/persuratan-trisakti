@extends("layouts.main")

@section('tittle')
    Form Tambah Pegawai
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">FORM TAMBAH PEGAWAI</h2>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/pegawai/store" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="nip">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="nama">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
        <input type="Date" class="form-control" id="inputPassword" name="tanggal">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="jabatan">
        </div>
    </div>
    <div class="form-group row">
        <label for="privilege" class="col-sm-2 col-form-label">Hak Akses</label>
        <div class="col-sm-10">
        <select name="privilege" id="privilege" class="form-control">
            <option value="Admin Persuratan">Admin Persuratan</option>
            <option value="Pimpinan">Pimpinan</option>
            <option value="Pegawai">Pegawai</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="alamat">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
    </div>
        <button class="btn btn-primary" type="submit"> Simpan</button>
        <a href="/pegawai" class="btn btn-dark">Kembali</a>
    </form>
  </div>
</div>

</div>
@endsection
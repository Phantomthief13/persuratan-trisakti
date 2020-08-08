@extends("layouts.main")

@section('tittle')
    Form Tambah Surat
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">FORM TAMBAH SURAT</h2>
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
    <form action="/surat_masuk/store" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nomor">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="asal">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Diterima</label>
        <div class="col-sm-10">
        <input type="Date" class="form-control" name="tanggal">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Ditujukan</label>
        <div class="col-sm-10">
        <select name="ditujukan" id="" class="form-control">
            @foreach($pegawai as $p)
            <option value="{{$p->jabatan}}">{{$p->jabatan}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="perihal">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Lampiran</label>
        <div class="col-sm-10">
        <input type="file" class="form-control-file " name="file">
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="/surat_masuk" class="btn btn-dark">Kembali</a>
    </div>
        </form>
  </div>
</div>

</div>
@endsection
@extends("layouts.main")

@section('tittle')
    Form Tambah Surat
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">FORM EDIT SURAT MASUK</h2>
    <form method="post" action="/surat_masuk/update/{{$surat->id}}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$surat->nomor}}" name="nomor">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$surat->asal}}" name="asal">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Diterima</label>
        <div class="col-sm-10">
        <input type="Date" class="form-control" id="inputPassword" value="{{$surat->tanggal}}" name="tanggal">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Ditujukan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$surat->ditujukan}}" name="ditujukan">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$surat->perihal}}" name="perihal">
        </div>
    </div>
    <div class="form-group">
    <label for="exampleFormControlFile1">Lampiran</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" value="{{$surat->lampiran}}" name="lampiran">
    </div>
        <button class="btn btn-primary" type="submit"> Simpan</button>
        <a href="/surat_masuk" class="btn btn-dark">Kembali</a>
    </form>
  </div>
</div>

</div>
@endsection
@extends("layouts.main")

@section('tittle')
    Form Edit Surat
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">FORM EDIT SURAT</h2>
    <form action="/surat_keluar/update/{{$keluar->id}}" method="post">
    {{csrf_field()}}
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="nomor" value="{{$keluar->nomor}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="ditujukan" value="{{$keluar->ditujukan}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
        <div class="col-sm-10">
        <input type="Date" class="form-control" id="inputPassword" name="tanggal" value="{{$keluar->tanggal}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="asal" value="{{$keluar->asal}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="perihal" value="{{$keluar->perihal}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="" cols="30" rows="10" name="isi" value="{{$keluar->isi}}">{{$keluar->isi}}</textarea>
        </div>
    </div>
    @if($keluar->status == 'Tolak')
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <input type="text" name="status" value="{{$verifikasi->status}}" readonly > 
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Catatan</label>
        <div class="col-sm-10">
            <textarea name="catatan" id="" class="form-control" cols="30" rows="10" readonly>{{$verifikasi->catatan}}</textarea>
        </div>
    </div>
    @else
    @endif
        <button class="btn btn-primary" type="submit"> Simpan</button>
        <a href="/surat_keluar" class="btn btn-dark">Kembali</a>
    </form>
  </div>
</div>

</div>
@endsection
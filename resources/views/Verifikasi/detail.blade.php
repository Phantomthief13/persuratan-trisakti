@extends("layouts.main")

@section('tittle')
    Detail Verifkiasi
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">DETAIL VERIFIKASI</h2>
    
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$verifikasi->nomor}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$verifikasi->asal}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$verifikasi->tanggal}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Ditujukan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$verifikasi->ditujukan}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" value="{{$verifikasi->perihal}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" id="" class="form-control" cols="30" rows="10" readonly>{{$verifikasi->isi}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$verifikasi->status}}" readonly>  
    </div>
    </div>
    <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Catatan</label>
    <div class="col-sm-10">
        <textarea name="catatan" id="" class="form-control" cols="30"  readonly rows="10">{{$verifikasi->catatan}}</textarea>
    </div>
    </div>
    <div class="form-group mx-auto">
        <a href="/verifikasi" class="btn btn-dark">Kembali</a>
    </div>
  </div>
</div>

</div>
@endsection
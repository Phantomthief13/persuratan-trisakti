@extends("layouts.main")

@section('tittle')
    Form Detail Surat Keluar
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">DETAIL SURAT</h2>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" readonly id="inputPassword" name="nomor" value="{{$keluar->nomor}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" readonly id="inputPassword" name="ditujukan" value="{{$keluar->ditujukan}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
        <div class="col-sm-10">
        <input type="Date" class="form-control" readonly id="inputPassword" name="tanggal" value="{{$keluar->tanggal}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" readonly id="inputPassword" name="asal" value="{{$keluar->asal}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" readonly id="inputPassword" name="perihal" value="{{$keluar->perihal}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="" cols="30" readonly rows="10" name="isi" value="{{$keluar->isi}}">{{$keluar->isi}}</textarea>
        </div>
    </div>
    @if($keluar->status == 'Tolak')
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <input type="text" name="status" readonly value="{{$verifikasi->status}}" readonly > 
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Catatan</label>
        <div class="col-sm-10">
            <textarea name="catatan" id="" readonly class="form-control" cols="30" rows="10" readonly>{{$verifikasi->catatan}}</textarea>
        </div>
    </div>
    @else
    @endif
  </div>
</div>

</div>
@endsection
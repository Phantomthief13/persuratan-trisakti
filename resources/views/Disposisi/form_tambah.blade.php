@extends('layouts.main')

@section('tittle')
    BUAT DISPOSISI
@endsection

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    FORM DISPOSISI
  </div>
  <div class="card-body">
  <form method="post" action="/disposisi/store/{{$disposisi->id}}">
  {{ csrf_field() }}
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$disposisi->nomor}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$disposisi->asal}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Diterima</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$disposisi->tanggal}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Ditujukan</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$disposisi->ditujukan}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <a href="{{ route('disdownload', $disposisi->id) }}" class="btn btn-success">Download</a>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Penerima</label>
        <div class="col-sm-10">
        <select name="penerima" id="" class="form-control">
            @foreach($pegawai as $p)
            <option value="{{$p->jabatan}}">{{$p->jabatan}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">isi</label>
        <div class="col-sm-10">
        <input type="text" class="form-control plain-text" name="isi">
        </div>
    </div>
    @if(Session::get('privilege') == 'Pegawai')
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
        <input type="checkbox" name="status" value="Selesai">Selesai</input>
        <input type="checkbox" name="status" value="Belum Selesai">Belum Selesai</input>
        </div>
    </div>
    @endif
    <button class="btn btn-primary" type="submit"> Simpan</button>
    <a href="/disposisi" class="btn btn-dark">Kembali</a>
    </form>
</div>
</div>
@endsection
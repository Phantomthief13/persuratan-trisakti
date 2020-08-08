@extends('layouts.main')

@section('tittle')
    DETAIL SURAT MASUK
@endsection

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    Detail Surat
  </div>
  <div class="card-body">
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$surat->nomor}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$surat->asal}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Diterima</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$surat->tanggal}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Ditujukan</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$surat->ditujukan}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control plain-text" name="nomor" value="{{$surat->perihal}}">
        </div>
    </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Lampiran</label>
        <div class="col-sm-10">
        <a href="{{ route('download', $surat->id) }}" class="btn btn-success">Download</a>
        </div>
    </div>
        <a href="/surat_masuk" class="btn btn-dark">Kembali</a>
</div>
</div>
@endsection
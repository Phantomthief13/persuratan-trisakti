@extends("layouts.main")

@section('tittle')
    Form Buat Surat
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">FORM BUAT SURAT</h2>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/surat_keluar/store" method="post">
    {{csrf_field()}}
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="nomor">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tujuan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="ditujukan">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Surat</label>
        <div class="col-sm-10">
        <input type="Date" class="form-control" id="inputPassword" name="tanggal">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="asal">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" name="perihal">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pemeriksa</label>
        <div class="col-sm-10">
        <select name="pemeriksa" id="" class="form-control">
            @foreach($pegawai as $p)
            <option value="{{$p->jabatan}}">{{$p->jabatan}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
        <textarea class="form-control" id="" cols="30" rows="10" name="isi"></textarea>
        </div>
    </div>
        <button class="btn btn-primary" type="submit"> Simpan</button>
        <a href="/surat_keluar" class="btn btn-dark">Kembali</a>
    </form>
  </div>
</div>

</div>
@endsection
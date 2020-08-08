@extends("layouts.main")

@section('tittle')
    Form Disposisi
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-body">
    <h2 class="card-title text-center">FORM EDIT DISPOSISI</h2>
    <form method="post" action="/disposisi/update/{{$disposisi->id}}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$disposisi->nomor}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Asal Surat</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$disposisi->asal}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Diterima</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$disposisi->tanggal}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Ditujukan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$disposisi->ditujukan}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Perihal</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword" value="{{$disposisi->perihal}}" readonly>
        </div>
    </div>
    <div class="form-group row">
    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Lampiran</label>
    <div class="col-sm-2">
    <a href="{{ route('disdownload', $disposisi->id) }}" class="btn btn-success">download</a>
    </div>
    </div>
    @if(Session::get('privilege') == 'Pimpinan')
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Penerima</label>
        <div class="col-sm-10">
        <select name="penerima" id="" class="form-control" value="">
        <option value="{{$disposisi->Penerima}}">{{$disposisi->Penerima}}</option>
            @foreach($pegawai as $p)
            <option value="{{$p->jabatan}}">{{$p->jabatan}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Isi Disposisi</label>
        <div class="col-sm-10">
        <textarea name="isi" class="form-control" id="" cols="30" rows="10">
{{$disposisi->isi}}
        </textarea>
        </div>
    </div>
    @else
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Penerima</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="penerima"id="inputPassword" value="{{$disposisi->Penerima}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Isi Disposisi</label>
        <div class="col-sm-10">
        <textarea name="isi" class="form-control" id="" cols="30" rows="10" readonly>
{{$disposisi->isi}}
        </textarea>
        </div>
    </div>
    @endif
    </div>
    @if(Session::get('privilege') == 'Pimpinan')
    @else
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
        <input type="checkbox" name="status" value="Selesai">Selesai</input>
        <input type="checkbox" name="status" value="Belum Selesai">Belum Selesai</input>
        </div>
    </div>
    @endif
    <div class="form-group mx-auto">
        <button class="btn btn-primary" type="submit"> Simpan</button>
        <a href="/disposisi" class="btn btn-dark">Kembali</a>
    </div>
    </form>
  </div>
</div>

</div>
@endsection
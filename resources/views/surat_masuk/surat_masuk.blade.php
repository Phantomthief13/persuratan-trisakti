@extends("layouts.main")

@section('tittle')
    Surat Masuk
@endsection

@section('content')
<div class="container-lg mt-5 mx-auto">
<div class="card w-auto">
  <div class="card-header">
  <div class="row">
    <div class="col-md-11">
    <a href="/main" class="btn btn-dark">Kembali</a>
    <a href="/surat_masuk/tambah" class="btn btn-primary">&#43; Tambah Surat</a>
    </div>
    <div class="col-md-1">
    <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Info</a>
    </div>
    </div> 
  </div>
  <div class="card-body">
    <h2 class="card-title text-center">SURAT MASUK</h2>
    <table class="table table-hover">
  <thead class="thead-light">
      <div class="row flex-row-reverse mb-2">
      <form action="/surat_masuk/cari" method="get">
      <div class="col-md-3">
      <input class="form-control" type="search" name="cari" value="{{ old('cari') }}" placeholder="Search" aria-label="Search">
      </div>
      <div class="col-md-1">
      <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
      </form>
      </div>
    <tr>
      <th scope="col">Nomor Agenda</th>
      <th scope="col">Asal Surat</th>
      <th scope="col">Nomor Surat</th>
      <th scope="col">Perihal</th>
      <th scope="col">Ditujukan</th>
      <th scope="col">Opsi</th>
      <th scope="col">Detail</th>
      <th scope="col">Kirim Disposisi</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($surat as $s)
    <tr>
      <td>{{$s->id}}</td>
      <td>{{$s->asal}}</td>
      <td>{{$s->nomor}}</td>
      <td>{{$s->perihal}}</td>
      <td>{{$s->ditujukan}}</td>
      <td>
      @if($s->status == "")
        <a href="/surat_masuk/edit/{{$s->id}}" class="badge badge-success">Edit</a>
      @else
      <a class="badge badge-success">Edit</a>
      @endif
        <a href="/surat_masuk/delete/{{$s->id}}" class="badge badge-danger">Hapus</a>
      </td>
      <td>
        <a class="badge badge-light" href="/surat_masuk/detail/{{$s->id}}">
        <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
        </a>
      </td>
      <td>
      @if($s->status == "")
        <a href="/surat_masuk/kirim/{{$s->id}}" class="badge badge-light">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-forward" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M9.502 5.513a.144.144 0 0 0-.202.134V6.65a.5.5 0 0 1-.5.5H2.5v2.9h6.3a.5.5 0 0 1 .5.5v1.003c0 .108.11.176.202.134l3.984-2.933a.51.51 0 0 1 .042-.028.147.147 0 0 0 0-.252.51.51 0 0 1-.042-.028L9.502 5.513zM8.3 5.647a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.503H2a.5.5 0 0 1-.5-.5v-3.9a.5.5 0 0 1 .5-.5h6.3v-.503z"/>
        </svg>
        </a>
      @else
      <a class="badge badge-light">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-forward" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M9.502 5.513a.144.144 0 0 0-.202.134V6.65a.5.5 0 0 1-.5.5H2.5v2.9h6.3a.5.5 0 0 1 .5.5v1.003c0 .108.11.176.202.134l3.984-2.933a.51.51 0 0 1 .042-.028.147.147 0 0 0 0-.252.51.51 0 0 1-.042-.028L9.502 5.513zM8.3 5.647a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.503H2a.5.5 0 0 1-.5-.5v-3.9a.5.5 0 0 1 .5-.5h6.3v-.503z"/>
        </svg>
        </a>
      @endif
      </td>
      <td>
          @if($s->status == "")
          <span class="badge badge-light">Belum Dikirim</span>
          @else
          <span class="badge badge-success">Terkirim</span>
          @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info Surat Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <li>Untuk memasukan data surat masuk, Anda dapat menekan tombol +Tambah Surat yang terdapat di sebelah kiri layar</li>
        <li>Pastikan data surat masuk telah terisi dengan benar sebelum menekan tombol simpan</li>
        <li>Data surat masuk dapat dilakukan edit dan hapus sesuai dengan kebutuhan</li> 
        <li>Anda dapat mengirim data surat masuk untuk didisposisikan dengan menekan tombol kirim</li>
        <li>Anda dapat melihat data surat masuk yang telah diinput dengan menekan tombol detail</li>
        <li>Anda dapat mencari data surat masuk berdasarkan Nomor Surat</li>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
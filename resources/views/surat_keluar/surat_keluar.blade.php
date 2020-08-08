@extends("layouts.main")

@section('tittle')
    Surat Keluar
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col-md-11">
    <a href="/" class="btn btn-dark">Kembali</a>
    <a href="/surat_keluar/tambah" class="btn btn-primary">&#43; Buat Surat</a>
    </div>
    <div class="col-md-1">
    <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Info</a>
    </div>
    </div> 
  </div>
  <div class="card-body">
    <h2 class="card-title text-center">SURAT KELUAR</h2>
    <table class="table table-hover">
  <thead class="thead-light">
  <form class="form-inline my-2 my-lg-0" action="/surat_keluar/cari" method="get">
      <div class="row flex-row-reverse mb-2">
      <div class="col-md-3">
      <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
      </div>
      <div class="col-md-1">
      <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
      </div>
    </form>
    <tr>
      <th scope="col">Nomor Surat</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Perihal</th>
      <th scope="col">Opsi</th>
      <th scope="col">Detail</th>
      <th scope="col">Kirim</th>
      <th scope="col">Status</th>
      <th scope="col">Cetak</th>
    </tr>
  </thead>
  <tbody>
  @foreach($keluar as $k)
    <tr>
      <td>{{$k->nomor}}</td>
      <td>{{$k->ditujukan}}</td>
      <td>{{$k->tanggal}}</td>
      <td>{{$k->perihal}}</td>
      <td>
        <a href="/surat_keluar/edit/{{$k->id}}" class="badge badge-success">Edit</a>
        <a href="/surat_keluar/delete/{{$k->id}}" class="badge badge-danger">Hapus</a>
      </td>
      <td>
        <a class="badge badge-light" href="/surak_keluar/detail/{{$k->id}}">
        <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
        </a>
      </td>
      <td>
        <a href="/surat_keluar/send/{{$k->id}}" class="badge badge-light">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-forward" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M9.502 5.513a.144.144 0 0 0-.202.134V6.65a.5.5 0 0 1-.5.5H2.5v2.9h6.3a.5.5 0 0 1 .5.5v1.003c0 .108.11.176.202.134l3.984-2.933a.51.51 0 0 1 .042-.028.147.147 0 0 0 0-.252.51.51 0 0 1-.042-.028L9.502 5.513zM8.3 5.647a1.144 1.144 0 0 1 1.767-.96l3.994 2.94a1.147 1.147 0 0 1 0 1.946l-3.994 2.94a1.144 1.144 0 0 1-1.767-.96v-.503H2a.5.5 0 0 1-.5-.5v-3.9a.5.5 0 0 1 .5-.5h6.3v-.503z"/>
        </svg>
        </a>  
      </td>
      @if($k->status == '')
      <td>
        <a href="/verifikasi/tambah" class="badge badge-light">Belum diperiksa</a>
      </td>
      @elseif($k->status == 'Tolak')
      <td>
        <a href="/verifikasi/tambah" class="badge badge-danger">Ditolak</a>
      </td>
      @else
      <td>
        <a href="/verifikasi/tambah" class="badge badge-success">Disetujui</a>
      </td>
      @endif
      <td>
        <form action="/Document/{{$k->id}}" method="POST">
          {{csrf_field()}}
          <button type="submit" class="badge badge-light">cetak</button>
        </form>
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
        <li>Untuk memasukan data surat masuk, dapat menekan tombol tambah surat yang ada di sebelah kiri atas layar</li>
        <li>Pastikan data surat benar sebelum mengirim surat</li>
        <li>Kirim surat untuk melanjutkan surat pada pejabat penerima surat</li>  
        <li></li>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
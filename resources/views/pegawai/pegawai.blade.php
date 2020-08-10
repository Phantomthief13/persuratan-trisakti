@extends("layouts.main")

@section('tittle')
    Pegawai
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col-md-11">
    <a href="/" class="btn btn-dark">Kembali</a>
    <a href="/pegawai/tambah" class="btn btn-primary">&#43; Tambah Pegawai</a>
    </div>
    <div class="col-md-1">
    <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Info</a>
    </div>
    </div> 
  </div>
  <div class="card-body">
    <h2 class="card-title text-center">PEGAWAI</h2>
    <table class="table table-hover">
  <thead class="thead-light">
  <form class="form-inline my-2 my-lg-0" action="/pegawai/cari" method="get">
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
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Opsi</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
  @foreach($pegawai as $p)
    <tr>
      <td>{{$p->NIP}}</td>
      <td>{{$p->nama}}</td>
      <td>{{$p->jabatan}}</td>
      <td>
        <a href="/pegawai/edit/{{$p->id}}" class="badge badge-success">Edit</a>
        <a href="/pegawai/delete/{{$p->id}}" class="badge badge-danger">Hapus</a>
      </td>
      <td>
        <a class="badge badge-light" href="/pegawai/detail/{{$p->id}}">
        <svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
        </a>
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
        <h5 class="modal-title" id="exampleModalLabel">Info Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <li>Untuk memasukan data pegawai, Anda dapat menekan tombol +Tambah Pegawai yang terdapat di sebelah kiri layar</li>
        <li>Pastikan data pegawai telah terisi dengan benar sebelum menekan tombol simpan</li>
        <li>Data pegawai dapat dilakukan edit dan hapus sesuai dengan kebutuhan</li>  
        <li>Anda dapat melihat data pegawai yang telah diinput dengan menekan tombol detail</li>
        <li>Anda dapat mencari data pegawai berdasarkan NIP</li>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
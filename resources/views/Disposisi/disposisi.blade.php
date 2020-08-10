@extends('layouts.main')

@section('tittle')
    Diposisi
@endsection

@section('content')
<div class="container mt-5 mx-auto">
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col-md-11">
    <a href="/" class="btn btn-dark">Kembali</a>
    </div>
    <div class="col-md-1">
    <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Info</a>
    </div>
    </div> 
  </div>
  <div class="card-body">
    <h2 class="card-title text-center">DISPOSISI</h2>
    <table class="table table-hover">
  <thead class="thead-light">
  <form class="form-inline my-2 my-lg-0" method="get" action="/disposisi/cari">
      <div class="row flex-row-reverse mb-2">
      <div class="col-md-3">
      <input class="form-control" type="search" placeholder="Search" name="cari" aria-label="Search">
      </div>
      <div class="col-md-1">
      <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
      </div>
    </form>
    <tr>
      <th scope="col">Nomor Surat</th>
      <th scope="col">Asal Surat</th>
      <th scope="col">Perihal</th>
      <th scope="col">Disposisi</th>
      <th scope="col">Opsi</th>
      <th scope="col">Status</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
  @foreach($disposisi as $d)
    <tr>
      <td>{{$d->nomor}}</td>
      <td>{{$d->asal}}</td>
      <td>{{$d->perihal}}</td>    
      @if($d->isi == '')
      <td>
        <a href="/disposisi/tambah/{{$d->id}}" class="badge badge-light">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        </svg>
        </a>
      </td>
      @else
      <td>
        <a class="badge badge-light" disabled>
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        </svg>
        </a>
      </td>
      @endif
      <td>
      @if(Session::get('privilege') == 'Admin Persuratan')
        <a href="/disposisi/delete/{{$d->id}}" class="badge badge-danger">Hapus</a>
        <a href="/disposisi/edit/{{$d->id}}" class="badge badge-warning">Edit</a>
      @else  
        <a href="/disposisi/edit/{{$d->id}}" class="badge badge-warning">Edit</a>
      @endif
      </td>
      @if($d->status == 'Selesai')
      <td>
        <a class="badge badge-success">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-all" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
        </svg>
        </a>
      </td>
      @else
      <td>
        <a class="badge badge-danger">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-all" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
        </svg>
        </a>
      </td>
      @endif
      <td>
        <a href="/disposisi/detail/{{$d->id}}" class="badge badge-light">
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
        <h5 class="modal-title" id="exampleModalLabel">Info Disposisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <li>Untuk memeriksa disposisi, Anda dapat menekan tombol + yang terdapat di kolom disposisi</li>
        <li>Pastikan data disposisi telah terisi dengan benar sebelum menekan tombol simpan</li>
        <li>Data disposisi dapat dilakukan edit dan hapus sesuai dengan kebutuhan</li> 
        <li>Anda dapat melihat status disposisi yang telah tersimpan pada kolom status</li>
        <li>Anda dapat melihat data disposisi yang telah diinput dengan menekan tombol detail</li>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
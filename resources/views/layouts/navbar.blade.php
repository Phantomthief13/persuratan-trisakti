<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand">
  <img src="/img/logo.png" width="80" height="30" class="d-inline-block align-top" alt="" loading="lazy">
  <b class='ml-2'>Aplikasi Persuratan</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/main">Home <span class="sr-only">(current)</span></a>
      </li>
      @if(Session::get('privilege') == 'Admin Persuratan')  
      <li class="nav-item">
        <a class="nav-link" href="/surat_masuk">Surat Masuk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/surat_keluar">Surat Keluar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pegawai">Pegawai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/disposisi">Disposisi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/chart">Laporan</a>
      </li>
      @elseif(Session::get('privilege') == 'Pimpinan')
      <li class="nav-item">
        <a class="nav-link" href="/disposisi">Disposisi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/verifikasi">Verifikasi</a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="/disposisi">Disposisi</a>
      </li>
      @endif
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="/logout" class="btn btn-outline-dark my-2 my-sm-0" type="submit">Logout</a>
    </form>
  </div>
</nav>
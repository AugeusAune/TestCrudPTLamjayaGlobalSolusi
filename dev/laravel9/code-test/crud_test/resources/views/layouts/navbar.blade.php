<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ $title === 'Pegawai' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title === 'Provinsi' ? 'active' : '' }}" href="{{ route('province') }}">Provinsi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title === 'Kecamatan' ? 'active' : '' }}" href="{{ route('district') }}">Kecamatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title === 'Kelurahan' ? 'active' : '' }}" href="{{ route('ward') }}">Kelurahan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
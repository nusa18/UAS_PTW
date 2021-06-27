<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="/">Toko Online</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <form action="/produk/cari" method="GET">
      <div class="input-group" style="width:500px; height: 30px;">
        <input type="text" name="cari" class="form-control rounded" placeholder="Search" aria-label="Search"
          aria-describedby="search-addon" value="{{ old('cari') }}" />
        <button type="submit" class="btn btn-outline-primary">search</button>
      </div>
    </form>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('produk') }}">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('kategori') }}">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('about') }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          @if (Auth::check())
          <div class="dropdown">
            <button class="btn btn-secondary  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="nav-link" href="{{ URL::to('admin') }}">Profile</a>
              <a class="nav-link" href="{{ URL::to('cart') }}">Keranjang</a>
              <a href="#" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Sign Out
                </p>
              </a>
            </div>
          @else
          <a class="nav-link" href="{{ URL::to('login') }}">Login</a>
          @endif
        </li>
      </ul>
    </div>
  </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
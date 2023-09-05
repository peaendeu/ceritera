<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Ceritera</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link {{ Request::is('terkini') ? 'active' : '' }}" href="/terkini">Terkini</a>
      </div>
      @auth
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="/dasbor"><i class="bi bi-list"></i> Dasbor</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/keluar" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      @else
        <div class="navbar-nav ms-auto">
          <a class="nav-link {{ Request::is('masuk') ? 'active' : '' }}" href="/masuk"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
        </div>
      @endauth
    </div>
  </div>
</nav>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <h6 class="nav-link mb-0">{{ auth()->user()->username }}</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('') ? 'active' : '' }}" aria-current="page" href="/">
          <span data-feather="layout"></span>
          Ceritera
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dasbor') ? 'active' : '' }}" aria-current="page" href="/dasbor">
          <span data-feather="home"></span>
          Dasbor
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dasbor/postingan*') ? 'active' : '' }}" href="/dasbor/postingan">
          <span data-feather="file-text"></span>
          Postingan
        </a>
      </li>
    </ul>
    @can('admin')
      <ul class="nav flex-column">
        <li class="nav-item">
          <h6 class="nav-link mb-0 mt-3">Administrator</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dasbor/kategori*') ? 'active' : '' }}" href="/dasbor/kategori">
            <span data-feather="grid"></span>
            Kategori
          </a>
        </li>
      </ul>
    @endcan
  </div>
</nav>
 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active': '' }}" aria-current="page" href="{{ url('dashboard') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        {{-- tanda * itu ambil semua yang ada setelah tanda blogs --}}
        <a class="nav-link {{ Request::is('dashboard/blogs*') ? 'active' : '' }}" href="{{ url('dashboard/blogs') }}">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Blog
        </a>

      </li>

    </ul>

    {{-- ini pakai gate --}}
    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>

    <ul class="nav flex-column">
      <li class="nav-item">   
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="{{ url('dashboard/categories') }}">
          <span data-feather="grid" class="align-text-bottom"></span>
          Blog Categories
        </a>
      </li>

    </ul>
    @endcan
  </div>
</nav>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        
        <li class="nav-item">
          <a class="nav-link" href="/">
            <span data-feather="home"></span>
            Home
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="user"></span>
            My Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file"></span>
            My Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/guides*') ? 'active' : '' }}" href="/dashboard/guides">
            <span data-feather="coffee"></span>
            My Guides
          </a>
        </li>
        
        <li>
          <hr>
          <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
              @csrf
              <button class="nav-link px-3 border-0" type="submit" style="border: 0; background-color: rgba(0,0,0,0)"> <span data-feather="log-out"> </span> Log-Out
              </button>
          </form>
        </li>
        
      </ul>
      {{-- @can('admin')
      <h6>
        <span class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">ADMINISTRATOR</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="settings"></span>
            Post Categories
          </a>
        </li>
      </ul>
      @endcan --}}
    </div>
  </nav>

  
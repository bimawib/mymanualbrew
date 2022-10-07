<header class="navbar navbar-dark sticky-top nav-color flex-md-nowrap p-0 shadow" >
    <span class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Dashboard</span>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      
      </div>
    </div>
  </header>

  {{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
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
      @can('admin')
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
      @endcan
    </div>
  </nav> --}}


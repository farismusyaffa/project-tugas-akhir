<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">PEMB-P | Admin</a> 
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        {{-- <a class="nav-link px-3" href="#">Log out</a> --}}
        <form action="/keluar" method="post">
            @csrf
            <button type="submit" class="dropdown-item nav-link px-3">Keluar</button>
        </form>
      </div>
    </div>
  </header>
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Dashboard")? 'active' : '' }}" aria-current="page" href="/dashboard">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Klien")? 'active' : '' }}" href="/klien">
                <span data-feather="users"></span>
                Klien
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Fasilitator")? 'active' : '' }}" href="/fasilitator">
                <span data-feather="users"></span>
                Fasilitator
              </a>
            </li>
          </ul>
        </div>
      </nav>
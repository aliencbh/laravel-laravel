<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/sales">Sales</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('sales') ? 'active' : '' }}" aria-current="page" href="/sales">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('sales/create') ? 'active' : '' }}" href="/sales/create">Create</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
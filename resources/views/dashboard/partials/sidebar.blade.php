<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''  }}" href="/dashboard">
          <i class="bi bi-house-gear-fill fst-normal fs-6"> Dashboard</i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <i class="bi bi-file-earmark-text-fill fst-normal fs-6"> My Posts</i>
        </a>
      </li>
    </ul>
  </div>
</nav>
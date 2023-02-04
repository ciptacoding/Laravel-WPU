    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand pe-lg-4" href="/">TECHNOLOGY NEWS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item px-lg-4">
              <a class="nav-link {{ ($active === 'home') ? 'active' : '' }} fs-5"  href="/">Home</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link {{ ($active === 'about') ? 'active' : '' }} fs-5" href="/about">About</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link {{ ($active === 'posts') ? 'active' : '' }} fs-5" href="/posts">Posts</a>
            </li>
            <li class="nav-item ps-lg-4">
              <a class="nav-link {{ ($active === 'category') ? 'active' : '' }} fs-5" href="/categories">Categories</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ ($active === 'login' || $active === 'register') ? 'active' : '' }}  fs-5" href="/login"><i class="bi bi-box-arrow-right"></i> Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <nav class="{{ ($active === 'login' || $active === 'register') ? 'd-none' : '' }} navbar navbar-expand-lg navbar-dark" style="background-color: #ffffff">
      <div class="container d-flex">
         <h2 class="text-center flex-fill">{{ $headTitle }}</h2>
      </div>
    </nav>


    
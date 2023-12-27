<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="akun" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
</svg>
<header class="navbar sticky-top bg-light flex-md-nowrap p-0" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
    <img src="/images/LOGO.png" alt="logo" width="180" height="40">
  </a>

  <ul class="navbar-nav ms-auto">
    <li class="nav-item">
      <a class="text-decoration-none right d-flex align-items-center gap-2" href="#"><svg class="bi"><use xlink:href="#akun"/></svg>{{ auth()->user()->nama }}</a>
    </li>
  </ul>

    
  </header>
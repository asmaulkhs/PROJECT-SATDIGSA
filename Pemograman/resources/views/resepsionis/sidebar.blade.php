<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar border border-right vh-100 collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('resepsionis-dashboard') ? 'active' : ''}}" aria-current="page" href="/resepsionis-dashboard">
                <svg class="bi"><use xlink:href="#home"/></svg>
                Dashboard
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('jadwal') ? 'active' : ''}}" href="/jadwal">
                  <svg class="bi"><use xlink:href="#calendar3"/></svg>
                  Jadwal
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/tamu">
                  <svg class="bi"><use xlink:href="#tamu"/></svg>
                  Kehadiran
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('report') ? 'active' : ''}}" href="/report">
                  <svg class="bi"><use xlink:href="#report"/></svg>
                  Laporan
                </a>
              </li>
          </ul>
          <hr class="my-3">

        <ul class="nav flex-column mb-auto">
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('resepsionis-bantuan') ? 'active' : ''}}" href="/resepsionis-bantuan">
              <svg class="bi"><use xlink:href="#help"/></svg>
              Bantuan
              </a>
          </li>
            <li class="nav-item">
              <a href="#" class="nav-link d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#logoutmodal">
                <svg class="bi"><use xlink:href="#logout"/></svg>Keluar</a>
            </li>
            </ul>
    </div>
</nav>
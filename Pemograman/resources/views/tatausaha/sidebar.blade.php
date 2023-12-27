<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar border border-right vh-100 collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('TU-dashboard') ? 'active' : ''}}" aria-current="page" href="/TU-dashboard">
                <svg class="bi"><use xlink:href="#home"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('arsip') ? 'active' : ''}} {{ Request::is('arsip/*') ? 'active' : ''}}" href="/arsip">
                <svg class="bi"><use xlink:href="#arsip"/></svg>
                Arsip Surat
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('input') ? 'active' : ''}}" href="/input">
                <svg class="bi"><use xlink:href="#input"/></svg>
                Tambahkan Surat
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('pengajuan') ? 'active' : ''}} {{ Request::is('pengajuan/*') ? 'active' : ''}}" href="/pengajuan">
                <svg class="bi"><use xlink:href="#pengajuan"/></svg>
                Pengajuan
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('jadwal') ? 'active' : ''}}" href="/jadwal">
                  <svg class="bi"><use xlink:href="#calendar3"/></svg>
                  Jadwal
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
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('TU-bantuan') ? 'active' : ''}}" href="/TU-bantuan">
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
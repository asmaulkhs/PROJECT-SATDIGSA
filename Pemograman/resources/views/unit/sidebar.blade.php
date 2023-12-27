<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar border border-right vh-100 collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('unit-dashboard') ? 'active' : ''}}" aria-current="page" href="/unit-dashboard">
                <svg class="bi"><use xlink:href="#home"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('inbox') ? 'active' : ''}} {{ Request::is('inbox/*') ? 'active' : ''}}" href="/inbox">
                <svg class="bi"><use xlink:href="#inbox"/></svg>
                Surat Masuk    
                @if($suratCount > 0)
                <span class="badge text-bg-secondary bg-danger">
                  {{ $suratCount }}
                </span>
                @endif
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('inbox-diterima') ? 'active' : ''}} {{ Request::is('inbox-diterima/*') ? 'active' : ''}}" href="/inbox-diterima">
                <svg class="bi"><use xlink:href="#setuju"/></svg>
                Disetujui
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('inbox-ditolak') ? 'active' : ''}} {{ Request::is('inbox-ditolak/*') ? 'active' : ''}}" href="/inbox-ditolak">
                <svg class="bi"><use xlink:href="#tolak"/></svg>
                Tidak Disetujui
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
        
        
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('unit-bantuan') ? 'active' : ''}}" href="/unit-bantuan">
      <svg class="bi"><use xlink:href="#help"/></svg>
      Bantuan
      </a>
  </li>
      <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#logoutmodal">
          <svg class="bi"><use xlink:href="#logout"/></svg>Keluar</a>
          {{-- <form action="/logout" method="POST" class="nav-link d-flex align-items-center gap-2">
          @csrf
          <svg class="bi"><use xlink:href="#logout"/></svg>
          <button type="submit" class="dropdown-item fw-medium">Logout</button>
          </form> --}}
      </li>
            </ul>
    </div>
</nav>
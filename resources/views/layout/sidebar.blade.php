<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh; background-color: var(--warna_biru_tua);">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/dashboard" 
          @if (Request::is("dashboard") || Request::is("dashboard/*"))
            class="nav-link active"
          @else 
            class="nav-link"
            style="color:var(--warna_putih)"
          @endif 
        aria-current="page">
            <i class='bx bxs-home'></i>
          <svg class="bi pe-none me-1" width="30" height="30"><use xlink:href="#home"></use></svg>Dashboard
        </a>
      </li>
      <li>
        <a href="/pegawai" 
          @if (Request::is("pegawai") || Request::is("pegawai/*"))
            class="nav-link active"
          @else 
            class="nav-link"
            style="color:var(--warna_putih)"
          @endif 
        >
        <i class="fa-solid fa-users"></i>
          <svg class="bi pe-none" width="30" height="30"><use xlink:href="#speedometer2"></use></svg>Pegawai
        </a>
      </li>
      <li>
        <a href="/proyek" 
          @if (Request::is("proyek") || Request::is("proyek/*"))
            class="nav-link active"
          @else 
            class="nav-link"
            style="color:var(--warna_putih)"
          @endif 
        style="color:var(--warna_putih)">
          <i class="fa-regular fa-calendar-days"></i>
          <svg class="bi pe-none me-2" width="30" height="30"><use xlink:href="#table"></use></svg>Proyek
        </a>
      </li>
      <li>
        <a href="/parameter"
          @if (Request::is("parameter") || Request::is("parameter/*"))
            class="nav-link active"
          @else 
            class="nav-link"
            style="color:var(--warna_putih)"
          @endif
        style="color:var(--warna_putih)">
            <i class="fa-solid fa-chart-simple"></i>
          <svg class="bi pe-none me-2" width="30" height="30"><use xlink:href="#grid"></use></svg>Parameter
        </a>
      </li>
    </ul>

    <div id="sidebar-account">
      <hr>
        <a href="#"
          @if (Request::is("profile") || Request::is("profile/*"))
            class="nav-link active"
          @else 
            class="nav-link"
            style="color:var(--warna_putih)"
          @endif 
        style="color:var(--warna_putih)">
          <i class='bx bx-user'></i>
          <svg class="bi pe-none me-1" width="30" height="30"><use xlink:href="#people-circle"></use></svg>
          Profile
        </a>
        <a href="#"
          @if (Request::is("setting") || Request::is("setting/*"))
            class="nav-link active"
          @else 
            class="nav-link"
            style="color:var(--warna_putih)"
          @endif 
        style="color:var(--warna_putih)">
          <i class='bx bx-cog'></i>
          <svg class="bi pe-none me-1" width="30" height="30"><use xlink:href="#people-circle"></use></svg>
          Setting
        </a>
    </div>
    
</div>
{{-- 
  <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
    <strong>profile</strong>
  </a> --}}
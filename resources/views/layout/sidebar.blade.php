<div id="sidebar" class="position-fixed d-flex flex-column flex-shrink-0">
    <div id="sidebar-button">
      <i id="sidebar-open" class="fa-solid fa-bars fa-2x sidebar-active"></i>
      <i id="sidebar-close" class="fa-solid fa-square-xmark fa-2x"></i>
    </div>
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
          <svg class="bi pe-none" width="30" height="30"><use xlink:href="#speedometer2"></use></svg>Employees
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
      <li>
        <a href="/proyek" 
          @if (Request::is("proyek") || Request::is("proyek/*"))
            class="nav-link active"
          @else 
            class="nav-link"
            style="color:var(--warna_putih)"
          @endif 
        style="color:var(--warna_putih)">
        <i class='bx bx-task'></i>
          <svg class="bi pe-none me-2" width="30" height="30"><use xlink:href="#table"></use></svg>Proyek
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:var(--warna_putih)">
          <i class="fa-regular fa-calendar-days"></i>  
         <svg class="bi pe-none me-2" width="30" height="30"><use xlink:href="#table"></use></svg>Master
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" href="/departemen" >Departemen</a></li>
            <li><a class="dropdown-item" href="/jabatan">Jabatan</a></li>
        </ul>
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
<script src="{{ asset('js/sidebar.js') }}"></script>
{{-- 
  <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
    <strong>profile</strong>
  </a> --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    {{-- CSS MAIN --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    {{-- DATATABLE --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    
    {{-- Bootstrap Select --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

  </head>

  <body>
    <main id="main" class="d-flex flex-row">
      @include('layout.sidebar')
      
      {{-- Yield Content --}}
      <div class="p-3 container-fluid">
        {{-- Breadcrumb --}}
        <div class="container-fluid">
          <nav aria-label="breadcrumb" style="margin-left: 40px; margin-top: 3px;">
           
            <ol class="breadcrumb">
              {{-- Render breadcrumb --}}
              @php
                $current_route_name = Route::current()->getName();
                $route = explode("/",$current_route_name)
              @endphp
              @for ($i = 0; $i < count($route); $i++)
                  <li class="breadcrumb-item" 
                  @if ($i == 0)
                    style="color:var(--warna_kuning)"
                  @endif>
                  {{ $route[$i] }}</li>
              @endfor
             
           </ol>
         </nav>
           {{-- User --}}
           <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
               <i class='bx bxs-bell' style="margin-left:auto ;margin-right:10px"></i>
               <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
               <strong>User</strong>
           </a>
       </div>
       <br>
       <div id="main-yield" class="container-fluid">
          @yield('content')
       </div>
      </div>
    </main>

    {{-- BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a95f1e0b99.js" crossorigin="anonymous"></script>
    {{-- Data Tables --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    {{-- Bootstrap Select --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
  </body>
</html>
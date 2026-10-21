<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/admin.jpg') }}">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
      html, body { overflow-x: hidden; }
      img, iframe { max-width: 100%; height: auto; }
      section { width: 100%; }
    
      /* pastikan sidebar selalu lebar 250px */
      .sidebar {
        width: 250px;
        min-width: 250px;
        max-width: 250px;
      }
    
      /* pada layar kecil bisa tetap responsif, tapi jangan menyusut di desktop */
      @media (max-width: 767px) {
        .sidebar {
          width: 100%;
          min-width: auto;
        }
      }
    </style>
    
  </head>
  <body>
    <div class="d-flex min-vh-100">
      <div class="sidebar">
        @include('components.navbar')
      </div>      
  
      {{-- Main Content --}}
      <div class="flex-grow-1 p-4">
        @yield('content')
      </div>
    </div>
  
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({ duration: 800, once: true });
    </script>
    @stack('scripts')
    @yield('scripts')
  </body>  
</html>
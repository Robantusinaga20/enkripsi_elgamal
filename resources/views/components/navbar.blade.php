<!-- Sidebar -->
<nav class="bg-dark text-white p-3 h-100">
    {{-- Logo & Brand --}}
    <a href="{{ route('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none fw-bold">
        <i class="bi bi-database-check me-2"></i>
        <span>Program ELGAMAL</span>
    </a>
    <hr>
  
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('/') }}" class="nav-link text-white">
                <i class="bi bi-database-lock me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('keys') }}" class="nav-link text-white">
                <i class="bi bi-key me-2"></i> Data Kunci
            </a>
        </li>
        <li>
            <a href="{{ route('encrypt') }}" class="nav-link text-white">
                <i class="bi bi-lock me-2"></i> Enkripsi
            </a>
        </li>
        <li>
            <a href="{{ route('decrypt') }}" class="nav-link text-white">
                <i class="bi bi-unlock-fill me-2"></i> Dekripsi
            </a>
        </li>
    </ul>
    <hr>
  </nav>
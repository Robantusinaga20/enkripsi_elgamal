@extends("layouts.app")

@section("title", "Generate Keys")

@section("content")
<div class="container mt-4">
    <div class="card shadow p-4">
        <h4 class="mb-3">🔑 Generate Kunci ElGamal</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('keys.generate') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Buat Kunci Baru</button>
        </form>

        @if(session('keys'))
        <div class="mt-4">
            <h5>📜 Kunci Publik</h5>
            <pre>{{ json_encode(session('keys')['public'], JSON_PRETTY_PRINT) }}</pre>

            <h5>🔐 Kunci Privat</h5>
            <pre>{{ session('keys')['private'] }}</pre>
        </div>
        @endif
    </div>
</div>
@endsection
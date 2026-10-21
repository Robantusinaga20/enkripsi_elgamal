@extends("layouts.app")

@section("title", "Enkripsi")

@section("content")
<div class="container mt-4">
    <div class="card shadow p-4">
        <h4 class="mb-3">🔐 Enkripsi Pesan (ElGamal)</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('encrypt.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Teks Asli (Plaintext)</label>
                <textarea name="text" class="form-control" rows="3" placeholder="Masukkan teks..." required>{{ old('text', session('input_text')) }}</textarea>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label mb-0">Kunci Publik (JSON)</label>
                    <button type="button" id="fetchPublicKey" class="btn btn-sm btn-outline-secondary">
                        🔄 Ambil dari Database
                    </button>
                </div>
                <textarea id="publicKeyField" name="public_key" class="form-control" rows="3" placeholder='{"p":467,"g":2,"y":12345}' required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Enkripsi</button>
        </form>

        @if(session('encrypted_text'))
        <div class="mt-4">
            <h5>📦 Hasil Enkripsi (Ciphertext)</h5>

            @php
                $cipherList = explode(' ', trim(session('encrypted_text')));
            @endphp

            <div class="border rounded p-3 bg-light">
                @foreach($cipherList as $cipher)
                    <div>{{ $cipher }}</div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Script ambil kunci publik --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$('#fetchPublicKey').click(function() {
    $.get('{{ route("keys.fetch") }}', function(res) {
        if(res.status === 'ok') {
            $('#publicKeyField').val(JSON.stringify(res.public_key, null, 2));
        } else {
            alert(res.message);
        }
    }).fail(function() {
        alert('Gagal mengambil kunci dari server.');
    });
});
</script>
@endsection
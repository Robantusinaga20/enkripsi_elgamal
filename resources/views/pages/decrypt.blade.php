@extends("layouts.app")

@section("title", "Dekripsi")

@section("content")
<div class="container mt-4">
    <div class="card shadow p-4">
        <h4 class="mb-3">🔓 Dekripsi Pesan (ElGamal)</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('decrypt.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Ciphertext (JSON)</label>
                <textarea name="ciphertext" class="form-control" rows="3" placeholder='{"a":123,"b":456}' required></textarea>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label mb-0">Kunci Privat</label>
                    <button type="button" id="fetchPrivateKey" class="btn btn-sm btn-outline-secondary">
                        🔄 Ambil dari Database
                    </button>
                </div>
                <input id="privateKeyField" type="text" name="private_key" class="form-control" placeholder="Masukkan kunci privat..." required>
            </div>

            <button type="submit" class="btn btn-warning">Dekripsi</button>
        </form>

        @if(session('decrypted'))
        <div class="mt-4">
            <h5>📝 Hasil Dekripsi (Plaintext)</h5>
            <pre>{{ session('decrypted') }}</pre>
        </div>
        @endif
    </div>
</div>

{{-- Script ambil kunci privat --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$('#fetchPrivateKey').click(function() {
    $.get('{{ route("keys.fetch") }}', function(res) {
        if(res.status === 'ok') {
            $('#privateKeyField').val(res.private_key);
        } else {
            alert(res.message);
        }
    }).fail(function() {
        alert('Gagal mengambil kunci dari server.');
    });
});
</script>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Key;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class KeyController extends Controller
{
    public function index()
    {
        return view('pages.keys');
    }

    public function generate(Request $request)
{
    // Fungsi bantu untuk cek prima
    function isPrime($n) {
        if ($n < 2) return false;
        if ($n % 2 == 0 && $n != 2) return false;
        for ($i = 3; $i <= sqrt($n); $i += 2) {
            if ($n % $i == 0) return false;
        }
        return true;
    }

    // Fungsi bantu untuk mencari bilangan prima acak (misal 100 - 1000)
    function generateRandomPrime($min = 100, $max = 1000) {
        do {
            $num = random_int($min, $max);
        } while (!isPrime($num));
        return $num;
    }

    // Fungsi bantu untuk mencari generator g untuk p
    function findGenerator($p) {
        $phi = $p - 1;
        $factors = [];

        // cari faktor dari phi
        $n = $phi;
        for ($i = 2; $i * $i <= $n; $i++) {
            if ($n % $i == 0) {
                $factors[] = $i;
                while ($n % $i == 0) {
                    $n /= $i;
                }
            }
        }
        if ($n > 1) $factors[] = $n;

        // coba cari g
        for ($g = 2; $g < $p; $g++) {
            $ok = true;
            foreach ($factors as $factor) {
                if (bcpowmod($g, $phi / $factor, $p) == 1) {
                    $ok = false;
                    break;
                }
            }
            if ($ok) return $g;
        }
        return null;
    }

    // --- Generate bilangan prima p secara acak
    $p = generateRandomPrime(200, 5000);

    // --- Cari generator g untuk p
    $g = findGenerator($p);
    if (!$g) {
        return back()->with('error', 'Gagal menemukan generator g untuk p = ' . $p);
    }

    // --- Pilih kunci privat acak x (1 < x < p-1)
    $x = random_int(2, $p - 2);

    // --- Hitung kunci publik y = g^x mod p
    $y = bcpowmod($g, $x, $p);

    // --- Simpan ke database
    $key = Key::create([
        'public_key' => json_encode(['p' => $p, 'g' => $g, 'y' => $y]),
        'private_key' => $x,
        'last_used_at' => now(),
    ]);

    // --- Kembalikan ke halaman dengan notifikasi
    return redirect()->route('keys')
        ->with('success', "Kunci ElGamal berhasil dibuat! (p=$p, g=$g)")
        ->with('keys', [
            'public' => ['p' => $p, 'g' => $g, 'y' => $y],
            'private' => $x,
        ]);
}


    public function fetch()
    {
        $key = Key::latest()->first();

        if (!$key) {
            return response()->json(['status' => 'error', 'message' => 'Belum ada kunci, silakan generate dulu.']);
        }

        $key->update(['last_used_at' => now()]);

        return response()->json([
            'status' => 'ok',
            'public_key' => json_decode($key->public_key, true),
            'private_key' => $key->private_key,
        ]);
    }
}
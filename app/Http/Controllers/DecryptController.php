<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Key;

class DecryptController extends Controller
{
    public function index()
    {
        return view('pages.decrypt');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ciphertext' => 'required|string',
            'private_key' => 'required|string',
        ]);

        $ciphertext = $request->ciphertext;
        $privateKey = $request->private_key;

        // Ambil public key dari database
        $key = \App\Models\Key::latest()->first();
        $public = json_decode($key->public_key, true);
        $p = $public['p'];

        // Pisahkan setiap pasangan (a,b)
        preg_match_all('/\((\d+),(\d+)\)/', $ciphertext, $matches, PREG_SET_ORDER);

        $plaintext = '';

        foreach ($matches as $match) {
            $a = $match[1];
            $b = $match[2];

            // Hitung s = a^x mod p
            $s = bcpowmod($a, $privateKey, $p);

            // Hitung invers modular dari s mod p
            $s_inv = gmp_invert($s, $p);

            // Hitung m = (b * s_inv) mod p
            $m = bcmod(bcmul($b, $s_inv), $p);

            // Ubah kembali ke karakter
            $plaintext .= chr((int)$m);
        }

        return redirect()->route('decrypt')
            ->with('success', 'Dekripsi berhasil dengan ElGamal!')
            ->with('decrypted', $plaintext);
    }
}
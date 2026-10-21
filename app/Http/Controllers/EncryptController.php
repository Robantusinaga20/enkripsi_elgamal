<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Key;

class EncryptController extends Controller
{
    public function index()
    {
        return view('pages.encrypt');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'public_key' => 'required|string'
        ]);

        $plaintext = $request->text;
        $public = json_decode($request->public_key, true);

        $p = $public['p'];
        $g = $public['g'];
        $y = $public['y'];

        $cipher_pairs = [];

        // Enkripsi per huruf
        for ($i = 0; $i < strlen($plaintext); $i++) {
            $char = $plaintext[$i];
            $m = ord($char); // ubah karakter ke kode ASCII

            // Pilih bilangan acak k untuk setiap huruf
            $k = random_int(2, $p - 2);

            // Hitung a = g^k mod p
            $a = bcpowmod($g, $k, $p);

            // Hitung b = (y^k * m) mod p
            $yk = bcpowmod($y, $k, $p);
            $b = bcmod(bcmul($yk, $m), $p);

            $cipher_pairs[] = "({$a},{$b})";
        }

        // Gabungkan hasil per huruf
        $cipher_text = implode(' ', $cipher_pairs);

        return redirect()->route('encrypt')
            ->with('success', 'Enkripsi berhasil dengan ElGamal!')
            ->with('encrypted_text', $cipher_text)
            ->with('input_text', $plaintext);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BeliController extends Controller
{
    public function beli($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->stok <= 0) {
            return redirect('/')->with('error', 'Stok produk habis');
        }

        // Kurangi stok
        $produk->stok -= 1;
        $produk->save();

        // Buat kode voucher unik
        $kode = 'DISKON-' . strtoupper(Str::random(6));
        $voucher = Voucher::create([
            'kode' => $kode,
            'potongan' => 30000,
        ]);

        // Generate QR Code (base64 SVG)
        $qr = base64_encode(QrCode::format('svg')->size(200)->generate($kode));

        // Tampilkan ke view
        return view('produk.voucher', [
            'produk'   => $produk,
            'kode'     => $kode,
            'potongan'=> $voucher->potongan,
            'qr'       => $qr,
        ]);
    }
}

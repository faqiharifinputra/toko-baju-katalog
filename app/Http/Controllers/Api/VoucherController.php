<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\Produk;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VoucherController extends Controller
{
    public function beli(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);

        // Potong stok
        if ($produk->stok <= 0) {
            return response()->json(['message' => 'Stok habis'], 400);
        }
        $produk->stok -= 1;
        $produk->save();

        // Buat kode voucher
        $kode = 'DISKON-' . strtoupper(Str::random(6));
        $voucher = Voucher::create([
            'kode' => $kode,
            'potongan' => 30000,
        ]);

        // Generate QR sebagai gambar base64
        $qr = base64_encode(
            QrCode::format('png')->size(200)->generate($kode)
        );

        return response()->json([
            'message' => 'Pembelian berhasil. Voucher berhasil dibuat.',
            'produk' => $produk->nama,
            'kode_voucher' => $kode,
            'potongan' => $voucher->potongan,
            'barcode_qr_base64' => $qr
        ]);
    }
}

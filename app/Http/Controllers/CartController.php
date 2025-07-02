<?php

namespace App\Http\Controllers;

use App\Models\Produk;


class CartController extends Controller
{
    public function add($id)
    {
        $produk = Produk::findOrFail($id);
        $cart = session()->get('cart', []);

        $cart[$id] = [
            'nama' => $produk->nama,
            'harga' => $produk->harga,
            'foto' => $produk->foto,
            'jumlah' => isset($cart[$id]) ? $cart[$id]['jumlah'] + 1 : 1,
        ];

        session(['cart' => $cart]);
        return back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang dikosongkan');
    }
}

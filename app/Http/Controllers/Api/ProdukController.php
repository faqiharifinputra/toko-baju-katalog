<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return response()->json(Produk::all());
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images'), $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $produk = Produk::create($data);
        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'produk' => $produk
        ], 201);
    }

    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        return response()->json($produk);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images'), $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $produk->update($data);

        return response()->json([
            'message' => 'Produk berhasil diperbarui',
            'produk' => $produk
        ]);
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => '<h1> Halo Ini dari backend</h1>'], 404);
        }

        $produk->delete();
        return response()->json(['message' => 'Produk dihapus']);
    }
}

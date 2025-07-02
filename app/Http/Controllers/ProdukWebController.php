<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukWebController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
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

        Produk::create($data);
        return redirect('/')->with('success', 'Produk ditambahkan');
    }


    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images'), $namaFoto);
            $data['foto'] = $namaFoto;
        }

        $produk->update($data);
        return redirect('/')->with('success', 'Produk diperbarui');
    }


    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('/')->with('success', 'Produk dihapus');
    }
}


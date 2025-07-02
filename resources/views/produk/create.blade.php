@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <form method="POST" action="/produk" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Produk:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori:</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga (Rp):</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok:</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto Produk:</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/" class="btn btn-secondary">Batal</a>
        <h1> Halo Ini dari backend</h1>
    </form>
@endsection

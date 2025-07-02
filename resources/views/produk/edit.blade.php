@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <form method="POST" action="/produk/{{ $produk->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Produk:</label>
            <input type="text" name="nama" class="form-control" value="{{ $produk->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori:</label>
            <input type="text" name="kategori" class="form-control" value="{{ $produk->kategori }}" required>
        </div>
        <div class="mb-3">
            <label>Harga (Rp):</label>
            <input type="number" name="harga" class="form-control" value="{{ $produk->harga }}" required>
        </div>
        <div class="mb-3">
            <label>Stok:</label>
            <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}" required>
        </div>
        <div class="mb-3">
            <label>Ganti Foto (opsional):</label>
            <input type="file" name="foto" class="form-control">
        </div>
        @if ($produk->foto)
            <div class="mb-3">
                <label>Foto Saat Ini:</label><br>
                <img src="{{ asset('images/' . $produk->foto) }}" width="100" height="100" style="object-fit: cover;">
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/" class="btn btn-secondary">Batal</a>
    </form>
@endsection

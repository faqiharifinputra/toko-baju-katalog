@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Katalog Produk</h2>
        <a href="/produk/create" class="btn btn-success">+ Tambah Produk</a>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
<h1>Halo</h1>
    {{-- KATALOG PRODUK --}}
    <div class="row">
        @forelse ($produk as $item)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    @if ($item->foto)
                        <img src="{{ asset('images/' . $item->foto) }}" 
                             class="card-img-top rounded-top" 
                             style="height: 180px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                             style="height: 180px;">
                            <span class="text-muted">Tidak ada gambar</span>
                        </div>
                    @endif

                    <div class="card-body p-3">
                        <h6 class="card-title mb-1">{{ $item->nama }}</h6>
                        <span class="badge bg-primary mb-2">{{ $item->kategori }}</span>
                        <p class="text-success fw-semibold mb-1">Rp{{ number_format($item->harga) }}</p>
                        <small class="text-muted">Stok: {{ $item->stok }}</small>
                    </div>

                    <div class="card-footer bg-white border-top-0 d-flex flex-column gap-2 px-3 pb-3">
                        <a href="/produk/{{ $item->id }}/edit" class="btn btn-sm btn-outline-warning">Edit</a>

                        <a href="{{ route('produk.beli', $item->id) }}" class="btn btn-sm btn-outline-success">Beli</a>

                        <form method="POST" action="/produk/{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada produk.</div>
            </div>
        @endforelse
    </div>

    {{-- KERANJANG BELANJA --}}
    @if (session('cart') && count(session('cart')) > 0)
        <hr>
        <h4 class="mt-4">Keranjang Anda</h4>
        <div class="row">
            @foreach (session('cart') as $id => $item)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card h-100 shadow-sm">
                        @if ($item['foto'])
                            <img src="{{ asset('images/' . $item['foto']) }}" class="card-img-top" style="height: 100px; object-fit: cover;">
                        @endif
                        <div class="card-body p-2">
                            <h6 class="card-title">{{ $item['nama'] }}</h6>
                            <p class="mb-1 text-success fw-semibold">Rp{{ number_format($item['harga']) }}</p>
                            <p class="text-muted mb-0">Jumlah: {{ $item['jumlah'] }}</p>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#detail-{{ $loop->index }}">
                                Detail
                            </button>
                        </div>
                        <div id="detail-{{ $loop->index }}" class="collapse px-3 pb-3">
                            <p><strong>ID:</strong> {{ $id }}</p>
                            <p><strong>Harga:</strong> Rp{{ number_format($item['harga']) }}</p>
                            <p><strong>Jumlah:</strong> {{ $item['jumlah'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('cart.clear') }}" class="btn btn-sm btn-danger">Kosongkan Keranjang</a>
    @endif
@endsection

@extends('layouts.app')

@section('title', 'Voucher Diskon')

@section('content')
    <div class="text-center mt-5">
        <h2 class="mb-4">Voucher Diskon</h2>

        <div class="card mx-auto p-4 shadow" style="max-width: 400px;">
            <h5 class="fw-bold text-success mb-2">
                Terima kasih telah membeli <strong>{{ $produk->nama }}</strong>!
            </h5>
            <p>Berikut adalah kode voucher diskon Anda:</p>
            <h3 class="text-success fw-bold">{{ $kode }}</h3>
            <p>Potongan: <strong>Rp{{ number_format($potongan) }}</strong></p>

            <div class="mt-3 mb-3">
                <img src="data:image/svg+xml;base64,{{ $qr }}" alt="QR Voucher" width="150">
            </div>

            <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
@endsection

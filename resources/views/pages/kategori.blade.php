@extends('layouts.app')

@section('title', 'Kategori Produk')

@section('content')
    <div class="row">
        @foreach (['Pria', 'Wanita', 'Anak-anak', 'Sport', 'Muslim'] as $kategori)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-sm border-0 h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kategori }}</h5>
                        <p class="card-text text-muted">Lihat berbagai koleksi baju kategori <strong>{{ $kategori }}</strong>.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Produk</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

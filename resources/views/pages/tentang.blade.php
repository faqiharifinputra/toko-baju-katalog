@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-4">
            <h5 class="mb-3">Hubungi Kami</h5>
            <form>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Anda">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="email@contoh.com">
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" rows="4" placeholder="Pesan Anda..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>

        <div class="col-md-6">
            <h5 class="mb-3">Info Kontak</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Email:</strong> admin@tokobajuku.test</li>
                <li class="list-group-item"><strong>WhatsApp:</strong> 0812-3456-7890</li>
                <li class="list-group-item"><strong>Alamat:</strong> Jl. Fashion No. 123, Jakarta</li>
            </ul>
        </div>
    </div>
@endsection

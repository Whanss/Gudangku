@extends('layouts.app')

@section('content')
<style>
    .content-inner h1, .content-inner p, .card {
        color: white;
    }
    .card {
        background-color: rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Dashboard</h1>
            <p>Selamat datang, {{ Auth::user()->name }}!</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Kategori</h5>
                            <p class="card-text">Tambah, edit, dan hapus kategori barang.</p>
                            <a href="{{ route('kategori.index') }}" class="btn btn-primary">Kelola Kategori</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Barang</h5>
                            <p class="card-text">Tambah, edit, dan hapus data barang.</p>
                            <a href="{{ route('barang.index') }}" class="btn btn-primary">Kelola Barang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Barang</h5>
                            <p class="card-text">Lihat laporan stok barang di gudang.</p>
                            <a href="{{ route('laporans.index') }}" class="btn btn-primary">Lihat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

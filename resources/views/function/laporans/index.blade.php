@extends('layouts.app')

@section('content')
<style>
    .content-inner h3, .content-inner h4, .content-inner p, .card, .table {
        color: white;
    }
    .card {
        background-color: rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .table {
        background-color: rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .table th, .table td {
        border-color: rgba(255, 255, 255, 0.2);
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Laporan Barang</h3>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
                <div class="card-body">
                    <h4>Total Stok Barang: {{ $totalStok }}</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Tanggal Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang)
                                <tr>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>
                                        @if($barang->gambar)
                                            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama_barang }}" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $barang->kategori->nama }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($barang->tanggal_masuk)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

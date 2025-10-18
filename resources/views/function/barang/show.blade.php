@extends('layouts.app')

@section('content')
    <style>
        .content-inner h3,
        .content-inner p,
        .card,
        .table {
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

        .table th,
        .table td {
            border-color: rgba(255, 255, 255, 0.2);
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Detail Barang</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Kode Barang:</strong> {{ $barang->kode_barang }}
                            </div>
                            <div class="col-md-6">
                                <strong>Nama Barang:</strong> {{ $barang->nama_barang }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <strong>Kategori:</strong> {{ $barang->kategori->nama ?? 'N/A' }}
                            </div>
                            <div class="col-md-6">
                                <strong>Stok:</strong> {{ $barang->stok }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <strong>Harga:</strong> Rp {{ number_format($barang->harga, 0, ',', '.') }}
                            </div>
                            <div class="col-md-6">
                                <strong>Tanggal Masuk:</strong>
                                {{ \Carbon\Carbon::parse($barang->tanggal_masuk)->format('d-m-Y') }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <strong>Gambar Barang:</strong>
                                @if ($barang->gambar)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang"
                                            style="max-width: 100%; height: auto;">
                                    </div>
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

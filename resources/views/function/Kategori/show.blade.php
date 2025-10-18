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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Detail Kategori</h3>
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $kategori->id }}</p>
                        <p><strong>Nama:</strong> {{ $kategori->nama }}</p>
                        <h4>Barang dalam Kategori:</h4>
                        @if ($kategori->barangs->count() > 0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori->barangs as $barang)
                                        <tr>
                                            <td>{{ $barang->kode_barang }}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->stok }}</td>
                                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Tidak ada barang dalam kategori ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<style>
    .content-inner h3, .content-inner p, .card, .table {
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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Daftar Barang</h3>
                        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    <tr>
                                        <td>
                                            @if($barang->gambar)
                                                <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang" style="max-width: 50px; max-height: 50px;">
                                            @else
                                                <span class="text-muted">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->kategori->nama ?? 'N/A' }}</td>
                                        <td>{{ $barang->stok }}</td>
                                        <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($barang->tanggal_masuk)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('barang.show', $barang) }}"
                                                class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('barang.edit', $barang) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('barang.destroy', $barang) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                            </form>
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

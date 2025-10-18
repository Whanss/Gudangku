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
                        <h3>Kategori Barang</h3>
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Kategori as $kategori)
                                    <tr>
                                        <td>{{ $kategori->id }}</td>
                                        <td>{{ $kategori->nama }}</td>
                                        <td>
                                            <a href="{{ route('kategori.show', $kategori) }}"
                                                class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('kategori.edit', $kategori) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('kategori.destroy', $kategori) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
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

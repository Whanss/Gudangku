@extends('layouts.app')

@section('content')
<style>
    .content-inner h3, .content-inner label, .card, .form-control, .btn {
        color: white;
    }
    .card {
        background-color: rgba(0, 0, 0, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .form-control {
        background-color: rgba(0, 0, 0, 0.5);
        border-color: rgba(255, 255, 255, 0.2);
    }
    .form-control:focus {
        background-color: rgba(0, 0, 0, 0.5);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah Kategori</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        <h3>Edit Barang</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                    value="{{ $barang->kode_barang }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    value="{{ $barang->nama_barang }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select class="form-control" id="kategori_id" name="kategori_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok"
                                    value="{{ $barang->stok }}" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    value="{{ $barang->harga }}" step="0.01" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                    value="{{ \Carbon\Carbon::parse($barang->tanggal_masuk)->format('Y-m-d') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Barang</label>
                                @if($barang->gambar)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar Barang" style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

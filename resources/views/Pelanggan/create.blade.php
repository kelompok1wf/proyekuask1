<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Pelanggan Baru</h5>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-light btn-sm">Kembali</a>
                    </div>

                    <div class="card-body">
                        {{-- Tampilkan error validasi jika ada --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pelanggan.store') }}" method="POST">
                            @csrf

                            {{-- Input Nama Pelanggan --}}
                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <input type="text" 
                                    class="form-control @error('nama_pelanggan') is-invalid @enderror" 
                                    id="nama_pelanggan" 
                                    name="nama_pelanggan" 
                                    value="{{ old('nama_pelanggan') }}" 
                                    placeholder="Masukkan nama pelanggan" 
                                    required>
                                @error('nama_pelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Input Nomor Meja --}}
                            <div class="mb-4">
                                <label for="no_meja" class="form-label">Nomor Meja</label>
                                <input type="number" 
                                    class="form-control @error('no_meja') is-invalid @enderror" 
                                    id="no_meja" 
                                    name="no_meja" 
                                    value="{{ old('no_meja') }}" 
                                    placeholder="Contoh: 12" 
                                    required>
                                @error('no_meja')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-secondary me-md-2">Reset</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    (@endsection)
</body>
</html>
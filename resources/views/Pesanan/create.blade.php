<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
    <h2>Input Pesanan Baru</h2>
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No Meja</label>
            <input type="text" name="no_meja" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Detail Pesanan</label>
            <textarea name="detail_pesanan" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Total Harga</label>
            <input type="number" name="total_harga" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Pesanan</button>
    </form>
</div>
</body>
</html>
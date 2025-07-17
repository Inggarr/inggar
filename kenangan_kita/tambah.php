<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kenangan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
  <h2 class="mb-3">Tambah Kenangan Baru</h2>

  <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Cerita Singkat</label>
      <textarea name="cerita" rows="4" class="form-control"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Tanggal Kenangan</label>
      <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Pilih Foto</label>
      <input type="file" name="foto" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</div>
</body>
</html>

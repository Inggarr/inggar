<?php
include "koneksi.php";
$id  = (int)$_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM galeri WHERE id=$id");
$row = mysqli_fetch_assoc($res);
if (!$row) die("Data tidak ditemukan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Kenangan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    body{background:#fdf6f9;font-family:'Poppins',sans-serif;}
    .btn-pink{background:#ff85a2;border-color:#ff85a2}
    .btn-pink:hover{background:#ff4d6d;border-color:#ff4d6d}
  </style>
</head>
<body>
<div class="container mt-5" data-aos="fade-up">
  <h2 class="mb-3">Edit Kenangan</h2>
  <form action="proses_edit.php?id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($row['judul']); ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Cerita Singkat</label>
      <textarea name="cerita" rows="4" class="form-control"><?= htmlspecialchars($row['cerita']); ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Tanggal Kenangan</label>
      <input type="date" name="tanggal" class="form-control" value="<?= $row['tanggal']; ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Foto Saat Ini</label><br>
      <img src="<?= $row['foto']; ?>" width="180" class="img-thumbnail mb-2">
      <input type="file" name="foto" class="form-control" accept="image/*">
      <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
    </div>
    <button type="submit" class="btn btn-pink text-white">Perbarui</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({once:true,duration:700,offset:120});</script>
</body>
</html>

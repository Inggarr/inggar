<?php
include "koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM galeri ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kenangan Kita</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
  <!-- AOS (animasi scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <style>
    body          { background:#fdf6f9; font-family:'Poppins',sans-serif; }
    h1            { font-family:'Great Vibes',cursive; font-size:3rem; color:#ff4d6d; animation:pulse 4s infinite; }
    .card         { border:none; border-radius:16px; box-shadow:0 4px 14px rgba(0,0,0,.06); transition:.4s all; }
    .card:hover   { transform:translateY(-8px) scale(1.02); box-shadow:0 12px 22px rgba(0,0,0,.12); }
    .card-img-top { border-top-left-radius:16px; border-top-right-radius:16px; height:250px; object-fit:cover; }
    .btn-pink     { background:#ff85a2; border-color:#ff85a2; transition:.3s }
    .btn-pink:hover{ background:#ff4d6d; border-color:#ff4d6d; transform:scale(1.05); }
    .btn-outline-primary:hover { color:#fff; }
    .btn-outline-warning:hover { color:#000; }
    .alert-light  { background:#fff0f5; border:1px solid #fdd; }
    footer        { margin-top:60px; text-align:center; color:#888; }
    @keyframes pulse{ 0%,100%{transform:scale(1);} 50%{transform:scale(1.04);} }
  </style>
</head>
<body>

<!-- Header -->
<div class="container mt-4 text-center" data-aos="fade-down">
  <h1>Lovely Memories 💞</h1>
  <img src="images/tbs.jpg" alt="Foto Berdua" width="250" class="img-thumbnail shadow-sm mt-2">
  <p class="mt-3">Tempat menyimpan semua kenangan, dari awal hingga sekarang.</p>
</div>

<!-- Galeri -->
<div class="container mt-5" data-aos="fade-up">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Galeri Kenangan</h2>
    <a href="tambah.php" class="btn btn-pink text-white">+ Tambah Kenangan</a>
  </div>

  <div class="row">
    <?php if (mysqli_num_rows($result) == 0): ?>
      <p class="text-center text-muted">Belum ada kenangan tersimpan 💌</p>
    <?php endif; ?>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-duration="600">
      <div class="card h-100">
        <img src="<?= $row['foto']; ?>" class="card-img-top" alt="Kenangan">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?= htmlspecialchars($row['judul']); ?></h5>
          <p class="card-text flex-grow-1"><?= nl2br(htmlspecialchars($row['cerita'])); ?></p>
          <div>
            <small class="text-muted"><?= $row['tanggal']; ?></small><br>
            <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary mt-2">Detail</a>
            <a href="edit.php?id=<?= $row['id']; ?>"   class="btn btn-sm btn-outline-warning mt-2">Edit</a>
            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger mt-2"
               onclick="return confirm('Yakin hapus kenangan ini?')">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Surat Cinta -->
<div class="container mt-5" data-aos="fade-right">
  <h2 class="fw-bold">Senandika</h2>
  <div class="alert alert-light">
    Terimakasih untuk zeno yg menemukan filsafat stoic pada awal abad ke-3 SM yg mengajarkan bahwa menciptakan kebahagiaan itu dari hal hal yg sederhana, contohnya itu melihatnya tersenyum💖
  </div>
</div>

<footer>
  <p>&copy; 2025 by Inggar &amp; Marcelia</p>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script> AOS.init({ once:true, duration:700, offset:120 }); </script>
</body>
</html>

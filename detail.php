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
  <title>Detail Kenangan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
  <style>
    body {
      background: #fff1f7;
      font-family: 'Poppins', sans-serif;
    }
    .container-detail {
      max-width: 700px;
      margin: auto;
      background: white;
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      margin-top: 60px;
      margin-bottom: 60px;
    }
    h2 {
      font-family: 'Great Vibes', cursive;
      font-size: 2.8rem;
      text-align: center;
      color: #ff4d6d;
      margin-bottom: 1rem;
      animation: fadeIn 2s ease-in-out;
    }
    img {
      width: 100%;
      max-height: 420px;
      object-fit: cover;
      border-radius: 15px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    }
    .cerita-box {
      background: #fff6fa;
      border-left: 5px solid #ff8fab;
      padding: 1rem 1.2rem;
      margin-top: 1.5rem;
      font-size: 1rem;
      border-radius: 10px;
    }
    .tanggal {
      font-size: 0.95rem;
      color: #888;
      margin-top: 1rem;
    }
    .btn-group {
      margin-top: 1.5rem;
      display: flex;
      gap: 0.7rem;
      justify-content: center;
    }
    .btn-pink {
      background-color: #ff85a2;
      border-color: #ff85a2;
      color: white;
    }
    .btn-pink:hover {
      background-color: #ff4d6d;
      border-color: #ff4d6d;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

<div class="container container-detail" data-aos="fade-up">
  <h2><?= htmlspecialchars($row['judul']); ?></h2>
  <img src="<?= $row['foto']; ?>" alt="Foto Kenangan">
  <div class="cerita-box">
    <?= nl2br(htmlspecialchars($row['cerita'])); ?>
  </div>
  <p class="tanggal">📅 <?= date("d F Y", strtotime($row['tanggal'])); ?></p>
  <div class="btn-group">
    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-pink">Edit</a>
    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-outline-danger"
       onclick="return confirm('Yakin hapus kenangan ini?')">Hapus</a>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init({ once:true, duration:800, offset:100 });</script>
</body>
</html>

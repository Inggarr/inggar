<?php
include "koneksi.php";

// Ambil data form
$judul   = mysqli_real_escape_string($conn, $_POST['judul']);
$cerita  = mysqli_real_escape_string($conn, $_POST['cerita']);
$tanggal = $_POST['tanggal'];

// ── 1. Proses upload foto ─────────────────────────────
$namaFile = $_FILES['foto']['name'];
$tmpFile  = $_FILES['foto']['tmp_name'];
$folder   = "uploads/";

// Pastikan folder uploads ada
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Bikin nama unik biar gak bentrok
$targetFile = $folder . date("YmdHis") . "_" . preg_replace("/[^a-zA-Z0-9.\-_]/", "", $namaFile);

if (!move_uploaded_file($tmpFile, $targetFile)) {
    die("Upload foto gagal.");
}

// ── 2. Simpan ke database ─────────────────────────────
$sql = "INSERT INTO galeri (judul, cerita, foto, tanggal)
        VALUES ('$judul', '$cerita', '$targetFile', '$tanggal')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?msg=sukses");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

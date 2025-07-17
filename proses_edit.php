<?php
include "koneksi.php";
$id      = (int)$_GET['id'];
$judul   = mysqli_real_escape_string($conn, $_POST['judul']);
$cerita  = mysqli_real_escape_string($conn, $_POST['cerita']);
$tanggal = $_POST['tanggal'];

// Ambil data lama (untuk foto)
$old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM galeri WHERE id=$id"));
$fotoLama = $old ? $old['foto'] : '';

$targetFile = $fotoLama;

// Jika ada foto baru di‑upload
if (!empty($_FILES['foto']['name'])) {
    $namaFile = $_FILES['foto']['name'];
    $tmpFile  = $_FILES['foto']['tmp_name'];
    $folder   = "uploads/";
    if (!is_dir($folder)) mkdir($folder, 0777, true);

    $targetFile = $folder . date("YmdHis") . "_" . preg_replace("/[^a-zA-Z0-9.\-_]/", "", $namaFile);
    if (move_uploaded_file($tmpFile, $targetFile)) {
        // Hapus foto lama
        if ($fotoLama && file_exists($fotoLama)) @unlink($fotoLama);
    } else {
        die("Upload foto baru gagal.");
    }
}

// Update database
$sql = "UPDATE galeri SET
          judul   = '$judul',
          cerita  = '$cerita',
          foto    = '$targetFile',
          tanggal = '$tanggal'
        WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: detail.php?id=$id");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

<?php
include "koneksi.php";
$id = (int)$_GET['id'];

// Ambil lokasi file foto, lalu hapus
$q = mysqli_query($conn, "SELECT foto FROM galeri WHERE id=$id");
$d = mysqli_fetch_assoc($q);
if ($d) {
    @unlink($d['foto']);                 // hapus file fisik
    mysqli_query($conn, "DELETE FROM galeri WHERE id=$id");
}

header("Location: index.php");
?>

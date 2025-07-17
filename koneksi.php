<?php
$host = "localhost";
$user = "root";
$pass = "";          // password MySQL‑mu (kosong kalau masih default XAMPP)
$db   = "db_kenangan";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

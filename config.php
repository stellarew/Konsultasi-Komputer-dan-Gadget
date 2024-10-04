<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$password = ""; // Ubah sesuai dengan password database Anda
$database = "rental_mobil_2_db";

// Buat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

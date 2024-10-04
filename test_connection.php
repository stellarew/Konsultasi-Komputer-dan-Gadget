<?php
include('config.php');

if ($conn) {
    echo "Koneksi ke database berhasil!";
} else {
    echo "Koneksi ke database gagal!";
}
?>

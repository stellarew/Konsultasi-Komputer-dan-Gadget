<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $year = $_POST['year'];
    $price = $_POST['price']; // Harga sudah dalam format angka biasa

    // Pastikan harga adalah angka bulat
    $price = intval($price); // Mengonversi ke integer

    // Query untuk memasukkan data mobil ke tabel mobil
    $query = "INSERT INTO cars (model, brand, year, price) VALUES ('$model', '$brand', '$year', '$price')";
    
    if (mysqli_query($conn, $query)) {
        echo "Mobil berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

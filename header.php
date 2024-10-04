<?php
session_start(); // Memastikan session dimulai
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> <!-- Path absolut untuk akses dari semua halaman -->
    <title>Rental Mobil</title>
</head>
<body>
    <header>
        <h1>Rental Mobil</h1>
        <nav>
            <a href="../index.php">Beranda</a>

            <?php if (!isset($_SESSION['username'])): ?>
                <a href="../login.php">Login</a> <!-- Tampilkan tombol login jika belum login -->
            <?php endif; ?>

            <?php if (isset($_SESSION['username'])): ?>
                <a href="../logout.php">Logout</a> <!-- Tampilkan tombol logout jika sudah login -->
            <?php endif; ?>

            <a href="../views/view_available_cars.php">Mobil Tersedia</a>
            <a href="../views/rent_car.php">Sewa Mobil</a>

            <!-- Tampilkan dashboard yang sesuai dengan role pengguna -->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'customer'): ?>
                <a href="../dashboards/customer_dashboard.php">Dashboard Customer</a>
            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                <a href="../dashboards/admin_dashboard.php">Dashboard Admin</a>
            <?php endif; ?>
        </nav>
    </header>
</body>
</html>

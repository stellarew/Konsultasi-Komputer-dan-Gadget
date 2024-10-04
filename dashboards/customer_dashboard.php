<?php include('../header.php'); ?>
<main>
    <h2>Dashboard Customer</h2>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
    <a href="../views/view_rentals.php" class="button">Lihat Penyewaan</a>
    <a href="../views/rent_car.php" class="button">Sewa Mobil</a>
</main>
<?php include('../footer.php'); ?>

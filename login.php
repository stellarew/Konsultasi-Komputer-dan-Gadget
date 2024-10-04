<?php include('header.php'); ?>
<main>
    <h2>Login</h2>
    <form action="processes/process_login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="html/register.html">Register Customer</a> / <a href="processes/register_admin.php" class="button">Register Admin</a></p>
    <p><a href="index.php">Kembali ke Beranda</a></p> <!-- Tombol Kembali ke Beranda -->
</main>
<?php include('footer.php'); ?>

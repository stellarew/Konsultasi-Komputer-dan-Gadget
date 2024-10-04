<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> <!-- Memanggil file CSS -->
    <title>Register Admin</title>
</head>
<body>
    <header>
        <h1>Register Admin</h1>
    </header>

    <!-- Form untuk registrasi admin -->
    <form action="../processes/process_register_admin.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="admin_code">Kode Admin:</label>
        <input type="text" name="admin_code" required>

        <button type="submit">Register Admin</button>
    </form>

    <!-- Tombol Kembali ke Beranda -->
    <p><a href="../index.php">Kembali ke Beranda</a></p>
</body>
</html>

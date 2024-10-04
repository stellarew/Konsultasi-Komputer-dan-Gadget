<?php
session_start();
include('../config.php'); // Pastikan path ini benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Proses registrasi
    // Contoh query untuk memasukkan data ke database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    
    if (mysqli_query($conn, $query)) {
        // Jika pendaftaran berhasil, tampilkan pesan sukses
        echo "<h1>Registrasi Berhasil!</h1>";
        echo "<p>Anda akan diarahkan ke halaman login dalam <span id='countdown'>5</span> detik.</p>";
        echo "<p><a href='../index.php'>Kembali ke Beranda</a></p>";

        // Tambahkan script countdown
        echo "
        <script>
            let countdown = 5;
            const countdownElement = document.getElementById('countdown');
            
            const interval = setInterval(() => {
                countdown--;
                countdownElement.innerText = countdown;

                if (countdown <= 0) {
                    clearInterval(interval);
                    window.location.href = '../login.php'; // Arahkan ke halaman login
                }
            }, 1000);
        </script>
        ";
    } else {
        // Jika pendaftaran gagal, tampilkan pesan kesalahan
        echo "<h1>Registrasi Gagal!</h1>";
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
} else {
    // Jika bukan metode POST, arahkan kembali ke form pendaftaran
    header("Location: register.html");
    exit();
}

// Tutup koneksi
mysqli_close($conn);
?>

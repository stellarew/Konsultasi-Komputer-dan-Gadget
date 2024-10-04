<?php
session_start();
include('../config.php');

// Kode khusus untuk menjadi admin
$admin_code_db = 'babi99'; // Kode admin yang valid

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    $admin_code = $_POST['admin_code'];

    // Cek apakah kode admin yang dimasukkan benar
    if ($admin_code === $admin_code_db) {
        // Query untuk memasukkan data admin ke tabel `admins`
        $query = "INSERT INTO admins (username, password, admin_code) VALUES ('$username', '$password', '$admin_code')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION['registration_successful'] = true; // Simpan status berhasil di session
            header("Refresh: 5; url=../login.php"); // Countdown 5 detik sebelum diarahkan ke login
            echo "<h2>Admin berhasil terdaftar!</h2>";
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
            </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Kode admin tidak valid!";
    }
}
?>

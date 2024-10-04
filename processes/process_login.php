<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username ada di tabel admins
    $admin_query = "SELECT * FROM admins WHERE username = '$username'";
    $admin_result = $conn->query($admin_query);

    // Jika username ada di tabel admins, gunakan data dari tabel admins
    if ($admin_result->num_rows > 0) {
        $admin = $admin_result->fetch_assoc();
        // Verifikasi password untuk admin
        if (password_verify($password, $admin['password'])) {
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = 'admin';
            header("Location: ../dashboards/admin_dashboard.php");
            exit(); // Keluar setelah header untuk menghindari eksekusi lebih lanjut
        } else {
            echo "Username atau password salah!";
        }
    } else {
        // Jika tidak ada di tabel admins, cek tabel users
        $user_query = "SELECT * FROM users WHERE username = '$username'";
        $user_result = $conn->query($user_query);

        // Jika username ada di tabel users, gunakan data dari tabel users
        if ($user_result->num_rows > 0) {
            $user = $user_result->fetch_assoc();
            // Verifikasi password untuk user
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = 'customer';
                header("Location: ../dashboards/customer_dashboard.php");
                exit();
            } else {
                echo "Username atau password salah!";
            }
        } else {
            echo "Username atau password salah!";
        }
    }
}
?>

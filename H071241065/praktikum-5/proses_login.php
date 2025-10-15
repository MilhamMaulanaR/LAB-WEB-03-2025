<?php
session_start();
include 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cari user berdasarkan username
    $foundUser = null;
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            $foundUser = $user;
            break;
        }
    }

    if ($foundUser && password_verify($password, $foundUser['password'])) {
        // Login berhasil
        $_SESSION['user'] = $foundUser;
        header('Location: dashboard.php');
        exit;
    } else {
        // Login gagal
        $_SESSION['error'] = 'Username atau password salah!';
        header('Location: login.php');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
?>
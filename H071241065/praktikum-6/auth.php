<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserRole() {
    return $_SESSION['role'] ?? null;
}

function getUserId() {
    return $_SESSION['user_id'] ?? null;
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function checkRole($allowedRoles) {
    $role = getUserRole();
    if (!in_array($role, $allowedRoles)) {
        header('Location: dashboard.php');  // Redirect ke dashboard jika akses ditolak
        exit;
    }
}
?>
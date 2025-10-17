<?php
session_start();
require_once 'data.php';

// Proteksi halaman - cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$currentUser = $_SESSION['user'];
$isAdmin = ($currentUser['username'] === 'adminxxx');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Login Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar h1 {
            font-size: 20px;
            margin: 0;
        }
        
        .btn-logout {
            background-color: white;
            color: #007bff;
            padding: 8px 15px;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }
        
        .btn-logout:hover {
            background-color: #f0f0f0;
        }
        
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 20px;
        }
        
        .welcome-box {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .welcome-box h2 {
            color: #333;
            margin: 0 0 10px 0;
        }
        
        .welcome-box p {
            color: #666;
            margin: 0;
        }
        
        .content-box {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
        }
        
        .content-box h3 {
            color: #333;
            margin: 0 0 15px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #007bff;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .user-info {
            border: 1px solid #ddd;
        }
        
        .info-item {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            display: flex;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-item strong {
            width: 150px;
            color: #333;
        }
        
        .info-item span {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Dashboard Sistem</h1>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
    
    <div class="container">
        <div class="welcome-box">
            <?php if ($isAdmin): ?>
                <h2>Selamat Datang, Admin!</h2>
                <p>Anda memiliki akses penuh untuk melihat semua data pengguna.</p>
            <?php else: ?>
                <h2>Selamat Datang, <?php echo htmlspecialchars($currentUser['name']); ?>!</h2>
                <p>Berikut adalah informasi profil Anda.</p>
            <?php endif; ?>
        </div>
        
        <div class="content-box">
            <?php if ($isAdmin): ?>
                <h3>Data Semua Pengguna</h3>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Fakultas</th>
                            <th>Angkatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($users as $user): 
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo isset($user['gender']) ? htmlspecialchars($user['gender']) : '-'; ?></td>
                                <td><?php echo isset($user['faculty']) ? htmlspecialchars($user['faculty']) : '-'; ?></td>
                                <td><?php echo isset($user['batch']) ? htmlspecialchars($user['batch']) : '-'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h3>Profil Saya</h3>
                <div class="user-info">
                    <div class="info-item">
                        <strong>Nama Lengkap:</strong>
                        <span><?php echo htmlspecialchars($currentUser['name']); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Username:</strong>
                        <span><?php echo htmlspecialchars($currentUser['username']); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Email:</strong>
                        <span><?php echo htmlspecialchars($currentUser['email']); ?></span>
                    </div>
                    <?php if (isset($currentUser['gender'])): ?>
                    <div class="info-item">
                        <strong>Jenis Kelamin:</strong>
                        <span><?php echo htmlspecialchars($currentUser['gender']); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($currentUser['faculty'])): ?>
                    <div class="info-item">
                        <strong>Fakultas:</strong>
                        <span><?php echo htmlspecialchars($currentUser['faculty']); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($currentUser['batch'])): ?>
                    <div class="info-item">
                        <strong>Angkatan:</strong>
                        <span><?php echo htmlspecialchars($currentUser['batch']); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
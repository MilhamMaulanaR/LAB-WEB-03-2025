<?php
session_start();
include 'data.php';

// Jika belum login, redirect ke login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
$isAdmin = $user['username'] === 'adminxxx';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-5">
    <div class="bg-white p-5 rounded-lg shadow-md max-w-4xl mx-auto">
        <?php if ($isAdmin): ?>
            <h1 class="text-blue-600 text-3xl font-bold mb-4">Selamat Datang, Admin!</h1>
            <h2 class="text-xl font-semibold mb-4">Data Semua Pengguna</h2>
            <table class="w-full border-collapse mt-5">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2 text-left bg-gray-200">Nama</th>
                        <th class="border border-gray-300 p-2 text-left bg-gray-200">Username</th>
                        <th class="border border-gray-300 p-2 text-left bg-gray-200">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td class="border border-gray-300 p-2"><?php echo $u['name']; ?></td>
                            <td class="border border-gray-300 p-2"><?php echo $u['username']; ?></td>
                            <td class="border border-gray-300 p-2"><?php echo $u['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h1 class="text-blue-600 text-3xl font-bold mb-4">Selamat Datang, <?php echo $user['name']; ?>!</h1>
            <h2 class="text-xl font-semibold mb-4">Data Anda</h2>
            <table class="w-full border-collapse mt-5">
                <tbody>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold w-1/3">Nama Anda</td>
                        <td class="border border-gray-300 p-2"><?php echo $user['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Username</td>
                        <td class="border border-gray-300 p-2"><?php echo $user['username']; ?></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Email</td>
                        <td class="border border-gray-300 p-2"><?php echo $user['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Gender</td>
                        <td class="border border-gray-300 p-2"><?php echo $user['gender']; ?></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Fakultas</td>
                        <td class="border border-gray-300 p-2"><?php echo $user['faculty']; ?></td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 p-2 font-bold">Angkatan</td>
                        <td class="border border-gray-300 p-2"><?php echo $user['batch']; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
        
        <div class="mt-5 text-right">
            <a href="logout.php" class="text-red-500 hover:underline">Logout</a>
        </div>
    </div>
</body>
</html>
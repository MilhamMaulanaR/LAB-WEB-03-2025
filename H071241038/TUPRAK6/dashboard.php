<?php
require_once 'config.php';
require_login();

$user_role = $_SESSION['role'] ?? 'guest';
$username = $_SESSION['username'] ?? 'Pengguna';

const ROLE_SUPER_ADMIN = 'super_admin';
const ROLE_PROJECT_MANAGER = 'project_manager';
const ROLE_MEMBER = 'member';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Project Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn {
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <?php include 'partials/header.php'; ?>

    <main class="flex-grow p-8 container mx-auto">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
            Selamat Datang, <?= htmlspecialchars($username) ?>!
        </h1>
        <p class="text-lg text-gray-600 mb-6">
            Anda login sebagai 
            <span class="font-semibold text-xl <?= 
                ($user_role === ROLE_SUPER_ADMIN) ? 'text-red-600' : 
                (($user_role === ROLE_PROJECT_MANAGER) ? 'text-green-600' : 'text-blue-600') 
            ?>">
                <?= htmlspecialchars(str_replace('_', ' ', $user_role)) ?>
            </span>.
        </p>

        <h2 class="text-2xl font-semibold mt-8 mb-4 border-b pb-2 text-gray-700">Akses Cepat</h2>

        <div class="mt-6 flex flex-wrap gap-4">
            
            <?php?>
            <?php if ($user_role === ROLE_SUPER_ADMIN): ?>
                <a href="users/index.php" class="btn bg-blue-600 text-white py-3 px-6 rounded-lg font-medium shadow-md">
                    Kelola Users
                </a>
            <?php endif; ?>

            <?php  ?>
            <?php if (in_array($user_role, [ROLE_SUPER_ADMIN, ROLE_PROJECT_MANAGER])): ?>
                <a href="projects/index.php" class="btn bg-green-600 text-white py-3 px-6 rounded-lg font-medium shadow-md">
                    Kelola Proyek
                </a>
            <?php endif; ?>

            <?php ?>
            <?php if (in_array($user_role, [ROLE_SUPER_ADMIN, ROLE_PROJECT_MANAGER, ROLE_MEMBER])): ?>
                <a href="tasks/index.php" class="btn bg-yellow-600 text-white py-3 px-6 rounded-lg font-medium shadow-md">
                    Lihat Tugas Saya
                </a>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'partials/footer.php'; ?>
</body>
</html>
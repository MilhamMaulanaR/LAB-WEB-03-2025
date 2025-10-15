<?php
session_start();

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}

// Cek pesan error
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen flex justify-center items-center">
    <div class="flex items-center flex-col gap-4 justify-center border w-md border-slate-300 rounded-lg p-12 shadow-lg">
        <h2 class="text-2xl font-bold">Silakan Login</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="proses_login.php" method="POST" class="flex flex-col w-full gap-4 justify-center">
            <div class="flex flex-col w-full">
              <label for="username">Username</label>
            <input type="text" id="username" name="username" class="py-2 px-4 w-full rounded border border-slate-300" required>
            </div>
            
            <div class="flex flex-col w-full">
              <label for="password">Password</label>
            <input type="password" id="password" name="password" class="py-2 px-4 w-full rounded border border-slate-300" required>
            </div>
            
            <button type="submit" class="w-full py-2 rounded-lg bg-teal-500 cursor-pointer" >Login</button>
        </form>
    </div>
</body>
</html>
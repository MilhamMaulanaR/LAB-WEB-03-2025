<!-- dashboard.php (Dashboard dengan bonus fitur) -->
<?php
include 'config.php';
include 'auth.php';
redirectIfNotLoggedIn();

$role = getUserRole();
$userId = getUserId();

// Hitung statistik untuk dashboard
$totalProjects = 0;
$totalTasks = 0;
$completedTasks = 0;

if ($role == 'super_admin') {
    $totalProjects = $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();
    $totalTasks = $pdo->query("SELECT COUNT(*) FROM tasks")->fetchColumn();
    $completedTasks = $pdo->query("SELECT COUNT(*) FROM tasks WHERE status = 'selesai'")->fetchColumn();
} elseif ($role == 'project_manager') {
    $totalProjects = $pdo->prepare("SELECT COUNT(*) FROM projects WHERE manager_id = ?");
    $totalProjects->execute([$userId]);
    $totalProjects = $totalProjects->fetchColumn();

    $totalTasks = $pdo->prepare("SELECT COUNT(*) FROM tasks t JOIN projects p ON t.project_id = p.id WHERE p.manager_id = ?");
    $totalTasks->execute([$userId]);
    $totalTasks = $totalTasks->fetchColumn();

    $completedTasks = $pdo->prepare("SELECT COUNT(*) FROM tasks t JOIN projects p ON t.project_id = p.id WHERE p.manager_id = ? AND t.status = 'selesai'");
    $completedTasks->execute([$userId]);
    $completedTasks = $completedTasks->fetchColumn();
} elseif ($role == 'team_member') {
    $totalProjects = $pdo->prepare("SELECT COUNT(DISTINCT p.id) FROM projects p JOIN tasks t ON p.id = t.project_id WHERE t.assigned_to = ?");
    $totalProjects->execute([$userId]);
    $totalProjects = $totalProjects->fetchColumn();

    $totalTasks = $pdo->prepare("SELECT COUNT(*) FROM tasks WHERE assigned_to = ?");
    $totalTasks->execute([$userId]);
    $totalTasks = $totalTasks->fetchColumn();

    $completedTasks = $pdo->prepare("SELECT COUNT(*) FROM tasks WHERE assigned_to = ? AND status = 'selesai'");
    $completedTasks->execute([$userId]);
    $completedTasks = $completedTasks->fetchColumn();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
  <nav class="bg-blue-500 p-4 text-white flex justify-between">
    <h1 class="text-xl font-bold">Manajemen Proyek</h1>
    <a href="logout.php" class="hover:underline">Logout</a>
  </nav>
  <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
      <div class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Total Proyek</h3>
        <p class="text-3xl"><?php echo $totalProjects; ?></p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Total Tugas</h3>
        <p class="text-3xl"><?php echo $totalTasks; ?></p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold">Tugas Selesai</h3>
        <p class="text-3xl"><?php echo $completedTasks; ?></p>
      </div>
    </div>

    <?php if ($role == 'super_admin'): ?>
    <a href="users.php" class="bg-blue-500 text-white p-2 rounded mb-4 inline-block">Kelola Users</a>
    <a href="projects.php" class="bg-blue-500 text-white p-2 rounded mb-4 inline-block">Lihat Semua Proyek</a>
    <?php elseif ($role == 'project_manager'): ?>
    <a href="projects.php" class="bg-blue-500 text-white p-2 rounded mb-4 inline-block">Kelola Proyek</a>
    <?php elseif ($role == 'team_member'): ?>
    <a href="tasks.php" class="bg-blue-500 text-white p-2 rounded mb-4 inline-block">Lihat Tugas Saya</a>
    <?php endif; ?>
  </div>
</body>

</html>
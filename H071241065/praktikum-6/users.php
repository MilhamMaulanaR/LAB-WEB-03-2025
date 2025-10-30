<!-- users.php (Untuk Super Admin: CRUD Users) -->
<?php
include 'config.php';
include 'auth.php';
redirectIfNotLoggedIn();
checkRole(['super_admin']);

// Fetch all users
$users = $pdo->query("SELECT u.id, u.username, u.role, pm.username as pm_username FROM users u LEFT JOIN users pm ON u.project_manager_id = pm.id")->fetchAll();

// Fetch project managers for dropdown
$projectManagers = $pdo->query("SELECT id, username FROM users WHERE role = 'project_manager'")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $pm_id = ($role == 'team_member') ? $_POST['project_manager_id'] : null;

        $stmt = $pdo->prepare("INSERT INTO users (username, password, role, project_manager_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $password, $role, $pm_id]);
        header('Location: users.php');
        exit;
    } elseif (isset($_POST['delete_user'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: users.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Users</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
  <nav class="bg-blue-500 p-4 text-white">
    <a href="dashboard.php" class="hover:underline">Kembali ke Dashboard</a>
  </nav>
  <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Kelola Users</h2>

    <!-- Form Tambah User -->
    <form action="" method="POST" class="bg-white p-4 rounded shadow mb-6">
      <input type="hidden" name="add_user" value="1">
      <div class="mb-4">
        <label class="block text-sm font-medium">Username</label>
        <input type="text" name="username" class="mt-1 p-2 w-full border rounded" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password" class="mt-1 p-2 w-full border rounded" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium">Role</label>
        <select name="role" id="role" class="mt-1 p-2 w-full border rounded" required>
          <option value="project_manager">Project Manager</option>
          <option value="team_member">Team Member</option>
        </select>
      </div>
      <div id="pm_select" class="mb-4 hidden">
        <label class="block text-sm font-medium">Project Manager</label>
        <select name="project_manager_id" class="mt-1 p-2 w-full border rounded">
          <?php foreach ($projectManagers as $pm): ?>
          <option value="<?php echo $pm['id']; ?>"><?php echo $pm['username']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="bg-green-500 text-white p-2 rounded">Tambah User</button>
    </form>

    <!-- Daftar Users -->
    <table class="w-full bg-white rounded shadow">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2">ID</th>
          <th class="p-2">Username</th>
          <th class="p-2">Role</th>
          <th class="p-2">Project Manager</th>
          <th class="p-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): if ($user['role'] != 'super_admin'): ?>
        <tr>
          <td class="p-2"><?php echo $user['id']; ?></td>
          <td class="p-2"><?php echo $user['username']; ?></td>
          <td class="p-2"><?php echo $user['role']; ?></td>
          <td class="p-2"><?php echo $user['pm_username'] ?? '-'; ?></td>
          <td class="p-2">
            <form action="" method="POST" class="inline">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <input type="hidden" name="delete_user" value="1">
              <button type="submit" class="bg-red-500 text-white p-1 rounded">Hapus</button>
            </form>
          </td>
        </tr>
        <?php endif; endforeach; ?>
      </tbody>
    </table>
  </div>
  <script>
  document.getElementById('role').addEventListener('change', function() {
    document.getElementById('pm_select').classList.toggle('hidden', this.value !== 'team_member');
  });
  </script>
</body>

</html>
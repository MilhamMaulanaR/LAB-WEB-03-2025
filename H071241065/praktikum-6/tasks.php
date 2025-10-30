<!-- tasks.php (CRUD Tasks, dengan ?project_id= untuk PM/Super, tanpa untuk Team) -->
<?php
include 'config.php';
include 'auth.php';
redirectIfNotLoggedIn();

$role = getUserRole();
$userId = getUserId();

$projectId = $_GET['project_id'] ?? null;

// Validasi akses
if ($role == 'team_member') {
    // Team member lihat tugas sendiri
    $stmt = $pdo->prepare("SELECT t.*, p.nama_proyek FROM tasks t JOIN projects p ON t.project_id = p.id WHERE t.assigned_to = ?");
    $stmt->execute([$userId]);
    $tasks = $stmt->fetchAll();
} else {
    if (!$projectId) {
        header('Location: projects.php');
        exit;
    }

    // Check ownership for PM
    if ($role == 'project_manager') {
        $check = $pdo->prepare("SELECT manager_id FROM projects WHERE id = ?");
        $check->execute([$projectId]);
        if ($check->fetchColumn() != $userId) {
            header('Location: projects.php');
            exit;
        }
    }

    // Super Admin can view any project tasks
    $stmt = $pdo->prepare("SELECT t.*, u.username as assigned_username FROM tasks t JOIN users u ON t.assigned_to = u.id WHERE t.project_id = ?");
    $stmt->execute([$projectId]);
    $tasks = $stmt->fetchAll();
}

// Fetch team members for assignment (untuk PM only)
if ($role == 'project_manager') {
    $stmt = $pdo->prepare("SELECT id, username FROM users WHERE role = 'team_member' AND project_manager_id = (SELECT manager_id FROM projects WHERE id = ?)");
    $stmt->execute([$projectId]);
    $teamMembers = $stmt->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_task']) && $role == 'project_manager') {
        $nama = $_POST['nama_tugas'];
        $deskripsi = $_POST['deskripsi'];
        $assigned_to = $_POST['assigned_to'];

        $stmt = $pdo->prepare("INSERT INTO tasks (nama_tugas, deskripsi, project_id, assigned_to) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nama, $deskripsi, $projectId, $assigned_to]);
        header("Location: tasks.php?project_id=$projectId");
        exit;
    } elseif (isset($_POST['update_task'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Validasi: Team member hanya update status tugas sendiri
        if ($role == 'team_member') {
            $check = $pdo->prepare("SELECT assigned_to FROM tasks WHERE id = ?");
            $check->execute([$id]);
            if ($check->fetchColumn() != $userId) {
                header('Location: tasks.php');
                exit;
            }
            $stmt = $pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
        } elseif ($role == 'project_manager') {
            // PM bisa update full
            $nama = $_POST['nama_tugas'];
            $deskripsi = $_POST['deskripsi'];
            $assigned_to = $_POST['assigned_to'];

            $stmt = $pdo->prepare("UPDATE tasks SET nama_tugas = ?, deskripsi = ?, assigned_to = ?, status = ? WHERE id = ?");
            $stmt->execute([$nama, $deskripsi, $assigned_to, $status, $id]);
        } // Super Admin tidak bisa update

        header($role == 'team_member' ? 'Location: tasks.php' : "Location: tasks.php?project_id=$projectId");
        exit;
    } elseif (isset($_POST['delete_task']) && $role == 'project_manager') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: tasks.php?project_id=$projectId");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Tugas</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
  <nav class="bg-blue-500 p-4 text-white">
    <a href="<?php echo $role == 'team_member' ? 'dashboard.php' : 'projects.php'; ?>"
      class="hover:underline">Kembali</a>
  </nav>
  <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Kelola Tugas
      <?php if ($role != 'team_member') echo "untuk Proyek ID $projectId"; ?></h2>

    <?php if ($role == 'project_manager'): ?>
    <!-- Form Tambah Tugas -->
    <form action="" method="POST" class="bg-white p-4 rounded shadow mb-6">
      <input type="hidden" name="add_task" value="1">
      <div class="mb-4">
        <label class="block text-sm font-medium">Nama Tugas</label>
        <input type="text" name="nama_tugas" class="mt-1 p-2 w-full border rounded" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium">Deskripsi</label>
        <textarea name="deskripsi" class="mt-1 p-2 w-full border rounded"></textarea>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium">Assigned To</label>
        <select name="assigned_to" class="mt-1 p-2 w-full border rounded" required>
          <?php foreach ($teamMembers as $member): ?>
          <option value="<?php echo $member['id']; ?>"><?php echo $member['username']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="bg-green-500 text-white p-2 rounded">Tambah Tugas</button>
    </form>
    <?php endif; ?>

    <!-- Daftar Tugas -->
    <table class="w-full bg-white rounded shadow">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2">ID</th>
          <th class="p-2">Nama Tugas</th>
          <th class="p-2">Deskripsi</th>
          <th class="p-2">Status</th>
          <?php if ($role != 'team_member'): ?>
          <th class="p-2">Assigned To</th>
          <?php endif; ?>
          <?php if ($role == 'team_member'): ?>
          <th class="p-2">Proyek</th>
          <?php endif; ?>
          <th class="p-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr class="text-center">
          <td class="p-2"><?php echo $task['id']; ?></td>
          <td class="p-2"><?php echo $task['nama_tugas']; ?></td>
          <td class="p-2"><?php echo substr($task['deskripsi'], 0, 50) . '...'; ?></td>
          <td class="p-2"><?php echo $task['status']; ?></td>
          <?php if ($role != 'team_member'): ?>
          <td class="p-2"><?php echo $task['assigned_username'] ?? '-'; ?></td>
          <?php endif; ?>
          <?php if ($role == 'team_member'): ?>
          <td class="p-2"><?php echo $task['nama_proyek']; ?></td>
          <?php endif; ?>
          <td class="p-2">
            <?php if ($role == 'project_manager' || $role == 'team_member'): ?>
            <!-- Form Update -->
            <button onclick="document.getElementById('edit-task-<?php echo $task['id']; ?>').classList.toggle('hidden')"
              class="bg-yellow-500 text-white p-1 rounded">Edit</button>
            <div id="edit-task-<?php echo $task['id']; ?>" class=" hidden mt-2">
              <form action="" method="POST">
                <input type="hidden" name="update_task" value="1">
                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                <?php if ($role == 'project_manager'): ?>
                <input type="text" name="nama_tugas" value="<?php echo $task['nama_tugas']; ?>"
                  class="p-1 border rounded mb-1 w-full" required>
                <textarea name="deskripsi"
                  class="p-1 border rounded mb-1 w-full"><?php echo $task['deskripsi']; ?></textarea>
                <select name="assigned_to" class="p-1 border rounded mb-1 w-full">
                  <?php foreach ($teamMembers as $member): ?>
                  <option value="<?php echo $member['id']; ?>"
                    <?php if ($member['id'] == $task['assigned_to']) echo 'selected'; ?>>
                    <?php echo $member['username']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?php endif; ?>
                <select name="status" class="p-1 border rounded mb-1 w-full">
                  <option value="belum" <?php if ($task['status'] == 'belum') echo 'selected'; ?>>Belum</option>
                  <option value="proses" <?php if ($task['status'] == 'proses') echo 'selected'; ?>>Proses</option>
                  <option value="selesai" <?php if ($task['status'] == 'selesai') echo 'selected'; ?>>Selesai</option>
                </select>
                <button type="submit" class="bg-green-500 text-white p-1 rounded">Update</button>
              </form>
            </div>
            <?php endif; ?>
            <?php if ($role == 'project_manager'): ?>
            <form action="" method="POST" class="inline">
              <input type="hidden" name="delete_task" value="1">
              <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
              <button type="submit" class="bg-red-500 text-white p-1 rounded">Hapus</button>
            </form>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>
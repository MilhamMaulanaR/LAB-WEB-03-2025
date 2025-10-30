<!-- projects.php (CRUD Projects) -->
<?php
include 'config.php';
include 'auth.php';
redirectIfNotLoggedIn();

$role = getUserRole();
$userId = getUserId();

if ($role == 'team_member') {
    header('Location: dashboard.php');  // Team member tidak boleh akses projects CRUD
    exit;
}

// Fetch projects
if ($role == 'super_admin') {
    $projects = $pdo->query("SELECT p.*, u.username as manager_username FROM projects p JOIN users u ON p.manager_id = u.id")->fetchAll();
} elseif ($role == 'project_manager') {
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE manager_id = ?");
    $stmt->execute([$userId]);
    $projects = $stmt->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_project']) && $role == 'project_manager') {
        $nama = $_POST['nama_proyek'];
        $deskripsi = $_POST['deskripsi'];
        $mulai = $_POST['tanggal_mulai'];
        $selesai = $_POST['tanggal_selesai'];
        $manager_id = $userId;

        $stmt = $pdo->prepare("INSERT INTO projects (nama_proyek, deskripsi, tanggal_mulai, tanggal_selesai, manager_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nama, $deskripsi, $mulai, $selesai, $manager_id]);
        header('Location: projects.php');
        exit;
    } elseif (isset($_POST['update_project']) && $role == 'project_manager') {
        $id = $_POST['id'];
        $nama = $_POST['nama_proyek'];
        $deskripsi = $_POST['deskripsi'];
        $mulai = $_POST['tanggal_mulai'];
        $selesai = $_POST['tanggal_selesai'];

        // Check ownership
        $check = $pdo->prepare("SELECT manager_id FROM projects WHERE id = ?");
        $check->execute([$id]);
        if ($check->fetchColumn() != $userId) {
            header('Location: projects.php');
            exit;
        }

        $stmt = $pdo->prepare("UPDATE projects SET nama_proyek = ?, deskripsi = ?, tanggal_mulai = ?, tanggal_selesai = ? WHERE id = ?");
        $stmt->execute([$nama, $deskripsi, $mulai, $selesai, $id]);
        header('Location: projects.php');
        exit;
    } elseif (isset($_POST['delete_project'])) {
        $id = $_POST['id'];

        if ($role == 'project_manager') {
            $check = $pdo->prepare("SELECT manager_id FROM projects WHERE id = ?");
            $check->execute([$id]);
            if ($check->fetchColumn() != $userId) {
                header('Location: projects.php');
                exit;
            }
        } // Super Admin can delete any

        $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: projects.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Proyek</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
  <nav class="bg-blue-500 p-4 text-white">
    <a href="dashboard.php" class="hover:underline">Kembali ke Dashboard</a>
  </nav>
  <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Kelola Proyek</h2>

    <?php if ($role == 'project_manager'): ?>
    <!-- Form Tambah Proyek -->
    <form action="" method="POST" class="bg-white p-4 rounded shadow mb-6">
      <input type="hidden" name="add_project" value="1">
      <div class="mb-4">
        <label class="block text-sm font-medium">Nama Proyek</label>
        <input type="text" name="nama_proyek" class="mt-1 p-2 w-full border rounded" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium">Deskripsi</label>
        <textarea name="deskripsi" class="mt-1 p-2 w-full border rounded"></textarea>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="mt-1 p-2 w-full border rounded" required>
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium">Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="mt-1 p-2 w-full border rounded" required>
      </div>
      <button type="submit" class="bg-green-500 text-white p-2 rounded">Tambah Proyek</button>
    </form>
    <?php endif; ?>

    <!-- Daftar Proyek -->
    <table class="w-full bg-white rounded shadow">
      <thead>
        <tr class="bg-gray-200">
          <th class="p-2">ID</th>
          <th class="p-2">Nama Proyek</th>
          <th class="p-2">Deskripsi</th>
          <th class="p-2">Mulai</th>
          <th class="p-2">Selesai</th>
          <?php if ($role == 'super_admin'): ?>
          <th class="p-2">Manager</th>
          <?php endif; ?>
          <th class="p-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($projects as $project): ?>
        <tr>
          <td class="p-2"><?php echo $project['id']; ?></td>
          <td class="p-2"><?php echo $project['nama_proyek']; ?></td>
          <td class="p-2"><?php echo substr($project['deskripsi'], 0, 50) . '...'; ?></td>
          <td class="p-2"><?php echo $project['tanggal_mulai']; ?></td>
          <td class="p-2"><?php echo $project['tanggal_selesai']; ?></td>
          <?php if ($role == 'super_admin'): ?>
          <td class="p-2"><?php echo $project['manager_username']; ?></td>
          <?php endif; ?>
          <td class="p-2">
            <a href="tasks.php?project_id=<?php echo $project['id']; ?>"
              class="bg-blue-500 text-white p-1 rounded">Lihat Tugas</a>
            <?php if ($role == 'project_manager'): ?>
            <!-- Form Edit (Modal sederhana dengan form inline) -->
            <button onclick="document.getElementById('edit-<?php echo $project['id']; ?>').classList.toggle('hidden')"
              class="bg-yellow-500 text-white p-1 rounded">Edit</button>
            <div id="edit-<?php echo $project['id']; ?>" class="hidden mt-2">
              <form action="" method="POST">
                <input type="hidden" name="update_project" value="1">
                <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                <input type="text" name="nama_proyek" value="<?php echo $project['nama_proyek']; ?>"
                  class="p-1 border rounded mb-1 w-full" required>
                <textarea name="deskripsi"
                  class="p-1 border rounded mb-1 w-full"><?php echo $project['deskripsi']; ?></textarea>
                <input type="date" name="tanggal_mulai" value="<?php echo $project['tanggal_mulai']; ?>"
                  class="p-1 border rounded mb-1 w-full" required>
                <input type="date" name="tanggal_selesai" value="<?php echo $project['tanggal_selesai']; ?>"
                  class="p-1 border rounded mb-1 w-full" required>
                <button type="submit" class="bg-green-500 text-white p-1 rounded">Update</button>
              </form>
            </div>
            <?php endif; ?>
            <form action="" method="POST" class="inline">
              <input type="hidden" name="delete_project" value="1">
              <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
              <button type="submit" class="bg-red-500 text-white p-1 rounded">Hapus</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>
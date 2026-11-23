<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// Data demo (biasanya diambil dari database berdasarkan $id)
$demoUser = [
    'id' => $id,
    'nama' => 'Ahmad Rizki',
    'email' => 'ahmad@example.com',
    'role' => 'Admin',
];
?>

<section class="content">
    <h2>Edit Pengguna #<?php echo e((string)$id); ?></h2>

    <form method="post" action="" class="form-box">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required value="<?php echo e($demoUser['nama']); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="<?php echo e($demoUser['email']); ?>">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="User" <?php echo $demoUser['role'] === 'User' ? 'selected' : ''; ?>>User</option>
                <option value="Editor" <?php echo $demoUser['role'] === 'Editor' ? 'selected' : ''; ?>>Editor</option>
                <option value="Admin" <?php echo $demoUser['role'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn">Update</button>
        <a href="index.php?page=user/list" class="btn btn-secondary">Batal</a>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama  = trim($_POST['nama'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if ($nama && validasiEmail($email)) {
            echo tampilkanPesan("Data pengguna berhasil diperbarui (demo).", 'success');
        } else {
            echo tampilkanPesan("Data tidak valid.", 'error');
        }
    }
    ?>
</section>

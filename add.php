
<?php
$pesan = '';
$berhasil = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = $_POST['role'] ?? 'User';

    if ($nama !== '' && validasiEmail($email)) {

        // Membuat ID pengguna baru
        $ids = array_column($_SESSION['users'], 'id');
        $idBaru = empty($ids) ? 1 : max($ids) + 1;

        // Menyimpan data pengguna
        $_SESSION['users'][] = [
            'id' => $idBaru,
            'nama' => $nama,
            'email' => $email,
            'role' => $role
        ];

        $pesan = 'Pengguna berhasil ditambahkan!';
        $berhasil = true;

    } else {
        $pesan = 'Nama atau email tidak valid!';
    }
}
?>

<section class="content">

    <h2>Tambah Pengguna</h2>

    <?php if ($pesan !== ''): ?>
        <?php echo tampilkanPesan($pesan, $berhasil ? 'success' : 'error'); ?>
    <?php endif; ?>

    <form method="POST" action="index.php?page=user/add" class="form-box">

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama"
                   placeholder="Masukkan nama" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   placeholder="contoh@email.com" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="User">User</option>
                <option value="Editor">Editor</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn">Simpan</button>

        <a href="index.php?page=user/list"
           class="btn btn-secondary">Batal</a>

    </form>

    <?php if ($berhasil): ?>
        <br>
        <a href="index.php?page=user/list" class="btn">
            Lihat Data User
        </a>
    <?php endif; ?>

</section>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
?>

<section class="content">
    <h2>Hapus Pengguna</h2>

    <?php if ($id > 0): ?>
        <p>Anda akan menghapus pengguna dengan ID: <strong><?php echo e((string)$id); ?></strong></p>
        <p style="color:#dc3545;"><strong>Catatan keamanan:</strong> Penghapusan data sebaiknya dilakukan melalui metode POST + konfirmasi, bukan hanya GET.</p>

        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="confirm" value="1" class="btn" style="background:#dc3545;">Ya, Hapus</button>
            <a href="index.php?page=user/list" class="btn btn-secondary">Batal</a>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
            // Di aplikasi nyata: DELETE FROM users WHERE id = ?
            echo tampilkanPesan("Pengguna ID " . e((string)$id) . " berhasil dihapus (demo).", 'success');
            echo '<p><a href="index.php?page=user/list">Kembali ke daftar</a></p>';
        }
        ?>
    <?php else: ?>
        <p>ID pengguna tidak valid.</p>
        <a href="index.php?page=user/list" class="btn">Kembali</a>
    <?php endif; ?>
</section>

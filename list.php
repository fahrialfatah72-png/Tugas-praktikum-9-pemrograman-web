
<section class="content">

    <h2>Data Pengguna</h2>

    <p>Daftar seluruh pengguna yang telah ditambahkan.</p>

    <a href="index.php?page=user/add" class="btn">
        + Tambah Pengguna
    </a>

    <table class="data-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php if (empty($_SESSION['users'])): ?>

                <tr>
                    <td colspan="5">Belum ada data pengguna.</td>
                </tr>

            <?php else: ?>

                <?php foreach ($_SESSION['users'] as $user): ?>

                    <tr>
                        <td><?php echo e((string)$user['id']); ?></td>

                        <td><?php echo e($user['nama']); ?></td>

                        <td><?php echo e($user['email']); ?></td>

                        <td><?php echo e($user['role']); ?></td>

                        <td>
                            <a href="index.php?page=user/edit&id=<?php echo (int)$user['id']; ?>">
                                Edit
                            </a>
                            |
                            <a href="index.php?page=user/delete&id=<?php echo (int)$user['id']; ?>">
                                Hapus
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            <?php endif; ?>

        </tbody>

    </table>

</section>

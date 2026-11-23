<section class="content">
    <h2>Kontak</h2>
    <p>Silakan hubungi kami melalui form di bawah ini (demo).</p>

    <form method="post" action="" class="form-box">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required placeholder="Masukkan nama Anda">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="contoh@email.com">
        </div>
        <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea id="pesan" name="pesan" rows="4" required placeholder="Tulis pesan Anda..."></textarea>
        </div>
        <button type="submit" class="btn">Kirim Pesan</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama  = trim($_POST['nama'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pesan = trim($_POST['pesan'] ?? '');

        if ($nama && validasiEmail($email) && $pesan) {
            echo tampilkanPesan("Terima kasih, " . e($nama) . "! Pesan Anda telah diterima (demo).", 'success');
        } else {
            echo tampilkanPesan("Data tidak valid. Pastikan email berformat benar.", 'error');
        }
    }
    ?>
</section>

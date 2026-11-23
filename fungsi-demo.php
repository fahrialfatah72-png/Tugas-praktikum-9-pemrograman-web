<section class="content">
    <h2>Demo Function Helper</h2>
    <p>Halaman ini menampilkan penggunaan function yang ada di <code>helpers/functions.php</code>.</p>

    <h3>1. formatRupiah()</h3>
    <p>Harga: <?php echo formatRupiah(150000); ?></p>
    <p>Harga: <?php echo formatRupiah(2750000); ?></p>

    <h3>2. hitungDiskon()</h3>
    <?php
    $harga = 200000;
    $diskon10 = hitungDiskon($harga);        // default 10%
    $diskon15 = hitungDiskon($harga, 15);
    ?>
    <p>Harga asli: <?php echo formatRupiah($harga); ?></p>
    <p>Diskon 10%: <?php echo formatRupiah($diskon10); ?> → Bayar: <?php echo formatRupiah($harga - $diskon10); ?></p>
    <p>Diskon 15%: <?php echo formatRupiah($diskon15); ?> → Bayar: <?php echo formatRupiah($harga - $diskon15); ?></p>

    <h3>3. validasiEmail()</h3>
    <p>Email "budi@example.com": <?php echo validasiEmail('budi@example.com') ? 'Valid' : 'Tidak valid'; ?></p>
    <p>Email "budi@salah": <?php echo validasiEmail('budi@salah') ? 'Valid' : 'Tidak valid'; ?></p>

    <h3>4. ringkasTeks()</h3>
    <?php
    $teksPanjang = "Modularisasi adalah teknik membagi aplikasi menjadi bagian-bagian yang lebih kecil berdasarkan fungsi atau tanggung jawabnya agar kode lebih mudah dipahami, digunakan kembali, diuji, dan dikembangkan.";
    ?>
    <p>Teks asli (panjang): <?php echo e($teksPanjang); ?></p>
    <p>Setelah diringkas (80 karakter): <?php echo e(ringkasTeks($teksPanjang, 80)); ?></p>

    <h3>5. Function Latihan Tambahan</h3>
    <p>25°C = <?php echo konversiCelciusKeFahrenheit(25); ?>°F</p>
    <p>Nilai 88 → Status: <?php echo tentukanStatusNilai(88); ?></p>
    <p>Total belanja (Rp 50.000 × 3): <?php echo formatRupiah(hitungTotal(50000, 3)); ?></p>
</section>

<section class="content">
    <h2>Dashboard</h2>
    <p>Selamat datang di aplikasi <strong>Lab9Web</strong> — hasil praktik PHP Modular.</p>

    <div class="card-grid">
        <div class="card">
            <h3>Template</h3>
            <p>Header & Footer digunakan bersama oleh semua halaman.</p>
        </div>
        <div class="card">
            <h3>Function Helper</h3>
            <p>Function umum dipisah ke <code>helpers/functions.php</code>.</p>
        </div>
        <div class="card">
            <h3>Routing</h3>
            <p>Semua halaman diakses melalui <code>index.php?page=...</code> dengan whitelist.</p>
        </div>
        <div class="card">
            <h3>Struktur Modular</h3>
            <p>File dikelompokkan: config, views, helpers, modules, assets.</p>
        </div>
    </div>

    <h3 style="margin-top:24px;">Daftar Rute yang Tersedia</h3>
    <ul>
        <li><code>index.php</code> atau <code>?page=dashboard</code> → Dashboard</li>
        <li><code>?page=home</code> → Halaman Home</li>
        <li><code>?page=profil</code> → Profil</li>
        <li><code>?page=kontak</code> → Kontak</li>
        <li><code>?page=user/list</code> → Daftar User</li>
        <li><code>?page=user/add</code> → Tambah User</li>
        <li><code>?page=fungsi-demo</code> → Demo Function Helper</li>
    </ul>
</section>

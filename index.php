
<?php

// ==========================================
// 1. MEMULAI SESSION
// ==========================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ==========================================
// 2. MEMANGGIL FILE HELPER DAN DATABASE
// ==========================================
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/config/database.php';

// ==========================================
// 3. MENYIAPKAN DATA PENGGUNA
// ==========================================
if (!isset($_SESSION['users_fatah_v3'])) {

    $_SESSION['users'] = [
        [
            'id' => 1,
            'nama' => 'Fatah',
            'email' => 'fatah@gmail.com',
            'role' => 'Admin'
        ],
        [
            'id' => 2,
            'nama' => 'Rasya',
            'email' => 'rasya@gmail.com',
            'role' => 'User'
        ],
        [
            'id' => 3,
            'nama' => 'Eren',
            'email' => 'eren@gmail.com',
            'role' => 'User'
        ],
        [
            'id' => 4,
            'nama' => 'Ilham',
            'email' => 'ilham@gmail.com',
            'role' => 'Editor'
        ]
    ];

    $_SESSION['users_fatah_v3'] = true;
}

// ==========================================
// 4. DAFTAR ROUTING HALAMAN
// ==========================================
$routes = [
    'dashboard'   => __DIR__ . '/views/dashboard.php',
    'home'        => __DIR__ . '/views/home.php',
    'profil'      => __DIR__ . '/views/profil.php',
    'kontak'      => __DIR__ . '/views/kontak.php',
    'fungsi-demo' => __DIR__ . '/views/fungsi-demo.php',

    'barang/list'   => __DIR__ . '/modules/barang/list.php',
    'barang/add'    => __DIR__ . '/modules/barang/add.php',
    'barang/edit'   => __DIR__ . '/modules/barang/edit.php',
    'barang/delete' => __DIR__ . '/modules/barang/delete.php',

    'user/list'   => __DIR__ . '/modules/user/list.php',
    'user/add'    => __DIR__ . '/modules/user/add.php',
    'user/edit'   => __DIR__ . '/modules/user/edit.php',
    'user/delete' => __DIR__ . '/modules/user/delete.php',
];

// ==========================================
// 5. MENENTUKAN HALAMAN
// ==========================================
$page = $_GET['page'] ?? 'dashboard';

// ==========================================
// 6. MEMERIKSA ROUTING
// ==========================================
if (!is_string($page) || !array_key_exists($page, $routes)) {

    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';

} else {

    $contentFile = $routes[$page];

}

// ==========================================
// 7. MENAMPILKAN TEMPLATE
// ==========================================
require_once __DIR__ . '/views/header.php';

require $contentFile;

require_once __DIR__ . '/views/footer.php';

?>

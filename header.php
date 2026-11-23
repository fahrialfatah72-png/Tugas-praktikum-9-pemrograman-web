
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab9Web - Aplikasi PHP Modular</title>

    <link rel="stylesheet" href="/praktikum%209%20web/Lab9Web/assets/css/style.css">
</head>

<body>

<div class="container">

    <header>
        <h1>Lab9Web - PHP Modular</h1>
        <p>Praktikum 9: Modularisasi, Function, Template & Routing</p>
    </header>

    <?php
    // Folder utama aplikasi
    $baseUrl = '/praktikum%209%20web/Lab9Web';

    // Mengambil URL halaman saat ini
    $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $requestPath = rawurldecode($requestPath);

    // Menghapus alamat folder utama
    $basePath = rawurldecode($baseUrl);
    $currentPage = trim(substr($requestPath, strlen($basePath)), '/');

    // Mendukung URL lama
    if (isset($_GET['page'])) {
        $currentPage = $_GET['page'];
    }

    // Halaman default
    if ($currentPage === '') {
        $currentPage = 'dashboard';
    }

    // Daftar menu
    $menus = [
        'dashboard'   => 'Dashboard',
        'home'        => 'Home',
        'profil'      => 'Profil',
        'kontak'      => 'Kontak',
        'user/list'   => 'Data User',
        'user/add'    => 'Tambah User',
        'fungsi-demo' => 'Demo Function',
        'barang/list' => 'Data Barang',
    ];
    ?>

    <nav>
        <?php foreach ($menus as $route => $label): ?>

            <a
                href="<?php echo $baseUrl . '/' . $route; ?>"
                class="<?php echo ($currentPage === $route) ? 'active' : ''; ?>"
            >
                <?php echo e($label); ?>
            </a>

        <?php endforeach; ?>
    </nav>

    <main>

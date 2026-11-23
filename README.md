# Lab9Web — Praktikum 9: PHP Modular

Aplikasi web sederhana yang menerapkan **modularisasi program PHP**, meliputi:

- Template layout (header & footer bersama)
- Function helper yang dapat digunakan ulang
- Routing aman berbasis whitelist parameter URL
- Struktur direktori modular (config, views, helpers, modules, assets)

---

## Tujuan Project

1. Memahami pengertian dan manfaat modularisasi program.
2. Membedakan `include`, `require`, `include_once`, dan `require_once`.
3. Membuat template halaman yang digunakan bersama.
4. Membuat dan menggunakan function PHP dengan parameter & return value.
5. Menyusun struktur direktori aplikasi secara modular.
6. Menerapkan routing berdasarkan parameter URL dengan validasi (whitelist).
7. Mengintegrasikan modularisasi ke pola aplikasi database/CRUD.

---

## Kebutuhan Perangkat

- Web server lokal (XAMPP / Laragon / Apache)
- PHP 7.4 atau lebih baru (disarankan PHP 8+)
- Browser modern
- Visual Studio Code (atau editor lain)

---

## Cara Menjalankan Aplikasi

1. Salin folder `Lab9Web` ke dalam document root web server Anda  
   (contoh: `C:\xampp\htdocs\Lab9Web` atau `C:\laragon\www\Lab9Web`).

2. Pastikan Apache dan (opsional) MySQL berjalan.

3. Buka browser dan akses:
   ```
   http://localhost/Lab9Web/
   ```
   atau
   ```
   http://localhost/Lab9Web/index.php
   ```

4. Navigasi antar halaman menggunakan menu di header, atau langsung melalui parameter:
   - `index.php?page=dashboard`
   - `index.php?page=home`
   - `index.php?page=profil`
   - `index.php?page=kontak`
   - `index.php?page=user/list`
   - `index.php?page=user/add`
   - `index.php?page=fungsi-demo`

---

## Struktur Direktori

```
Lab9Web/
├── index.php                 # Router utama (pintu masuk)
├── .htaccess                 # Optional URL rewrite
├── README.md
├── config/
│   └── database.php          # Konfigurasi koneksi database
├── views/
│   ├── header.php            # Template header + navigasi
│   ├── footer.php            # Template footer
│   ├── dashboard.php
│   ├── home.php
│   ├── profil.php
│   ├── kontak.php
│   ├── fungsi-demo.php
│   └── 404.php
├── helpers/
│   └── functions.php         # Kumpulan function helper
├── modules/
│   └── user/
│       ├── list.php
│       ├── add.php
│       ├── edit.php
│       └── delete.php
└── assets/
    ├── css/
    │   └── style.css
    └── js/
```

### Tanggung Jawab Folder

| Folder     | Tanggung Jawab                                      |
|------------|-----------------------------------------------------|
| `index.php`| Titik masuk & router                                |
| `config/`  | Konfigurasi (koneksi database, dll)                 |
| `views/`   | Komponen tampilan bersama (header, footer, halaman) |
| `helpers/` | Function umum yang bisa dipakai banyak modul        |
| `modules/` | Fitur aplikasi dikelompokkan per domain             |
| `assets/`  | File statis (CSS, JS, gambar)                       |

---

## Daftar Rute (Whitelist)

| Parameter `page` | File yang dimuat                    |
|------------------|-------------------------------------|
| `dashboard`      | `views/dashboard.php`               |
| `home`           | `views/home.php`                    |
| `profil`         | `views/profil.php`                  |
| `kontak`         | `views/kontak.php`                  |
| `fungsi-demo`    | `views/fungsi-demo.php`             |
| `user/list`      | `modules/user/list.php`             |
| `user/add`       | `modules/user/add.php`              |
| `user/edit`      | `modules/user/edit.php`             |
| `user/delete`    | `modules/user/delete.php`           |
| *(tidak dikenal)*| `views/404.php` (HTTP 404)          |

**Catatan keamanan:** Input `page` **tidak** langsung digabung menjadi path file. Hanya rute yang terdaftar di array `$routes` yang diizinkan.

---

## Function Helper yang Tersedia

File: `helpers/functions.php`

| Function                        | Keterangan                                      |
|---------------------------------|-------------------------------------------------|
| `formatRupiah($angka)`          | Format angka ke Rupiah                          |
| `hitungDiskon($harga, $persen)` | Hitung nilai diskon (default 10%)               |
| `validasiEmail($email)`         | Validasi format email                           |
| `ringkasTeks($teks, $panjang)`  | Memotong teks panjang                           |
| `e($nilai)`                     | Escape HTML (mencegah XSS)                      |
| `konversiCelciusKeFahrenheit()` | Konversi suhu                                   |
| `tentukanStatusNilai($nilai)`   | Predikat nilai (A–E)                            |
| `hitungTotal($harga, $jumlah)`  | Total belanja                                   |
| `tampilkanPesan($pesan, $tipe)` | Pesan flash sukses/error/info                   |

---

## Langkah Praktikum yang Dikerjakan

1. **Latihan 1 — Template multi-halaman**  
   Halaman Home, Profil, dan Kontak menggunakan `header.php` + `footer.php` yang sama.

2. **Latihan 2 — Library function**  
   Minimal 4 function (`formatRupiah`, `hitungDiskon`, `validasiEmail`, `ringkasTeks`) + function tambahan, dipanggil dari beberapa halaman.

3. **Latihan 3 — Router aman**  
   Lebih dari 5 rute, halaman 404, whitelist, tidak menggunakan input URL langsung sebagai path.

4. **Latihan 4 — Struktur modular + CRUD sederhana**  
   Struktur folder sesuai modul, modul user (list/add/edit/delete), koneksi database di `config/`.

---

## Kendala yang Ditemukan & Cara Mengatasi

| Kendala                              | Solusi                                              |
|--------------------------------------|-----------------------------------------------------|
| Path file salah saat `require`       | Selalu gunakan `__DIR__` untuk path absolut         |
| Function already declared            | Gunakan `require_once` / `include_once`             |
| CSS tidak muncul                     | Pastikan path relatif dari `index.php` benar        |
| Halaman 404 padahal rute ada         | Periksa ejaan parameter `page` (case-sensitive)     |
| Database connection error            | Pastikan MySQL jalan & database `db_latihan` ada (opsional untuk demo) |

---

## Catatan

- Data user pada modul list bersifat **demo** (array PHP). Untuk produksi, ganti dengan query database menggunakan PDO yang sudah disiapkan di `config/database.php`.
- URL rewrite via `.htaccess` bersifat opsional. Pastikan `mod_rewrite` aktif jika ingin digunakan.
- Project ini dibuat untuk memenuhi tugas **Praktikum 9 Pemrograman Web**.

<?php

/**
 * Format angka menjadi format Rupiah
 * @param float $angka
 * @return string
 */
function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

/**
 * Hitung diskon berdasarkan harga dan persen
 * @param float $harga
 * @param float $persen
 * @return float
 */
function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

/**

 * @param string $email
 * @return bool
 */
function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**

 * @param string $teks
 * @param int $panjang
 * @return string
 */
function ringkasTeks(string $teks, int $panjang = 100): string
{
    if (mb_strlen($teks) <= $panjang) {
        return $teks;
    }
    return mb_substr($teks, 0, $panjang) . '...';
}

/**
 * Escape HTML untuk mencegah XSS
 * @param string $nilai
 * @return string
 */
function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

/**
 * Konversi Celcius ke Fahrenheit
 * @param float $c
 * @return float
 */
function konversiCelciusKeFahrenheit(float $c): float
{
    return ($c * 9 / 5) + 32;
}

/**
 * Tentukan status/predikat nilai
 * @param float $nilai
 * @return string
 */
function tentukanStatusNilai(float $nilai): string
{
    if ($nilai >= 85) return 'A (Sangat Baik)';
    if ($nilai >= 75) return 'B (Baik)';
    if ($nilai >= 65) return 'C (Cukup)';
    if ($nilai >= 50) return 'D (Kurang)';
    return 'E (Sangat Kurang)';
}

/**
 * Hitung total belanja
 * @param float $harga
 * @param int $jumlah
 * @return float
 */
function hitungTotal(float $harga, int $jumlah): float
{
    return $harga * $jumlah;
}

/**
 * Tampilkan pesan flash (sukses/gagal)
 * @param string $pesan
 * @param string $tipe  success|error|info
 * @return string
 */
function tampilkanPesan(string $pesan, string $tipe = 'info'): string
{
    $warna = match ($tipe) {
        'success' => '#d4edda',
        'error'   => '#f8d7da',
        default   => '#d1ecf1',
    };
    $border = match ($tipe) {
        'success' => '#28a745',
        'error'   => '#dc3545',
        default   => '#17a2b8',
    };
    return '<div style="background:' . $warna . ';border-left:4px solid ' . $border . ';padding:12px 16px;margin:12px 0;border-radius:4px;">'
         . e($pesan) . '</div>';
}
?>

<?php
include '../inc/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../dashboard.php?page=buku");
    exit;
}

$id_buku        = $_POST['id_buku'];
$judul_buku     = $_POST['judul_buku'];
$sinopsis_buku  = $_POST['sinopsis_buku'];
$jumlah_halaman = $_POST['jumlah_halaman'];
$jumlah_buku    = $_POST['jumlah_buku'];
$id_kategori    = $_POST['id_kategori'];
$id_penerbit    = $_POST['id_penerbit'];
$tahun_penerbit = $_POST['tahun_penerbit'];

$query = "INSERT INTO tbl_buku (
    id_buku,
    judul_buku,
    sinopsis_buku,
    jumlah_halaman,
    jumlah_buku,
    id_kategori,
    id_penerbit,
    tahun_penerbit
) VALUES (
    '$id_buku',
    '$judul_buku',
    '$sinopsis_buku',
    '$jumlah_halaman',
    '$jumlah_buku',
    '$id_kategori',
    '$id_penerbit',
    '$tahun_penerbit'
)";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../dashboard.php?page=buku&status=success");
    exit;
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}

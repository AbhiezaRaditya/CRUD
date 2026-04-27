<?php
include '../inc/koneksi.php';

// Ambil data dari form & amankan
$id_kategori = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
$kategori    = mysqli_real_escape_string($koneksi, $_POST['kategori']);

// Query update
$query = "UPDATE tbl_kategori SET kategori='$kategori' WHERE id_kategori='$id_kategori'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: ../dashboard.php?page=kategori&status=success&pesan=Kategori berhasil diubah");
    exit;
} else {
    $error = urlencode(mysqli_error($koneksi));
    header("Location: ../dashboard.php?page=kategori&status=error&pesan=Gagal mengubah kategori: $error");
    exit;
}

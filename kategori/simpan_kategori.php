<?php
include '../inc/koneksi.php';

// Amankan input
$id_kategori = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
$kategori    = mysqli_real_escape_string($koneksi, $_POST['kategori']);

// Query insert
$sql = "INSERT INTO tbl_kategori (id_kategori, kategori) VALUES ('$id_kategori', '$kategori')";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    // Redirect langsung ke dashboard dengan notif
    header("Location: ../dashboard.php?page=kategori&status=success&pesan=Data kategori berhasil disimpan");
    exit;
} else {
    $error = urlencode(mysqli_error($koneksi));
    header("Location: ../dashboard.php?page=kategori&status=error&pesan=Gagal menyimpan kategori: $error");
    exit;
}

<?php
include '../inc/koneksi.php';

// Amankan input
$id_penerbit     = mysqli_real_escape_string($koneksi, $_POST['id_penerbit']);
$nama_penerbit   = mysqli_real_escape_string($koneksi, $_POST['nama_penerbit']);
$notlp_penerbit  = mysqli_real_escape_string($koneksi, $_POST['notlp_penerbit']);
$nama_sales      = mysqli_real_escape_string($koneksi, $_POST['nama_sales']);
$notlp_sales     = mysqli_real_escape_string($koneksi, $_POST['notlp_sales']);

// Query insert
$sql = "INSERT INTO tbl_penerbit (id_penerbit, nama_penerbit, notlp_penerbit, nama_sales, notlp_sales)
        VALUES ('$id_penerbit', '$nama_penerbit', '$notlp_penerbit', '$nama_sales', '$notlp_sales')";

$result = mysqli_query($koneksi, $sql);

if ($result) {
    header("Location: ../dashboard.php?page=penerbit&status=success&pesan=Data penerbit berhasil disimpan");
    exit;
} else {
    $error = urlencode(mysqli_error($koneksi));
    header("Location: ../dashboard.php?page=penerbit&status=error&pesan=Gagal menyimpan penerbit: $error");
    exit;
}

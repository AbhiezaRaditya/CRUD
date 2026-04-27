<?php
include '../inc/koneksi.php';

$id_buku        = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
$judul_buku     = mysqli_real_escape_string($koneksi, $_POST['judul_buku']);
$sinopsis_buku  = mysqli_real_escape_string($koneksi, $_POST['sinopsis_buku']);
$jumlah_halaman = (int) $_POST['jumlah_halaman'];
$jumlah_buku    = (int) $_POST['jumlah_buku'];
$id_kategori    = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
$id_penerbit    = mysqli_real_escape_string($koneksi, $_POST['id_penerbit']);
$tahun_penerbit = (int) $_POST['tahun_penerbit'];

$query = "UPDATE tbl_buku SET
            judul_buku='$judul_buku',
            sinopsis_buku='$sinopsis_buku',
            jumlah_halaman='$jumlah_halaman',
            jumlah_buku='$jumlah_buku',
            id_kategori='$id_kategori',
            id_penerbit='$id_penerbit',
            tahun_penerbit='$tahun_penerbit'
          WHERE id_buku='$id_buku'";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../dashboard.php?page=buku&status=success&pesan=Buku berhasil diubah!");
} else {
    $error = urlencode(mysqli_error($koneksi));
    header("Location: ../dashboard.php?page=buku&status=error&pesan=Gagal mengubah buku: $error");
}
exit;

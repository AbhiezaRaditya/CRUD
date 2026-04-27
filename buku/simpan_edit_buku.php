<?php 
include '../inc/koneksi.php';

// Ambil data dari form
$id_buku        = $_POST['id_buku'];
$judul_buku     = $_POST['judul_buku'];
$sinopsis_buku  = $_POST['sinopsis_buku'];
$jumlah_halaman = $_POST['jumlah_halaman'];
$jumlah_buku    = $_POST['jumlah_buku'];
$id_kategori    = $_POST['id_kategori'];
$id_penerbit    = $_POST['id_penerbit'];
$tahun_penerbit = $_POST['tahun_penerbit'];

// Query update
$query  = "UPDATE tbl_buku 
           SET judul_buku='$judul_buku',
               sinopsis_buku='$sinopsis_buku',
               jumlah_halaman='$jumlah_halaman',
               jumlah_buku='$jumlah_buku',
               id_kategori='$id_kategori',
               id_penerbit='$id_penerbit',
               tahun_penerbit='$tahun_penerbit'
           WHERE id_buku='$id_buku'";

$result = mysqli_query($koneksi, $query);

if($result){
    header("Location: ../dashboard.php?page=buku&status=updated");
    exit;
}else{
    header("Location: ../dashboard.php?page=buku&status=error");
    exit;
}

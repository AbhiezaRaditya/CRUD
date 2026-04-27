<?php
include "../inc/koneksi.php";

$id_anggota   = $_POST['id_anggota'];
$nama_anggota = $_POST['nama_anggota'];
$alamat       = $_POST['alamat'];
$no_telp      = $_POST['no_telp'];

$sql = "INSERT INTO tbl_anggota 
        (id_anggota, nama_anggota, alamat, no_telp)
        VALUES
        ('$id_anggota', '$nama_anggota', '$alamat', '$no_telp')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: ../dashboard.php?page=anggota&notif=success");
} else {
    header("Location: ../dashboard.php?page=anggota&notif=error");
}
exit;

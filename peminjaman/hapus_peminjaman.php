<?php
include "../inc/koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("location:../login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("location:../?page=peminjaman");
    exit;
}

$id = (int) $_GET['id'];

// HAPUS DATA PEMINJAMAN (STATUS = RECORD)
mysqli_query(
    $koneksi,
    "DELETE FROM tbl_peminjaman
     WHERE id_peminjaman = $id"
);

header("location:../?page=peminjaman");
exit;

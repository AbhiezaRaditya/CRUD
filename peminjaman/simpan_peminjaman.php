<?php
include "../inc/koneksi.php";

// ======================
// AMBIL DATA
// ======================
$id_anggota   = $_POST['id_anggota'];
$id_buku      = $_POST['id_buku'];
$tgl_pinjam   = $_POST['tanggal_pinjam'];
$tgl_kembali  = $_POST['tanggal_kembali'];

// ======================
// VALIDASI ANGGOTA
// ======================
$cek_anggota = mysqli_query(
    $koneksi,
    "SELECT id_anggota FROM tbl_anggota WHERE id_anggota = '$id_anggota'"
);

if (mysqli_num_rows($cek_anggota) == 0) {
    die("GAGAL: ID Anggota tidak terdaftar");
}

// ======================
// VALIDASI BUKU & STOK
// ======================
$cek_buku = mysqli_query(
    $koneksi,
    "SELECT jumlah_buku FROM tbl_buku WHERE id_buku = '$id_buku'"
);

$data_buku = mysqli_fetch_assoc($cek_buku);

if (!$data_buku) {
    die("GAGAL: Buku tidak ditemukan");
}

if ($data_buku['jumlah_buku'] <= 0) {
    die("GAGAL: Stok buku habis");
}

// ======================
// SIMPAN PEMINJAMAN
// ======================
$simpan = mysqli_query($koneksi, "
    INSERT INTO tbl_peminjaman 
    (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali, status)
    VALUES
    ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali', 'dipinjam')
");

if (!$simpan) {
    die("GAGAL SIMPAN PEMINJAMAN: " . mysqli_error($koneksi));
}

// ======================
// KURANGI STOK BUKU
// ======================
$update = mysqli_query($koneksi, "
    UPDATE tbl_buku 
    SET jumlah_buku = jumlah_buku - 1 
    WHERE id_buku = '$id_buku'
");

if (!$update) {
    die("GAGAL UPDATE STOK: " . mysqli_error($koneksi));
}

// ======================
// SELESAI
// ======================
header("Location: ../dashboard.php?page=peminjaman&notif=berhasil");
exit;

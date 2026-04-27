<?php
include "inc/koneksi.php";
session_start();

// cek login
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

// HITUNG DATA
$jumlahBuku     = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_buku FROM tbl_buku"));
$jumlahKategori = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_kategori FROM tbl_kategori"));
$jumlahPenerbit = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_penerbit FROM tbl_penerbit"));

// BUKU SEDANG DIPINJAM (BELUM KEMBALI)
$qDipinjam = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total
     FROM tbl_peminjaman
     WHERE status != 'kembali'"
);
$dataDipinjam = mysqli_fetch_assoc($qDipinjam);
$jumlahDipinjam = $dataDipinjam['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Perpustakaan</title>

<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#1b5e20',
                primarySoft: '#e8f5e9',
                accent: '#43a047'
            }
        }
    }
}
</script>
</head>

<body class="bg-slate-50 text-slate-800">

<div class="flex min-h-screen">
    <main class="flex-1 p-10">

        <!-- HEADER -->
        <div class="mb-10">
            <h2 class="text-2xl font-semibold">Dashboard</h2>
            <p class="text-sm text-slate-500">
                Ringkasan data perpustakaan
            </p>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <!-- BUKU -->
            <div class="relative bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                <div class="absolute right-6 top-6 text-primary/10 text-6xl font-bold">B</div>
                <p class="text-sm text-slate-500 mb-1">Jumlah Buku</p>
                <h3 class="text-3xl font-semibold text-primary">
                    <?= $jumlahBuku ?>
                </h3>
                <p class="text-xs text-slate-400 mt-2">Total buku</p>
            </div>

            <!-- DIPINJAM -->
            <div class="relative bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                <div class="absolute right-6 top-6 text-green-500/10 text-6xl font-bold">D</div>
                <p class="text-sm text-slate-500 mb-1">Sedang Dipinjam</p>
                <h3 class="text-3xl font-semibold text-green-600">
                    <?= $jumlahDipinjam ?>
                </h3>
                <p class="text-xs text-slate-400 mt-2">Belum dikembalikan</p>
            </div>

            <!-- KATEGORI -->
            <div class="relative bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                <div class="absolute right-6 top-6 text-primary/10 text-6xl font-bold">K</div>
                <p class="text-sm text-slate-500 mb-1">Kategori</p>
                <h3 class="text-3xl font-semibold text-primary">
                    <?= $jumlahKategori ?>
                </h3>
                <p class="text-xs text-slate-400 mt-2">Jenis kategori</p>
            </div>

            <!-- PENERBIT -->
            <div class="relative bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                <div class="absolute right-6 top-6 text-primary/10 text-6xl font-bold">P</div>
                <p class="text-sm text-slate-500 mb-1">Penerbit</p>
                <h3 class="text-3xl font-semibold text-primary">
                    <?= $jumlahPenerbit ?>
                </h3>
                <p class="text-xs text-slate-400 mt-2">Total penerbit</p>
            </div>

        </div>

    </main>
</div>

</body>
</html>

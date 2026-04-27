<?php
include '../inc/koneksi.php';

$id_kategori = $_GET['id_kategori'] ?? null;
$status = "error";

if ($id_kategori) {
    $query = "DELETE FROM tbl_kategori WHERE id_kategori='$id_kategori'";
    if (mysqli_query($koneksi, $query)) {
        $status = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data Kategori</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1b5e20',
                        primarySoft: '#e8f5e9',
                        accent: '#43a047',
                        danger: '#b71c1c'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-md">

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 text-center">

        <?php if ($status === "success") { ?>
            <div class="text-primary text-6xl mb-4">
                🗑️
            </div>
            <h3 class="text-xl font-semibold text-primary mb-2">
                Kategori Berhasil Dihapus
            </h3>
            <p class="text-sm text-slate-500 mb-6">
                Data kategori telah dihapus dari sistem
            </p>
        <?php } else { ?>
            <div class="text-danger text-6xl mb-4">
                ❌
            </div>
            <h3 class="text-xl font-semibold text-danger mb-2">
                Kategori Gagal Dihapus
            </h3>
            <p class="text-sm text-slate-500 mb-6">
                ID kategori tidak ditemukan atau terjadi kesalahan
            </p>
        <?php } ?>

        <a href="../dashboard.php?page=kategori"
           class="inline-block px-6 py-2 rounded-xl bg-primary text-white text-sm font-medium
                  hover:bg-accent transition">
            Kembali ke Data Kategori
        </a>

    </div>

</div>

</body>
</html>

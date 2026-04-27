<?php
include '../inc/koneksi.php';

$id_penerbit = $_GET['id_penerbit'] ?? null;
$status = "error";

if ($id_penerbit) {
    $query = "DELETE FROM tbl_penerbit WHERE id_penerbit='$id_penerbit'";
    if (mysqli_query($koneksi, $query)) {
        $status = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data Penerbit</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        success: '#2e7d32',
                        error: '#c62828'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen flex items-center justify-center bg-slate-50 px-4">

<div class="w-full max-w-md">

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 text-center">

        <?php if ($status === "success") { ?>
            <div class="text-success text-6xl mb-4">🗑️</div>
            <h2 class="text-xl font-semibold text-success mb-2">
                Data Berhasil Dihapus
            </h2>
            <p class="text-sm text-slate-500 mb-6">
                Data penerbit telah dihapus dari sistem
            </p>
        <?php } else { ?>
            <div class="text-error text-6xl mb-4">✖</div>
            <h2 class="text-xl font-semibold text-error mb-2">
                Data Gagal Dihapus
            </h2>
            <p class="text-sm text-slate-500 mb-6">
                ID penerbit tidak ditemukan atau terjadi kesalahan
            </p>
        <?php } ?>

        <a href="../dashboard.php?page=penerbit"
           class="inline-block px-6 py-2 rounded-xl bg-slate-800 text-white text-sm
                  hover:bg-slate-700 transition">
            Kembali ke Data Penerbit
        </a>

    </div>

</div>

</body>
</html>

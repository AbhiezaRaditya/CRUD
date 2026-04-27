<?php
include '../inc/koneksi.php';

$id_buku = $_GET['id_buku'] ?? null;

if (!$id_buku) {
    $status = "error";
    $message = "ID Buku tidak ditemukan";
} else {
    $query = "DELETE FROM tbl_buku WHERE id_buku='$id_buku'";
    if (mysqli_query($koneksi, $query)) {
        $status = "success";
        $message = "Data buku berhasil dihapus";
    } else {
        $status = "error";
        $message = "Data buku gagal dihapus";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Buku</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1b5e20',
                        accent: '#43a047',
                        danger: '#c62828'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-md">

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 text-center">

        <!-- ICON -->
        <div class="mb-4">
            <?php if ($status === 'success') { ?>
                <svg class="mx-auto h-16 w-16 text-primary" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2l4-4M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                </svg>
            <?php } else { ?>
                <svg class="mx-auto h-16 w-16 text-danger" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>
                </svg>
            <?php } ?>
        </div>

        <!-- MESSAGE -->
        <h3 class="text-lg font-semibold
            <?= $status === 'success' ? 'text-primary' : 'text-danger'; ?>">
            <?= htmlspecialchars($message); ?>
        </h3>

        <p class="text-sm text-slate-500 mt-1">
            Status operasi penghapusan data buku
        </p>

        <!-- ACTION -->
        <div class="mt-6">
            <a href="../dashboard.php?page=buku"
               class="inline-block px-6 py-2 rounded-xl bg-primary text-white text-sm font-medium hover:bg-accent transition">
                Kembali ke Data Buku
            </a>
        </div>

    </div>

</div>

</body>
</html>

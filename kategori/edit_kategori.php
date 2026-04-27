<?php 
include '../inc/koneksi.php';

$id_kategori = $_GET['id_kategori'];

$query  = "SELECT * FROM tbl_kategori WHERE id_kategori='$id_kategori'";
$result = mysqli_query($koneksi, $query);
$row    = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Kategori</title>

    <!-- Tailwind CDN -->
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

<body class="bg-slate-50 min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-md">

    <!-- CARD -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-slate-800">
                Edit Kategori
            </h2>
            <p class="text-sm text-slate-500">
                Perbarui data kategori buku
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="simpan_edit_kategori.php" class="space-y-5">

            <div>
                <label class="text-sm font-medium text-slate-600">
                    ID Kategori
                </label>
                <input type="text" name="id_kategori"
                       value="<?= htmlspecialchars($row['id_kategori']); ?>" readonly
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm bg-slate-100 text-slate-600">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">
                    Nama Kategori
                </label>
                <input type="text" name="kategori" required
                       value="<?= htmlspecialchars($row['kategori']); ?>"
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <!-- ACTION -->
            <div class="pt-4 flex justify-end gap-3">
                <a href="../dashboard.php?page=kategori"
                   class="px-5 py-2 rounded-xl border border-slate-300 text-sm hover:bg-slate-100">
                    Kembali
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-xl bg-primary text-white text-sm font-medium
                               hover:bg-accent transition">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>

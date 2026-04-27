<?php 
include '../inc/koneksi.php';

$id_penerbit = $_GET['id_penerbit'] ?? null;

$query  = "SELECT * FROM tbl_penerbit WHERE id_penerbit='$id_penerbit'";
$result = mysqli_query($koneksi, $query);
$row    = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Penerbit</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1b5e20',
                        accent: '#43a047'
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-slate-50 flex items-center justify-center px-4">

<div class="w-full max-w-lg">

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">

        <div class="text-center mb-6">
            <h2 class="text-2xl font-semibold text-slate-800">
                Edit Data Penerbit
            </h2>
            <p class="text-sm text-slate-500">
                Perbarui informasi penerbit
            </p>
        </div>

        <form method="POST" action="simpan_edit_penerbit.php" class="space-y-4">

            <div>
                <label class="text-sm font-medium text-slate-600">ID Penerbit</label>
                <input type="text" name="id_penerbit" readonly
                       value="<?= $row['id_penerbit']; ?>"
                       class="mt-1 w-full rounded-xl border border-slate-300 bg-slate-100
                              px-4 py-2 text-sm focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">Nama Penerbit</label>
                <input type="text" name="nama_penerbit" required
                       value="<?= $row['nama_penerbit']; ?>"
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">No. Telp Penerbit</label>
                <input type="text" name="notlp_penerbit"
                       value="<?= $row['notlp_penerbit']; ?>"
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">Nama Sales</label>
                <input type="text" name="nama_sales"
                       value="<?= $row['nama_sales']; ?>"
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">No. Telp Sales</label>
                <input type="text" name="notlp_sales"
                       value="<?= $row['notlp_sales']; ?>"
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div class="pt-5 flex justify-between">
                <a href="../dashboard.php?page=penerbit"
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

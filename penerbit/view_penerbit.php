<?php
require_once __DIR__ . '/../inc/koneksi.php';

$sql = "SELECT id_penerbit,
               nama_penerbit,
               notlp_penerbit,
               nama_sales,
               notlp_sales
        FROM tbl_penerbit";

$data = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Penerbit</title>

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

<body class="bg-slate-50 text-slate-800">

<div class="flex min-h-screen">



    <!-- CONTENT -->
    <main class="flex-1 p-10">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-semibold">Data Penerbit</h2>
                <p class="text-sm text-slate-500">
                    Daftar penerbit buku perpustakaan
                </p>
            </div>

            <a href="penerbit/form_tambah_penerbit.php"
               class="bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-accent transition">
                + Tambah Penerbit
            </a>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-primarySoft text-primary">
                    <tr>
                        <th class="px-6 py-3 text-left w-24">ID</th>
                        <th class="px-6 py-3 text-left">Nama Penerbit</th>
                        <th class="px-6 py-3 text-left">Telp Penerbit</th>
                        <th class="px-6 py-3 text-left">Nama Sales</th>
                        <th class="px-6 py-3 text-left">Telp Sales</th>
                        <th class="px-6 py-3 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-3"><?= $row['id_penerbit']; ?></td>
                        <td class="px-6 py-3 font-medium">
                            <?= htmlspecialchars($row['nama_penerbit']); ?>
                        </td>
                        <td class="px-6 py-3">
                            <?= htmlspecialchars($row['notlp_penerbit']); ?>
                        </td>
                        <td class="px-6 py-3">
                            <?= htmlspecialchars($row['nama_sales']); ?>
                        </td>
                        <td class="px-6 py-3">
                            <?= htmlspecialchars($row['notlp_sales']); ?>
                        </td>
                        <td class="px-6 py-3 text-center space-x-3">
                            <a href="penerbit/edit_penerbit.php?id_penerbit=<?= $row['id_penerbit']; ?>"
                               class="text-primary hover:underline">
                                Edit
                            </a>
                            <a href="penerbit/hapus_penerbit.php?id_penerbit=<?= $row['id_penerbit']; ?>"
                               onclick="return confirm('Yakin menghapus penerbit ini?')"
                               class="text-red-600 hover:underline">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </main>
</div>

</body>
</html>

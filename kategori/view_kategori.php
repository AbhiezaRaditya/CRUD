<?php
require_once __DIR__ . '/../inc/koneksi.php';

$sql = "SELECT id_kategori, kategori FROM tbl_kategori";
$data = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Kategori</title>

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
                <h2 class="text-2xl font-semibold">Data Kategori</h2>
                <p class="text-sm text-slate-500">Daftar kategori buku perpustakaan</p>
            </div>

            <a href="kategori/form_tambah_kategori.php"
               class="bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-accent transition">
                + Tambah Kategori
            </a>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-primarySoft text-primary">
                    <tr>
                        <th class="px-6 py-3 text-left w-32">ID</th>
                        <th class="px-6 py-3 text-left">Nama Kategori</th>
                        <th class="px-6 py-3 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-3"><?= $row['id_kategori']; ?></td>
                        <td class="px-6 py-3 font-medium">
                            <?= htmlspecialchars($row['kategori']); ?>
                        </td>
                        <td class="px-6 py-3 text-center space-x-3">
                            <a href="kategori/edit_kategori.php?id_kategori=<?= $row['id_kategori']; ?>"
                               class="text-primary hover:underline">
                                Edit
                            </a>
                            <a href="kategori/hapus_kategori.php?id_kategori=<?= $row['id_kategori']; ?>"
                               onclick="return confirm('Yakin menghapus kategori ini?')"
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

<?php  
include '../inc/koneksi.php';  

$id_buku = $_GET['id_buku'];  

$query = "SELECT * FROM tbl_buku WHERE id_buku = '$id_buku'";  
$result = mysqli_query($koneksi, $query);  
$row = mysqli_fetch_assoc($result);

$data_kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
$data_penerbit = mysqli_query($koneksi, "SELECT * FROM tbl_penerbit");
?>  

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>

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

<div class="min-h-screen flex justify-center px-4 py-10">
    <div class="w-full max-w-3xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold">Edit Buku</h2>
            <p class="text-sm text-slate-500">
                Perbarui data buku
            </p>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">

            <form method="POST" action="simpan_edit_buku.php" class="space-y-5">

                <div>
                    <label class="text-sm font-medium text-slate-600">ID Buku</label>
                    <input type="text" name="id_buku" value="<?= htmlspecialchars($row['id_buku']); ?>" readonly
                           class="mt-1 w-full rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-sm">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600">Judul Buku</label>
                    <input type="text" name="judul_buku" value="<?= htmlspecialchars($row['judul_buku']); ?>"
                           class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600">Sinopsis</label>
                    <textarea name="sinopsis_buku" rows="4"
                              class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:outline-none"><?= htmlspecialchars($row['sinopsis_buku']); ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-slate-600">Jumlah Halaman</label>
                        <input type="number" name="jumlah_halaman" value="<?= $row['jumlah_halaman']; ?>"
                               class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600">Jumlah Buku</label>
                        <input type="number" name="jumlah_buku" value="<?= $row['jumlah_buku']; ?>"
                               class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-slate-600">Kategori</label>
                        <select name="id_kategori" required
                                class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm bg-white">
                            <?php while ($k = mysqli_fetch_assoc($data_kategori)) { ?>
                                <option value="<?= $k['id_kategori']; ?>"
                                    <?= $k['id_kategori'] == $row['id_kategori'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($k['kategori']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600">Penerbit</label>
                        <select name="id_penerbit" required
                                class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm bg-white">
                            <?php while ($p = mysqli_fetch_assoc($data_penerbit)) { ?>
                                <option value="<?= $p['id_penerbit']; ?>"
                                    <?= $p['id_penerbit'] == $row['id_penerbit'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($p['nama_penerbit']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600">Tahun Terbit</label>
                    <input type="number" name="tahun_penerbit" value="<?= $row['tahun_penerbit']; ?>"
                           class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm">
                </div>

                <!-- ACTION -->
                <div class="pt-4 flex justify-end gap-3">
                    <a href="../dashboard.php?page=buku"
                       class="px-5 py-2 rounded-xl border border-slate-300 text-sm hover:bg-slate-100">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2 rounded-xl bg-primary text-white text-sm font-medium hover:bg-accent transition">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>

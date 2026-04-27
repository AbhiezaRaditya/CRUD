<?php
include '../inc/koneksi.php';
$data_kategori = mysqli_query($koneksi, "SELECT id_kategori, kategori FROM tbl_kategori");
$data_penerbit = mysqli_query($koneksi, "SELECT id_penerbit, nama_penerbit FROM tbl_penerbit");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>

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
            <h2 class="text-2xl font-semibold">Tambah Buku</h2>
            <p class="text-sm text-slate-500">
                Lengkapi data buku baru
            </p>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">

            <form method="POST" action="simpan_buku.php" class="space-y-5">

                <div>
                    <label class="text-sm font-medium text-slate-600">ID Buku</label>
                    <input type="text" name="id_buku" required
                           class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:ring-primary focus:outline-none">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600">Judul Buku</label>
                    <input type="text" name="judul_buku" required
                           class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:ring-primary focus:outline-none">
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600">Sinopsis</label>
                    <textarea name="sinopsis_buku" rows="4"
                              class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:ring-primary focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-slate-600">Jumlah Halaman</label>
                        <input type="number" name="jumlah_halaman"
                               class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:ring-primary focus:outline-none">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600">Jumlah Buku</label>
                        <input type="number" name="jumlah_buku"
                               class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:ring-primary focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="text-sm font-medium text-slate-600">Kategori</label>
                        <select name="id_kategori" required
                                class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm bg-white focus:border-primary focus:ring-primary focus:outline-none">
                            <option value="">-- Pilih Kategori --</option>
                            <?php while($k = mysqli_fetch_assoc($data_kategori)) { ?>
                                <option value="<?= $k['id_kategori']; ?>">
                                    <?= htmlspecialchars($k['kategori']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-600">Penerbit</label>
                        <select name="id_penerbit" required
                                class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm bg-white focus:border-primary focus:ring-primary focus:outline-none">
                            <option value="">-- Pilih Penerbit --</option>
                            <?php while($p = mysqli_fetch_assoc($data_penerbit)) { ?>
                                <option value="<?= $p['id_penerbit']; ?>">
                                    <?= htmlspecialchars($p['nama_penerbit']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium text-slate-600">Tahun Terbit</label>
                    <input type="number" name="tahun_penerbit"
                           class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-primary focus:ring-primary focus:outline-none">
                </div>

                <!-- ACTION -->
                <div class="pt-4 flex justify-end gap-3">
                    <a href="../dashboard.php?page=buku"
                       class="px-5 py-2 rounded-xl border border-slate-300 text-sm hover:bg-slate-100">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2 rounded-xl bg-primary text-white text-sm font-medium hover:bg-accent transition">
                        Simpan Buku
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>

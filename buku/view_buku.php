<?php
require_once __DIR__ . '/../inc/koneksi.php';

$sql = "SELECT * FROM tbl_buku 
        LEFT JOIN tbl_kategori 
            ON tbl_buku.id_kategori = tbl_kategori.id_kategori
        LEFT JOIN tbl_penerbit 
            ON tbl_buku.id_penerbit = tbl_penerbit.id_penerbit";

$data = mysqli_query($koneksi, $sql);

if (!$data) {
    die("Query error: " . mysqli_error($koneksi));
}
?>

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-2xl font-semibold">Data Buku</h2>
        <p class="text-sm text-slate-500">Daftar semua buku di perpustakaan</p>
    </div>

    <a href="buku/form_tambah_buku.php"
       class="bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-accent transition">
        + Tambah Buku
    </a>
</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-primarySoft text-primary">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3 text-center">Sinopsis</th>
                    <th class="px-4 py-3 text-center">Hal</th>
                    <th class="px-4 py-3 text-center">Jumlah</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-left">Penerbit</th>
                    <th class="px-4 py-3 text-center">Tahun</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">

            <?php if (mysqli_num_rows($data) == 0): ?>
                <tr>
                    <td colspan="9" class="text-center py-10 text-slate-500">
                        Data buku belum tersedia
                    </td>
                </tr>
            <?php else: ?>
                <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3"><?= $row['id_buku']; ?></td>

                        <td class="px-4 py-3 font-medium">
                            <?= htmlspecialchars($row['judul_buku']); ?>
                        </td>

                        <!-- SINOPSIS (HIDDEN + MODAL) -->
                        <td class="px-4 py-3 text-center">
                            <button
                                onclick="openSinopsis(`<?= htmlspecialchars(addslashes($row['sinopsis_buku'])) ?>`)"
                                class="text-primary hover:underline text-sm">
                                Lihat
                            </button>
                        </td>

                        <td class="px-4 py-3 text-center"><?= $row['jumlah_halaman']; ?></td>
                        <td class="px-4 py-3 text-center"><?= $row['jumlah_buku']; ?></td>

                        <td class="px-4 py-3">
                            <?= htmlspecialchars($row['kategori'] ?? '-'); ?>
                        </td>

                        <td class="px-4 py-3">
                            <?= htmlspecialchars($row['nama_penerbit'] ?? '-'); ?>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <?= $row['tahun_penerbit'] ?? '-'; ?>
                        </td>

                        <td class="px-4 py-3 text-center space-x-3">
                            <a href="buku/edit_buku.php?id_buku=<?= $row['id_buku']; ?>"
                               class="text-primary hover:underline">
                                Edit
                            </a>
                            <a href="buku/hapus_buku.php?id_buku=<?= $row['id_buku']; ?>"
                               onclick="return confirm('Yakin akan menghapus buku ini?')"
                               class="text-red-600 hover:underline">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>

<!-- MODAL SINOPSIS -->
<div id="modalSinopsis"
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-xl p-6 relative">
        <h3 class="text-lg font-semibold mb-4">Sinopsis Buku</h3>

        <div id="isiSinopsis"
             class="text-sm text-slate-700 leading-relaxed max-h-80 overflow-y-auto">
        </div>

        <button onclick="closeSinopsis()"
                class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
            ✕
        </button>

        <div class="mt-6 text-right">
            <button onclick="closeSinopsis()"
                    class="px-4 py-2 rounded-lg bg-primary text-white text-sm">
                Tutup
            </button>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script>
function openSinopsis(text) {
    document.getElementById('isiSinopsis').innerText = text;
    document.getElementById('modalSinopsis').classList.remove('hidden');
    document.getElementById('modalSinopsis').classList.add('flex');
}

function closeSinopsis() {
    document.getElementById('modalSinopsis').classList.add('hidden');
    document.getElementById('modalSinopsis').classList.remove('flex');
}
</script>

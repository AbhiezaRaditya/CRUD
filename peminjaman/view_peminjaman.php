<?php
$data = mysqli_query($koneksi, "
    SELECT p.*, a.nama_anggota, b.judul_buku
    FROM tbl_peminjaman p
    JOIN tbl_anggota a ON p.id_anggota = a.id_anggota
    JOIN tbl_buku b ON p.id_buku = b.id_buku
    ORDER BY p.id_peminjaman DESC
");
?>

<div class="flex justify-between mb-6">
    <h2 class="text-xl font-semibold">Data Peminjaman</h2>
    <a href="?page=tambah_peminjaman"
       class="bg-primary text-white px-4 py-2 rounded-xl">
       + Peminjaman
    </a>
</div>

<table class="w-full border border-slate-300 border-collapse">
    <tr class="bg-slate-100">
        <th class="border border-slate-300 p-3 text-left">Anggota</th>
        <th class="border border-slate-300 p-3 text-left">Buku</th>
        <th class="border border-slate-300 p-3 text-left">Pinjam</th>
        <th class="border border-slate-300 p-3 text-left">Kembali</th>
        <th class="border border-slate-300 p-3 text-center">Status</th>
        <th class="border border-slate-300 p-3 text-center">Hapus Status</th>
    </tr>

<?php while($d = mysqli_fetch_assoc($data)) { ?>
    <tr class="hover:bg-slate-50">
        <td class="border border-slate-300 p-3"><?= $d['nama_anggota'] ?></td>
        <td class="border border-slate-300 p-3"><?= $d['judul_buku'] ?></td>
        <td class="border border-slate-300 p-3"><?= $d['tanggal_pinjam'] ?></td>
        <td class="border border-slate-300 p-3"><?= $d['tanggal_kembali'] ?></td>

        <!-- STATUS -->
        <td class="border border-slate-300 p-3 text-center">
            <?php
            $hari_ini = date('Y-m-d');

            if ($d['status'] == 'kembali') {
                echo '<span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Dikembalikan
                      </span>';
            } elseif ($d['tanggal_kembali'] < $hari_ini) {
                echo '<span class="px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                        Terlambat
                      </span>';
            } else {
                echo '<span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        Dipinjam
                      </span>';
            }
            ?>
        </td>

        <!-- AKSI -->
        <td class="border border-slate-300 p-3 text-center">
            <a href="peminjaman/hapus_peminjaman.php?id=<?= $d['id_peminjaman'] ?>"
               onclick="return confirm('Peminjaman ini sudah selesai dan akan dihapus. Lanjutkan?')"
               class="text-red-600 hover:underline text-sm">
                Hapus
            </a>
        </td>
    </tr>
<?php } ?>
</table>

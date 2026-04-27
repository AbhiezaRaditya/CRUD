<?php
include "inc/koneksi.php";

$buku = mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE jumlah_buku > 0");
?>

<h2 class="text-xl font-semibold mb-6">Tambah Peminjaman</h2>

<form action="peminjaman/simpan_peminjaman.php" method="POST" class="space-y-5 max-w-xl">

    <!-- INPUT ID ANGGOTA MANUAL -->
    <div>
        <label class="text-sm font-medium">ID Anggota</label>
        <input 
            type="text" 
            name="id_anggota" 
            required 
            placeholder="Contoh: AG001"
            class="w-full border rounded-xl px-4 py-2"
        >
        <p class="text-xs text-slate-500 mt-1">
            Masukkan ID anggota yang terdaftar
        </p>
    </div>

    <!-- PILIH BUKU -->
    <div>
        <label class="text-sm font-medium">Buku</label>
        <select name="id_buku" required class="w-full border rounded-xl px-4 py-2">
            <option value="">-- Pilih Buku --</option>
            <?php while($b = mysqli_fetch_assoc($buku)) { ?>
                <option value="<?= $b['id_buku'] ?>">
                    <?= $b['judul_buku'] ?> (stok: <?= $b['jumlah_buku'] ?>)
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- TANGGAL -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="text-sm font-medium">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" required class="w-full border rounded-xl px-4 py-2">
        </div>

        <div>
            <label class="text-sm font-medium">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" required class="w-full border rounded-xl px-4 py-2">
        </div>
    </div>

    <button class="bg-primary text-white px-6 py-2 rounded-xl">
        Simpan
    </button>

</form>

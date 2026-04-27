<?php
include "inc/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM tbl_anggota");
?>

<h2 class="text-xl font-semibold mb-6">Data Anggota</h2>

<?php if (isset($_GET['notif'])) { ?>
    <?php if ($_GET['notif'] == 'success') { ?>
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
            Anggota berhasil ditambahkan
        </div>
    <?php } else { ?>
        <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
            Gagal menambahkan anggota
        </div>
    <?php } ?>
<?php } ?>

<a href="dashboard.php?page=tambah_anggota"
   class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded-lg">
   + Tambah Anggota
</a>

<table class="w-full border text-sm">
    <tr class="bg-slate-100">
        <th class="border p-2">ID</th>
        <th class="border p-2">Nama</th>
        <th class="border p-2">Alamat</th>
        <th class="border p-2">No Telp</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td class="border p-2"><?= $row['id_anggota']; ?></td>
        <td class="border p-2"><?= $row['nama_anggota']; ?></td>
        <td class="border p-2"><?= $row['alamat']; ?></td>
        <td class="border p-2"><?= $row['no_telp']; ?></td>
    </tr>
    <?php } ?>
</table>

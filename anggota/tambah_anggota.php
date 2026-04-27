<h2 class="text-xl font-semibold mb-6">Tambah Anggota</h2>

<form action="anggota/simpan_anggota.php" method="POST"
      class="max-w-lg space-y-4">

    <div>
        <label class="block text-sm font-medium">ID Anggota</label>
        <input type="text" name="id_anggota" required
               class="w-full p-2 border rounded-lg">
    </div>

    <div>
        <label class="block text-sm font-medium">Nama Anggota</label>
        <input type="text" name="nama_anggota" required
               class="w-full p-2 border rounded-lg">
    </div>

    <div>
        <label class="block text-sm font-medium">Alamat</label>
        <textarea name="alamat" required
                  class="w-full p-2 border rounded-lg"></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium">No Telepon</label>
        <input type="text" name="no_telp" required
               class="w-full p-2 border rounded-lg">
    </div>

    <button type="submit"
            class="bg-green-600 text-white px-5 py-2 rounded-lg">
        Simpan
    </button>

    <a href="dashboard.php?page=anggota"
       class="ml-2 text-slate-600">
        Batal
    </a>
</form>

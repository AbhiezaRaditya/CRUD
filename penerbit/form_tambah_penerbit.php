<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Penerbit</title>

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

<body class="bg-slate-50 min-h-screen flex items-center justify-center px-4">

<div class="w-full max-w-md">

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">

        <h2 class="text-2xl font-semibold text-slate-800 text-center mb-6">
            Tambah Data Penerbit
        </h2>

        <form method="POST" action="simpan_penerbit.php" class="space-y-4">

            <div>
                <label class="text-sm font-medium text-slate-600">ID Penerbit</label>
                <input type="text" name="id_penerbit" required
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">Nama Penerbit</label>
                <input type="text" name="nama_penerbit" required
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">No. Telp Penerbit</label>
                <textarea name="notlp_penerbit" rows="2"
                          class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                                 focus:border-primary focus:ring-primary focus:outline-none"></textarea>
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">Nama Sales</label>
                <input type="text" name="nama_sales"
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">No. Telp Sales</label>
                <input type="text" name="notlp_sales"
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <!-- ACTION -->
            <div class="pt-4 flex justify-end gap-3">
                <a href="../dashboard.php?page=penerbit"
                   class="px-5 py-2 rounded-xl border border-slate-300 text-sm hover:bg-slate-100">
                    Batal
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

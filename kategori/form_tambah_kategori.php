<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>

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

    <!-- CARD -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8">

        <!-- HEADER -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-slate-800">
                Tambah Kategori
            </h2>
            <p class="text-sm text-slate-500">
                Masukkan data kategori baru
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="simpan_kategori.php" class="space-y-5">

            <div>
                <label class="text-sm font-medium text-slate-600">
                    ID Kategori
                </label>
                <input type="text" name="id_kategori" required
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <div>
                <label class="text-sm font-medium text-slate-600">
                    Nama Kategori
                </label>
                <input type="text" name="kategori" required
                       class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2 text-sm
                              focus:border-primary focus:ring-primary focus:outline-none">
            </div>

            <!-- ACTION -->
            <div class="pt-4 flex justify-end gap-3">
                <a href="../dashboard.php?page=kategori"
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

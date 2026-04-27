<?php
include "inc/koneksi.php";
session_start();

if (!isset($_SESSION['akses'])) {
    header("location:login.php");
    exit;
}

$user  = $_SESSION['username'];
$akses = $_SESSION['akses'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user'");
$tampil = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

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

<body class="bg-slate-100 text-slate-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-slate-200 px-6 py-8">

        <div class="mb-10">
            <h1 class="text-lg font-semibold text-primary tracking-wide">
                PERPUSTAKAAN
            </h1>
            <p class="text-xs text-slate-500">
                Sistem Manajemen Buku
            </p>
        </div>

        <div class="mb-8 p-4 rounded-xl bg-primarySoft">
            <p class="text-xs text-slate-500">Login sebagai</p>
            <p class="font-medium text-primary">
                <?= htmlspecialchars($tampil['username']); ?>
            </p>
            <p class="text-xs text-slate-500 mt-1">
                Role: <?= htmlspecialchars($akses); ?>
            </p>
        </div>

        <nav class="space-y-2">

            <?php
            function menu($label, $page) {
                $active = (!isset($_GET['page']) && $page == 'awal') ||
                          (isset($_GET['page']) && $_GET['page'] == $page);
                return '
                <a href="?page='.$page.'"
                   class="group relative flex items-center px-4 py-3 rounded-xl transition
                   '.($active
                        ? 'bg-primarySoft text-primary font-medium'
                        : 'text-slate-600 hover:bg-primarySoft hover:text-primary').'
                   ">
                    <span class="absolute left-0 h-0 group-hover:h-2/3 w-1 bg-accent rounded-r transition-all
                    '.($active ? 'h-2/3' : '').'"></span>
                    '.$label.'
                </a>';
            }

            // 🔥 USER HANYA 2 MENU
            if($akses == 'user'){
                echo menu('Dashboard', 'awal');
                echo menu('Peminjaman', 'peminjaman');
                 echo menu('Data Buku', 'buku');
            }

            // 🔥 ADMIN FULL MENU
            if($akses == 'admin'){
                echo menu('Dashboard', 'awal');
                echo menu('Data Buku', 'buku');
                echo menu('Anggota', 'anggota');
                echo menu('Peminjaman', 'peminjaman');
                echo menu('Kategori', 'kategori');
                echo menu('Penerbit', 'penerbit');
                echo menu('Profile', 'profile');
            }
            ?>

            <a href="logout.php"
               class="flex items-center px-4 py-3 rounded-xl text-red-600 hover:bg-red-50 transition">
                Logout
            </a>
        </nav>

    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-10">

        <div class="bg-white rounded-2xl border border-slate-200 p-8 min-h-[80vh] shadow-sm">

            <?php
            if (isset($_GET['page'])) {

                switch ($_GET['page']) {

                    case 'awal':
                        include "awal.php";
                        break;

                    case 'peminjaman':
                        include "peminjaman/view_peminjaman.php";
                        break;
  case 'tambah_peminjaman':
                        include "peminjaman/tambah_peminjaman.php";
                        break;

                    // 🔥 SEMUA HALAMAN INI KHUSUS ADMIN
                   case 'buku':
                        include "buku/view_buku.php";
                        break;

                    case 'anggota':
                        if($akses != 'admin'){ die("Akses ditolak"); }
                        include "anggota/view_anggota.php";
                        break;

                    case 'kategori':
                        if($akses != 'admin'){ die("Akses ditolak"); }
                        include "kategori/view_kategori.php";
                        break;

                    case 'penerbit':
                        if($akses != 'admin'){ die("Akses ditolak"); }
                        include "penerbit/view_penerbit.php";
                        break;

                    case 'profile':
                        if($akses != 'admin'){ die("Akses ditolak"); }
                        include "profile.php";
                        break;

                    default:
                        include "404.php";
                        break;
                }

            } else {
                include "awal.php";
            }
            ?>

        </div>

    </main>

</div>

</body>
</html>

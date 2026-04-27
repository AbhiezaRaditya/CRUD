<?php
include "inc/koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}
?>

<div class="max-w-3xl">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-slate-800">Profile Pengguna</h2>
        <p class="text-sm text-slate-500">
            Informasi akun pengguna
        </p>
    </div>

    <!-- PROFILE CARD -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <!-- TOP -->
        <div class="bg-primarySoft px-8 py-6">
            <p class="text-xs text-slate-500">Login sebagai</p>
            <h3 class="text-lg font-semibold text-primary">
                <?= htmlspecialchars($tampil['akses']); ?>
            </h3>
        </div>

        <!-- BODY -->
        <div class="px-8 py-6 grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <p class="text-xs text-slate-500 mb-1">Nama</p>
                <p class="font-medium text-slate-800">
                    <?= htmlspecialchars($tampil['nama']); ?>
                </p>
            </div>

            <div>
                <p class="text-xs text-slate-500 mb-1">Email</p>
                <p class="font-medium text-slate-800">
                    <?= htmlspecialchars($tampil['email']); ?>
                </p>
            </div>

            <div>
                <p class="text-xs text-slate-500 mb-1">No Telepon</p>
                <p class="font-medium text-slate-800">
                    <?= htmlspecialchars($tampil['no_tlp']); ?>
                </p>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="px-8 py-5 border-t border-slate-200 bg-slate-50 flex justify-end">
            <a href="dashboard.php"
               class="px-5 py-2 rounded-xl bg-primary text-white text-sm font-medium hover:bg-accent transition">
                Kembali ke Dashboard
            </a>
        </div>

    </div>

</div>

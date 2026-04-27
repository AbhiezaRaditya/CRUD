<?php
session_start();
include "inc/koneksi.php";

if (isset($_SESSION['akses'])) {
    header("location:dashboard.php");
    exit;
}

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query  = "SELECT * FROM users 
               WHERE username='$username' 
               AND password='$password'";
    $hasil  = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($hasil) > 0) {

        $data = mysqli_fetch_assoc($hasil);

        $_SESSION['id_user']  = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['akses']    = $data['akses']; 

        header("location:dashboard.php");
        exit;

    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>


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

<body class="min-h-screen bg-primarySoft flex items-center justify-center">

<div class="w-full max-w-sm bg-white rounded-2xl shadow-lg border border-slate-200 p-8">

    <!-- HEADER -->
    <div class="text-center mb-6">
        <div class="mx-auto w-14 h-14 flex items-center justify-center rounded-full bg-primarySoft text-primary text-3xl mb-3">
            🔐
        </div>
        <h1 class="text-2xl font-semibold">Login Sistem</h1>
        <p class="text-sm text-slate-500">Masuk ke dashboard perpustakaan</p>
    </div>

    <!-- ERROR -->
    <?php if ($error != ""): ?>
        <div class="mb-4 bg-red-50 text-red-700 text-sm px-4 py-3 rounded-lg">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <!-- FORM -->
    <form method="post" class="space-y-4">
        <div>
            <label class="block text-sm font-medium mb-1">Username</label>
            <input type="text" name="username" required
                   class="w-full rounded-xl border border-slate-300 px-4 py-2.5 
                          focus:outline-none focus:ring-2 focus:ring-primarySoft focus:border-primary">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full rounded-xl border border-slate-300 px-4 py-2.5 
                          focus:outline-none focus:ring-2 focus:ring-primarySoft focus:border-primary">
        </div>

        <button type="submit" name="login"
                class="w-full bg-primary text-white py-2.5 rounded-xl font-medium
                       hover:bg-accent transition">
            Masuk
        </button>
    </form>

</div>

</body>
</html>

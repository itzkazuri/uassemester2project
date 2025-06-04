<?php
// Ambil nama file dari halaman saat ini
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/nav.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <img src="asset/img/logo.png" alt="Logo" width="175px" height="66px" />
        <div class="navbar-nav">
            <a class="<?php echo $current_page == 'ctrash.php' ? 'color' : ''; ?>" href="ctrash.php">BERANDA</a>
            <a class="<?php echo $current_page == 'login.php' ? 'color' : ''; ?>" href="daftar/login.php">LOGIN</a>
        </div>
        <div class="menu-toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <!-- navbar -->

    <!-- Sisa konten halaman -->
</body>

</html>
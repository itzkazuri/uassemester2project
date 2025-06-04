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
    <link rel="stylesheet" href="../asset/css/navbar.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <img src="../asset/img/logo.png" alt="Logo" width="175px" height="66px" />
        <div class="navbar-nav">
            <a class="<?php echo $current_page == 'beranda.php' ? 'color' : ''; ?>"
                href="../user/beranda.php">BERANDA</a>
            <a class="<?php echo $current_page == 'data.php' ? 'color' : ''; ?>" href="../user/data.php#section-data">DATA</a>
            <a class="<?php echo $current_page == 'history.php' ? 'color' : ''; ?>"
                href="../user/history.php">HISTORY</a>
            <a class="<?php echo $current_page == 'lokasi.php' ? 'color' : ''; ?>"
                href="../user/lokasi.php#section-lokasi">LOKASI</a>
            <a class="<?php echo $current_page == 'tabungan.php' ? 'color' : ''; ?>"
                href="../user/tabungan.php">TABUNGAN</a>
            <a class="<?php echo $current_page == 'profile.php' ? 'color' : ''; ?>"
                href="../user/profile.php">PROFIL</a>
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
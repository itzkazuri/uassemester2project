<?php
session_start();

// Ambil nama file dari halaman saat ini
$current_page = basename($_SERVER['PHP_SELF']);

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id'])) {
    header("Location: ../daftar/login.php");
    exit();
}

// Sambungkan ke database
require_once "../daftar/koneksi.php";

// Ambil ID pengguna dari session
$id_pengguna = $_SESSION['id'];

// Query untuk mengambil informasi pengguna berdasarkan ID
$sql = "SELECT nama FROM users WHERE id = $id_pengguna";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Ambil nama pengguna dari hasil query
$row = mysqli_fetch_assoc($result);
$nama_pengguna = $row['nama'];

// Tutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css">
</head>

<body>

    <nav class="navbar">
        <img src="../asset/img/ctrah-amdnim.png" alt="Logo" width="175px" height="66px" />
        <div class="navbar-nav">
            <span>
                <svg width="20" height="20" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.5 14.0625C16.3818 14.0625 19.5312 10.9131 19.5312 7.03125C19.5312 3.14941 16.3818 0 12.5 0C8.61816 0 5.46875 3.14941 5.46875 7.03125C5.46875 10.9131 8.61816 14.0625 12.5 14.0625ZM18.75 15.625H16.0596C14.9756 16.123 13.7695 16.4062 12.5 16.4062C11.2305 16.4062 10.0293 16.123 8.94043 15.625H6.25C2.79785 15.625 0 18.4229 0 21.875V22.6562C0 23.9502 1.0498 25 2.34375 25H22.6562C23.9502 25 25 23.9502 25 22.6562V21.875C25 18.4229 22.2021 15.625 18.75 15.625Z"
                        fill="black" />
                </svg>
                <p><?php echo $nama_pengguna; ?></p>
            </span>
            <a href="logout.php">
                <svg width="20" height="17" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M24.5943 14.1682L16.0003 21.5893C15.2481 22.239 14.0625 21.7116 14.0625 20.7024V16.7936C6.21929 16.7038 5.72205e-06 15.1318 5.72205e-06 7.69893C5.72205e-06 4.69888 1.93267 1.72681 4.069 0.172953C4.73565 -0.311958 5.68575 0.296635 5.43995 1.08267C3.22589 8.16333 6.4901 10.0431 14.0625 10.1521V5.85938C14.0625 4.84864 15.249 4.32359 16.0003 4.97247L24.5943 12.3943C25.1349 12.8612 25.1356 13.7006 24.5943 14.1682Z"
                        fill="black" />
                </svg>
                <p>Log Out</p>
            </a>
        </div>
    </nav>
    
    <div class="sidebar">
        <a class="<?php echo $current_page == 'registrasi.php' ? 'color' : ''; ?>"
            href="../admin/registrasi.php">Registrasi</a>
        <a class="<?php echo $current_page == 'beranda-admin.php' ? 'color' : ''; ?>"
            href="../admin/beranda-admin.php">Beranda CTrash</a>
        <a class="<?php echo $current_page == 'nasabah.php' ? 'color' : ''; ?>" href="../admin/nasabah.php">Nasabah</a>
        <a class="<?php echo $current_page == 'penambahan-data-sampah.php' ? 'color' : ''; ?>"
            href="../admin/penambahan-data-sampah.php">Penambahan Data Sampah</a>
        <a class="<?php echo $current_page == 'profile.php' ? 'color' : ''; ?>" href="../admin/profile.php">Profil</a>
        <a class="<?php echo $current_page == 'master-data-admin.php' ? 'color' : ''; ?>"
            href="../admin/master-data-admin.php">Master Data Admin</a>
        <a class="<?php echo $current_page == 'master-data-plastik.php' ? 'color' : ''; ?>"
            href="../admin/master-data-plastik.php">Master Data Sampah Plastik</a>
        <a class="<?php echo $current_page == 'master-data-kaleng.php' ? 'color' : ''; ?>"
            href="../admin/error.html">Master Data Sampah Kaleng</a>
        <a class="<?php echo $current_page == 'penarikan-tabungan.php' ? 'color' : ''; ?>"
            href="../admin/penarikan-tabungan.php">Penarikan Tabungan</a>
        <div class="menu-toggle" id="close-btn">
            <img src="../asset/img/toggel.png" alt="">
        </div>
    </div>

    <script src="../asset/js/sidebar.js"></script>
</body>

</html>

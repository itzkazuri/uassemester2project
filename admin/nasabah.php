<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki level admin
if (!isset($_SESSION['id']) || empty($_SESSION['is_level']) || $_SESSION['is_level'] !== 'admin') {
    header("Location: ../user/beranda.php");
    exit();
}

require_once '../daftar/koneksi.php'; // Pastikan file koneksi sudah ada dan benar

// Query untuk mengambil data nasabah
$sql = "SELECT id, nama, foto_profil FROM users WHERE is_level = 'user'";
$result = $conn->query($sql);
$nasabahs = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nasabahs[] = $row;
    }
} else {
    echo "Tidak ada data nasabah ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/nasabah.css">
</head>

<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>
    <!-- sidebar menu -->

    <div class="main-content">
        <!-- main content start -->

        <button class="tambahdata"><a href="tambah-data-profil.php"><svg style="margin-top: 5px;" width="21" height="21"
                    viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.75 0H2.25C1.00781 0 0 1.00781 0 2.25V18.75C0 19.9922 1.00781 21 2.25 21H18.75C19.9922 21 21 19.9922 21 18.75V2.25C21 1.00781 19.9922 0 18.75 0ZM17.25 11.8125C17.25 12.1219 16.9969 12.375 16.6875 12.375H12.375V16.6875C12.375 16.9969 12.1219 17.25 11.8125 17.25H9.1875C8.87813 17.25 8.625 16.9969 8.625 16.6875V12.375H4.3125C4.00313 12.375 3.75 12.1219 3.75 11.8125V9.1875C3.75 8.87813 4.00313 8.625 4.3125 8.625H8.625V4.3125C8.625 4.00313 8.87813 3.75 9.1875 3.75H11.8125C12.1219 3.75 12.375 4.00313 12.375 4.3125V8.625H16.6875C16.9969 8.625 17.25 8.87813 17.25 9.1875V11.8125Z"
                        fill="black" />
                </svg> Tambah </a></button>

        <div class="container-profil">
            <?php if (empty($nasabahs)) : ?>
                <p>Tidak ada data nasabah ditemukan.</p>
            <?php else : ?>
                <?php foreach ($nasabahs as $nasabah) : ?>
                    <a href="beranda-admin.php?id=<?php echo $nasabah['id']; ?>">
                        <div class="box">
                            <img src="<?php echo empty($nasabah['foto_profil']) ? '../asset/img/default-profile.jpg' : '../uploads/' . $nasabah['foto_profil']; ?>"
                                alt="Foto Profil" class="circle" />
                            <p><?php echo htmlspecialchars($nasabah['nama']); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div> <!-- main content end -->

    <script src="../asset/js/sidebar.js"></script>
</body>

</html>

<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki level admin
if (!isset($_SESSION['id']) || empty($_SESSION['is_level']) || $_SESSION['is_level'] !== 'admin') {
    header("Location: ../user/beranda.php");
    exit();
}

require_once '../daftar/koneksi.php'; // Pastikan file koneksi sudah ada dan benar

// Ambil ID user dari parameter URL atau gunakan ID default 1
$user_id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Query untuk mengambil data user
$sql_user = "SELECT * FROM users WHERE id = $user_id";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();

    // Tentukan path foto profil, gunakan default jika tidak ada
    $foto_profil = empty($user['foto_profil']) ? '../asset/img/default-profile.jpg' : '../uploads/' . $user['foto_profil'];
} else {
    echo "User tidak ditemukan.";
    exit();
}

// Query untuk menghitung jumlah sampah yang berhasil dikumpulkan
$sql_sampah = "SELECT SUM(jumlah) AS total_sampah FROM histori_pengumpulan WHERE user_id = $user_id";
$result_sampah = $conn->query($sql_sampah);

if ($result_sampah->num_rows > 0) {
    $data_sampah = $result_sampah->fetch_assoc();
    $total_sampah = $data_sampah['total_sampah'] ? $data_sampah['total_sampah'] : 0;
} else {
    $total_sampah = 0;
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
    <link rel="stylesheet" href="../asset/cssadmin/beranda.css">
</head>

<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>
    <div class="container-body">
        <div class="container-flex">
            <div class="body-data-profile">
                <div class="box-profile">
                    <img class="circle" src="<?php echo $foto_profil; ?>" alt="Foto Profil">
                    <p><?php echo htmlspecialchars($user['nama']); ?></p>
                </div>
                <a href="nasabah.php">
                    <button class="btn-pilih">Pilih</button>
                </a>
            </div>
            <div class="body-jumlah-sampah">
                <img src="../asset/img/icon/sampah.png" class="img-sampah" alt="">
                <div class="jumlah-sampah">
                    <h2 class="totalpcs"><?php echo $total_sampah; ?> Pcs</h2>
                    <p>Sampah Berhasil Dikumpulkan</p>
                </div>
            </div>
        </div>
        <div class="container-flexs">
            <div class="data-sampah-dikumpulkan">
                <div class="detail-data-sampah">
                    <h2><?php echo $total_sampah; ?> Pcs</h2>
                    <p>Sampah Berhasil Dikumpulkan</p>
                </div>
            </div>
            <div class="data-saldo">
                <div class="detail-saldo">
                    <p>Saldo user saat ini</p>
                    <h2>Rp <?php echo number_format($user['saldo'], 2, ',', '.'); ?></h2>
                </div>
            </div>
        </div>
    </div>

    <!-- sidebar menu -->
    <script src="../asset/js/sidebar.js"></script>
</body>

</html>

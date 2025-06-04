<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki level user
if (!isset($_SESSION['id']) || empty($_SESSION['is_level']) || $_SESSION['is_level'] !== 'user') {
    header("Location: ../user/beranda.php");
    exit();
}

require_once '../daftar/koneksi.php';

// Ambil id pengguna dari sesi
$user_id = $_SESSION['id'];

// Query untuk mengambil data histori pengumpulan sampah berdasarkan user_id
$query = "SELECT h.*, u.nama AS nama_pengumpul
          FROM histori_pengumpulan h
          JOIN users u ON h.user_id = u.id
          WHERE h.user_id = ?
          ORDER BY h.tanggal DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Query untuk menghitung total pengumpulan sampah berdasarkan user_id
$query_total = "SELECT SUM(jumlah) AS total_sampah FROM histori_pengumpulan WHERE user_id = ?";
$stmt_total = $conn->prepare($query_total);
$stmt_total->bind_param("i", $user_id);
$stmt_total->execute();
$result_total = $stmt_total->get_result();
$row_total = $result_total->fetch_assoc();
$total_sampah = $row_total['total_sampah'] ? $row_total['total_sampah'] : 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/navbar.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
    <link rel="stylesheet" href="../asset/css/his.css">
</head>

<body>
    <?php require_once '../template/user/navbar.php'; ?>
    <div class="container-history">
        <section class="collection-summary">
            <h1><?php echo htmlspecialchars($total_sampah); ?> Pcs</h1>
            <p>Sampah Berhasil Dikumpulkan</p>
        </section>
        <section class="history">
            <h2>RIWAYAT PENGUMPULAN SAMPAH</h2>
            <div class="table-container">
                <table class="tb-history">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Tanggal Pengumpulan</th>
                            <th>Nama Pengumpul</th>
                            <th>Lokasi Pengumpulan</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Ukuran</th>
                            <th>Jumlah (Pcs)</th>
                            <th>Uang Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . date("d - m - Y", strtotime($row['tanggal'])) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_pengumpul']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['tempat']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['kategori']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jenis_sampah']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ukuran']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jumlah']) . "</td>";
                            echo "<td>Rp." . number_format($row['total'], 2, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="pemberitahuan">
                <p><span>Disclaimer:</span> Mohon diperhatikan bahwa penarikan tabungan hanya dapat dilakukan satu kali
                    dalam periode 24 jam. Selain itu, proses penarikan hanya tersedia pada rentang waktu antara jam 7
                    pagi hingga 10 malam setiap harinya.</p>
            </div>
        </section>
    </div>
    <?php require_once '../template/user/fot.php'; ?>
    <script src="../asset/js/beranda.js"></script>
</body>

</html>

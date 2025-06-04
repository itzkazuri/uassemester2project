<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['is_level'] !== 'user') {
    header("Location: ../daftar/login.php");
    exit();
}

// Memastikan koneksi sudah terhubung
require_once '../daftar/koneksi.php';

// Ambil data nama dan user_id dari session
$nama_pengguna = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';
$user_id = $_SESSION['id'];

// Ambil saldo terbaru dari database
$query_saldo = "SELECT saldo FROM users WHERE id = $user_id";
$result_saldo = mysqli_query($conn, $query_saldo);
if ($result_saldo) {
    $row_saldo = mysqli_fetch_assoc($result_saldo);
    if ($row_saldo) {
        $saldo = $row_saldo['saldo'];
        // Perbarui saldo di session
        $_SESSION['saldo'] = $saldo;
    } else {
        $saldo = 0.00;
    }
} else {
    // Handle error jika query tidak berhasil dieksekusi
    echo "Error: " . mysqli_error($conn);
    exit();
}
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
    <link rel="stylesheet" href="../asset/css/penarikan.css">
</head>

<body>
    <?php require_once '../template/user/navbar.php'; ?>

    <div class="container-tabunga">
        <div class="balance">
            <p>Saldo Anda Saat Ini !</p>
            <h2>Rp. <?= number_format($saldo, 0, ',', '.'); ?></h2>
        </div>
        <!-- form -->
        <div class="form-container">
            <h3>Ajukan Penarikan</h3>
            <form action="proses-penarikan.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Penarik </label>
                    <input type="text" id="nama" name="nama" value="<?= isset($_SESSION['nama']) ? htmlspecialchars($_SESSION['nama']) : ''; ?>" />
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Penarikan </label>
                    <label class="rupiah" for="rp">Rp. </label>
                    <input type="number" id="jumlah" name="jumlah" placeholder="Rp." />
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Penarikan </label>
                    <input type="date" id="tanggal" name="tanggal" />
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi Penarikan </label>
                    <input type="text" id="lokasi" name="lokasi" />
                </div>
                <div class="container-btn-kirim">
                    <button type="submit" class="btn-kirim">KIRIM</button>
                </div>
            </form>
        </div>
        <!-- form -->
        <div class="box-batas"></div>
        <!-- tabel -->
        <div class="table-tabungan">
            <h3>Riwayat Penarikan</h3>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Penarik</th>
                        <th>Jumlah Penarikan</th>
                        <th>Tanggal Penarikan</th>
                        <th>Lokasi Penarikan</th>
                        <th>Persetujuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query untuk menampilkan riwayat penarikan berdasarkan user_id
                    $query_penarikan = "SELECT * FROM penarikan WHERE user_id = $user_id";
                    $result_penarikan = mysqli_query($conn, $query_penarikan);
                    if ($result_penarikan && mysqli_num_rows($result_penarikan) > 0) {
                        $no = 1;
                        while ($row_penarikan = mysqli_fetch_assoc($result_penarikan)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row_penarikan['nama_penarik']) . "</td>";
                            echo "<td>Rp. " . number_format($row_penarikan['jumlah_penarikan'], 0, ',', '.') . "</td>";
                            echo "<td>" . htmlspecialchars($row_penarikan['tgl_penarikan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row_penarikan['lokasi']) . "</td>";
                            echo "<td>" . htmlspecialchars($row_penarikan['validasi']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Belum ada riwayat penarikan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- tabel -->
        <div class="pemberitahuan">
            <p><span>Disclaimer:</span> Mohon diperhatikan bahwa penarikan tabungan hanya dapat dilakukan satu kali dalam periode 24 jam. Selain itu, proses penarikan hanya tersedia pada rentang waktu antara jam 7 pagi hingga 5 sore.</p>
        </div>
    </div>

    <?php require_once '../template/footer.php'; ?>
</body>

</html>

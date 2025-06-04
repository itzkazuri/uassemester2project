<?php
session_start();

// Pastikan pengguna sudah login dan memiliki level user
if (!isset($_SESSION['id']) || $_SESSION['is_level'] !== 'user') {
    header("Location: ../daftar/login.php");
    exit();
}

// Memastikan koneksi sudah terhubung
require_once '../daftar/koneksi.php';

// Inisialisasi $id_user dari session
$id_user = $_SESSION['id'];

// Ambil saldo pengguna dari tabel pengguna
$query_saldo = "SELECT saldo FROM users WHERE id = $id_user";
$result_saldo = mysqli_query($conn, $query_saldo);

if ($result_saldo) {
    $row_saldo = mysqli_fetch_assoc($result_saldo);
    $saldo_pengguna = $row_saldo['saldo'];
} else {
    $saldo_pengguna = 0; // Default jika query gagal atau saldo tidak ditemukan
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
    <link rel="stylesheet" href="../asset/css/tabungan.css">
    <style>
        /* Styling tambahan */
        .container-tabunga {
            padding: 20px;
        }

        .table-tabungan {
            margin-top: 20px;
        }

        .body-btn-tabungan {
            margin-top: 20px;
        }

        .body-btn-tabungann {
            margin-top: 20px;
        }

        .pemberitahuan {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php require_once '../template/user/navbar.php'; ?>
    <div class="container-tabunga">
        <div class="balance">
            <p>Saldo Anda Saat Ini !</p>
            <h2>Rp. <?php echo number_format($saldo_pengguna, 0, ',', '.'); ?></h2>
        </div>

        <section class="withdrawal-info">
            <div class="info-box">
                <div class="info-box-titel">
                    <h3>Informasi Penarikan </h3>
                    <img src="../asset/img/icon/pemberitahuan.png" alt="">
                </div>
                <p>Anda telah berhasil mengajukan permintaan penarikan. Mohon ditunggu sementara kami memproses dan
                    menyetujui permintaan Anda. Proses persetujuan ini mungkin memerlukan waktu beberapa saat.</p>
                <p>Silakan periksa bagian Riwayat Penarikan untuk melihat status penarikan anda ketika penarikan telah
                    disetujui.</p>
                <p>Terima kasih atas kesabaran dan pengertiannya.</p>
            </div>
        </section>
        <div class="box-batas"></div>
        <div class="table-tabungan">
            <h3>Penarikan yang Diminta</h3>
            <!-- tabel penarikan -->
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Penarik</th>
                        <th>Jumlah Penarikan</th>
                        <th>Tanggal Penarikan</th>
                        <th>Lokasi Penarikan</th>
                        <th>Disetujui</th> <!-- tambahan kolom -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Looping data penarikan dari database -->
                    <?php
                    // Query untuk mengambil data penarikan
                    $query_penarikan = "SELECT * FROM penarikan WHERE user_id = $id_user";
                    $result_penarikan = mysqli_query($conn, $query_penarikan);

                    if ($result_penarikan && mysqli_num_rows($result_penarikan) > 0) {
                        $no = 1;
                        while ($row_penarikan = mysqli_fetch_assoc($result_penarikan)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row_penarikan['nama_penarik'] . "</td>";
                            echo "<td>Rp. " . number_format($row_penarikan['jumlah_penarikan'], 0, ',', '.') . "</td>";
                            echo "<td>" . $row_penarikan['tgl_penarikan'] . "</td>";
                            echo "<td>" . $row_penarikan['lokasi'] . "</td>";
                            echo "<td>" . $row_penarikan['validasi'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Belum ada data penarikan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- tabel penarikan -->
            <!-- tombol sumbit -->
            <div class="body-btn-tabungan">
                <a href="tabungan.php"><button class="btn-tabungan">Oke</button></a>
            </div>
            <!-- tombol sumbit tombol untuk validasi penarikan kalau berhasil menarik dia akan ke halaman tabunga.php -->
        </div>
        <!-- tombol sumbit -->
        <div class="body-btn-tabungann">
            <button class="btn-tabungan">Oke</button>
        </div>
        <!-- tombol sumbit tombol untuk validasi penarikan kalau berhasil menarik dia akan ke halaman tabunga.php -->
        <div class="pemberitahuan">
            <p><span>Disclaimer:</span> Mohon diperhatikan bahwa penarikan tabungan hanya dapat dilakukan satu kali
                dalam periode 24 jam. Selain itu, proses penarikan hanya tersedia pada rentang waktu antara jam 7 pagi
                hingga 10 malam setiap harinya.</p>
        </div>
    </div>

    <?php require_once '../template/user/fot.php'; ?>
    <script src="../asset/js/beranda.js"></script>
</body>

</html>

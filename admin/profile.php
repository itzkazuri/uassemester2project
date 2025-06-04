<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki level admin
if (!isset($_SESSION['id']) || empty($_SESSION['is_level']) || $_SESSION['is_level'] !== 'admin') {
    header("Location: ../user/beranda.php");
    exit();
}

// Include file koneksi database

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/profile.css">
</head>

<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>
    <!-- sidebar menu -->

    <div class="main-content">
        <!-- main content start -->

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>
                            <!-- icon garis tiga -->
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                            </svg>

                        </th>

                        <!-- input untuk nama table -->
                        <th colspan="7" class="borderilang">
                            Profil Nasabah
                        </th>

                        <!--  -->
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>No HP</th>
                            <th>Alamat Email</th>
                            <th>Foto</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../daftar/koneksi.php";

                    
                    // Query SQL untuk mengambil data pengguna yang aktif (status = 'aktif')
                    $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
                    $sql = "SELECT nama, jenis_kelamin, tgl_lahir, no_hp, email, foto_profil FROM users WHERE status = 'aktif'";
                    $result = $conn->query($sql);
                    
                    // Penanganan error jika query tidak berjalan
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['tgl_lahir']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td><img src='" . htmlspecialchars($row['foto_profil']) . "' alt='Foto Profil'></td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada data pengguna yang aktif.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div> <!-- main content end -->

    <!--  -->
    </div>

    <!--  -->
    </div>
    <script src="../asset/js/sidebar.js"></script>
</body>

</html>

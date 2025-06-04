<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki level admin
if (!isset($_SESSION['id']) || empty($_SESSION['is_level']) || $_SESSION['is_level'] !== 'admin') {
    header("Location: ../user/beranda.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi</title>
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/content-registrasi.css">
    <style>
        /* CSS tambahan untuk tampilan tabel */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <!-- Sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>

    <div class="main-content">
        <!-- Main content start -->
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
require_once "../daftar/koneksi.php";

// Buka koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nama, password, alamat, no_hp, status FROM users WHERE is_level='user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["alamat"] . "</td>";
        echo "<td>" . $row["no_hp"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>";
        echo "<a href='edit-registrasi.php?id=" . $row["id"] . "'>Edit</a> | ";
        echo "<a href='delete-registrasi.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
}
$conn->close();
?>

                </tbody>
            </table>
        </div>
    </div> <!-- Main content end -->

    <script src="../asset/js/sidebar.js"></script>
</body>

</html>

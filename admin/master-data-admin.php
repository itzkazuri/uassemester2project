<?php

session_start();

// Periksa apakah pengguna sudah login dan memiliki level admin
if (!isset($_SESSION['id']) || empty($_SESSION['is_level']) || $_SESSION['is_level'] !== 'admin') {
    header("Location: ../user/beranda.php");
    exit();
}

require_once "../daftar/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pengumpulan</title>
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/content-registrasi.css">
    <style>
        /* CSS tambahan untuk tampilan tabel */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th, .data-table td {
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
                        <th>Tanggal Pengumpulan</th>
                        <th>Nama Pengumpul</th>
                        <th>Lokasi Pengumpulan</th>
                        <th>Jenis & Ukuran</th>
                        <th>Jumlah (Pcs)</th>
                        <th>Uang Diterima</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Membuat koneksi ke database
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // Query untuk mengambil data dari tabel histori_pengumpulan
                    $sql = "SELECT id, tanggal, user_id, tempat, jenis_sampah, ukuran, jumlah, total FROM histori_pengumpulan";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            // Mengambil nama pengguna dari tabel users berdasarkan user_id
                            $user_id = $row["user_id"];
                            $user_query = "SELECT nama FROM users WHERE id = $user_id";
                            $user_result = $conn->query($user_query);
                            $user_name = $user_result->fetch_assoc()["nama"];
                            
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row["tanggal"] . "</td>";
                            echo "<td>" . $user_name . "</td>";
                            echo "<td>" . $row["tempat"] . "</td>";
                            echo "<td>" . $row["jenis_sampah"] . " & " . $row["ukuran"] . "</td>";
                            echo "<td>" . $row["jumlah"] . "</td>";
                            echo "<td>" . $row["total"] . "</td>";
                            echo "<td><a href='edit-master-data-admin.php?id=" . $row["id"] . "'>Edit</a></td>";
                            echo "<td><a href='hapus-pengumpulan.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Tidak ada data</td></tr>";
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

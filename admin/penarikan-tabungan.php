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
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/penarikan-tabungan.css">
</head>

<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>
    <!-- sidebar menu -->

    <div class="main-content">
        <!-- main content start -->
        <div class="body-tabel">
            <table class="container-tabel">
                <thead>
                    <tr>
                        <th>
                            <!-- icon garis tiga -->
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Icon bisa ditambahkan di sini -->
                            </svg>
                        </th>
                        <!-- input untuk nama table -->
                        <th colspan="7" class="borderilang">
                            Data Nasabah Melakukan Penarikan
                        </th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Nama Penarik</th>
                        <th>Jumlah Penarikan</th>
                        <th>Tanggal Penarikan</th>
                        <th>Lokasi Penarikan</th>
                        <th>Validasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $koneksi = mysqli_connect("localhost", "root", "", "ctrash");

                    // Periksa koneksi
                    if (!$koneksi) {
                        die("Koneksi database gagal: " . mysqli_connect_error());
                    }

                    // Query SQL untuk mendapatkan data penarikan dari database
                    $query = "SELECT * FROM penarikan";
                    $result = mysqli_query($koneksi, $query);

                    if (!$result) {
                        die("Query Error: " . mysqli_error($koneksi));
                    }

                    // Menampilkan data ke dalam tabel
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . ".</td>";
                        echo "<td>" . htmlspecialchars($row['nama_penarik']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['jumlah_penarikan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tgl_penarikan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['lokasi']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['validasi']) . "</td>";
                        echo "<td>";
                        
                        // Hanya tampilkan link validasi jika belum divalidasi
                        if ($row['validasi'] === 'iya') {
                            echo "Sudah divalidasi (Iya)";
                        } elseif ($row['validasi'] === 'tidak') {
                            echo "Sudah divalidasi (Tidak)";
                        } else {
                            // Tampilkan tombol validasi jika belum divalidasi
                            echo "<a href='proses-validasi.php?validasi=iya&id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin memvalidasi penarikan ini?');\">
                                    Validasi Iya
                                  </a> | ";
                            echo "<a href='proses-validasi.php?validasi=tidak&id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin membatalkan penarikan ini?');\">
                                    Validasi Tidak
                                  </a>";
                        }
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='proses-hapus-penarikan.php?nama_penarik=" . urlencode($row['nama_penarik']) . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus penarikan ini?');\">
                                <svg width='22' height='22' viewBox='0 0 22 22' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                    <!-- Icon untuk hapus bisa ditambahkan di sini -->
                                </svg>
                              </a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    // Tutup koneksi
                    mysqli_close($koneksi);
                    ?>
                </tbody>
            </table>
        </div>
        <!-- main content end -->
    </div>
</body>

</html>

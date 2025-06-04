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
    <link rel="stylesheet" href="../asset/cssadmin/edit-penarikan-tabungan.css">

</head>

<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>

    <div class="main-content">
        <!-- main content start -->

        <div class="table-container">

            <div class="content">
                <div class="headeredit">
                    <button class="menu-btn">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg>
                    </button>
                    <p>Modifikasi Data Nasabah Tervalidasi Melakukan Penarikan</p>
                </div>

                <form class="form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama">Nama Penarik :</label>
                            <input type="text" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="jumlah">Jumlah Penarikan :</label>
                            <div class="body-form-group">
                                <span class="rp">Rp</span>
                                <input class="tarikjumlah" type="number" id="number" name="number">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date">Tanggal Penarikan :</label>
                            <input class="tanggal" type="date" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="lokasipenarikan">Lokasi Penarikan :</label>
                            <input class="lokasi" type="text" id="lokasipenarikan" name="lokasipenarikan"
                                value="Tempat Pengepul Sampah 'Ctrash' di Jalan HayamWuruk, Denpasar timur, Bali">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="status">Persetujuan :</label>
                            <select name="status" id="status">
                                <option value="Di Setujui"> Di Setujui</option>
                                <option value="Tidak Di Setujui"> Tidak Di Setujui</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-buttons">
                        <a href="penarikan-tabungan.php"> <button type="button" class="btn-save">Simpan</button>
                        </a>
                        <a href="penarikan-tabungan.php"> <button type="button"
                                class="btn-cancel">Batal</button> </a>
                    </div>
                </form>

            </div>



            <!-- end -->
        </div>
    </div> <!-- main content end -->

    <!--  -->
    </div>

    <!-- sidebar menu -->
    <script src="../asset/js/sidebar.js"></script>
</body>

</html>
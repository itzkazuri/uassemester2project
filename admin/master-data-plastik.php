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
    <link rel="stylesheet" href="../asset/cssadmin/data-plastik.css">
</head>
<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>
    <!-- sidebar menu -->

    <div class="main-content">
        <!-- main content start -->

        <h1> Master Data Sampah Plastik & Kaleng </h1>

        <div class="row">
            <div class="tambahdata">
                <a href="tambah-master-data-sampah.php">
                    <svg style="margin-top: 5px;" width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.75 0H2.25C1.00781 0 0 1.00781 0 2.25V18.75C0 19.9922 1.00781 21 2.25 21H18.75C19.9922 21 21 19.9922 21 18.75V2.25C21 1.00781 19.9922 0 18.75 0ZM17.25 11.8125C17.25 12.1219 16.9969 12.375 16.6875 12.375H12.375V16.6875C12.375 16.9969 12.1219 17.25 11.8125 17.25H9.1875C8.87813 17.25 8.625 16.9969 8.625 16.6875V12.375H4.3125C4.00313 12.375 3.75 12.1219 3.75 11.8125V9.1875C3.75 8.87813 4.00313 8.625 4.3125 8.625H8.625V4.3125C8.625 4.00313 8.87813 3.75 9.1875 3.75H11.8125C12.1219 3.75 12.375 4.00313 12.375 4.3125V8.625H16.6875C16.9969 8.625 17.25 8.87813 17.25 9.1875V11.8125Z"
                            fill="black" />
                    </svg>
                    <span>Tambah</span>
                </a>
            </div>

            <select class="editkategor" name="" id="">
                <option value="Semua">Semua</option>
                <option value="Plastik">Plastik</option>
                <option value="Kaleng">Kaleng</option>
            </select>
        </div>

        <div class="body-tabel">
            <div class="table-container">
                <!-- Tabel akan dimuat di sini berdasarkan permintaan AJAX -->
                <table class="data-table">
                    <thead>
                        
                    </thead>
                    <tbody>
                        <!-- Isi tabel akan dimuat melalui AJAX -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- main content end -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../asset/js/sidebar.js"></script>
    <script>
        $(document).ready(function () {
            $('.editkategor').change(function () {
                var kategori = $(this).val(); 

                $.ajax({
                    url: 'namatablesampah.php', 
                    type: 'GET',
                    data: { kategori: kategori }, 
                    success: function (response) {
                        $('.table-container tbody').html(response); // Ganti konten tabel dengan hasil respons dari PHP
                    },
                    error: function (xhr, status, error) {
                        console.error('Terjadi kesalahan: ' + error);
                    }
                });
            });

            // Event listener untuk tombol hapus
            $('.table-container').on('click', '.btn-hapus', function () {
                var id = $(this).data('id');

                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: 'proses-hapus-sampah.php',
                        type: 'POST',
                        data: { id: id },
                        success: function (response) {
                            if (response === 'sukses') {
                                alert('Data berhasil dihapus.');
                                // Refresh tabel setelah penghapusan
                                $('.editkategor').trigger('change');
                            } else {
                                alert('Gagal menghapus data.');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Terjadi kesalahan: ' + error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../cssadmin/tambahdatapenggunaprofil2.css">

    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/tambah-data-profil.css">
</head>

<body>

    <?php require_once '../template/admin/sidebar.php'; ?>

    <div class="main-content">
        <!-- main content start -->


        <div class="content">
            <div class="headeredit">
                <button class="menu-btn">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18M3 6h18M3 18h18"></path>
                    </svg>
                </button>
                <p>Modifikasi Nama dan Foto pada Profil Beranda </p>
            </div>

            <form class="form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama">foto Nasabah :</label>
                        <input type="file" name="fileUpload" id="fileUpload">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" id="nama" name="nama">
                    </div>
                </div>



                <div class="form-buttons">
                  <a href="nasabah.php"> <button type="submit" class="btn-save">Simpan</button></a>
                  <a href="nasabah.php"> <button type="button" class="btn-cancel">Batal</button></a>
                </div>
            </form>

        </div>



        <!-- end -->
    </div>





    <!-- sidebar menu -->
    <script src="../asset/js/sidebar.js"></script>

</body>

</html>
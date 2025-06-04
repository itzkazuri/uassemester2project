<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Master Data Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../cssadmin/tambahdatapenggunaprofil2.css">
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/tambah-data-master-data-sampah.css">
</head>

<body>

    <?php require_once '../template/admin/sidebar.php'; ?>

    <div class="main-content">
        <div class="content">
            <div class="headeredit">
                <button class="menu-btn">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18M3 6h18M3 18h18"></path>
                    </svg>
                </button>
                <p>Tambah Data Master Data Sampah </p>
            </div>

            <form class="form-container" action="proses-tambah-sampah.php" method="post">
                <div class="form-group">
                    <label for="nama-sampah">Nama Sampah</label>
                    <input type="text" id="nama-sampah" name="nama-sampah" required>
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" id="ukuran" name="ukuran" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <div class="harga-input">
                        <span>Rp.</span>
                        <input type="text" id="harga" name="harga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" required>
                        <option value="plastik">Plastik</option>
                        <option value="Kaleng">Kaleng</option>
                        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                    </select>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="save-button">Simpan</button>
                    <a href="master-data-plastik.php"><button type="button" class="cancel-button">Batal</button></a>
                </div>
            </form>
        </div>
    </div>

    <script src="../asset/js/sidebar.js"></script>
</body>

</html>

<?php
require_once "../daftar/koneksi.php";

// Ambil ID yang dikirimkan dari halaman sebelumnya
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data pengguna berdasarkan ID
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $no_hp = $row['no_hp'];
        $status = $row['status'];
        $email = $row['email'];
        $password = $row['password'];
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID tidak ditemukan";
    exit;
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
    <link rel="stylesheet" href="../asset/cssadmin/edit-registrasi.css">
</head>

<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>

    <div class="main-content">
        <div class="table-container">
            <div class="content">
                <div class="headeredit">
                    <button class="menu-btn">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg>
                    </button>
                    <p>Edit Data Nasabah Yang Bergabung</p>
                </div>

                <form class="form" method="POST" action="edit-proses-registrasi.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" id="alamat" name="alamat" value="<?php echo $alamat; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="no_hp">No. HP :</label>
                            <input type="number" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="status">Status :</label>
                            <select name="status" id="status">
                                <option value="Aktif" <?php if ($status == 'Aktif') echo 'selected'; ?>>Aktif</option>
                                <option value="Non Aktif" <?php if ($status == 'Non Aktif') echo 'selected'; ?>>Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="text" id="password" name="password" value="<?php echo $password; ?>">
                        </div>
                    </div>
                    <div class="form-buttons">
                        <button type="submit" class="btn-save">Simpan</button>
                        <a href="registrasi.php"><button type="button" class="btn-cancel">Batal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../asset/js/sidebar.js"></script>
</body>

</html>

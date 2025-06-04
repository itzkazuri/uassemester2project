<?php
require_once '../daftar/koneksi.php';

// Memastikan id yang diterima adalah numerik
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID histori pengumpulan tidak valid.");
}

$id = $_GET['id'];

// Mengambil data histori pengumpulan berdasarkan id
$query_histori = "SELECT * FROM histori_pengumpulan WHERE id = $id";
$result_histori = mysqli_query($conn, $query_histori);

// Memeriksa apakah query berhasil dijalankan
if (!$result_histori) {
    die("Query gagal dijalankan: " . mysqli_error($conn));
}

$row_histori = mysqli_fetch_assoc($result_histori);

// Mengambil data pengumpul yang aktif dan levelnya 'user'
$query_users = "SELECT id, nama FROM users WHERE is_level='user' AND status='aktif'";
$result_users = mysqli_query($conn, $query_users);

// Mengambil data sampah untuk dipilih
$query_sampah = "SELECT id, nama, ukuran, harga FROM sampah";
$result_sampah = mysqli_query($conn, $query_sampah);

// Proses form jika dikirimkan (POST method)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $nama_pengumpul_id = $_POST['nama_pengumpul'];
    $jenis_sampah_id = $_POST['jenissampah'];
    $jumlah_pcs = $_POST['jumlah_pcs'];

    // Mengambil nama dan ukuran sampah berdasarkan jenis_sampah_id
    $query_jenis_sampah = "SELECT nama, ukuran FROM sampah WHERE id = $jenis_sampah_id";
    $result_jenis_sampah = mysqli_query($conn, $query_jenis_sampah);

    if ($result_jenis_sampah) {
        $jenis_sampah = mysqli_fetch_assoc($result_jenis_sampah);
        $nama_jenis_sampah = $jenis_sampah['nama'];
        $ukuran_sampah = $jenis_sampah['ukuran'];
    } else {
        echo "Error: " . $query_jenis_sampah . "<br>" . mysqli_error($conn);
    }

    // Mengambil harga per pcs dari jenis sampah yang dipilih
    $query_harga = "SELECT harga FROM sampah WHERE id='$jenis_sampah_id'";
    $result_harga = mysqli_query($conn, $query_harga);
    $row_harga = mysqli_fetch_assoc($result_harga);
    $harga_per_pcs = $row_harga['harga'];

    // Menghitung total harga berdasarkan jumlah pcs dan harga per pcs
    $total = $jumlah_pcs * $harga_per_pcs;

    // Query untuk update data histori pengumpulan
    $query_update = "UPDATE histori_pengumpulan SET 
                    user_id = '$nama_pengumpul_id', 
                    tanggal = '$tanggal', 
                    jenis_sampah = '$nama_jenis_sampah', 
                    ukuran = '$ukuran_sampah', 
                    harga = '$harga_per_pcs', 
                    jumlah = '$jumlah_pcs', 
                    total = '$total' 
                    WHERE id = $id";

    // Menjalankan query update
    if (mysqli_query($conn, $query_update)) {
        // Menghitung selisih total harga
        $selisih_total = $total - $row_histori['total'];

        // Update saldo pengguna lama
        $query_update_saldo_lama = "UPDATE users SET saldo = saldo - {$row_histori['total']} WHERE id = {$row_histori['user_id']}";
        mysqli_query($conn, $query_update_saldo_lama);

        // Update saldo pengguna baru
        $query_update_saldo_baru = "UPDATE users SET saldo = saldo + $total WHERE id = $nama_pengumpul_id";
        mysqli_query($conn, $query_update_saldo_baru);

        // Redirect ke halaman master data admin setelah berhasil
        header('Location: master-data-admin.php');
        exit();
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash - Edit Data Pengumpulan</title>
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/edit-master-data-admin.css">
</head>
<body>
    <?php require_once '../template/admin/sidebar.php'; ?>
    <div class="main-content">
        <div class="body-content">
            <div class="headeredit">
                <button class="menu-btn">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18M3 6h18M3 18h18"></path>
                    </svg>
                </button>
                <p>Mengedit pada Master Data Admin</p>
            </div>
            <form action="" method="POST" class="body-form">
                <div class="form-row-flex">
                    <div class="form-grup-flex">
                        <label for="no">No :</label>
                        <input type="number" id="no" name="no" readonly value="<?php echo $row_histori['id']; ?>" />
                    </div>
                    <div class="form-grup-flex">
                        <label for="tanggal">Tanggal Pengumpulan :</label>
                        <input type="date" id="tanggal" name="tanggal" required
                            value="<?php echo $row_histori['tanggal']; ?>" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-grups">
                        <label for="nama_pengumpul">Nama pengumpul :</label>
                        <select name="nama_pengumpul" id="nama_pengumpul" required>
                            <option value="">Pilih Nama Pengumpul</option>
                            <?php while ($row_users = mysqli_fetch_assoc($result_users)) : ?>
                            <option value="<?php echo $row_users['id']; ?>"
                                <?php if ($row_users['id'] == $row_histori['user_id']) echo 'selected'; ?>>
                                <?php echo $row_users['nama']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label for="harga">Harga :</label>
                        <div class="conatin-harga">
                            <label for="harga_rp">Rp</label>
                            <input type="number" id="harga" name="harga" readonly
                                value="<?php echo $row_histori['harga']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-grups">
                        <label for="lokasi">Lokasi Pengumpulan :</label>
                        <input type="text" id="lokasi" name="lokasi"
                            value="<?php echo $row_histori['tempat']; ?>" readonly />
                    </div>
                    <div class="form-grup">
                        <label for="jenissampah">Jenis & Ukuran:</label>
                        <select class="jenisjenis" name="jenissampah" id="jenissampah" required>
                            <option value="">Pilih Jenis & Ukuran Sampah</option>
                            <?php mysqli_data_seek($result_sampah, 0); ?>
                            <?php while ($row_sampah = mysqli_fetch_assoc($result_sampah)) : ?>
                            <option value="<?php echo $row_sampah['id']; ?>"
                                <?php if ($row_sampah['id'] == $row_histori['jenis_sampah']) echo 'selected'; ?>>
                                <?php echo $row_sampah['nama'] . ' - ' . $row_sampah['ukuran']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label for="jumlah_pcs">Jumlah(Pcs) :</label>
                        <input type="number" id="jumlah_pcs" name="jumlah_pcs" required
                            value="<?php echo $row_histori['jumlah']; ?>" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-grup">
                        <label for="total">Total Harga :</label>
                        <div class="conatin-total">
                            <label for="total_rp">Rp</label>
                            <input type="number" id="total" name="total" readonly
                                value="<?php echo $row_histori['total']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn-simpan">Simpan</button>
                    <a href="master-data-admin.php" class="btn-batal">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../asset/jsadmin/sidebar.js"></script>
    <script src="../asset/jsadmin/edit-master-data-admin.js"></script>
</body>
</html>

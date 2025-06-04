<?php
// Koneksi ke database
require_once '../daftar/koneksi.php';

// Ambil id histori pengumpulan dari parameter URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID histori pengumpulan tidak valid.");
}

$id = $_GET['id'];

// Ambil data histori pengumpulan berdasarkan id
$query_histori = "SELECT * FROM histori_pengumpulan WHERE id = $id";
$result_histori = mysqli_query($conn, $query_histori);

if (!$result_histori) {
    die("Query gagal dijalankan: " . mysqli_error($conn));
}

$row_histori = mysqli_fetch_assoc($result_histori);

// Ambil daftar nama pengumpul
$query_users = "SELECT id, nama FROM users WHERE is_level='user' AND status='aktif'";
$result_users = mysqli_query($conn, $query_users);

// Ambil daftar jenis dan ukuran sampah
$query_sampah = "SELECT id, nama, ukuran, harga FROM sampah";
$result_sampah = mysqli_query($conn, $query_sampah);

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $tanggal = $_POST['tanggal'];
    $nama_pengumpul_id = $_POST['nama_pengumpul'];
    $jenis_sampah_id = $_POST['jenissampah'];
    $jumlah_pcs = $_POST['jumlah_pcs'];

    // Ambil nama dan ukuran sampah dari tabel sampah berdasarkan jenis_sampah_id
    $query_jenis_sampah = "SELECT nama, ukuran FROM sampah WHERE id = $jenis_sampah_id";
    $result_jenis_sampah = mysqli_query($conn, $query_jenis_sampah);

    if ($result_jenis_sampah) {
        $jenis_sampah = mysqli_fetch_assoc($result_jenis_sampah);
        $nama_jenis_sampah = $jenis_sampah['nama'];
        $ukuran_sampah = $jenis_sampah['ukuran'];
    } else {
        echo "Error: " . $query_jenis_sampah . "<br>" . mysqli_error($conn);
    }

    // Ambil harga dari jenis sampah
    $query_harga = "SELECT harga FROM sampah WHERE id='$jenis_sampah_id'";
    $result_harga = mysqli_query($conn, $query_harga);
    $row_harga = mysqli_fetch_assoc($result_harga);
    $harga_per_pcs = $row_harga['harga'];

    // Hitung total
    $total = $jumlah_pcs * $harga_per_pcs;

    // Update data histori_pengumpulan
    $query_update = "UPDATE histori_pengumpulan SET 
                    user_id = '$nama_pengumpul_id', 
                    tanggal = '$tanggal', 
                    jenis_sampah = '$nama_jenis_sampah', 
                    ukuran = '$ukuran_sampah', 
                    harga = '$harga_per_pcs', 
                    jumlah = '$jumlah_pcs', 
                    total = '$total' 
                    WHERE id = $id";

    if (mysqli_query($conn, $query_update)) {
        // Redirect atau pesan sukses
        header('Location: master-data-admin.php');
        exit();
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
    }
}
?>

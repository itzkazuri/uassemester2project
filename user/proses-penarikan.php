<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['is_level'] !== 'user') {
    header("Location: ../daftar/login.php");
    exit();
}

// Memastikan koneksi sudah terhubung
require_once '../daftar/koneksi.php';

// Ambil data dari form penarikan
$nama_penarik = isset($_POST['nama']) ? $_POST['nama'] : ''; // Ambil nama penarik dari form
$jumlah_penarikan = $_POST['jumlah'];
$tanggal_penarikan = $_POST['tanggal'];
$lokasi_penarikan = $_POST['lokasi'];
$user_id = $_SESSION['id'];

// Jika nama penarik kosong, isi dengan nama pengguna dari session
if (empty($nama_penarik)) {
    $nama_penarik = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Nama Penarik Kosong';
}

// Ambil saldo terbaru dari database
$query_saldo = "SELECT saldo FROM users WHERE id = $user_id";
$result_saldo = mysqli_query($conn, $query_saldo);

if ($result_saldo) {
    $row_saldo = mysqli_fetch_assoc($result_saldo);
    if ($row_saldo) {
        $saldo_user = $row_saldo['saldo'];
        // Pastikan saldo mencukupi untuk penarikan
        if ($saldo_user >= $jumlah_penarikan) {
            // Kurangi saldo user
            $saldo_baru = $saldo_user - $jumlah_penarikan;

            // Update saldo user di database
            $update_saldo_query = "UPDATE users SET saldo = $saldo_baru WHERE id = $user_id";
            $update_saldo_result = mysqli_query($conn, $update_saldo_query);

            if (!$update_saldo_result) {
                echo "Error updating saldo: " . mysqli_error($conn);
                exit();
            }

            // Insert data penarikan ke tabel penarikan
            $insert_penarikan_query = "INSERT INTO penarikan (user_id, nama_penarik, jumlah_penarikan, tgl_penarikan, lokasi, validasi) 
            VALUES ($user_id, '$nama_penarik', $jumlah_penarikan, '$tanggal_penarikan', '$lokasi_penarikan', 'menunggu')";
            $insert_penarikan_result = mysqli_query($conn, $insert_penarikan_query);

            if ($insert_penarikan_result) {
                // Redirect back to penarikan.php with success message
                header("Location: penarikan.php?status=success");
                exit();
            } else {
                echo "Error inserting penarikan data: " . mysqli_error($conn);
                exit();
            }
        } else {
            echo "Saldo tidak mencukupi untuk melakukan penarikan.";
            exit();
        }
    } else {
        echo "User dengan ID $user_id tidak ditemukan.";
        exit();
    }
} else {
    echo "Error: " . mysqli_error($conn);
    exit();
}
?>

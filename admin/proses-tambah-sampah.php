<?php
// Panggil koneksi ke database
require_once '../daftar/koneksi.php';

// Tangkap data dari form
$namaSampah = $_POST['nama-sampah'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

// Query untuk menyimpan data ke database
$query = "INSERT INTO sampah (nama, ukuran, harga, kategori) VALUES ('$namaSampah', '$ukuran', '$harga', '$kategori')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    // Jika berhasil disimpan, arahkan kembali ke halaman master-data-plastik.php
    header('Location: master-data-plastik.php');
    exit;
} else {
    // Jika gagal, tampilkan pesan error
    echo 'Error: ' . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>

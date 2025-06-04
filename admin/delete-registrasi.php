<?php
require_once "../daftar/koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berdasarkan ID
    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: registrasi.php"); // Redirect ke halaman utama
}
?>

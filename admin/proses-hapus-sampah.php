<?php
// Pastikan request datang dari metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan ID terdefinisi
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Panggil file koneksi.php
        require_once 'koneksi.php';

        // Query untuk menghapus data berdasarkan ID
        try {
            // Buat koneksi menggunakan informasi dari koneksi.php
            $dbh = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode menjadi ERRMODE_EXCEPTION untuk debugging
            
            // Query hapus data
            $stmt = $dbh->prepare('DELETE FROM sampah WHERE id = :id');
            $stmt->bindParam(':id', $id);
            
            // Eksekusi statement
            if ($stmt->execute()) {
                echo 'sukses';
            } else {
                echo 'gagal';
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo 'ID tidak diterima.';
    }
} else {
    echo 'Metode tidak diizinkan.';
}
?>

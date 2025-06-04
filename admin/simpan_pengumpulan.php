<?php
// Include database connection
require_once '../daftar/koneksi.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $user_id = $_POST['user_id'];
    $tanggal = $_POST['tanggal'];
    $tempat = $_POST['tempat'];
    $jenis_sampah = $_POST['jenis_sampah'];
    $ukuran_sampah = $_POST['ukuran_sampah'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];

    // Prepare and execute SQL statement to insert into histori_pengumpulan
    $stmt = $conn->prepare("INSERT INTO histori_pengumpulan (user_id, tanggal, tempat, jenis_sampah, kategori, ukuran, harga, jumlah, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Loop through each item collected
    for ($i = 0; $i < count($jenis_sampah); $i++) {
        // Retrieve kategori and ukuran from sampah table
        $query = "SELECT kategori, ukuran FROM sampah WHERE nama = ?";
        $stmt_category = $conn->prepare($query);
        $stmt_category->bind_param("s", $jenis_sampah[$i]);
        $stmt_category->execute();
        $stmt_category->bind_result($kategori, $ukuran);
        $stmt_category->fetch();
        $stmt_category->close();

        // Insert into histori_pengumpulan table
        $stmt->bind_param("isssssidi", $user_id, $tanggal, $tempat, $jenis_sampah[$i], $kategori, $ukuran, $harga[$i], $jumlah[$i], $total[$i]);
        $stmt->execute();
    }

    // Update user saldo in users table
    $update_query = "UPDATE users SET saldo = saldo + ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("di", $total_amount, $user_id);

    // Calculate total amount to update saldo
    $total_amount = array_sum($total);

    // Execute update statement
    $update_stmt->execute();
    
    // Close statements
    $stmt->close();
    $update_stmt->close();

    // Redirect to a success page
    header("Location: penambahan-data-sampah.php");
    exit();
} else {
    // Redirect to an error page if accessed without POST method
    header("Location: error.php");
    exit();
}
?>

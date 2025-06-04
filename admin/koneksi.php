<?php
$db_host = 'localhost'; // host database, umumnya tetap localhost
$db_name = 'ctrash';    // nama database yang digunakan
$db_username = 'root';  // username MySQL, umumnya root di localhost
$db_password = '';      // password MySQL, umumnya kosong di localhost

try {
    $dbh = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    die(); // Menghentikan skrip jika koneksi gagal
}
?>

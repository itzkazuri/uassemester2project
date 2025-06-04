<?php
$servername = "localhost"; // atau sesuai dengan server database kamu
$username = "root"; // atau sesuai dengan username database kamu
$password = ""; // atau sesuai dengan password database kamu
$dbname = "ctrash";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
   // die("Koneksi gagal: " . $conn->connect_error);
}
?>

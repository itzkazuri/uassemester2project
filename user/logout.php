<?php
// Mulai session
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login
header("location: ../daftar/login.php");
exit;
?>

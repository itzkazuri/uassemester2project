<?php
session_start();
require_once "koneksi.php";

// cek apakah tombol submit sudah di klik atau belum
if (isset($_POST['submit'])) {

    // ambil nilai dari inputan form
    $email = mysqli_real_escape_string($conn, $_POST['email']); // menggunakan $conn dari koneksi.php
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // buat query untuk mencari data user dengan email dan password yang sesuai
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    // jalankan query
    $result = mysqli_query($conn, $sql);

    // cek apakah query menghasilkan baris data atau tidak
    if (mysqli_num_rows($result) == 1) {
        // jika data ditemukan, simpan data ke session dan redirect ke halaman dashboard
        $data = mysqli_fetch_assoc($result);
        // Setelah mengatur session
$_SESSION['id'] = $data['id'];
$_SESSION['email'] = $data['email'];
$_SESSION['is_level'] = $data['is_level']; // pastikan ini diatur dengan benar

// Debugging session
var_dump($_SESSION['is_level']); // pastikan ini menampilkan 'admin' jika user adalah admin

// Pengalihan ke halaman admin jika is_level adalah 'admin'
if ($data['is_level'] == 'admin') {
    header("Location: ../admin/beranda-admin.php");
} else {
    header("Location: ../user/beranda.php");
}
exit();

    } else {
        // Password tidak cocok dengan yang tersimpan di dalam database
        header("Location: login.php?error=wrongpwd");
        exit();
    }
} else {
    // Jika submit belum diklik, redirect kembali ke halaman login
    header("Location: login.php");
    exit();
}
?>

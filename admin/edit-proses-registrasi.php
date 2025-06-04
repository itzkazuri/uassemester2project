<?php
require_once "../daftar/koneksi.php";

// Cek koneksi ke database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah ada parameter ID user yang dikirimkan melalui form POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk update data ke database
    $sql_update = "UPDATE users SET 
                   nama='$nama',
                   alamat='$alamat',
                   no_hp='$no_hp',
                   status='$status',
                   email='$email',
                   password='$password' 
                   WHERE id='$id'";

    // Eksekusi query update ke database
    if ($conn->query($sql_update) === TRUE) {
        // Redirect ke halaman registrasi.php setelah update berhasil
        header("Location: registrasi.php");
        exit();
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    // Jika tidak ada ID yang diberikan, tampilkan pesan error
    die("Error: ID user tidak ditemukan.");
}
?>

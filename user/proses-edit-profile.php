<?php
// Memulai session
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["id"])) {
    header("location: ../daftar/login.php");
    exit;
}

// Include file koneksi database
require_once "koneksi.php";

// Mendapatkan ID pengguna dari session
$id_user = $_SESSION["id"];

// Mendapatkan data yang di-post
$nama = $_POST['name'];
$jenis_kelamin = $_POST['gender'];
$tgl_lahir = $_POST['dob'];
$no_hp = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

// Menyimpan foto profil jika diunggah
if ($_FILES['file']['size'] > 0) {
    $upload_dir = "../uploads/";
    $nama_file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_path = $upload_dir . $nama_file;

    // Pindahkan file yang diunggah ke direktori uploads
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Update database dengan foto profil baru
        if (!empty($password)) {
            $sql = "UPDATE users SET nama = ?, jenis_kelamin = ?, tgl_lahir = ?, no_hp = ?, email = ?, password = ?, foto_profil = ? WHERE id = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sssssssi", $nama, $jenis_kelamin, $tgl_lahir, $no_hp, $email, $password, $nama_file, $id_user);
                if ($stmt->execute()) {
                    // Jika update berhasil, kembali ke halaman profile
                    header("location: profile.php");
                    exit;
                } else {
                    echo "Terjadi kesalahan saat menyimpan data.";
                }
            }
        } else {
            $sql = "UPDATE users SET nama = ?, jenis_kelamin = ?, tgl_lahir = ?, no_hp = ?, email = ?, foto_profil = ? WHERE id = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssssssi", $nama, $jenis_kelamin, $tgl_lahir, $no_hp, $email, $nama_file, $id_user);
                if ($stmt->execute()) {
                    // Jika update berhasil, kembali ke halaman profile
                    header("location: profile.php");
                    exit;
                } else {
                    echo "Terjadi kesalahan saat menyimpan data.";
                }
            }
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }
} else {
    // Update database tanpa mengubah foto profil
    if (!empty($password)) {
        $sql = "UPDATE users SET nama = ?, jenis_kelamin = ?, tgl_lahir = ?, no_hp = ?, email = ?, password = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssssi", $nama, $jenis_kelamin, $tgl_lahir, $no_hp, $email, $password, $id_user);
            if ($stmt->execute()) {
                // Jika update berhasil, kembali ke halaman profile
                header("location: profile.php");
                exit;
            } else {
                echo "Terjadi kesalahan saat menyimpan data.";
            }
        }
    } else {
        $sql = "UPDATE users SET nama = ?, jenis_kelamin = ?, tgl_lahir = ?, no_hp = ?, email = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssi", $nama, $jenis_kelamin, $tgl_lahir, $no_hp, $email, $id_user);
            if ($stmt->execute()) {
                // Jika update berhasil, kembali ke halaman profile
                header("location: profile.php");
                exit;
            } else {
                echo "Terjadi kesalahan saat menyimpan data.";
            }
        }
    }
}

$stmt->close();
$conn->close();
?>

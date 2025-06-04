<?php
// Memulai session
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["id"])) {
    header("location: login.php");
    exit;
}

// Include file koneksi database
require_once "koneksi.php";

// Mendapatkan ID pengguna dari session
$id_user = $_SESSION["id"];

// Definisi variabel untuk menyimpan data pengguna
$nama = $email = $alamat = $no_hp = $jenis_kelamin = $tgl_lahir = $foto_profil = "";

// Query database untuk mendapatkan informasi pengguna
$sql = "SELECT nama, email, alamat, no_hp, jenis_kelamin, tgl_lahir, foto_profil FROM users WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $param_id);
    $param_id = $id_user;

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($nama, $email, $alamat, $no_hp, $jenis_kelamin, $tgl_lahir, $foto_profil);
            $stmt->fetch();
        } else {
            echo "Pengguna tidak ditemukan.";
            exit;
        }
    } else {
        echo "Terjadi kesalahan. Silakan coba lagi nanti.";
        exit;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/navbar.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
    <link rel="stylesheet" href="../asset/css/profile.css">
</head>

<body>
    <?php require_once '../template/user/navbar.php'; ?>
    <div class="body-profile">
        <div class="profile">
            <div class="img-profile">
                <?php if (!empty($foto_profil)): ?>
                    <img src="../uploads/<?php echo $foto_profil; ?>" alt="Profile Picture" />
                <?php else: ?>
                    <img src="../asset/img/icon/profil.png" alt="Profile Picture" />
                <?php endif; ?>
            </div>
            <div class="container-profile">
                <!-- form data pengguna -->
                <div class="profile-info">
                    <form action="proses-edit-profile.php" method="post" enctype="multipart/form-data">
                        <label for="name">Nama</label>
                        <input id="name" name="name" value="<?php echo htmlspecialchars($nama); ?>" class="name-input" />
                        
                        <label for="gender">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="gender-input">
                            <option value="Laki-Laki" <?php echo $jenis_kelamin == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php echo $jenis_kelamin == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                </div>
                <!-- form data pengguna -->
                <div class="profile-pic">
                    <label for="file">Foto Profil</label>
                    <input type="file" id="file" name="file">
                    <?php if (!empty($foto_profil)): ?>
                        <img src="../uploads/<?php echo $foto_profil; ?>" alt="Profile Picture" />
                    <?php else: ?>
                        <img src="../asset/img/icon/profil.png" alt="Profile Picture" />
                    <?php endif; ?>
                </div>
            </div>
            <!-- form data pengguna -->
            <div class="profile-infos">
                <label for="dob">Tanggal Lahir</label>
                <input id="dob" name="dob" value="<?php echo htmlspecialchars($tgl_lahir); ?>" />
                <label for="phone">No. Telepon </label>
                <input id="phone" name="phone" type="number" value="<?php echo htmlspecialchars($no_hp); ?>" />
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                <label for="password">Password</label>
                <input type="password" id="password" name="password" />
            </div>
            <!-- form data pengguna -->
            <!-- tombol -->
            <div class="profile-actions">
                <a href="profile.php"><button type="button" class="btn cancel">Batal</button></a>
                <button type="submit" class="btn save">Simpan</button>
                </form>
            </div>
            <!-- tombol -->
        </div>
    </div>
    <?php require_once '../template/user/fot.php'; ?>
    <script src="../asset/js/beranda.js"></script>
</body>

</html>

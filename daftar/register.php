<?php
// Include file koneksi database
require_once "koneksi.php";

// Define variabel kosong untuk menyimpan pesan error
$nama = $password = $alamat = $no_hp = $tgl_lahir = $email = $jenis_kelamin = "";
$nama_err = $password_err = $alamat_err = $no_hp_err = $tgl_lahir_err = $email_err = $jenis_kelamin_err = "";

// Memproses data form ketika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input nama
    if (empty(trim($_POST["nama"]))) {
        $nama_err = "Masukkan nama lengkap.";
    } else {
        $nama = trim($_POST["nama"]);
    }

    // Validasi input email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Masukkan alamat email.";   
    } else {
        $email = trim($_POST["email"]);
    }

    // Validasi input kata sandi
    if (empty(trim($_POST["password"]))) {
        $password_err = "Masukkan kata sandi.";   
    } else {
        $password = trim($_POST["password"]);
    }

    // Validasi input alamat
    if (empty(trim($_POST["address"]))) {
        $alamat_err = "Masukkan alamat.";   
    } else {
        $alamat = trim($_POST["address"]);
    }

    // Validasi input nomor HP
    if (empty(trim($_POST["phone"]))) {
        $no_hp_err = "Masukkan nomor HP.";   
    } else {
        $no_hp = trim($_POST["phone"]);
    }

    // Validasi input tanggal lahir
    if (empty(trim($_POST["tgl_lahir"]))) {
        $tgl_lahir_err = "Masukkan tanggal lahir.";   
    } else {
        $tgl_lahir = trim($_POST["tgl_lahir"]);
    }

    // Validasi input jenis kelamin
    if (empty(trim($_POST["jenis_kelamin"]))) {
        $jenis_kelamin_err = "Pilih jenis kelamin.";   
    } else {
        $jenis_kelamin = trim($_POST["jenis_kelamin"]);
    }

    // Check jika tidak ada error validasi sebelum memasukkan data ke dalam database
    if (empty($nama_err) && empty($email_err) && empty($password_err) && empty($alamat_err) && empty($no_hp_err) && empty($tgl_lahir_err) && empty($jenis_kelamin_err)) {
        // Prepare statement untuk memasukkan data ke dalam database
        $sql = "INSERT INTO users (nama, email, password, alamat, no_hp, tgl_lahir, jenis_kelamin, is_level, saldo, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, 'user', 0, 'aktif')";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variabel ke statement yang disiapkan sebagai parameter
            $stmt->bind_param("sssssss", $param_nama, $param_email, $param_password, $param_alamat, $param_no_hp, $param_tgl_lahir, $param_jenis_kelamin);

            // Set parameter
            $param_nama = $nama;
            $param_email = $email;
            $param_password = $password;
            $param_alamat = $alamat;
            $param_no_hp = $no_hp;
            $param_tgl_lahir = $tgl_lahir;
            $param_jenis_kelamin = $jenis_kelamin;

            // Eksekusi statement
            if ($stmt->execute()) {
                // Redirect ke halaman login setelah berhasil registrasi
                header("location: login.php");
                exit();
            } else {
                echo "Terjadi kesalahan. Silakan coba lagi nanti.";
            }

            // Tutup statement
            $stmt->close();
        }
    }

    // Tutup koneksi database
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/register.css">
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <title>Registrasi Pengguna</title>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Ayo Bergabung</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input-box">
                    <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama; ?>" required>
                    <span class="error"><?php echo $nama_err; ?></span>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                    <span class="error"><?php echo $email_err; ?></span>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Kata Sandi" value="<?php echo $password; ?>" required>
                    <span class="error"><?php echo $password_err; ?></span>
                </div>
                <div class="input-box">
                    <input type="text" name="address" placeholder="Alamat" value="<?php echo $alamat; ?>" required>
                    <span class="error"><?php echo $alamat_err; ?></span>
                </div>
                <div class="input-box">
                    <input type="text" name="phone" placeholder="No. Hp" value="<?php echo $no_hp; ?>" required>
                    <span class="error"><?php echo $no_hp_err; ?></span>
                </div>
                <div class="input-box">
                    <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" required>
                    <span class="error"><?php echo $tgl_lahir_err; ?></span>
                </div>
                <div class="input-box">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" <?php if ($jenis_kelamin === 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                        <option value="Perempuan" <?php if ($jenis_kelamin === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                    <span class="error"><?php echo $jenis_kelamin_err; ?></span>
                </div>
                <button type="submit">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/register.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <img src="../img/logo.png" alt="">
            <form action="proses-login.php" method="POST">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyfields') {
                    echo '<p class="error">Silahkan isi semua kolom yang tersedia!</p>';
                } elseif ($_GET['error'] == 'wrongpwd') {
                    echo '<p class="error">Password yang dimasukkan salah!</p>';
                } elseif ($_GET['error'] == 'nouser') {
                    echo '<p class="error">Username tidak ditemukan!</p>';
                }
            }
        ?>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Kata Sandi" required>
                    <span>Belum Memiliki Akun?<a href="register.php">Daftar</a></span>
                </div>

                <button type="submit" name="submit">Masuk</button>
            </form>
        </div>
    </div>
</body>

</html>

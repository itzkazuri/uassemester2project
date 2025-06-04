<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/navbar-sebelum-login.css">
</head>

<body>
    <!-- navbar menu -->
    <?php require_once 'template/user/nav.php'; ?>
    <!-- navbar menu -->
    <!-- header -->
    <header class="header">
        <div class="container">
            <div class="title">
                <h2>Welcome to CTrash</h2>
            </div>
            <div class="description">
                <p>Tetaplah memetik manfaat dari upaya mengumpulkan sampah, menjadikan setiap kontribusi Anda bernilai
                    dan
                    bermanfaat.</p>
            </div>
            <div class="box-1"></div>
        </div>
        <div class="containers">
            <div class="box-2"></div>
            <div class="description">
                <p>Recovery and recycling are essential to creating a bright and sustainable future for life together
                </p>
            </div>
            <div class="title">
                <h2>Recovery</h2>
                <h2>Recycling</h2>
            </div>
            <div class="description-sm">
                <p>Recovery and recycling are essential to creating a bright and sustainable future for life together
                </p>
            </div>
        </div>
    </header>
    <!-- header -->
    <!-- about -->
    <div class="about">
        <h2>CTrash</h2>
        <p>
            Sebuah aplikasi berbasis website yang bertujuan untuk memfasilitasi pengumpulan sampah kaleng dan plastik
            dengan
            tujuan untuk pemulihan dan daur ulang kembali. Dengan menggunakan CTrash, pengguna dapat dengan mudah
            mengumpulkan
            sampah-sampah tersebut dan menukarkannya dengan nilai uang.
        </p>
        <p>
            Konsep utama dari CTrash adalah untuk memberikan insentif kepada pengguna untuk terlibat dalam kegiatan daur
            ulang sampah dengan memberikan imbalan berupa uang sebagai bentuk apresiasi atas kontribusi mereka dalam
            menjaga
            kebersihan
            lingkungan dan mengurangi jumlah sampah yang berakhir di tempat pembuangan akhir.
        </p>
    </div>
    <!-- about -->
    <!-- features -->
    <div class="features">
        <h2>Kenapa Harus CTrash</h2>
        <div class="card-features">
            <div class="card">
                <img src="asset/img/icon/uang.png" alt="" class="icon" />
                <p>Melalui CTrash, Anda dapat mendapatkan uang sebagai imbalan atas kontribusi Anda dalam menjaga
                    kebersihan
                    lingkungan dan mendaur ulang kembali sampah kaleng dan plastik.</p>
            </div>
            <div class="card">
                <img src="asset/img/icon/daun.png" alt="" class="icon" />
                <p>CTrash membantu menjaga keberlanjutan lingkungan dengan mendorong pengumpulan dan daur ulang sampah,
                    mengurangi limbah yang masuk ke tempat pembuangan akhir.</p>
            </div>
            <div class="card">
                <img src="asset/img/icon/waktu.png" alt="" class="icon" />
                <p>Dengan fitur pendaftaran online, pengumpulan sampah yang terjadwal, dan proses pembayaran yang cepat,
                    CTrash menyediakan pengalaman yang nyaman dan mudah bagi pengguna.</p>
            </div>
            <div class="card">
                <img src="asset/img/icon/people.png" alt="" class="icon" />
                <p>CTrash memberikan dukungan bagi komunitas dengan mendorong partisipasi aktif dalam upaya menjaga
                    kebersihan lingkungan dan menciptakan budaya daur ulang yang berkelanjutan.</p>
            </div>
        </div>
    </div>
    <!-- features -->
    <?php require_once 'template/user/footer.php'; ?>
    <script src="asset/js/ctrash.js"></script>
</body>

</html>
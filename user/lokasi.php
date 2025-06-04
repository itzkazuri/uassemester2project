<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/navbar.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
    <link rel="stylesheet" href="../asset/css/beranda.css">
</head>

<body>
    <?php require_once '../template/user/navbar.php'; ?>
    <header class="header">
        <div class="container-header">
            <div class="balance-info">
                <p>HALO !</p>
                <p>ANGGA SUKMA</p>
                <div class="balance">
                    <p>Saldo Anda Saat Ini !</p>
                    <p>Rp. 59.000</p>
                    <a href="tabungan.php"> <button class="btn-balace">Tarik Sekarang</button></a>
                </div>
            </div>
            <div class="profil">
                <img src="../asset/img/icon/daun.png" alt="CTRash Logo" />
            </div>
        </div>
        <div class="summary">
        <a href="history.php">  <div class="summary-box">
                <img src="../asset/img/icon/sampah.png" alt="" class="icon-box">
                <div class="conten-box">
                    <p>2300 Pcs</p>
                    <p>Sampah Berhasil Dikumpulkan</p>
                </div>

            </div></a>
        </div>
    </header>

    <section class="categories">
        <h2>Kategori Sampah</h2>
        <div class="category-flex">
            <span></span>

            <div class="category-card">
                <a href="plastik.php">
                    <img src="../asset/img/icon/botol.png" alt="Plastik" />
                    <h1>Plastik</h1>
                </a>
            </div>

            <div class="category-card">
                <a href="kaleng.php">
                    <img src="../asset/img/icon/kaleng.png" alt="Kaleng" />
                    <h1>Kaleng</h1>
                </a>
            </div>


            <span></span>
        </div>
    </section>
    <!-- penanganan -->
    <section class="handling">
        <h2>Pola Penanganan Dari CTrash</h2>
        <div class="handling-flex">
            <article class="handling-card">
                <p>Penukaran Sampah dengan Nilai Ekonomi</p>
                <div class="card-detail">
                    <img src="../asset/img/icon/kado.png" alt="Kado" class="icon">
                    <p>Sampah yang terkumpul akan ditimbang dan dinilai, kemudian pengguna akan menerima imbalan berupa
                        uang
                        tunai dan juga bisa mendapatkan reward kontribusi</p>
                </div>
            </article>
            <article class="handling-card">
                <p>Program Komunitas</p>
                <div class="card-detail">
                    <img src="../asset/img/icon/people-s.png" alt="Komunitas" class="icon">
                    <p>Mengadakan program dan acara yang melibatkan komunitas lokal untuk meningkatkan partisipasi dan
                        kerjasama dalam pengelolaan sampah.</p>
                </div>
            </article>
            <article class="handling-card">
                <p>Penyimpanan Aman</p>
                <div class="card-detail">
                    <img src="../asset/img/icon/tong-sampah.png" alt="Tong Sampah" class="icon">
                    <p>Setiap lokasi drop-off dilengkapi dengan fasilitas penyimpanan yang aman untuk menjaga kebersihan
                        dan
                        keamanan sampah yang disetor.</p>
                </div>
            </article>
            <article class="handling-card">
                <p>Circular Economy</p>
                <div class="card-detail">
                    <img src="../asset/img/icon/reaves.png" alt="Recycle" class="icon">
                    <p>Menjalankan roda perekonomian melalui pengembangan unit Bank Sampah dan UMKM yang produktif.</p>
                </div>
            </article>
        </div>
    </section>
    <!-- penanganan -->

    <!-- penyetoran -->
    <section class="deposit" id="section-lokasi">
        <div class="truck-img">
            <hr>
            <img src="../asset//img/icon/truk.png" alt="Truk" width="350">
        </div>
        <div class="deposit-title">
            <h2>Penyetoran Sampah</h2>
            <div class="deposit-details">
                <div class="deposit-list">
                    <img src="../asset/img/icon/alamat.png" alt="Alamat" width="20" height="25">
                    <p>Alamat <span>: Jalan Hayam Wuruk, Denpasar Timur, Bali</span></p>
                </div>
                <div class="deposit-list">
                    <img src="../asset/img/icon/icon-waktu.png" alt="Waktu" width="20" height="20">
                    <p>Jam Operasional : <br>
                        <span>Senin - Sabtu pkl 08.00-18.00</span><br>
                        <span>Minggu / Hari Libur - Tutup</span>
                    </p>
                </div>
                <div class="deposit-list">
                    <img src="../asset/img/icon/timbangan.png" alt="Timbangan" width="20" height="15">
                    <p>Penimbangan akan dilakukan di tempat oleh petugas</p>
                </div>
                <div class="deposit-list">
                    <img src="../asset/img/icon/icon-uang.png" alt="Uang" width="20" height="15">
                    <p class="cash-detail">Setelah itu nasabah akan mendapatkan <span>tunai sesuai dengan jumlah dari
                            rekapan hasil penimbangan</span> dan rekapan tersebut juga akan dimasukkan ke data TON</p>
                </div>
            </div>
        </div>
        <div class="deposit-box"></div>
    </section>
    <!-- penyetoran -->

    <!-- lokasi -->
    <section class="location">
        <h2>Lokasi Google Maps</h2>
        <div class="map-container">
            <div class="map-img">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d642520.1263782845!2d114.48566241390678!3d-8.389273728188554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd141d3e8100fa1%3A0x24910fb14b24e690!2sBali!5e0!3m2!1sid!2sid!4v1717982906449!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="google-map"><iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.478542654455!2d115.1826938742926!3d-8.64595349140085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd239b3d1d0fac9%3A0xe9577299d09cdf2d!2sBank%20Sampah%20Induk%20(BSI)%20Bali%20Bersih!5e0!3m2!1sid!2sid!4v1717983105836!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="google-maps">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.649741624609!2d115.2063669742924!3d-8.62958389141666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23fd17a426b2f%3A0x8f22d3ff161eccd6!2sBANK%20SAMPAH%20INDUK%20BALI%20WASTU%20LESTARI!5e0!3m2!1sid!2sid!4v1717983194658!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- lokasi -->
    <?php require_once '../template/user/fot.php'; ?>
    <script src="../asset/js/beranda.js"></script>
</body>

</html>
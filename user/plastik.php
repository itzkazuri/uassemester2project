<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/css/navbar.css">
    <link rel="stylesheet" href="../asset/css/footer.css">
    <link rel="stylesheet" href="../asset/css/kaleng.css">
</head>

<body>
    <?php require_once '../template/user/navbar.php'; ?>
    <section class="description">
        <div class="conten-description">
            <h1>Deskripsi Sampah Kaleng</h1>
            <p>
                Sampah plastik adalah jenis sampah anorganik yang terbuat dari polimer sintetis, digunakan dalam
                berbagai
                aplikasi karena sifatnya yang ringan, tahan lama, dan serbaguna. Contohnya meliputi botol air mineral
                dan
                soda, kantong belanja plastik, wadah makanan cepat saji, kemasan deterjen dan sampo, serta sedotan dan
                peralatan makan plastik sekali pakai.
            </p>
        </div>
        <img src="../asset/img/icon/botol.png" alt="Cans" />
    </section>
    
    <!-- Jenis-Jenis Kaleng -->
    <div class="typesOfCans">
        <div class="titleTypesOfCans">
            <h2>JENIS - JENIS PLASTIK</h2>
            <span class="boxType"></span>
        </div>
        <div class="contentListType">
            <div class="listTypeCan">
                <h3>PET (Polyethylene Terephthalate)</h3>
                <p>PET adalah jenis plastik yang biasanya digunakan untuk botol minuman, botol kosmetik, dan sering kali
                    memiliki kode daur ulang </p>
                <p>Contoh: Botol air minum, botol minuman ringan, botol deterjen.</p>
                <img src="../asset/img/icon/botol-plastikk.png" alt="" width="20%">
            </div>
            <div class="listTypeCan">
                <h3>Polikarbonat (PC)</h3>
                <p>Polikarbonat memiliki kejernihan optik yang tinggi, hampir setara dengan kaca. Ini membuatnya ideal
                    untuk
                    aplikasi yang memerlukan material transparan.</p>
                <p>Contoh: Kacamata, cakram optik (CD, DVD), peralatan laboratorium.</p>
                <img src="../asset/img/icon/peralatan.png" alt="" width="40%">
            </div>
            <div class="listTypeCan">
                <h3>HDPE (High-Density Polyethylene)</h3>
                <p>Polikarbonat memiliki kejernihan optik yang tinggi, hampir setara dengan kaca. Ini membuatnya ideal
                    untuk aplikasi yang memerlukan material transparan.</p>
                <p>Contoh: Botol susu, botol sampo, jerry can.</p>

                <img src="../asset/img/icon/botol-deterjen.png" alt="" width="20%">
            </div>
            <div class="listTypeCan">
                <h3>LDPE (Low-Density Polyethylene)</h3>
                <p> LDPE adalah plastik yang fleksibel dan tahan terhadap tekanan, sering digunakan untuk kantong
                    plastik,
                    film pembungkus, dan memiliki kode daur ulang </p>
                <p>Contoh: Kantong belanja, pembungkus makanan, botol squeeze.</p>

                <img src="../asset/img/icon/kantong-belanja.png" alt="" width="40%">
            </div>
            <div class="listTypeCan">
                <h3>PVC (Polyvinyl Chloride)</h3>
                <p>PVC adalah jenis plastik yang sering digunakan dalam pipa, kabel listrik, dan barang-barang
                    konstruksi
                    lainnya, dengan kode daur ulang </p>
                <p>Contoh: Pipa PVC, kemasan makanan, mainan anak-anak.</p>
                <img src="../asset/img/icon/plastik-ciki.png" alt="" width="30%">
            </div>
            <div class="listTypeCan">
                <h3>PP (Polypropylene)</h3>
                <p> PP adalah plastik yang tahan panas dan sering digunakan dalam wadah makanan, botol obat, dan
                    memiliki
                    kode daur ulang </p>

                <img src="../asset/img/icon/tutup-botol.png" alt="" width="30%">
            </div>
        </div>
    </div>
    <div class="list-harga">
        <div class="harga-titel">
            <span class="boxType"></span>
            <h2>Harga Per Satuan</h2>
        </div>

        <div class="body-harga" id="harga-container">
            <div class="data-list-harga" id="sesia1">
                <img src="../asset/img/icon/botol-air.png" alt="" />
                <p class="icon-drop">Botol Air Minum <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown1">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>330 ml</p>
                        <p>500 ml</p>
                        <p>750 ml</p>
                        <p>1 liter</p>
                        <p>1.5 liter</p>
                        <p>2 liter</p>

                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.300</p>
                        <p>Rp.500</p>
                        <p>Rp.700</p>
                        <p>Rp.900</p>
                        <p>Rp.1.200</p>
                        <p>Rp.1.500</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia2">
                <img src="../asset/img/icon/deterjen.png" alt="" />
                <p class="icon-drop">Botol Deterjen </p>
                <img src="../asset/img/toggel.png" alt="" class="img-toggel" />
                <div class="dropdown-detail-harga" id="dropdown2">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>500 ml</p>
                        <p>750 ml</p>
                        <p>1 liter</p>
                        <p>1.5 liter</p>
                        <p>2 liter</p>

                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.800</p>
                        <p>Rp.1.000</p>
                        <p>Rp.1.200</p>
                        <p>Rp.1.500</p>
                        <p>Rp.1.800</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia3">
                <img src="../asset/img/icon/baskom.png" alt="" />
                <p class="icon-drop">Wadah Makanan <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown3">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>semua ukuran</p>

                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.1.000</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia4">
                <img src="../asset/img/icon/plastik-makanan.png" alt="" />
                <p class="icon-drop">Kemasan Makanan <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown4">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>semua ukuran</p>

                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.50</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia5">
                <img src="../asset/img/icon/tas-belanja.png" alt="" />
                <p class="icon-drop">Kantong Belanja <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown5">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>Kecil</p>
                        <p>Sedang</p>
                        <p>Besar</p>
                        <p>Jumbo</p>

                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.200</p>
                        <p>Rp.300</p>
                        <p>Rp.500</p>
                        <p>Rp.700</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia6">
                <img src="../asset/img/icon/jerigen.png" alt="" />
                <p class="icon-drop">Jerigen <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown6">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>1 Liter</p>
                        <p>5 Liter</p>
                        <p>10 Liter</p>
                        <p>20 Liter</p>
                        <p>25 Liter</p>

                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.200</p>
                        <p>Rp.5.000</p>
                        <p>Rp.8.000</p>
                        <p>Rp.12.000</p>
                        <p>Rp.15.000</p>
                    </div>
                </div>
            </div>
        </div>
        <span></span>
    </div>
    <?php require_once '../template/user/fot.php'; ?>
    <script src="../asset/js/ctrash.js"></script>
</body>

</html>
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
    <!-- deskripsi -->
    <section class="description">
        <div class="conten-description">
            <h1>Deskripsi Sampah Kaleng</h1>
            <p>
                Sampah kaleng adalah jenis sampah anorganik yang terbuat dari logam seperti alumunium atau baja,
                digunakan
                untuk
                kemasan makanan, minuman, dan produk rumah tangga lainnya. Contohnya termasuk kaleng minuman ringan dan
                bir,
                kaleng
                makanan kaleng seperti sup dan tuna, kaleng produk aerosol seperti penyegar udara dan cat semprot, serta
                kaleng
                minyak pelumas atau minyak goreng yang sudah dibersihkan.
            </p>
        </div>
        <img src="../asset/img/icon/kaleng.png" alt="Cans" />
    </section>
    <!-- deskripsi -->
    <!-- Jenis-Jenis Kaleng -->
    <div class="typesOfCans">
        <div class="titleTypesOfCans">
            <h2>JENIS - JENIS KALENG</h2>
            <span class="boxType"></span>
        </div>
        <div class="contentListType">
            <div class="listTypeCan">
                <h3>Kaleng Aluminium</h3>
                <p>Terbuat dari aluminium, ringan, tahan korosi, dan mudah didaur ulang.</p>
                <p>Contoh: Kaleng minuman ringan, bir, minuman energi.</p>
                <img src="../asset/img/icon/kaleng-energi.png" alt="" width="30%">
            </div>
            <div class="listTypeCan">
                <h3>Kaleng Produk Rumah Tangga</h3>
                <p> Kaleng yang terbuat dari baja yang dilapisi timah, dikenal sebagai tinplate, adalah pilihan yang
                    populer
                    untuk kemasan produk rumah tangga.</p>
                <p>Contoh: Wax atau Lilin Semir Sepatu, Pembersih Logam, Pelumas Serbaguna,Pengharum Ruangan</p>
                <img src="../asset/img/icon/peralatan.png" alt="" width="40%">
            </div>
            <div class="listTypeCan">
                <h3>Kaleng Baja (Tinplate)</h3>
                <p>Terbuat dari baja yang dilapisi timah, kuat dan tahan lama, sering digunakan untuk kemasan makanan.
                </p>
                <p>Contoh: Kaleng makanan seperti sup, sayuran, buah-buahan, tuna.</p>
                <img src="../asset/img/icon/Kaleng-Baja.png" alt="" width="40%">
            </div>
            <div class="listTypeCan">
                <h3>Kaleng Aerosol</h3>
                <p> Terbuat dari aluminium atau baja, dilengkapi dengan katup semprot untuk mengeluarkan isinya dalam
                    bentuk
                    aerosol.</p>
                <p>Contoh: Kaleng penyegar udara, cat semprot, semprotan serangga.</p>
                <img src="../asset/img/icon/kaleng-cat-semprot.png" alt="" width="30%">
            </div>
            <div class="listTypeCan">
                <h3>Kaleng Minyak</h3>
                <p> Terbuat dari baja atau aluminium, digunakan untuk mengemas berbagai jenis minyak.</p>
                <p>Contoh: Kaleng minyak pelumas, minyak goreng (yang sudah dibersihkan sebelum didaur ulang).</p>
                <img src="../asset/img/icon/kaleng-minyak-pelumas.png" alt="" width="40%">
            </div>
            <div class="listTypeCan">
                <h3>Kaleng Paint</h3>
                <p> Biasanya terbuat dari baja, digunakan untuk mengemas cat dan bahan kimia cair lainnya.</p>
                <p>Contoh: Kaleng cat rumah, kaleng thinner.</p>
                <img src="../asset/img/icon/kaleng-cat-rumah.png" alt="" width="60%">
            </div>
        </div>
    </div>
    <!-- Jenis-Jenis Kaleng -->
    <!-- list harga -->
    <div class="list-harga">
        <div class="harga-titel">
            <span class="boxType"></span>
            <h2>Harga Per Satuan Atau Kiloan</h2>
        </div>

        <div class="body-harga" id="harga-container">
            <div class="data-list-harga" id="sesia1">
                <img src="../asset/img/icon/kaleng-3.png" alt="" />
                <p class="icon-drop">Kaleng Minuman <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown1">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>330 ml</p>
                        <p>500 ml</p>
                        <p>750 ml</p>
                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.200</p>
                        <p>Rp.300</p>
                        <p>Rp. 400</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia2">
                <img src="../asset/img/icon/obat-nyamuk.png" alt="" />
                <p class="icon-drop">Kaleng Pengharum Ruangan</p>
                <img src="../asset/img/toggel.png" alt="" class="img-toggel" />
                <div class="dropdown-detail-harga" id="dropdown2">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>100 ml</p>
                        <p>150 ml</p>
                        <p>200 ml</p>
                        <p>250 ml</p>
                        <p>300 ml</p>
                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.1.000</p>
                        <p>Rp.1.500</p>
                        <p>Rp.2.000</p>
                        <p>Rp.2.500</p>
                        <p>Rp.3.000</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia3">
                <img src="../asset/img/icon/kaleng-cat-rumah.png" alt="" />
                <p class="icon-drop">Kaleng Cat Rumah <img src="../asset/img/toggel.png" alt="" class="img-toggel" />
                </p>
                <div class="dropdown-detail-harga" id="dropdown3">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>250 ml</p>
                        <p>600 ml</p>
                        <p>1000 ml</p>
                        <p>2000 ml</p>
                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.200</p>
                        <p>Rp.300</p>
                        <p>Rp.500</p>
                        <p>Rp.800</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia4">
                <img src="../asset/img/icon/kaleng-2.png" alt="" />
                <p class="icon-drop">Kaleng Makanan <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown4">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>100 ml</p>
                        <p>150 ml</p>
                        <p>200 ml</p>
                        <p>250 ml</p>
                        <p>300 ml</p>
                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.1.000</p>
                        <p>Rp.1.500</p>
                        <p>Rp.2.000</p>
                        <p>Rp.2.500</p>
                        <p>Rp.3.000</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia5">
                <img src="../asset/img/icon/kaleng-cat-semprot.png" alt="" />
                <p class="icon-drop">Kaleng Cat Semprot <img src="../asset/img/toggel.png" alt="" class="img-toggel" />
                </p>
                <div class="dropdown-detail-harga" id="dropdown5">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>150 ml</p>
                        <p>300 ml</p>
                        <p>500 ml</p>
                        <p>1000 ml</p>
                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.200</p>
                        <p>Rp.300</p>
                        <p>Rp.400</p>
                        <p>Rp.600</p>
                    </div>
                </div>
            </div>
            <div class="data-list-harga" id="sesia6">
                <img src="../asset/img/icon/kaleng-1.png" alt="" />
                <p class="icon-drop">Kaleng Minyak <img src="../asset/img/toggel.png" alt="" class="img-toggel" /></p>
                <div class="dropdown-detail-harga" id="dropdown6">
                    <div class="d-ukuran">
                        <p>Ukuran</p>
                        <p>500 ml</p>
                        <p>1000 ml</p>
                        <p>2000 ml</p>
                        <p>5000 ml</p>

                    </div>
                    <div class="d-harga">
                        <p>Harga/pcs</p>
                        <p>Rp.300</p>
                        <p>Rp.500</p>
                        <p>Rp.800</p>
                        <p>Rp.1.200</p>
                    </div>
                </div>
            </div>
        </div>
        <span></span>
    </div>
    <!-- list harga -->

    <?php require_once '../template/user/fot.php'; ?>
    <script src="../asset/js/ctrash.js"></script>
</body>

</html>
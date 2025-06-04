<?php
// Ambil nilai kategori dari parameter GET
if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];

    // Panggil file koneksi.php
    require_once 'koneksi.php';

    // Query database menggunakan PDO untuk koneksi ke database
    try {
        // Buat koneksi menggunakan informasi dari koneksi.php
        $dbh = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode menjadi ERRMODE_EXCEPTION untuk debugging
        
        // Query berdasarkan kategori
        if ($kategori == 'Semua') {
            $stmt = $dbh->prepare('SELECT * FROM sampah');
        } else {
            $stmt = $dbh->prepare('SELECT * FROM sampah WHERE kategori = :kategori');
            $stmt->bindParam(':kategori', $kategori);
        }
        
        // Eksekusi statement
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Generate HTML untuk tabel berdasarkan hasil query
        $output = '<table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($result as $row) {
            $output .= '<tr>';
            $output .= '<td>' . $row['id'] . '</td>';
            $output .= '<td>' . $row['nama'] . '</td>';
            $output .= '<td>' . $row['ukuran'] . '</td>';
            $output .= '<td>' . $row['harga'] . '</td>';
            $output .= '<td>' . $row['kategori'] . '</td>';
            // Tambahkan tombol hapus dengan atribut data-id yang berisi ID sampah
            $output .= '<td><button class="btn-hapus" data-id="' . $row['id'] . '">Hapus</button></td>';
            $output .= '</tr>';
        }

        $output .= '</tbody></table>';

        echo $output;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Kategori tidak tersedia.";
}
?>

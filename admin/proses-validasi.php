<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ctrash");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari URL
$id = $_GET['id'];
$validasi = $_GET['validasi'];

// Pastikan id dan validasi tidak kosong
if (empty($id) || empty($validasi)) {
    die("ID atau validasi tidak valid.");
}

// Query untuk mendapatkan data penarikan berdasarkan ID
$query = "SELECT * FROM penarikan WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

// Periksa hasil query
if (!$result) {
    die("Query Error: " . mysqli_error($koneksi));
}

// Periksa apakah data penarikan ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    $jumlah_penarikan = $row['jumlah_penarikan'];
    $status_validasi = $row['validasi']; // Menggunakan kolom validasi

    if ($status_validasi == 'menunggu') {
        // Ubah validasi hanya jika status masih 'menunggu'
        if ($validasi == 'iya') {
            // Validasi penarikan tanpa mengubah saldo user
            $update_query = "UPDATE penarikan SET validasi = 'iya' WHERE id = '$id'";
            mysqli_query($koneksi, $update_query);
        } elseif ($validasi == 'tidak') {
            // Batalkan penarikan dan kembalikan saldo user
            $update_saldo_query = "UPDATE users SET saldo = saldo + '$jumlah_penarikan' WHERE id = '$user_id'";
            mysqli_query($koneksi, $update_saldo_query);

            // Update status validasi menjadi 'tidak'
            $update_query = "UPDATE penarikan SET validasi = 'tidak' WHERE id = '$id'";
            mysqli_query($koneksi, $update_query);
        }

        // Redirect kembali ke halaman penarikan-tabungan.php setelah update
        header("Location: penarikan-tabungan.php");
        exit;
    } else {
        // Jika status validasi bukan 'menunggu', beri pesan atau lakukan tindakan sesuai kebutuhan
        echo "Penarikan ini sudah divalidasi sebelumnya.";
    }
} else {
    // Jika data penarikan tidak ditemukan, beri pesan atau tindakan sesuai kebutuhan
    echo "Data penarikan tidak ditemukan.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>

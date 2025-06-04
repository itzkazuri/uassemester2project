<?php
require_once "../daftar/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Ambil id dari parameter GET
    $id = intval($_GET["id"]);

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil data histori_pengumpulan yang akan dihapus
    $sql = "SELECT user_id, total FROM histori_pengumpulan WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $histori = $result->fetch_assoc();
    $stmt->close();

    if ($histori) {
        $user_id = $histori['user_id'];
        $total = $histori['total'];

        // Ambil saldo pengguna saat ini
        $sql = "SELECT saldo FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            $current_saldo = $user['saldo'];

            // Kurangi saldo pengguna atau set ke 0 jika saldo lebih kecil dari total
            if ($current_saldo < $total) {
                $new_saldo = 0;
            } else {
                $new_saldo = $current_saldo - $total;
            }

            $sql = "UPDATE users SET saldo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("di", $new_saldo, $user_id);
            $stmt->execute();
            $stmt->close();

            // Hapus data dari histori_pengumpulan
            $sql = "DELETE FROM histori_pengumpulan WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Redirect kembali ke halaman histori_pengumpulan setelah penghapusan
    header("Location: master-data-admin.php");
    exit();
} else {
    // Redirect jika tidak ada id atau request method bukan GET
    header("Location: master-data-admin.php");
    exit();
}
?>

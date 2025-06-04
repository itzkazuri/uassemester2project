<?php
session_start();

// Periksa apakah pengguna sudah login dan memiliki level admin
if (!isset($_SESSION['id']) || empty($_SESSION['is_level']) || $_SESSION['is_level'] !== 'admin') {
    header("Location: ../user/beranda.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ctrash</title>
    <link rel="shortcut icon" href="../asset/img/icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../asset/cssadmin/sidebar.css" />
    <link rel="stylesheet" href="../asset/cssadmin/data-sampah.css">
</head>
<body>
    <!-- sidebar menu -->
    <?php require_once '../template/admin/sidebar.php'; ?>
    <!-- sidebar menu -->

    <div class="main-content">
        <!-- main content start -->

        <div class="jarakantartombol">
            <!--DROPDOWN NAMA USER -->
            <form action="simpan_pengumpulan.php" method="POST">
                <select name="user_id">
                    <?php
                    // Koneksi ke database
                    $conn = new mysqli('localhost', 'root', '', 'ctrash');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Ambil data user dari database
                    $sql = "SELECT id, nama FROM users";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                        }
                    }
                    ?>
                </select>

                <!-- INPUT TANGGAL-->
                <input type="date" name="tanggal" required>

                <!--INPUT LOKASI PENGUMPULAN-->
                <input type="text" name="tempat" value="Tempat Pengepul Sampah 'Ctrash' di Jalan HayamWuruk, Denpasar timur, Bali" required>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th><label for=" nomor">No.</label></th>
                        <th><label for="tanggal">Jenis & Ukuran</label></th>
                        <th><label for="harga">Harga(Rp)</label></th>
                        <th><label for="jumlah">Jumlah(Pcs)</label></th>
                        <th class="highlightcolumn"><label for="total">Total</label></th>
                        <th><label for="aksi">Aksi</label></th>
                    </tr>
                </thead>
                <tbody id="sampahTable">
                    <tr>
                        <td>1</td>
                        <td>
                            <!-- dropdown Jenis -->
                            <div class="form-group">
                                <select class="jenisjenis" name="jenis_sampah[]">
                                    <?php
                                    // Ambil data sampah dari database
                                    $sql = "SELECT nama, ukuran, harga FROM sampah";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['nama'] . "' data-ukuran='" . $row['ukuran'] . "' data-harga='" . $row['harga'] . "'>" . $row['nama'] . " " . $row['ukuran'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="ukuran_sampah[]" class="ukuran-input">
                            </div>
                        </td>
                        <td><input class="hargajarak" type="number" name="harga[]" readonly></td>
                        <td><input class="jumlahjarak" type="number" name="jumlah[]"></td>
                        <td><input class="totaljarak" type="number" name="total[]" readonly></td>
                        <td><button type="button" onclick="removeRow(this)">Hapus</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="button" onclick="addRow()">Tambah Baris</button>
        <button type="submit">Simpan Data</button>
        </form>
    </div> <!-- main content end -->

    <script>
        function addRow() {
            const table = document.getElementById('sampahTable');
            const rowCount = table.rows.length;
            const row = table.insertRow(rowCount);

            const cell1 = row.insertCell(0);
            cell1.innerHTML = rowCount + 1;

            const cell2 = row.insertCell(1);
            const jenisSampah = document.createElement('select');
            jenisSampah.name = 'jenis_sampah[]';
            jenisSampah.innerHTML = `
                <?php
                $result->data_seek(0); // Reset the pointer to the beginning
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nama'] . "' data-ukuran='" . $row['ukuran'] . "' data-harga='" . $row['harga'] . "'>" . $row['nama'] . " " . $row['ukuran'] . "</option>";
                }
                ?>
            `;
            cell2.appendChild(jenisSampah);

            const ukuranInput = document.createElement('input');
            ukuranInput.type = 'hidden';
            ukuranInput.name = 'ukuran_sampah[]';
            ukuranInput.classList.add('ukuran-input');
            cell2.appendChild(ukuranInput);

            const cell3 = row.insertCell(2);
            const harga = document.createElement('input');
            harga.type = 'number';
            harga.name = 'harga[]';
            harga.readOnly = true;
            cell3.appendChild(harga);

            const cell4 = row.insertCell(3);
            const jumlah = document.createElement('input');
            jumlah.type = 'number';
            jumlah.name = 'jumlah[]';
            cell4.appendChild(jumlah);

            const cell5 = row.insertCell(4);
            const total = document.createElement('input');
            total.type = 'number';
            total.name = 'total[]';
            total.readOnly = true;
            cell5.appendChild(total);

            const cell6 = row.insertCell(5);
            const hapus = document.createElement('button');
            hapus.type = 'button';
            hapus.innerHTML = 'Hapus';
            hapus.onclick = function() { removeRow(this); };
            cell6.appendChild(hapus);
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.remove();
        }

        document.addEventListener('change', function (e) {
            if (e.target && e.target.matches('select[name="jenis_sampah[]"]')) {
                const row = e.target.closest('tr');
                const hargaInput = row.querySelector('input[name="harga[]"]');
                const ukuranInput = row.querySelector('.ukuran-input');

                const selectedOption = e.target.selectedOptions[0];
                hargaInput.value = selectedOption.getAttribute('data-harga');
                ukuranInput.value = selectedOption.getAttribute('data-ukuran');
            }

            if (e.target && e.target.matches('input[name="jumlah[]"]')) {
                const row = e.target.closest('tr');
                const jumlahInput = e.target;
                const hargaInput = row.querySelector('input[name="harga[]"]');
                const totalInput = row.querySelector('input[name="total[]"]');

                totalInput.value = jumlahInput.value * hargaInput.value;
            }
        });
    </script>
</body>
</html>

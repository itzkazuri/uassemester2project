<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bukti Penarikan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f9f9f9;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    button {
        padding: 10px 20px;
        background-color: #4caf50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    .header-info {
        margin-bottom: 20px;
    }

    .header-info p {
        margin: 5px 0;
    }
    </style>
</head>

<body>
    <h1>BUKTI PENARIKAN</h1>
    <div class="header-info">
        <p>Nama Admin : Hendra Dipayana</p>
        <p>Waktu : 02/01/2024 17:30:45</p>
    </div>
    <table id="data-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Penarik</th>
                <th>Jumlah Penarikan</th>
                <th>Tanggal Penarikan</th>
                <th>Lokasi Penarikan</th>
                <th>Persetujuan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Angga Sukma</td>
                <td>Rp. 10.000</td>
                <td>23/01/2024</td>
                <td>Tempat Pengolahan Sampah</td>
                <td>Di Setujui</td>
            </tr>
        </tbody>
    </table>
    <div class="footer-info">
        <p>Jika Anda memiliki sampah lain yang ingin disetor, kami selalu siap menampung</p>
        <p><strong>TERIMA KASIH!</strong></p>
    </div>
    <div class="button-container">
        <button id="print-pdf">Print to PDF</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#print-pdf').click(function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF('p', 'pt', 'a4');

            // Add header
            doc.setFontSize(18);
            doc.text('BUKTI PENARIKAN', doc.internal.pageSize.getWidth() / 2, 50, {
                align: 'center'
            });

            // Add admin info
            doc.setFontSize(12);
            doc.text('Nama Admin : Hendra Dipayana', 40, 80);
            doc.text('Waktu : 02/01/2024 17:30:45', 40, 100);

            // Define table headers
            const headers = [
                ['No.', 'Nama Penarik', 'Jumlah Penarikan', 'Tanggal Penarikan', 'Lokasi Penarikan',
                    'Persetujuan'
                ]
            ];

            // Extract table data
            const data = [];
            $('#data-table tbody tr').each(function() {
                const row = [];
                $(this)
                    .find('td')
                    .each(function() {
                        row.push($(this).text());
                    });
                data.push(row);
            });

            // Generate autoTable with defined headers and extracted data
            doc.autoTable({
                startY: 130,
                head: headers,
                body: data,
                styles: {
                    fontSize: 10,
                    cellPadding: 8,
                    lineColor: [0, 0, 0],
                    lineWidth: 0.25,
                },
                headStyles: {
                    fillColor: [242, 242, 242],
                    textColor: [0, 0, 0], // Set header text color to black
                },
                bodyStyles: {
                    fillColor: [255, 255, 255]
                },
                alternateRowStyles: {
                    fillColor: [249, 249, 249]
                },
                tableLineColor: [0, 0, 0],
                tableLineWidth: 0.75,
                margin: {
                    top: 100,
                    bottom: 60
                },
                didDrawPage: function(data) {
                    // Footer
                    doc.setFontSize(12);
                    doc.text(
                        'Jika Anda memiliki sampah lain yang ingin disetor, kami selalu siap menampung',
                        40, doc.internal.pageSize.getHeight() - 60);
                    doc.setFontSize(14);
                    doc.text('TERIMA KASIH!', 40, doc.internal.pageSize.getHeight() - 40);

                    // Page number
                    let str = 'Page ' + doc.internal.getNumberOfPages();
                    doc.setFontSize(10);
                    let pageHeight = doc.internal.pageSize.height || doc.internal.pageSize
                        .getHeight();
                    doc.text(str, data.settings.margin.left, pageHeight - 30);
                },
            });

            // Save the PDF
            doc.save('bukti-penarikan.pdf');
        });
    });
    </script>
</body>

</html>
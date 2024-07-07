<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #dddddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan Detail</h1>
    <table>
        <tr>
            <th>Tanggal</th>
            <td><?= $laporan['tanggal_masuk']; ?></td>
        </tr>
        <tr>
            <th>Dokter</th>
            <td><?= $laporan['dokter']['nama_dokter']; ?></td>
        </tr>
        <tr>
            <th>Suster</th>
            <td><?= $laporan['suster']['nama_suster']; ?></td>
        </tr>
        <tr>
            <th>Kamar</th>
            <td><?= $laporan['kamar']['no_kamar']; ?> - <?= $laporan['kamar']['no_kamar']; ?></td>
        </tr>
        <tr>
            <th>Pasien</th>
            <td><?= $laporan['pasien']['nama_pasien']; ?></td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td><?= $laporan['keterangan']; ?></td>
        </tr>
    </table>
</body>

</html>
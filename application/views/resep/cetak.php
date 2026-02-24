<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- <title>Nota Rincian Obat <?= $pasien->nama_pasien ?></title> -->
    <title>Nota_Obat_<?= str_replace(' ', '_', $pasien->nama_pasien) ?>_<?= date('Ymd_His') ?></title>

    <style>
        @media print {
            body {
                width: 148mm;
                height: 210mm;
                margin: 0 auto;
                font-family: 'Segoe UI', sans-serif;
                font-size: 10px;
                color: #000;
            }
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #000;
            padding: 10px 0;
        }

        .header .logo {
            width: 70px;
            height: auto;
        }

        .header .text {
            text-align: center;
            flex: 1;
        }

        .header .text h2 {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .header .text p {
            margin: 2px 0;
            font-size: 10px;
        }

        .info {
            margin: 10px 0;
        }

        .info p {
            margin: 2px 0;
            font-size: 10px;
        }

        .info strong {
            display: inline-block;
            width: 90px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .total-row td {
            font-weight: bold;
            text-align: right;
        }

        .total-row td:first-child {
            text-align: left;
        }

        .print-note {
            text-align: center;
            margin-top: 30px;
            font-style: italic;
            font-size: 9px;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="header">
        <img src="<?= base_url('assets/img/mlg-color.jpg') ?>" alt="Logo Kiri" class="logo">
        
        <div class="text">
            <h2>PEMERINTAH KOTA MALANG</h2>
            <h2>Rumah Sakit Umum Daerah Kota Malang</h2>
            <p>Jl. Rajasa No.27, Bumiayu, Kec. Kedungkandang, Kota Malang</p>
            <p>Telp. (0341) 754338</p>
        </div>
        
        <img src="<?= base_url('assets/img/rskm-color.jpg') ?>" alt="Logo Kanan" class="logo">
    </div>

    <div class="info">
        <p><strong>Nama</strong> : <?= $pasien->nama_pasien ?></p>
        <p><strong>No. RM</strong> : <?= $pasien->no_rm ?></p>
        <!-- <p><strong>No. SEP</strong> : <?= $pasien->no_sep ?></p> -->
        <p><strong>Poli</strong> : <?= $pasien->asal_poli ?></p>
        <p><strong>Tanggal Resep</strong> : <?= isset($resep[0]) ? date('d-m-Y', strtotime($resep[0]->tanggal_input)) : '-' ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; foreach ($resep as $r): $t = $r->jumlah * $r->harga; $total += $t; ?>
            <tr>
                <td><?= $r->nama_obat ?></td>
                <td><?= $r->jumlah ?></td>
                <td>Rp. <?= number_format($r->harga, 0, ',', '.') ?></td>
                <td>Rp. <?= number_format($t, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach ?>
            <tr class="total-row">
                <td colspan="3">Total Tagihan</td>
                <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <div class="print-note">
        *Terima kasih atas kunjungan Anda ke RSUD Kota Malang*
    </div>
</body>
</html>

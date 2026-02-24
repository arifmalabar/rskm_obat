<h3>Rincian Tagihan</h3>
<p>
    <strong>Nama:</strong> <?= $pasien->nama_pasien ?><br>
    <strong>No. RM:</strong> <?= $pasien->no_rm ?><br>
    <strong>No. SEP:</strong> <?= $pasien->no_sep ?><br>
    <strong>Poli:</strong> <?= $pasien->asal_poli ?>
</p>
<table class="table table-bordered table-sm">
    <thead>
        <tr><th>No</th><th>Obat</th><th>Jumlah</th><th>Harga</th><th>Total</th></tr>
    </thead>
    <tbody>
        <?php 
        $total = 0; 
        $no = 1;
        foreach ($resep as $r): 
            $subtotal = $r->jumlah * $r->harga;
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $r->nama_obat ?></td>
                <td><?= $r->jumlah ?></td>
                <td>Rp. <?= number_format($r->harga, 0) ?></td>
                <td>Rp. <?= number_format($subtotal, 0) ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="4"><strong>Total Tagihan</strong></td>
            <td><strong>Rp. <?= number_format($total, 0) ?></strong></td>
        </tr>
    </tbody>
</table>

<a href="<?= site_url('resep/cetak/' . $pasien->id) ?>" target="_blank" class="btn btn-primary">Cetak</a>
<a href="<?= site_url('resep') ?>" class="btn btn-secondary">Balik</a>

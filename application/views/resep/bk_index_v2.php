<!-- Tabel -->
<table id="tabelResep" class="table table-bordered table-sm table-striped">
    <thead class="thead-light">
        <tr>
            <th>No RM</th>
            <th>Nama</th>
            <th>Poli</th>
            <th>Tanggal Input</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resep as $r): ?>
            <tr>
                <td><?= $r->no_rm ?></td>
                <td><?= $r->nama_pasien ?></td>
                <td><?= $r->asal_poli ?></td>
                <td><?= $r->tanggal_input ?></td>
                <td>Rp. <?= number_format($r->total_harga, 0) ?></td>
                <td>
                    <a href="<?= site_url('resep/tagihan/' . $r->pasien_id) ?>" class="btn btn-sm btn-warning">
                        <i class="fas fa-file-invoice-dollar"></i> Tagihane
                    </a>
                    <a href="<?= site_url('resep/cetak/' . $r->pasien_id) ?>" target="_blank" class="btn btn-sm btn-primary">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

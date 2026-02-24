<h3>Cari</h3>
<form method="get" class="form-inline mb-3">
    <input type="text" name="keyword" placeholder="Nama Pasien" class="form-control mr-2" />
    <input type="date" name="tanggal" class="form-control mr-2" />
    <input type="text" name="poli" placeholder="Poli" class="form-control mr-2" />
    <button type="submit" class="btn btn-primary">Filter</button>
</form>
<table class="table table-bordered table-sm">
    <thead class="thead-light">
        <tr>
            <th>No RM</th>
            <!-- <th>No SEP</th> -->
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
                <!-- <td><?= $r->no_sep ?></td> -->
                <td><?= $r->nama_pasien ?></td>
                <td><?= $r->asal_poli ?></td>
                <td><?= $r->tanggal_input ?></td>
                <td><?= number_format($r->total_harga, 0) ?></td>
                <td>
                    <a href="<?= site_url('resep/tagihan/' . $r->pasien_id) ?>" class="btn btn-sm btn-info">Lihat</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>



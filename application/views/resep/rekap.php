<h4>Rekapitulasi Bulanan</h4>
<table class="table table-bordered">
    <thead><tr><th>Bulan</th><th>Jumlah Obat</th><th>Total Tagihan</th></tr></thead>
    <tbody>
        <?php foreach (\$rekap as \$r): ?>
            <tr>
                <td><?= date('F', mktime(0, 0, 0, \$r->bulan, 10)) ?></td>
                <td><?= \$r->jumlah_obat ?></td>
                <td><?= number_format(\$r->total_tagihan, 0) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
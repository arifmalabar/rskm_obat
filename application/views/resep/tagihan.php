<h3>Rincian Tagihan</h3>
<p>
    <strong>Nama:</strong> <?= $pasien->nama_pasien ?><br>
    <strong>No. RM:</strong> <?= $pasien->no_rm ?><br>
    <strong>No. SEP:</strong> <?= $pasien->no_sep ?><br>
    <strong>Poli:</strong> <?= $pasien->asal_poli ?>
</p>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Resep
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Resep</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>resep/tambahTagihan" id="tambahtagihan" method="post">
            <div class="form-group">
                <label for="">Obat</label>
                <select class="form-control select2" name="id_obat">
                    <option value="">Pilih obat</option>
                    <?php 
                    foreach ($obat as $key) { ?>
                        <option value="<?= $key->id; ?>"><?= $key->nama_obat; ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" id="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="tambahtagihan" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
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
<script>
$(document).ready(function() {
    $('#exampleModal').on('shown.bs.modal', function () {
        $('.select2').select2({
            dropdownParent: $('#exampleModal')
        });
    });
   
    
});
</script>

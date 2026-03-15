<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPasien">
  Tambah Pasien
</button>
<!-- Modal -->
<div class="modal fade" id="modalTambahPasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- Tabel -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalObat">
Tambah Obat
</button>
<!-- Modal -->
<div class="modal fade" id="modalObat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- Tabel -->
<table id="tabelResep" class="table table-bordered table-hover table-sm table-striped">
    <thead class="thead-light">
        <tr>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Poli</th>
            <th>Tanggal Input</th>
            <th>Total Harga</th>
            <th>Total Penggunaan Obat</th>
            <th class="text-center">Aksi</th>
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
                <td><center><h2><?= $r->jml_penggunaan_obat ?></h2></center></td>
                <td class="text-center">
                    <a href="<?= site_url('resep/tagihan/' . $r->pasien_id) ?>" class="btn btn-sm btn-warning mb-1">
                        <i class="fas fa-file-invoice-dollar"></i> Tagihan
                    </a>
                    <a href="<?= site_url('resep/cetak/' . $r->pasien_id) ?>" target="_blank" class="btn btn-sm btn-primary mb-1">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

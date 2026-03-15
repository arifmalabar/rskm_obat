<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPasien">
  Tambah Obat
</button>
<!-- Modal -->
<div class="modal fade" id="modalTambahPasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>obat/insertdata" id="tambahPasien" method="post">
            <div class="form-group">
                <label for="">nama obat</label>
                <input type="text" name="nama_obat" class="form-control" placeholder="Masukan Nama Obat" id="">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Obat(Hanya Angka)" id="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="tambahPasien" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditPasien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>obat/insertdata" id="updatePasien" method="post">
            <div class="form-group">
                <label for="">nama obat</label>
                <input type="text" name="nama_obat" class="form-control txtNama" placeholder="Masukan Nama Obat" id="">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="number" name="harga" class="form-control txtHarga" placeholder="Masukan Harga Obat(Hanya Angka)" id="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="updatePasien" class="btn btn-warning">Update</button>
      </div>
    </div>
  </div>
</div>

<table id="tabelResep" class="table table-bordered table-hover table-sm table-striped">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($obat as $r): ?>
            <tr>
                <td><?= $r->id ?></td>
                <td><?= $r->nama_obat ?></td>
                <td><?= $r->harga ?></td>
                <td class="text-center">
                    <a href="<?= site_url('resep/tagihan/' . $r->id) ?>" class="btn btn-sm btn-danger mb-1 btn-delete" data-id="<?= $r->id; ?>">
                        <i class="fas fa-trash"></i> 
                    </a>
                    <a href="<?= site_url('resep/cetak/' . $r->id) ?>"
                        data-toggle="modal" data-target="#modalEditPasien"
                        class="btn btn-sm btn-warning mb-1 btn-update" 
                        data-id="<?= $r->id; ?>"
                        data-nama_obat="<?= $r->nama_obat; ?>"
                        data-harga="<?= $r->harga; ?>">
                        <i class="fas fa-edit"></i> 
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script>
    $(".btn-delete").click(function (e) { 
       const id = $(this).data("id");
       e.preventDefault();
       let msg = confirm("Apakah anda yakin ingin menghapus data?");
       if(msg){
        window.location = `obat/deletedata/${id}`;
       }
    });
    $(".btn-update").click(function (e) { 
        const id = $(this).data("id");
        const nama = $(this).data('nama_obat');
        const harga = $(this).data("harga");
        $("#updatePasien").attr("action", "<?= base_url(); ?>obat/updatedata/"+id);
        
        $(".txtNama").val(nama);
        $(".txtHarga").val(harga);
        
    });
</script>
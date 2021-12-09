<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Data Barang
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Barang</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>barang/view_barang" autocomplete="off">
            <?php if ($leveluser == "Administrator") { ?>
              <div class="form-group">
                <div class="form-line">
                  <select class="form-control" id="cabang" name="cabang" data-error=".errorTxt13">
                    <option value="">-- Pilih Cabang -- </option>

                    <?php foreach ($cab as $c) { ?>
                      <option <?php if ($cabang == $c->kode_cabang) {
                                echo "selected";
                              } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="errorTxt13"></div>
              </div>
            <?php } else { ?>
              <input type="hidden" name="cabang" value="<?php echo $cabang; ?>">
            <?php  } ?>
            <div class="row mb-3 mt-3">
              <div class="col-md-12">
                <div class="form-group">
                  <select id="kategori_harga" name="kategori_harga" class="form-select">
                    <option value="">-- Pilih Kategori Harga -- </option>
                    <option <?php if ($kategori_harga == 'HARGA LAMA') {
                              echo "selected";
                            } ?> value="NORMAL">HARGA LAMA</option>
                    <option <?php if ($kategori_harga == 'RETAIL') {
                              echo "selected";
                            } ?> value="RETAIL">RETAIL</option>
                    <option <?php if ($kategori_harga == 'TO') {
                              echo "selected";
                            } ?> value="TO">TO</option>
                    <option <?php if ($kategori_harga == 'CANVASER') {
                              echo "selected";
                            } ?> value="CANVASER">CANVASER</option>
                    <option <?php if ($kategori_harga == 'MOTORIS') {
                              echo "selected";
                            } ?> value="MOTORIS">MOTORIS</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="mytable" style="font-size:12px">
              <thead class="thead-dark">
                <tr>
                  <th width="10px">No</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th>Harga/Dus</th>
                  <th>Harga/Pack</th>
                  <th>Harga/Pcs</th>
                  <th>Kategori Harga</th>
                  <?php if ($leveluser == "Administrator") { ?>
                    <th>Aksi</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $sno  = $row + 1;
                foreach ($result as $d) {
                ?>
                  <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $d['kode_barang']; ?></td>
                    <td><a href="#" data-kode="<?php echo $d['kode_barang']; ?>" class="detailbrg"><?php echo $d['nama_barang']; ?></a></td>
                    <td><?php echo $d['kategori']; ?></td>
                    <td><?php echo $d['satuan']; ?></td>
                    <td align="right"><?php echo number_format($d['harga_dus'], '0', '', '.'); ?></td>
                    <td align="right"><?php echo number_format($d['harga_pack'], '0', '', '.'); ?></td>
                    <td align="right"><?php echo number_format($d['harga_pcs'], '0', '', '.'); ?></td>
                    <td align="right"><?php echo $d['kategori_harga']; ?></td>
                    <?php if ($leveluser == "Administrator") { ?>
                      <td>
                        <a href="#" data-id="<?php echo $d['kode_barang']; ?>" class="btn btn-warning  btn-sm waves-effect edit">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm waves-effect" data-target="#konfirmasi_hapus" data-toggle="modal" data-href="<?php echo base_url("barang/hapus/" . $d['kode_barang']); ?>">Hapus</a>
                      </td>
                    <?php } ?>
                  </tr>
                <?php $sno++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2 col-xs-12">
      <?php $this->load->view('menu/menu_masterpenjualan'); ?>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="inputbarang" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Detail</h5>
      </div>
      <div class="modal-body">
        <div class="modal-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="hapusdata" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">
          Yakin Untuk Di Hapus ?
        </div>
        <div>Data Akan Terhapus !</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger delete">Yes, delete</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {

    $("#tambahbarang").click(function() {
      $("#inputbarang").modal("show");
      $(".modal-content").load("<?php echo base_url(); ?>barang/input_barang");
    });

    $(".edit").click(function() {
      $id = $(this).attr('data-id');
      $("#inputbarang").modal("show");
      $(".modal-content").load("<?php echo base_url(); ?>barang/edit_barang/" + $id);
    });

    $(".detailbrg").click(function() {
      $id = $(this).attr('data-kode');
      $("#inputbarang").modal("show");
      $(".modal-content").load("<?php echo base_url(); ?>barang/detail_barang/" + $id);
    });


  });
</script>
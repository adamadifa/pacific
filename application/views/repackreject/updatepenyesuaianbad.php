<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          UPDATE PENYESUAIAN BAD STOK
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="row">
        <div class="col-md-7">

          <div class="card">
            <div class="card-header">
              <h4 class="card-title">UPDATE PENYESUAIAN BAD STOK</h4>
            </div>
            <div class="card-body">
              <form name="autoSumForm" autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>repackreject/update_penyesuaianbad">
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" readonly value="<?php echo $mutasi['no_mutasi_gudang_cabang'] ?>" id="no_mutasi" name="no_mutasi" class="form-control" placeholder="No Mutasi Penjualan" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-building-o"></i>
                    </span>
                    <input type="text" readonly value="<?php echo $mutasi['kode_cabang']; ?>" id="cabang" name="cabang" class="form-control" placeholder="Cabang" data-error=".errorTxt19" />
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <input type="text" readonly value="<?php echo $mutasi['tgl_mutasi_gudang_cabang']; ?>" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Tanggal Penjualan" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-file-text-o"></i>
                    </span>
                    <input type="text" readonly value="<?php echo $mutasi['keterangan']; ?>" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <input name="inout" <?php if ($mutasi['inout_bad'] == "IN") {
                                        echo "checked";
                                      } ?> type="radio" value="IN" id="radio_1" class="inout" />
                  <label for="radio_1">IN</label>
                  <input name="inout" <?php if ($mutasi['inout_bad'] == "OUT") {
                                        echo "checked";
                                      } ?> type="radio" value="OUT" id="radio_2" class="inout" />
                  <label for="radio_2">OUT</label>
                </div>
                <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="3" align="">No</th>
                      <th rowspan="3" style="text-align:center">Nama Barang</th>
                      <th colspan="6" style="text-align:center">Penyesuaian Bad Stok</th>
                    </tr>
                    <tr>
                      <th colspan="6" style="text-align:center">Kuantitas</th>
                    </tr>
                    <tr>
                      <th style="text-align:center">Jumlah</th>
                      <th style="text-align:center">Satuan</th>
                      <th style="text-align:center">Jumlah</th>
                      <th style="text-align:center">Satuan</th>
                      <th style="text-align:center">Jumlah</th>
                      <th style="text-align:center">Satuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang as $b) {
                      $jml = $this->db->get_where('detail_mutasi_gudang_cabang', array('no_mutasi_gudang_cabang' => $mutasi['no_mutasi_gudang_cabang'], 'kode_produk' => $b->kode_produk))->row_array();
                      //RETUR
                      $jmldus = floor($jml['jumlah'] / $b->isipcsdus);
                      if ($jml['jumlah'] != 0) {
                        $sisadus   = $jml['jumlah'] % $b->isipcsdus;
                      } else {
                        $sisadus = 0;
                      }
                      if ($b->isipack == 0) {
                        $jmlpack    = 0;
                        $sisapack   = $sisadus;
                        $s          = "A";
                      } else {
                        $jmlpack    = floor($sisadus / $b->isipcs);
                        $sisapack   = $sisadus % $b->isipcs;
                        $s          = "B";
                      }
                      $jmlpcs = $sisapack;

                      // echo $sisadus."-".$s."-".$sisapack."-".$jmlpcs."<br>";

                    ?>
                      <tr>
                        <td style="width:10px"><?php echo $no; ?></td>
                        <td style="width:200px">
                          <input type="hidden" name="kode_produk<?php echo $no; ?>" value="<?php echo $b->kode_produk; ?>">
                          <input type="hidden" name="isipcsdus<?php echo $no; ?>" value="<?php echo $b->isipcsdus; ?>">
                          <input type="hidden" name="isipack<?php echo $no; ?>" value="<?php echo $b->isipack; ?>">
                          <input type="hidden" name="isipcs<?php echo $no; ?>" value="<?php echo $b->isipcs; ?>">
                          <?php echo $b->nama_barang; ?>
                        </td>
                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" style="text-align:right" value="<?php if (!empty($jmldus)) {
                                                                                    echo $jmldus;
                                                                                  } ?>" id="jmldus" name="jmldus<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>
                        <td style="width:50px"><?php echo $b->satuan; ?></td>
                        <td style="width:100px">
                          <?php if (!empty($b->isipack)) { ?>
                            <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                              <div class="form-line">
                                <input type="text" style="text-align:right" value="<?php if (!empty($jmlpack)) {
                                                                                      echo $jmlpack;
                                                                                    } ?>" id="jmlpack" name="jmlpack<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                              </div>
                            </div>
                          <?php } ?>
                        </td>
                        <td style="width:50px">Pack</td>
                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" style="text-align:right" value="<?php if (!empty($jmlpcs)) {
                                                                                    echo $jmlpcs;
                                                                                  } ?>" id="jmlpcs" name="jmlpcs<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>
                        <td style="width:50px">Pcs</td>
                      </tr>
                    <?php
                      $no++;
                      $jumproduk = $no - 1;
                    }
                    ?>
                    <input type="hidden" value="<?php echo $jumproduk; ?>" name="jumproduk">
                  </tbody>
                </table>
                <div class="mb-3 d-flex justify-content-end">
                  <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-send mr-2"></i>Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_gudangcabang_administrator'); ?>
    </div>
  </div>
</div>

<script>
  flatpickr(document.getElementById('tanggal'), {});
</script>
<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Laporan Persediaan Barang Logistik
        </h2>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-10">
        <!-- Content here -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-dark text-white">
                <h4 class="card-title"> Laporan Persediaan Barang Logistik</h4>
              </div>
              <div class="card-body">
                <form class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporangudanglogistik/cetak_persediaan" target="_blank">

                  <div class="mb-3">
                    <select class="form-control selectoption" name="kode_kategori" id="kode_kategori">
                      <option value="">-- SEMUA KATEGORI --</option>
                      <?php foreach ($kategori as $d) { ?>
                        <option value="<?php echo $d->kode_kategori; ?>"><?php echo $d->kategori; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <select class="form-control selectoption" id="bulan" name="bulan">
                      <option value="">Bulan</option>
                      <?php for ($a = 1; $a <= 12; $a++) { ?>
                        <option value="<?php echo $a;  ?>"><?php echo $bulan[$a]; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <select class="form-control selectoption" id="tahun" name="tahun">
                      <option value="">Tahun</option>
                      <?php for ($t = 2019; $t <= $tahun; $t++) { ?>
                        <option value="<?php echo $t;  ?>"><?php echo $t; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <button type="submit" name="cetak" class="btn btn-primary btn-block">
                          <i class="fa fa-print mr-2"></i>
                          CETAK
                        </button>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" name="export" class="btn btn-success btn-block">
                          <i class="fa fa-download mr-2"></i>
                          <span>EXPORT EXCEL</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-dark text-white">
                <h4 class="card-title"> Laporan Persediaan Opname Barang Logistik</h4>
              </div>
              <div class="card-body">
                <form class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporangudanglogistik/cetak_persediaan_opname" target="_blank">

                  <div class="mb-3">
                    <select class="form-control selectoption" name="kode_kategori" id="kode_kategori">
                      <option value="">-- SEMUA KATEGORI --</option>
                      <?php foreach ($kategori as $d) { ?>
                        <option value="<?php echo $d->kode_kategori; ?>"><?php echo $d->kategori; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <select class="form-control selectoption" id="bulan" name="bulan">
                      <option value="">Bulan</option>
                      <?php for ($a = 1; $a <= 12; $a++) { ?>
                        <option value="<?php echo $a;  ?>"><?php echo $bulan[$a]; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <select class="form-control selectoption" id="tahun" name="tahun">
                      <option value="">Tahun</option>
                      <?php for ($t = 2019; $t <= $tahun; $t++) { ?>
                        <option value="<?php echo $t;  ?>"><?php echo $t; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <button type="submit" name="cetak" class="btn btn-primary btn-block">
                          <i class="fa fa-print mr-2"></i>
                          CETAK
                        </button>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" name="export" class="btn btn-success btn-block">
                          <i class="fa fa-download mr-2"></i>
                          <span>EXPORT EXCEL</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <?php $this->load->view('menu/menu_gudanglogistik_administrator.php'); ?>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {

    $('.selectoption').selectize({});

  });
</script>
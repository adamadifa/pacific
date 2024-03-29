<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Laporan Insentif Kepala Admin
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
                <h4 class="card-title">Laporan Insentif Kepala Admin</h4>
              </div>
              <div class="card-body">
                <form class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>komisi/cetak_insentif" target="_blank">
                  <input type="hidden" name="cabang" id="cabang" value="<?php echo $cb; ?>">
                  <div class="form-group mb-3">
                    <select required class="form-select show-tick" id="bulan" name="bulan" data-error=".errorTxt1">
                      <option value="">Bulan</option>
                      <?php
                      $bulanini = date("m");
                      for ($i = 1; $i < count($bulan); $i++) {
                      ?>
                        <option <?php if ($bulanini == $i) {
                                  echo "selected";
                                } ?> value="<?php echo $i; ?>"><?php echo $bulan[$i]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <select required class="form-control show-tick" id="tahun2" name="tahun" data-error=".errorTxt1">
                      <?php
                      $tahunmulai = 2020;

                      for ($thn = $tahunmulai; $thn <= date('Y'); $thn++) {
                      ?>
                        <option <?php if (date('Y') == $thn) {
                                  echo "Selected";
                                } ?> value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
                      <?php
                      }
                      ?>
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
        <?php $this->load->view('menu/menu_marketing_administrator'); ?>
      </div>
    </div>
  </div>
</div>
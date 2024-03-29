<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Laporan Penerimaan Uang
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
                <h4 class="card-title">Laporan Penerimaan Uang</h4>
              </div>
              <div class="card-body">
                <form class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporanpenjualan/cetak_lpu" target="_blank">
                  <?php if ($cb == 'pusat') { ?>
                    <div class="mb-3">
                      <select name="cabang" id="cabang" class="form-select" required>
                        <option value="">-- Pilih Cabang --</option>
                        <?php foreach ($cabang as $c) { ?>
                          <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <?php } else { ?>
                    <input type="hidden" name="cabang" id="cabang" value="<?php echo $cb; ?>">
                  <?php } ?>
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
                  <div class="form-group mb-3">
                    <select name="format" required id="format" class="form-control show-tick">
                      <option value="">Pilih Format</option>
                      <option value="1">Format 1</option>
                      <option value="2">Format 2</option>
                    </select>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <label class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="salesnonaktif" value="1">
                        <span class="form-check-label"><b>Tampilkan Sales Non Aktif ?</b></span>
                      </label>
                    </div>
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
        <?php $this->load->view('menu/menu_kasbesar_administrator'); ?>
      </div>
    </div>
  </div>
</div>
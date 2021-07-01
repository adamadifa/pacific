<form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>angkutan/insert_angkutan">
  <div class="container-fluid" style="zoom:100%">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Input Angkutan
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10">
          <!-- Content here -->
          <div class="row">
            <div class="col-md-4 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Input Angkutan</h4>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-barcode"></i>
                      </span>
                      <input type="hidden" value="" id="cekdata" name="cekdata" />
                      <input type="text" id="no_surat_jalan" name="no_surat_jalan" class="form-control" placeholder="No SJ" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar-o"></i>
                      </span>
                      <input type="text" id="tgl_input" name="tgl_input" class="form-control datepicker date" placeholder="Tanggal Pemasukan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-car"></i>
                      </span>
                      <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-barcode"></i>
                      </span>
                      <input type="text" id="nopol" name="nopol" class="form-control" placeholder="No Polisi" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-money"></i>
                      </span>
                      <input type="text" id="tarif" name="tarif" class="form-control" placeholder="Tarif" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-money"></i>
                      </span>
                      <input type="text" id="tepung" name="tepung" class="form-control" placeholder="Tepung" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-money"></i>
                      </span>
                      <input type="text" id="bs" name="bs" class="form-control" placeholder="BS" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-car"></i>
                      </span>
                      <input type="text" id="angkutan" name="angkutan" class="form-control" placeholder="Angkutan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <a href="#" class="btn btn-danger mb-3">Tambah Data</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-xs-12">
             
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <?php $this->load->view('menu/menu_maintenance_administrator.php'); ?>
        </div>
      </div>
    </div>
  </div>
</form>

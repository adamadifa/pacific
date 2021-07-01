<form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>angkutan/insert_angkutan">
  <div class="container-fluid">
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
            <div class="col-md-8 col-xs-12" style="zoom:80%">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">DATA PEMASUKAN</h4>

                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>bahan_bakar/pemasukan" autocomplete="off">
                    <div class="mb-3">
                      <input type="text" value="<?php echo $no_surat_jalan; ?>" id="no_surat_jalan" name="no_surat_jalan" class="form-control" placeholder="No Bukti Pemasukan" data-error=".errorTxt19" />
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-icon">
                            <input id="tgl_mutasi_gudang" type="date" value="<?php echo $tgl_mutasi_gudang; ?>" placeholder="Tanggal" class="form-control" name="tgl_mutasi_gudang" />
                            <span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="4" y="5" width="16" height="16" rx="2" />
                                <line x1="16" y1="3" x2="16" y2="7" />
                                <line x1="8" y1="3" x2="8" y2="7" />
                                <line x1="4" y1="11" x2="20" y2="11" />
                                <line x1="11" y1="15" x2="12" y2="15" />
                                <line x1="12" y1="15" x2="12" y2="18" /></svg>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                      <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
                    </div>
                  </form>
                  <!-- <a href="<?php echo base_url(); ?>angkutan/input_angkutan" class="btn btn-danger mb-3">Tambah Data</a> -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                      <thead class="thead-dark">
                        <tr>
                          <th width="150px">No SJ</th>
                          <th>Tanggal</th>
                          <th>Angkutan</th>
                          <th>Cabang</th>
                          <th>No. Pol</th>
                          <th width="150px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no  = $row + 1;
                        foreach ($result as $d) {
                          $no_surat_jalan = str_replace("/", ".", $d['no_sj']);
                        ?>
                          <tr>
                            <td><?php echo $d['no_sj']; ?></td>
                            <td><?php echo DateToIndo2($d['tgl_mutasi_gudang']); ?></td>
                            <td><?php echo $d['kode_cabang']; ?></td>
                            <td><?php echo $d['nopol']; ?></td>
                            <td width="10px">
                              <a href="#" data-kode="<?php echo $d['no_sj']; ?>" class="btn btn-sm btn-primary detail">Detail</a>
                              <a href="#" data-href="<?php echo base_url(); ?>bahan_bakar/hapuspemasukan/<?php echo $no_surat_jalan; ?>" class="btn btn-sm btn-danger hapus">Hapus</a>
                            </td>
                          </tr>
                        <?php
                          $no++;
                        }
                        ?>
                      </tbody>
                    </table>
                    <div style='margin-top: 10px;'>
                      <?php echo $pagination; ?>
                    </div>
                  </div>
                </div>
              </div>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tgl_mutasi_gudang'), {});
  });
</script>

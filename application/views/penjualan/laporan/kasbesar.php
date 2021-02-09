<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Laporan KAS BESAR
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
                <h4 class="card-title">Laporan Kas Besar</h4>
              </div>
              <div class="card-body">
                <form class="formValidate FormKasbesar" id="formValidate" method="POST" action="<?php echo base_url(); ?>laporanpenjualan/cetak_kasbesar" target="_blank">
                  <?php if ($cb == 'pusat') { ?>
                    <div class="mb-3">
                      <select name="cabang" id="cabang" class="form-select">
                        <option value="">-- Semua Cabang --</option>
                        <?php foreach ($cabang as $c) { ?>
                          <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <?php } else { ?>
                    <input type="hidden" name="cabang" id="cabang" value="<?php echo $cb; ?>">
                  <?php } ?>
                  <div class="mb-3">
                    <select name="salesman" id="salesman" class="form-select">
                      <option value="">-- Semua Salesman --</option>
                    </select>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select id="pelanggan" name="pelanggan" class="form-select">
                          <option value="">-- Semua Pelanggan -- </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select id="jenisbayar" name="jenisbayar" class="form-select">
                          <option value="">Semua Jenis Pembayaran</option>
                          <option value="tunai">Tunai</option>
                          <option value="titipan">Titipan</option>
                          <option value="transfer">Transfer</option>
                          <option value="giro">Giro</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3" id="jenislap">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select id="jenislaporan" name="jenislaporan" class="form-select">
                          <option value="">Jenis Laporan</option>
                          <option value="rekap">Rekap</option>
                          <option value="detail">Detail</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-icon">
                          <input id="dari" type="date" placeholder="Dari" class="form-control" name="dari" />
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

                      <div class="col-md-6 mb-3">
                        <div class="input-icon">
                          <input id="sampai" type="date" placeholder="Sampai" class="form-control" name="sampai" />
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
                <h4 class="card-title">Laporan Kas Besar Sesuai LHP</h4>
              </div>
              <div class="card-body">
                <form class="formValidate formKasbesarLHP" id="formValidate2" method="POST" action="<?php echo base_url(); ?>laporanpenjualan/cetak_kasbesarlhp" target="_blank">
                  <?php if ($cb == 'pusat') { ?>
                    <div class="mb-3">
                      <select name="cabang" id="cabang2" class="form-select">
                        <option value="">-- Semua Cabang --</option>
                        <?php foreach ($cabang as $c) { ?>
                          <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <?php } else { ?>
                    <input type="hidden" name="cabang" id="cabang2" value="<?php echo $cb; ?>">
                  <?php } ?>
                  <div class="mb-3">
                    <select name="salesman" id="salesman2" class="form-select">
                      <option value="">-- Semua Salesman --</option>
                    </select>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-group">
                        <select id="pelanggan2" name="pelanggan" class="form-select">
                          <option value="">-- Semua Pelanggan -- </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-icon">
                          <input id="dariretur" type="date" placeholder="Dari" class="form-control" name="dari" />
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

                      <div class="col-md-6 mb-3">
                        <div class="input-icon">
                          <input id="sampairetur" type="date" placeholder="Sampai" class="form-control" name="sampai" />
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
        <?php $this->load->view('menu/menu_penjualan_administrator'); ?>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('dari'), {});
    flatpickr(document.getElementById('sampai'), {});
    flatpickr(document.getElementById('dariretur'), {});
    flatpickr(document.getElementById('sampairetur'), {});
  });
</script>
<script>
  $(function() {
    $('#pelanggan').selectize({});
    $('#pelanggan2').selectize({});
    // $('.FormKasbesar').bootstrapValidator({
    //   message: 'This value is not valid',
    //   feedbackIcons: {
    //     valid: 'glyphicon glyphicon-ok',
    //     invalid: 'glyphicon glyphicon-remove',
    //     validating: 'glyphicon glyphicon-refresh'
    //   },
    //   fields: {
    //     dari: {
    //       validators: {
    //         notEmpty: {
    //           message: 'Peridoe Harus Diisi !'
    //         }
    //       }
    //     },
    //     sampai: {
    //       validators: {
    //         notEmpty: {
    //           message: 'Periode Harus Diisi !'
    //         }
    //       }
    //     },
    //   }
    // });

    // $('.formKasbesarLHP').bootstrapValidator({
    //   message: 'This value is not valid',
    //   feedbackIcons: {
    //     valid: 'glyphicon glyphicon-ok',
    //     invalid: 'glyphicon glyphicon-remove',
    //     validating: 'glyphicon glyphicon-refresh'
    //   },
    //   fields: {
    //     dari: {
    //       validators: {
    //         notEmpty: {
    //           message: 'Peridoe Harus Diisi !'
    //         }
    //       }
    //     },
    //     sampai: {
    //       validators: {
    //         notEmpty: {
    //           message: 'Periode Harus Diisi !'
    //         }
    //       }
    //     },
    //   }
    // });


    function loadjenislaporan() {
      var pelanggan = $("#pelanggan").val();
      var salesman = $("#salesman").val();
      if (pelanggan != "" || salesman != "") {
        $("#jenislap").hide();
      } else {
        $("#jenislap").show();
      }
    }

    $("#pelanggan").change(function() {
      loadjenislaporan();
    });


    function loadSalesman() {
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_salesman',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $('#salesman').selectize()[0].selectize.destroy();
          $("#salesman").html(respond);
          $('#salesman').selectize({});

        }
      });
    }

    function loadsalesman2() {
      var cabang = $("#cabang2").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_salesman',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $('#salesman2').selectize()[0].selectize.destroy();
          $("#salesman2").html(respond);
          $('#salesman2').selectize({});

        }
      });
    }
    loadsalesman2();
    loadSalesman();
    $("#cabang").change(function() {
      loadSalesman();
      loadpelanggan();
    });
    // test
    $("#cabang2").change(function() {
      loadsalesman2();
    });

    $("#salesman").change(function() {
      var salesman = $("#salesman").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>laporanpenjualan/get_pelanggan",
        data: {
          salesman: salesman
        },
        cache: false,
        success: function(respond) {
          $('#pelanggan').selectize()[0].selectize.destroy();
          $("#pelanggan").html(respond);
          $('#pelanggan').selectize({});
          loadjenislaporan();
        }
      });
    });

    function loadpelanggan() {
      var cabang = $("#cabang").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>laporanpenjualan/get_pelanggancabang",
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $('#pelanggan').selectize()[0].selectize.destroy();
          $("#pelanggan").html(respond);
          $('#pelanggan').selectize({});
        }
      });
    }

    $("#salesman2").change(function() {
      var salesman = $("#salesman2").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>laporanpenjualan/get_pelanggan",
        data: {
          salesman: salesman
        },
        cache: false,
        success: function(respond) {
          $('#pelanggan2').selectize()[0].selectize.destroy();
          $("#pelanggan2").html(respond);
          $('#pelanggan2').selectize({});
        }
      });
    });
  });
</script>
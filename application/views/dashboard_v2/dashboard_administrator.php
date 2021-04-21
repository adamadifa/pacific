<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-dark text-white">
              <h4 class="card-title">Penjualan</h4>
            </div>
            <div class="card-body">
              <?php
              $level_user = $this->session->userdata('level_user');
              if ($level_user == "Administrator") {
              ?>
                <div class="row mb-4">
                  <div class="col-md-12">
                    <div class="row sm mb-3">
                      <select name="bulan" id="bulan" class="form-select">
                        <option value="">Bulan</option>
                        <?php for ($a = 1; $a <= 12; $a++) { ?>
                          <option <?php if (date("m") == $a) {
                                    echo "selected";
                                  } ?> value="<?php echo $a;  ?>"><?php echo $bulan[$a]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="row sm mb-3">
                      <select name="tahun" id="tahun" class="form-select">
                        <option value="">Tahun</option>
                        <?php for ($t = 2019; $t <= $tahun; $t++) { ?>
                          <option <?php if (date("Y") == $t) {
                                    echo "selected";
                                  } ?> value="<?php echo $t;  ?>"><?php echo $t; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-2">
                        <a href="#" id="tampilkanpenjualancashin" class="btn btn-primary btn-block">Tampilkan Rekap Penjualan & Cash IN</a>
                      </div>
                      <div class="col-md-6">
                        <a href="#" id="hidepenjualancashin" class="btn btn-danger btn-block">Sembunyikan Rekap Penjualan & Cash IN</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive mb-4">
                      <div id="loadrekappenjualan">
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-dark text-white">
              <h4 class="card-title">Rekap Kendaraan</h4>
            </div>
            <div class="card-body">
              <?php
              $level_user = $this->session->userdata('level_user');
              if ($level_user == "Administrator") {
              ?>
                <div class="row mb-4">
                  <div class="col-md-12">
                    <div class="row mb-3">
                      <select name="cabangkendaraan" id="cabangkendaraan" class="form-select">
                        <option value="">Semua Cabang</option>
                        <?php foreach ($cabang as $c) { ?>
                          <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="row sm mb-3">
                      <select name="bulankendaraan" id="bulankendaraan" class="form-select">
                        <option value="">Bulan</option>
                        <?php for ($a = 1; $a <= 12; $a++) { ?>
                          <option <?php if (date("m") == $a) {
                                    echo "selected";
                                  } ?> value="<?php echo $a;  ?>"><?php echo $bulan[$a]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="row sm mb-3">
                      <select name="tahunkendaraan" id="tahunkendaraan" class="form-select">
                        <option value="">Tahun</option>
                        <?php for ($t = 2019; $t <= $tahun; $t++) { ?>
                          <option <?php if (date("Y") == $t) {
                                    echo "selected";
                                  } ?> value="<?php echo $t;  ?>"><?php echo $t; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-2">
                        <a href="#" id="tampilkankendaraan" class="btn btn-primary btn-block">Tampilkan Rekap Kendaraan</a>
                      </div>
                      <div class="col-md-6">
                        <a href="#" id="hidekendaraan" class="btn btn-danger btn-block">Sembunyikan Rekap Kendaraan</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive mb-4">
                      <div id="loadrekapkendaraan">
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-dark text-white">
              <h4 class="card-title">AUP</h4>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="form-group">
                  <select name="cabangaup" id="cabangaup" class="form-control">
                    <option value="">Semua Cabang</option>
                    <?php foreach ($cabang as $c) { ?>
                      <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <rect x="4" y="5" width="16" height="16" rx="2" />
                    <line x1="16" y1="3" x2="16" y2="7" />
                    <line x1="8" y1="3" x2="8" y2="7" />
                    <line x1="4" y1="11" x2="20" y2="11" />
                    <line x1="11" y1="15" x2="12" y2="15" />
                    <line x1="12" y1="15" x2="12" y2="18" />
                  </svg>
                </span>
                <input type="text" name="tanggal_aup" value="<?= date('Y-m-d'); ?>" class="form-control" id="tanggal_aup" placeholder="Lihat Per Tanggal">
              </div>
              <div class="row mb-3">
                <div class="form-group">
                  <select name="exclude" id="exclude" class="form-control">
                    <option value="yes">Exclude Pusat</option>
                    <option value="no">Include Pusat</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-2">
                  <a href="#" id="tampilkanaup" class="btn btn-primary btn-block">Tampilkan AUP</a>
                </div>
                <div class="col-md-6">
                  <a href="#" id="hideaup" class="btn btn-danger btn-block">Sembunyikan AUP</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive mb-4">
                    <div id="loadaup">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-dark text-white">
              <h4 class="card-title">Data Persediaan All Cabang (DPB)</h4>
            </div>
            <div class="card-body">
              <div id="loadrekappersediaan"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog text-center  modal-dialog-centered" role="document">
    <img src="<?php echo base_url(); ?>assets/images/loadingcabe.gif" / width="200px" height="150px">
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tanggal_aup'), {});
  });
</script>
<script>
  $(function() {
    var loading = $('#modal-large').modal("hide");
    $(document)
      .ajaxStart(function() {
        loading.modal("show");
      })
      .ajaxStop(function() {
        loading.modal("hide");
      });

    function loadrekappersediaan() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>dashboard/loadrekappersediaandpb',
        cache: false,
        success: function(respond) {
          $("#loadrekappersediaan").html(respond);
        }
      });
    }

    loadrekappersediaan();

    function loadrekappenjualan() {
      var bulan = $("#bulan").val();
      var tahun = $("#tahun").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>dashboard/rekappenjualancashin',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          setTimeout(function() {
            loading.modal("hide");
          }, 1000);
          $("#loadrekappenjualan").html(respond);
        }
      });
    }

    function loadrekapkendaraan() {
      var cabang = $("#cabangkendaraan").val();
      var bulan = $("#bulankendaraan").val();
      var tahun = $("#tahunkendaraan").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>dashboard/rekapkendaraan',
        data: {
          bulan: bulan,
          tahun: tahun,
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          setTimeout(function() {
            loading.modal("hide");
          }, 1000);
          $("#loadrekapkendaraan").html(respond);
        }
      });
    }

    function loadaup() {
      var cabang = $("#cabangaup").val();
      var tanggal_aup = $("#tanggal_aup").val();
      var exclude = $("#exclude").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>dashboard/aup',
        data: {
          cabang: cabang,
          tanggal_aup: tanggal_aup,
          exclude: exclude
        },
        cache: false,
        success: function(respond) {
          $("#loadaup").html(respond);
        }
      });
    }

    $("#tampilkanpenjualancashin").click(function(e) {
      e.preventDefault();
      loadrekappenjualan();
      $("#loadrekappenjualan").show();
    });

    $("#hidepenjualancashin").click(function(e) {
      e.preventDefault();
      $("#loadrekappenjualan").hide();
    });

    $("#tampilkankendaraan").click(function(e) {
      e.preventDefault();
      loadrekapkendaraan();
      $("#loadrekapkendaraan").show();
    });

    $("#hidekendaraan").click(function(e) {
      e.preventDefault();
      $("#loadrekapkendaraan").hide();
    });

    $("#tampilkanaup").click(function(e) {
      e.preventDefault();
      loadaup();
      $("#loadaup").show();
    });

    $("#hideaup").click(function(e) {
      e.preventDefault();
      $("#loadaup").hide();
    });

  });
</script>
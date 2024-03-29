<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          INPUT DATA PERINCIAN BARANG (DPB)
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> INPUT DATA PERINCIAN BARANG (DPB)</h4>
            </div>
            <div class="card-body">
              <form name="autoSumForm" autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>dpb/input_dpb">
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" value="" id="nodpb" name="nodpb" class="form-control" placeholder="No DPB" data-error=".errorTxt19" />
                  </div>
                </div>
                <?php if ($cb == 'pusat' or $cb == 'TSM') { ?>
                  <div class="form-group mb-3">
                    <select class="form-select" id="cabang" name="cabang">
                      <option value="">Pilih Cabang</option>
                      <?php foreach ($cabang as $c) { ?>
                        <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                <?php } else { ?>
                  <input type="hidden" readonly id="cabang" name="cabang" value="<?php echo $cb; ?>" class="form-control" placeholder="Kode Cabang" />
                <?php } ?>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="salesman" name="salesman" data-error=".errorTxt1">
                    <option value="">Salesman</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="nokendaraan" name="nokendaraan" data-error=".errorTxt1">
                    <option value="">Kendaraan</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="driver" name="driver" data-error=".errorTxt1">
                    <option value="">Driver</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="helper" name="helper" data-error=".errorTxt1">
                    <option value="">Helper</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="helper2" name="helper2" data-error=".errorTxt1">
                    <option value="">Helper</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="helper3" name="helper3" data-error=".errorTxt1">
                    <option value="">Helper</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-map"></i>
                    </span>
                    <input type="text" value="" id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan" data-error=".errorTxt19" />
                  </div>
                </div>
                <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="4" align="">No</th>
                      <th rowspan="4" style="text-align:center">Nama Barang</th>
                      <th colspan="6" style="text-align:center">Pengambilan</th>
                    </tr>
                    <tr>
                      <td colspan="6" style="text-align:center; background-color:#354052">
                        <div class="form-group mb-3">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-calendar-o"></i>
                            </span>
                            <input type="text" value="" id="tglambil" name="tglambil" class="form-control datepicker" placeholder="Tgl Pengambilan" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </td>

                    </tr>
                    <tr>
                      <th colspan="6" style="text-align:center;">Kuantitas</th>

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

                    ?>
                      <input type="hidden" name="isipcsdus<?php echo $no; ?>" value="<?php echo $b->isipcsdus; ?>">
                      <input type="hidden" name="isipcs<?php echo $no; ?>" value="<?php echo $b->isipcs; ?>">
                      <tr>
                        <td style="width:10px"><?php echo $no; ?></td>
                        <td style="width:200px">
                          <input type="hidden" name="kode_produk<?php echo $no; ?>" value="<?php echo $b->kode_produk; ?>">
                          <?php echo $b->nama_barang; ?>
                        </td>
                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" style="text-align:right" value="" id="jmlduspengambilan" name="jmlduspengambilan<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>

                        <td style="width:50px"><?php echo $b->satuan; ?></td>
                        <td style="width:100px">
                          <?php if (!empty($b->isipack)) { ?>
                            <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                              <div class="form-line">
                                <input type="text" style="text-align:right" value="" id="jmlpackpengambilan" name="jmlpackpengambilan<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                              </div>
                            </div>
                          <?php } ?>
                        </td>
                        <td style="width:50px"> Pack </td>
                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" style="text-align:right" value="" id="jmlpcspengambilan" name="jmlpcspengambilan<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
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
  flatpickr(document.getElementById('tglambil'), {});
</script>
<script type="text/javascript">
  $(function() {
    $(".formValidate").submit(function() {
      var nodpb = $("#nodpb").val();
      var cabang = $("#cabang").val();
      var salesman = $("#salesman").val();
      var tujuan = $("#tujuan").val();
      var nokendaraan = $("#nokendaraan").val();
      var tglambil = $("#tglambil").val();
      var driver = $("#driver").val();
      var helper = $("#helper").val();
      if (nodpb == "") {
        swal("Oops!", "No DPB Harus Diisi!", "warning");
        return false;
      } else if (cabang == "") {
        swal("Oops!", "Cabang Harus Diisi!", "warning");
        return false;
      } else if (salesman == "") {
        swal("Oops!", "Salesman Harus Diisi!", "warning");
        return false;
      } else if (tujuan == "") {
        swal("Oops!", "Tujuan Harus Diisi!", "warning");
        return false;
      } else if (nokendaraan == "") {
        swal("Oops!", "No Kendaraan Harus Diisi!", "warning");
        return false;
      } else if (tglambil == "") {
        swal("Oops!", "Tanggal Pengambilan Harus Diisi!", "warning");
        return false;
      }
    });

    function loadsalesman() {
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_salesman',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $("#salesman").html(respond);
          //$("#salesman").selectpicker("refresh");
        }
      });
    }

    function loaddriver() {
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_driver',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $("#driver").html(respond);
          //$("#salesman").selectpicker("refresh");
        }
      });
    }

    function loadhelper() {
      var cabang = $("#cabang").val();

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_helper',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $("#helper").html(respond);
          $("#helper2").html(respond);
          $("#helper3").html(respond);
          //$("#salesman").selectpicker("refresh");
        }
      });
    }

    loaddriver();
    loadsalesman();
    loadhelper();


    function loadkendaraan() {
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_kendaraan',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $("#nokendaraan").html(respond);
          //$("#salesman").selectpicker("refresh");
        }
      });
    }
    loadkendaraan();

    $("#cabang").change(function(e) {
      e.preventDefault();
      var cabang = $("#cabang").val();
      loaddriver();
      loadhelper();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_salesman',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $("#salesman").html(respond);
          // $("#salesman").selectpicker("refresh");
        }
      });
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_kendaraan',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $("#nokendaraan").html(respond);
          // $("#salesman").selectpicker("refresh");
        }
      });

    });

  });
</script>
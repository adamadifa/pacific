<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          UPDATE DATA PERINCIAN BARANG (DPB)
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="row">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> UPDATE DATA PERINCIAN BARANG (DPB)</h4>
            </div>
            <div class="card-body">
              <form name="autoSumForm" autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>dpb/update_dpb">
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" readonly value="<?php echo $dpb['no_dpb']; ?>" id="nodpb" name="nodpb" class="form-control" placeholder="No DPB" data-error=".errorTxt19" />
                  </div>
                </div>
                <?php if ($cb == 'pusat') { ?>
                  <div class="form-group mb-3">
                    <select class="form-select" id="cabang" name="cabang">
                      <option value="">Pilih Cabang</option>
                      <?php foreach ($cabang as $c) { ?>
                        <option <?php if ($dpb['kode_cabang'] == $c->kode_cabang) {
                                  echo "selected";
                                } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                <?php } else { ?>
                  <input type="hidden" readonly id="cabang" name="cabang" value="<?php echo $dpb['kode_cabang']; ?>" class="form-control" placeholder="Kode Cabang" />
                <?php } ?>
                <div class="form-group mb-3">
                  <select class="form-select show-tick" id="salesman" name="salesman" data-error=".errorTxt1">
                    <option value="<?php echo $dpb['id_karyawan'] ?>"><?php echo $dpb['nama_karyawan']; ?></option>
                    <?php foreach ($salesman as $s) { ?>
                      <option value="<?php echo $s->id_karyawan ?>"><?php echo $s->nama_karyawan; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-map"></i>
                    </span>
                    <input type="text" value="<?php echo $dpb['tujuan']; ?>" id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-truck"></i>
                    </span>
                    <input type="text" value="<?php echo $dpb['no_kendaraan'] ?>" id="nokendaraan" name="nokendaraan" class="form-control" placeholder="No Kendaraan" data-error=".errorTxt19" />
                  </div>
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
                <table class="table table-bordered table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="4" align="">No</th>
                      <th rowspan="4" style="text-align:center">Nama Barang</th>
                      <th colspan="3" style="text-align:center; background-color:#274a82; ">Pengambilan</th>
                      <th colspan="3" style="text-align:center; background-color:#116946; ">Pengembalian</th>
                      <th colspan="3" rowspan="2" style="text-align:center; background-color:#802c2c;">Barang Keluar</th>

                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:center; background-color:#274a82">
                        <div class="form-group mb-3">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-calendar-o"></i>
                            </span>
                            <input type="text" style="text-align:center; color:black !important" value="<?php echo $dpb['tgl_pengambilan']; ?>" id="tglambil" name="tglambil" class="form-control datepicker" placeholder="Tgl Pengambilan" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </th>
                      <th colspan="3" style="text-align:center; background-color:#116946">
                        <div class="form-group mb-3">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-calendar-o"></i>
                            </span>
                            <input type="text" style="text-align:center; color:black !important" value="<?php echo $dpb['tgl_pengembalian']; ?>" id="tglkembali" name="tglkembali" class="form-control datepicker" placeholder="Tgl Pengembalian" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <th colspan="3" style="text-align:center; background-color:#274a82">Kuantitas</th>
                      <th colspan="3" style="text-align:center; background-color:#116946">Kuantitas</th>
                      <th colspan="3" style="text-align:center; background-color:#802c2c">Kuantitas</th>
                    </tr>
                    <tr>
                      <th style="text-align:center; background-color:#274a82">Dus</th>
                      <th style="text-align:center; background-color:#274a82">Pack</th>
                      <th style="text-align:center; background-color:#274a82">PCs</th>
                      <th style="text-align:center; background-color:#116946">Dus</th>
                      <th style="text-align:center; background-color:#116946">Pack</th>
                      <th style="text-align:center; background-color:#116946">PCs</th>
                      <th style="text-align:center; background-color:#802c2c">Dus</th>
                      <th style="text-align:center; background-color:#802c2c">Pack</th>
                      <th style="text-align:center; background-color:#802c2c">PCs</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang as $b) {
                      $jml = $this->db->get_where('detail_dpb', array('no_dpb' => $dpb['no_dpb'], 'kode_produk' => $b->kode_produk))->row_array();
                      $isipcsdus = $b->isipcsdus;
                      $isipack   = $b->isipack;
                      $isipcs    = $b->isipcs;

                      $jmlpengambilan = ROUND($jml['jml_pengambilan'] * $isipcsdus);
                      $jmlpengambilan_dus    = floor($jmlpengambilan / $isipcsdus);

                      if ($jmlpengambilan != 0) {
                        $sisadus_pengambilan   = $jmlpengambilan % $isipcsdus;
                      } else {
                        $sisadus_pengambilan = 0;
                      }
                      if ($isipack == 0) {
                        $jmlpack_pengambilan    = 0;
                        $sisapack_pengambilan   = $sisadus_pengambilan;
                      } else {
                        $jmlpack_pengambilan    = floor($sisadus_pengambilan / $isipcs);
                        $sisapack_pengambilan   = $sisadus_pengambilan % $isipcs;
                      }

                      $jmlpcs_pengambilan = $sisapack_pengambilan;


                      $jmlpengembalian = ROUND($jml['jml_pengembalian'] * $isipcsdus);
                      $jmlpengembalian_dus    = floor($jmlpengembalian / $isipcsdus);

                      if ($jmlpengembalian != 0) {
                        $sisadus_pengembalian   = $jmlpengembalian % $isipcsdus;
                      } else {
                        $sisadus_pengembalian = 0;
                      }
                      if ($isipack == 0) {
                        $jmlpack_pengembalian   = 0;
                        $sisapack_pengembalian   = $sisadus_pengembalian;
                      } else {
                        $jmlpack_pengembalian   = floor($sisadus_pengembalian / $isipcs);
                        $sisapack_pengembalian   = $sisadus_pengembalian % $isipcs;
                      }

                      $jmlpcs_pengembalian = $sisapack_pengembalian;

                      $jmlbarangkeluar = ROUND($jml['jml_penjualan'] * $isipcsdus);
                      $jmlbarangkeluar_dus    = floor($jmlbarangkeluar / $isipcsdus);

                      if ($jmlbarangkeluar != 0) {
                        $sisadus_barangkeluar   = $jmlbarangkeluar % $isipcsdus;
                      } else {
                        $sisadus_barangkeluar = 0;
                      }
                      if ($isipack == 0) {
                        $jmlpack_barangkeluar   = 0;
                        $sisapack_barangkeluar  = $sisadus_barangkeluar;
                      } else {
                        $jmlpack_barangkeluar   = floor($sisadus_barangkeluar / $isipcs);
                        $sisapack_barangkeluar   = $sisadus_barangkeluar % $isipcs;
                      }

                      $jmlpcs_barangkeluar = $sisapack_barangkeluar;
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
                              <input type="text" style="text-align:right" value="<?php if (!empty($jmlpengambilan_dus)) {
                                                                                    echo $jmlpengambilan_dus;
                                                                                  } ?>" id="jmlduspengambilan" name="jmlduspengambilan<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>


                        <td style="width:100px">
                          <?php if (!empty($b->isipack)) { ?>
                            <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                              <div class="form-line">
                                <input type="text" style="text-align:right" value="<?php if (!empty($jmlpack_pengambilan)) {
                                                                                      echo $jmlpack_pengambilan;
                                                                                    } ?>" id="jmlpackpengambilan" name="jmlpackpengambilan<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                              </div>
                            </div>
                          <?php } ?>
                        </td>

                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" style="text-align:right" value="<?php if (!empty($jmlpcs_pengambilan)) {
                                                                                    echo $jmlpcs_pengambilan;
                                                                                  } ?>" id="jmlpcspengambilan" name="jmlpcspengambilan<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>

                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" value="<?php if (!empty($jmlpengembalian_dus)) {
                                                          echo $jmlpengembalian_dus;
                                                        } ?>" style="text-align:right" id="jmlduspengembalian" name="jmlduspengembalian<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>

                        <td style="width:100px">
                          <?php if (!empty($b->isipack)) { ?>
                            <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                              <div class="form-line">
                                <input type="text" value="<?php if (!empty($jmlpack_pengembalian)) {
                                                            echo $jmlpack_pengembalian;
                                                          } ?>" style=" text-align:right" id="jmlpackpengembalian" name="jmlpackpengembalian<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                              </div>
                            </div>
                          <?php } ?>
                        </td>


                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" value="<?php if (!empty($jmlpcs_pengembalian)) {
                                                          echo $jmlpcs_pengembalian;
                                                        } ?>" style="text-align:right" id="jmlpcspengembalian" name="jmlpcspengembalian<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>

                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" value="<?php if (!empty($jmlbarangkeluar_dus)) {
                                                          echo $jmlbarangkeluar_dus;
                                                        } ?>" style="text-align:right" id="jmlbrgkeluardus" name="jmlbrgkeluardus<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>
                        <td style="width:100px">
                          <?php if (!empty($b->isipack)) { ?>
                            <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                              <div class="form-line">
                                <input type="text" value="<?php if (!empty($jmlpack_barangkeluar)) {
                                                            echo $jmlpack_barangkeluar;
                                                          } ?>" style="text-align:right" id="jmlbrgkeluarpack" name="jmlbrgkeluarpack<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                              </div>
                            </div>
                          <?php } ?>
                        </td>
                        <td style="width:100px">
                          <div class="input-group demo-masked-input" style="margin-bottom:0px !important; ">
                            <div class="form-line">
                              <input type="text" value="<?php if (!empty($jmlpcs_barangkeluar)) {
                                                          echo $jmlpcs_barangkeluar;
                                                        } ?>" style="text-align:right" id="jmlbrgkeluarpcs" name="jmlbrgkeluarpcs<?php echo $no; ?>" class="form-control" data-error=".errorTxt19" />
                            </div>
                          </div>
                        </td>
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
  flatpickr(document.getElementById('tglkembali'), {});
</script>
<script type="text/javascript">
  $(function() {
    $(".formValidate").submit(function() {
      var nodpb = $("#nodpb").val();
      var cabang = $("#cabang").val();
      var salesman = $("#salesman").val();
      var tujuan = $("#tujuan").val();
      var nokendaraan = $("#nokendaraan").val();
      var tglkembali = $("#tglkembali").val();
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
      } else if (tglkembali == "") {
        swal("Oops!", "Tanggal Pengembalian Harus Diisi!", "warning");
        return false;
      }
    });

    $("#cabang").change(function(e) {
      e.preventDefault();
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
        }
      });
    });


    function loaddriver(id_driver) {

      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_driver',
        data: {
          cabang: cabang,
          id_driver: id_driver
        },
        cache: false,
        success: function(respond) {
          $("#driver").html(respond);
          //$("#salesman").selectpicker("refresh");
        }
      });
    }

    function loadhelper(id_helper) {
      var cabang = $("#cabang").val();

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_helper',
        data: {
          cabang: cabang,
          id_helper: id_helper
        },
        cache: false,
        success: function(respond) {
          $("#helper").html(respond);
          //$("#salesman").selectpicker("refresh");
        }
      });
    }

    function loadsalesman(id_salesman) {
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_salesman',
        data: {
          cabang: cabang,
          id_sales: id_salesman
        },
        cache: false,
        success: function(respond) {
          $("#salesman").html(respond);
          //$("#salesman").selectpicker("refresh");
        }
      });
    }

    loadsalesman("<?php echo $dpb['id_karyawan']; ?>");
    loaddriver("<?php echo $dpb['id_driver']; ?>");
    loadhelper("<?php echo $dpb['id_helper']; ?>");




  });
</script>
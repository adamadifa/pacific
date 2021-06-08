<form autocomplete="off" class="formValidate" id="" method="POST" action="<?php echo base_url(); ?>pembelian/insert_retur">
  <div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Input Data Retur
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10">
          <!-- Content here -->
          <div class="row">
            <div class="col-md-5 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Input Data Retur</h4>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-barcode"></i>
                      </span>
                      <input type="hidden" id="cekdata" name="cekdata" />
                      <input type="text" id="kode_retur" name="kode_retur" class="form-control" placeholder="Kode Retur" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar-o"></i>
                      </span>
                      <input type="text" id="tanggal" name="tanggal" class="form-control datepicker date" placeholder="Tanggal Retur" data-error=".errorTxt19" />
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-list"></i>
                      </span>
                      <select class="form-control show-tick" id="kode_supplier" name="kode_supplier" data-error=".errorTxt1">
                        <option value="">--SUPPLIER--</option>
                        <option value="SP0186">SURYA BUANA CV</option>
                        <option value="SP0142">PT PURINUSA EKA PERSADA</option>
                        <option value="SP0032">PT EKADHARMA INTERNATIONAL</option>
                        <option value="SP0185">SAKU MAS JAYA, PT</option>
                        <option value="SP0140">PT MULIAPACK GRAVURINDO</option>
                        <option value="SP0262">PURINUSA EKAPERSADA BANDUNG</option>
                        <option value="SP0175">SUPER PLASTIN (CV. SANTOSO JAYA INDO)</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-xs-12">
              <div class="row">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="zoom:85%">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="row mb-2">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-barcode"></i>
                            </span>
                            <input type="hidden" id="kode_edit" name="kode_edit" class="form-control" data-error=".errorTxt19" />
                            <input type="hidden" id="netto" name="netto" class="form-control" data-error=".errorTxt19" />
                            <input type="hidden" id="kodebarang" name="kodebarang" class="form-control" placeholder="Kode Barang" data-error=".errorTxt19" />
                            <input type="text" readonly id="barang" name="barang" class="form-control" placeholder="Nama Barang" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-2 nonrumus">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" style="text-align:right" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 rumus">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" style="text-align:right" id="bruto" name="bruto" class="form-control" placeholder="Bruto" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 rumus">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-balance-scale"></i>
                          </span>
                          <input type="text" style="text-align:right" id="berat_roll" name="berat_roll" class="form-control" placeholder="Berat (Roll)" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 rumus">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-balance-scale"></i>
                          </span>
                          <input type="text" style="text-align:right" id="berat_pcs" name="berat_pcs" class="form-control" placeholder="Berat (Pcs)" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 rumus">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-balance-scale"></i>
                          </span>
                          <input type="text" style="text-align:right" id="tinggi" name="tinggi" class="form-control" placeholder="Tinggi" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 rumus">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-balance-scale"></i>
                          </span>
                          <input type="text" style="text-align:right" id="panjang" name="panjang" class="form-control" placeholder="Panjang" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-book"></i>
                          </span>
                          <input type="text" readonly id="jenisbarang" name="jenisbarang" class="form-control" placeholder="Jenis Barang" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-book"></i>
                          </span>
                          <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <a href="#" id="tambahbarang" class="btn btn-primary btn-block">
                          <i class="fa fa-cart-plus mr-2"></i> Tambah
                        </a>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                            <th class="rumus">Bruto</th>
                            <th class="rumus">Berat Roll</th>
                            <th class="rumus">Netto</th>
                            <th class="rumus">Berat PCS</th>
                            <th class="rumus">Tinggi</th>
                            <th class="rumus">Panjang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="loadreturbarang">

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" name="submit" id="simpan" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-send mr-2"></i>Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <?php $this->load->view('menu/menu_pembelian_administrator'); ?>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="modal modal-blur fade" id="databarang" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Barang</h5>
      </div>
      <div class="modal-body">
        <div id="tabelbarang"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  flatpickr(document.getElementById('tanggal'), {});
</script>

<script>
  $(function() {


    function formatAngka(angka) {
      if (typeof(angka) != 'string') angka = angka.toString();
      var reg = new RegExp('([0-9]+)([0-9]{3})');
      while (reg.test(angka)) angka = angka.replace(reg, '$1,$2');
      return angka;
    }

    tampiltemp();

    $("#barang").click(function() {

      $("#tabelbarang").load("<?php echo base_url(); ?>gudangbahan/tabelbarang/");
      $("#databarang").modal("show");

    });

    $(".nonrumus").hide();
    
    $("#kode_supplier").change(function() {
      var kode_supplier = $("#kode_supplier").val();
      if(kode_supplier == 'SP0185' || kode_supplier == 'SP0140'){
        $(".nonrumus").hide();
        $(".rumus").show();
      }else{
        $(".rumus").hide();
        $(".nonrumus").show();
      }

    });

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>pembelian/codeotomatisretur',
      data: '',
      success: function(respond) {

        $("#kode_retur").val(respond);

      }
    });

    function tampiltemp() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pembelian/view_detailretur_temp',
        data: '',
        cache: false,
        success: function(html) {

          $("#loadreturbarang").html(html);

          $('#barang').val("");
          $('#kodeakun').val("");
          $('#kodebarang').val("");
          $('#namaakun').val("");
          $('#bruto').val("");
          $('#berat_roll').val("");
          $('#berat_pcs').val("");
          $('#berat_pcs').val("");
          $('#jumlah').val("");
          $('#panjang').val("");
          $('#keterangan').val("");
          $('#jenisbarang').val("");
          $('#kode_edit').val("");
          $('#barang').focus();

        }

      });
    }

    $("#tambahbarang").click(function(e) {
      e.preventDefault();

      var kode_barang = $('#kodebarang').val();
      var bruto = $('#bruto').val();
      var berat_roll = $('#berat_roll').val();
      var berat_pcs = $('#berat_pcs').val();
      var panjang = $('#panjang').val();
      var tinggi = $('#tinggi').val();
      var jumlah = $('#jumlah').val();
      var kodeakun = $('#kodeakun').val();
      var keterangan = $('#keterangan').val();
      var kode_edit = $('#kode_edit').val();

      if (kode_barang == 0) {

        swal("Oops!", "Nama Barang Harus Diisi !", "warning");

      } else if (kodeakun == 0) {

        swal("Oops!", "Kode Akun Harus Diisi!", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>pembelian/inputretur_temp',
          data: {
            kode_barang: kode_barang,
            kode_edit: kode_edit,
            bruto: bruto,
            berat_roll: berat_roll,
            berat_pcs: berat_pcs,
            jumlah: jumlah,
            panjang: panjang,
            tinggi: tinggi,
            keterangan: keterangan
          },
          cache: false,
          success: function(respond) {

            if (respond == 1) {
              swal("Oops!", "Data Sudah Di Inputkan!", "warning");
            }

            tampiltemp();
            $('#barang').focus();

          }

        });

      }
    });

    $("#simpan").click(function() {

      var kode_retur = $('#kode_retur').val();
      var tgl_retur = $('#tgl_retur').val();

      if (kode_retur == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tgl_retur == 0) {

        swal("Oops!", "Tanggal Harus Diisi!", "warning");
        return false;

      }  else if (kode_supplier == 0) {

        swal("Oops!", "Kode Supplier Harus Diisi!", "warning");
        return false;

      } else {

        return true;

      }

    });

  });
</script>
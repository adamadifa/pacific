<form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>gudanglogistik/insert_pengeluaran">
  <div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Input Data Pengeluaran
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
                  <h4 class="card-title">Input Data Pengeluaran</h4>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-barcode"></i>
                      </span>
                      <input type="hidden" value="" id="cekdata" name="cekdata" />
                      <input type="text" value="" id="nobukti" name="nobukti" class="form-control" placeholder="No Bukti" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar-o"></i>
                      </span>
                      <input type="text" value="" id="tgl_pengeluaran" name="tgl_pengeluaran" class="form-control datepicker date" placeholder="Tanggal Pengeluaran" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <select class="form-control show-tick departemen" id="departemen" name="departemen" data-error=".errorTxt1">
                      <option value="">--Pilih Departemen--</option>
                      <?php foreach ($dept as $d) { ?>
                        <option value="<?php echo $d->kode_dept; ?>"><?php echo $d->nama_dept; ?></option>
                      <?php }  ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-xs-12">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="row mb-12">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-barcode"></i>
                            </span>
                            <input type="hidden" value="" id="kodebarang" name="kodebarang" class="form-control" placeholder="Kode Barang" data-error=".errorTxt19" />
                            <input type="text" readonly value="" id="barang" name="barang" class="form-control" placeholder="Nama Barang" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="form-check form-switch">
                              <input class="form-check-input cabang" type="checkbox" name="girotocash" value="1">
                              <span class="form-check-label"><b>Cabang ?</b></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <div class="input-icon">
                              <select name="cbg" id="cbg" class="form-select show-tick">
                                <option value="">-- Pilih Cabang --</option>
                                <?php foreach ($cabang as $c) { ?>
                                  <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="row mb-12">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-file-o"></i>
                            </span>
                            <input type="text" style="text-align:right" value="" id="jumlah" name="jumlah" class="form-control" placeholder="Qty" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-balance-scale"></i>
                            </span>
                            <input type="text" value="" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-barcode"></i>
                          </span>
                          <input type="text" readonly value="" id="jenisbarang" name="jenisbarang" class="form-control" placeholder="Jenis Barang" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>

                    <div class="col-md-1">
                      <div class="form-group">
                        <a href="#" id="tambahbarang" class="btn btn-primary">
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
                            <th>Cabang</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="loadpengeluaranbarang">

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-send mr-2"></i>Simpan</button>
                  </div>
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
  flatpickr(document.getElementById('tgl_pengeluaran'), {});
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

    $("#cbg").hide();

    $('.cabang').change(function() {
      //alert('test');
      if (this.checked) {
        // var returnVal = confirm("Apakah Benar Barang Ini Merupakan Kebutuhan Cabang ?");
        // $(this).prop("checked", returnVal);
        $("#cbg").show();
      } else {
        $("#cbg").hide();
        $("#cbg").val("");
      }

    });

    $('#harga,#jumlah').on("input", function() {

      var harga = $('#harga').val();
      var jumlah = $('#jumlah').val();

      var harga = harga.replace(/[^\d]/g, "");
      var jumlah = jumlah.replace(/[^\d]/g, "");

      $('#harga').val(formatAngka(harga * 1));
      $('#jumlah').val(formatAngka(jumlah * 1));

    });

    $("#kodeakun").click(function() {

      $("#tabelakun").load("<?php echo base_url(); ?>gudanglogistik/tabelakun");
      $("#dataakun").modal("show");

    });

    $("#barang").click(function() {

      $("#tabelbarang").load("<?php echo base_url(); ?>gudanglogistik/tabelbarang/");
      $("#databarang").modal("show");

    });

    function tampiltemp() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>gudanglogistik/view_detailpengeluaran_temp',
        data: '',
        cache: false,
        success: function(html) {

          $("#loadpengeluaranbarang").html(html);

          $('#barang').val("");
          $('#kodeakun').val("");
          $('#kodebarang').val("");
          $('#namaakun').val("");
          $('#jumlah').val("");
          $('#harga').val("");
          $('#keterangan').val("");
          $("#cbg").val("");
          $('#jenisbarang').val("");

        }

      });
    }

    $("#tambahbarang").click(function(e) {
      e.preventDefault();

      var kodebarang = $('#kodebarang').val();
      var jumlah = $('#jumlah').val();
      var harga = $('#harga').val();
      var kode_cabang = $('#cbg').val();
      var kodeakun = $('#kodeakun').val();
      var keterangan = $('#keterangan').val();

      if (kodebarang == 0) {

        swal("Oops!", "Nama Barang Harus Diisi !", "warning");

      } else if (jumlah == 0) {

        swal("Oops!", "Jumlah Harus Diisi!", "warning");

      } else if (harga == 0) {

        swal("Oops!", "Harga Harus Diisi!", "warning");

      } else if (kodeakun == 0) {

        swal("Oops!", "Kode Akun Harus Diisi!", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>gudanglogistik/inputpengeluaran_temp',
          data: {
            kodebarang: kodebarang,
            jumlah: jumlah,
            kode_cabang: kode_cabang,
            harga: harga,
            keterangan: keterangan,
            kodeakun: kodeakun
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

      var nobukti = $('#nobukti').val();
      var tgl_pengeluaran = $('#tgl_pengeluaran').val();
      var departemen = $('#departemen').val();
      var cekdata = $('#cekdata').val();
      var cekdata = cekdata.replace(/[^\d]/g, "");

      if (nobukti == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tgl_pengeluaran == 0) {

        swal("Oops!", "Tanggal Harus Diisi!", "warning");
        return false;

      } else if (departemen == 0) {

        swal("Oops!", "Departemen Masih Kosong!", "warning");
        return false;

      } else {

        return true;

      }

    });

  });
</script>
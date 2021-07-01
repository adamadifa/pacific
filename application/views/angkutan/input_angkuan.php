<form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>bahan_bakar/insert_pemasukan">
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
            <div class="col-md-5 col-xs-12">
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
                        <i class="fa fa-barcode"></i>
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
<div class="modal modal-blur fade" id="dataakun" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Akun</h5>
      </div>
      <div class="modal-body">
        <div id="tabelakun"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  flatpickr(document.getElementById('tgl_input'), {});
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
      var no_surat_jalan = $('#no_surat_jalan').val();
      var tgl_input = $('#tgl_input').val();
      var kode_supplier = $('#kode_supplier').val();

      if (no_surat_jalan == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tgl_input == 0) {

        swal("Oops!", "Tanggal Harus Diisi!", "warning");
        return false;

      } else if (kode_supplier == "") {

        swal("Oops!", "Pilih Supplier Terlebih Dahulu", "warning");
        return false;

      } else {

        $("#tabelbarang").load("<?php echo base_url(); ?>bahan_bakar/tabelbarang/");
        $("#databarang").modal("show");
        tampiltemp();

      }

    });

    function tampiltemp() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>bahan_bakar/view_detailpemasukan_temp',
        data: '',
        cache: false,
        success: function(html) {

          $("#loadpemasukanbarang").html(html);

          $('#barang').val("");
          $('#kodeakun').val("");
          $('#kodebarang').val("");
          $('#namaakun').val("");
          $('#jumlah').val("");
          $('#kategori').val("");
          $('#keterangan').val("");
          $('#jenisbarang').val("");
          $('#barang').focus();

        }

      });

    }

    $("#tambahbarang").click(function(e) {
      e.preventDefault();

      var kodebarang = $('#kodebarang').val();
      var jumlah = $('#jumlah').val();
      var kodeakun = $('#kodeakun').val();
      var keterangan = $('#keterangan').val();

      if (kodebarang == 0) {

        swal("Oops!", "Nama Barang Harus Diisi !", "warning");

      } else if (jumlah == 0) {

        swal("Oops!", "Jumlah Harus Diisi!", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>bahan_bakar/inputpemasukan_temp',
          data: {
            kodebarang: kodebarang,
            jumlah: jumlah,
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

      var no_surat_jalan = $('#no_surat_jalan').val();
      var tgl_input = $('#tgl_input').val();
      var cekdata = $('#cekdata').val();
      var cekdata = cekdata.replace(/[^\d]/g, "");

      if (no_surat_jalan == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tgl_input == 0) {

        swal("Oops!", "Tanggal Harus Diisi!", "warning");
        return false;

      } else if (cekdata == 0) {

        swal("Oops!", "Barang Masih Kosong!", "warning");
        return false;

      } else {

        return true;

      }

    });

  });
</script>
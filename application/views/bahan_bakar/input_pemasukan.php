<form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>bahan_bakar/insert_pemasukan">
  <div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Input Data Pemasukan
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
                  <h4 class="card-title">Input Data Pemasukan</h4>
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
                      <input type="text" value="" id="tgl_pemasukan" name="tgl_pemasukan" class="form-control datepicker date" placeholder="Tanggal Pemasukan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-list"></i>
                    </span>
                    <select id="kode_supplier" name="kode_supplier" class="form-control">
                      <option value="">Pilih Supplier</option>
                      <?php foreach ($supplier as $d) { ?>
                        <option value="<?php echo $d->kode_supplier; ?>"><?php echo $d->nama_supplier; ?></option>
                      <?php }  ?>
                    </select>
                    </div>
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
                    <div class="col-md-3">
                      <div class="row mb-2">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-barcode"></i>
                            </span>
                            <input type="hidden" value="" id="nobpb" name="nobpb" class="form-control" placeholder="No BPB" data-error=".errorTxt19" />
                            <input type="hidden" value="" id="kodebarang" name="kodebarang" class="form-control" placeholder="Kode Barang" data-error=".errorTxt19" />
                            <input type="hidden" value="" id="kategori" name="kategori" class="form-control" placeholder="Kode Barang" data-error=".errorTxt19" />
                            <input type="text" readonly value="" id="barang" name="barang" class="form-control" placeholder="Nama Barang" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="row mb-2">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-file-o"></i>
                            </span>
                            <input type="text" readonly value="" id="jenisbarang" name="jenisbarang" class="form-control" placeholder="Jenis Barang" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-file-o"></i>
                          </span>
                          <input type="text" value="" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-balance-scale"></i>
                          </span>
                          <input type="text" style="text-align:right" value="" id="jumlah" name="jumlah" class="form-control" placeholder="Qty" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <a href="#" id="tambahbarang" class="btn btn-primary">
                          <i class="fa fa-cart-plus mr-2"></i> Tambah
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="loadpemasukanbarang">

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
  flatpickr(document.getElementById('tgl_pemasukan'), {});
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
      var nobukti = $('#nobukti').val();
      var tgl_pemasukan = $('#tgl_pemasukan').val();
      var kode_supplier = $('#kode_supplier').val();

      if (nobukti == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tgl_pemasukan == 0) {

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

      var nobukti = $('#nobukti').val();
      var tgl_pemasukan = $('#tgl_pemasukan').val();
      var cekdata = $('#cekdata').val();
      var cekdata = cekdata.replace(/[^\d]/g, "");

      if (nobukti == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tgl_pemasukan == 0) {

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
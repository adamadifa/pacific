<form autocomplete="off" class="Form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengajuan/insertPengajuanBarang">
  <div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            INPUT DATA PENGAJUAN KE-PUSAT
          </h2>
        </div>
      </div>
    </div>
    <div class="col-md-12" style="zoom:90%">
      <div class="row">
        <div class="col-md-10">
          <!-- Content here -->
          <div class="row">
            <div class="col-md-5 col-xs-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">INPUT DATA PENGAJUAN KE-PUSAT</h4>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-barcode"></i>
                      </span>
                      <input type="hidden" value="" id="cekdata" name="cekdata" />
                      <input type="text" value="" id="nobukti" name="nobukti" class="form-control" placeholder="No Bukti Pengajuan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar-o"></i>
                      </span>
                      <input type="text" value="" id="tanggal" name="tanggal" class="form-control datepicker date" placeholder="Tanggal Pengajuan" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-book"></i>
                      </span>
                      <input type="text" value="" id="nama_pemohon" name="nama_pemohon" class="form-control" placeholder="Nama Pemohon" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-image"></i>
                      </span>
                      <input type="file" id="foto" name="foto" class="form-control" id="customFile">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-xs-12">
             
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <div class="input-icon">
                          <select class="form-select" name="approval" id="approval">
                            <option value="">-- PILIH YANG AKAN MENYETUJUI --</option>
                            <option value="244">Indra Triadi</option>
                            <option value="73">Zenzen Zaenal Abidin</option>
                            <option value="6">Ridwan Nugraha</option>
                            <option value="5">Herdy Budiawan</option>
                            <option value="10">Deden Moch Saman</option>
                            <option value="11">Jemmy Feldiana</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <a href="#" id="tambahbarang" class="btn btn-primary"> Oke</a>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>Yang Akan Menyetujui</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="loadpengajuan">

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
    codeotomatis();

    $("#barang").click(function() {
      var nobukti = $('#nobukti').val();
      var tanggal = $('#tanggal').val();
      var kode_supplier = $('#kode_supplier').val();

      if (nobukti == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tanggal == 0) {

        swal("Oops!", "Tanggal Harus Diisi!", "warning");
        return false;

      } else if (kode_supplier == "") {

        swal("Oops!", "Pilih Supplier Terlebih Dahulu", "warning");
        return false;

      } else {

        $("#tabelbarang").load("<?php echo base_url(); ?>pengajuan/tabelbarang/");
        $("#databarang").modal("show");
        tampiltemp();

      }

    });

    function codeotomatis(){
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pengajuan/codeotomatis',
        data: '',
        success: function(respond) {

          $("#nobukti").val(respond);

        }
      });
    }

    function tampiltemp() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pengajuan/viewDetailPengajuanBarangTemp',
        data: '',
        cache: false,
        success: function(html) {

          $("#loadpengajuan").html(html);

          $('#approval').val("");
          $('#approval').focus();

        }

      });

    }

    $("#tambahbarang").click(function(e) {
      e.preventDefault();

      var tanggal       = $('#tanggal').val();
      var nama_pemohon  = $('#nama_pemohon').val();
      var approval      = $('#approval').val();

      if (tanggal == 0) {

        swal("Oops!", "Tanggal Harus Diisi !", "warning");

      } else if (nama_pemohon == 0) {

        swal("Oops!", "Nama Pemogon Harus Diisi!", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>pengajuan/inputDetailPengajuanBarangTemp',
          data: {
            approval: approval
          },
          cache: false,
          success: function(respond) {

            if (respond == 1) {
              swal("Oops!", "Data Sudah Di Inputkan!", "warning");
            }

            tampiltemp();
            $('#approval').focus();

          }

        });

      }
    });

    $("#simpan").click(function() {

      var nobukti = $('#nobukti').val();
      var tanggal = $('#tanggal').val();
      var cekdata = $('#cekdata').val();
      var cekdata = cekdata.replace(/[^\d]/g, "");

      if (nobukti == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tanggal == 0) {

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
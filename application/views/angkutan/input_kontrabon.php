<form autocomplete="off" class="formValidate" id="formValidate" method="POST" action="<?php echo base_url(); ?>angkutan/insert_kontrabon">
  <div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            Input Kontrabon
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
                  <h4 class="card-title">Input Kontrabon</h4>
                </div>
                <div class="card-body">
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-barcode"></i>
                      </span>
                      <input type="hidden" value="" id="cekdata" name="cekdata" />
                      <input type="text" value="" id="no_kontrabon" name="no_kontrabon" class="form-control" placeholder="No Kontrabon" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar-o"></i>
                      </span>
                      <input type="text" value="" id="tgl_kontrabon" name="tgl_kontrabon" class="form-control datepicker date" placeholder="Tanggal" data-error=".errorTxt19" />
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <select class="form-control selectoption" id="keterangan" name="keterangan">
                      <option value="">SEMUA ANGKUTAN</option>
                      <option value="KS">ANGKUTAN KS</option>
                      <option value="KWN SUAKA">ANGKUTAN KAWAN SWAKA</option>
                      <option value="AS">ANGKUTAN AS</option>
                      <option value="SD">ANGKUTAN SD</option>
                      <option value="WAWAN">ANGKUTAN WAWAN</option>
                      <option value="RTP">ANGKUTAN RTP</option>
                      <option value="KWN GOBRAS">ANGKUTAN KWN GOBRAS</option>
                      <option value="LH">ANGKUTAN LH</option>
                      <option value="TSN">ANGKUTAN TSN</option>
                      <option value="MANDIRI">ANGKUTAN MANDIRI</option>
                      <option value="GS">ANGKUTAN GS</option>
                      <option value="CV TRESNO">ANGKUTAN CV TRESNO</option>
                      <option value="KS">ANGKUTAN KS</option>
                      <option value="MSA">ANGKUTAN MSA</option>
                      <option value="MITRA KOMANDO">ANGKUTAN MITRA KOMANDO</option>
                      <option value="ARP MANDIRI">ANGKUTAN ARP MANDIRI</option>
                      <option value="CAHAYA BIRU">ANGKUTAN CAHAYA BIRU</option>
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
                    <div class="col-md-3">
                      <div class="row mb-2">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fa fa-barcode"></i>
                            </span>
                            <input type="text" readonly value="" id="no_sj" name="no_sj" class="form-control" placeholder="Surat Jalan" data-error=".errorTxt19" />
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
                            <input type="text" readonly value="" id="tgl_surat_jalan" name="tgl_surat_jalan" class="form-control" placeholder="Tgl Surat Jalan" data-error=".errorTxt19" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" readonly style="text-align:right" id="tarif" name="tarif" class="form-control" placeholder="Tarif" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" readonly style="text-align:right" id="bs" name="bs" class="form-control" placeholder="BS" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fa fa-money"></i>
                          </span>
                          <input type="text" readonly style="text-align:right" id="tepung" name="tepung" class="form-control" placeholder="Tepung" data-error=".errorTxt19" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <a href="#" id="tambahdata" class="btn btn-primary">
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
                            <th>No SJ</th>
                            <th>Tgl Surat Jalan</th>
                            <th>Tarif</th>
                            <th>BS</th>
                            <th>Tepung</th>
                            <th>Total</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="loaddetailangkutan">

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
          <?php $this->load->view('menu/menu_keuangan_administrator.php'); ?>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="modal modal-blur fade" id="datasuratjalan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Surat Jalan</h5>
      </div>
      <div class="modal-body">
        <div id="tabelsuratjalan"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  flatpickr(document.getElementById('tgl_kontrabon'), {});
    $('.selectoption').selectize({});
</script>

<script type="text/javascript">
  $(function() {

    tampiltemp();

    function formatAngka(angka) {
      if (typeof(angka) != 'string') angka = angka.toString();
      var reg = new RegExp('([0-9]+)([0-9]{3})');
      while (reg.test(angka)) angka = angka.replace(reg, '$1.$2');
      return angka;
    }

      
    var tarif = $('#tarif').val();
    var bs    = $('#bs').val();
    var tepung    = $('#tepung').val();

    var tarif = $(this).val().replace(/\./g, '');
    var tepung = $(this).val().replace(/\./g, '');
    var bs = $(this).val().replace(/\./g, '');

    $('#tepung').val(formatAngka(tepung));
    $('#tarif').val(formatAngka(tarif));
    $('#bs').val(formatAngka(bs));
    
    codeotomatis();
    
    
    $("#tgl_kontrabon").click(function() {
      tampiltemp();

    });

    $("#no_sj").click(function() {
      var no_kontrabon = $('#no_kontrabon').val();
      var tgl_kontrabon = $('#tgl_kontrabon').val();

      if (no_kontrabon == 0) {

        swal("Oops!", "No Kontrabon Harus Diisi!", "warning");
        return false;

      } else if (tgl_kontrabon == 0) {

        swal("Oops!", "Tanggal Harus Diisi!", "warning");
        return false;

      } else {

        $("#tabelsuratjalan").load("<?php echo base_url(); ?>angkutan/tabelsuratjalan/");
        $("#datasuratjalan").modal("show");
        tampiltemp();

      }

    });

    function codeotomatis() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>angkutan/codeotomatis',
        data: '',
        cache: false,
        success: function(html) {
          $('#no_kontrabon').val(html);

        }

      });       

    }

    function tampiltemp() {
       
   
      
      var no_kontrabon = $('#no_kontrabon').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>angkutan/getDetailAngkutan',
        data: {
          no_kontrabon : no_kontrabon
        },
        cache: false,
        success: function(html) {

          $("#loaddetailangkutan").html(html);

          $('#no_sj').val("");
          $('#tgl_surat_jalan').val("");
          $('#tarif').val("");
          $('#bs').val("");
          $('#tepung').val("");

        }

      });
    }


    $("#tambahdata").click(function(e) {
      e.preventDefault();
     

      var no_surat_jalan = $('#no_sj').val();
      var no_kontrabon = $('#no_kontrabon').val();
      var cekdata = $('#cekdata').val();

      // alert(no_surat_jalan);

      if (no_kontrabon == '') {

        swal("Oops!", "No SJ Harus Diisi !", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>angkutan/input_detail',
          data: {
            no_surat_jalan: no_surat_jalan,
            no_kontrabon: no_kontrabon,
          },
          cache: false,
          success: function() {

            tampiltemp();

          }

        });

      }
    });

    $("#simpan").click(function() {

      var no_kontrabon = $('#no_kontrabon').val();
      var tgl_kontrabon = $('#tgl_kontrabon').val();
      var cekdata = $('#cekdata').val();
      var cekdata = cekdata.replace(/[^\d]/g, "");

      if (no_kontrabon == 0) {

        swal("Oops!", "No Bukti Harus Diisi!", "warning");
        return false;

      } else if (tgl_kontrabon == 0) {

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
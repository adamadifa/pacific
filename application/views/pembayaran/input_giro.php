<form autocomplete="off" class="giroForm" id="formValidate" method="POST" action="<?php echo base_url(); ?>pembayaran/inputgiro">
  <input type="hidden" value="<?php echo $nofaktur; ?>" id="nofaktur" name="nofaktur">
  <input type="hidden" value="<?php echo $totalbayar; ?>" id="totalbayar2" name="totalbayar2">
  <input type="hidden" value="<?php echo $totalpiutang; ?>" id="piutang" name="piutang">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="form-label">Tanggal Bayar</label>
        <div class="input-icon">
          <input type="date" value="" id="tglgiro" name="tglgiro" class="form-control" placeholder="Tgl Pencatatan Giro" />
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
  <div class="row mb-3">
    <div class="col-md-12">
      <label class="form-label">Salesman Penagih</label>
      <div class="form-group">
        <select class="form-select" name="salesman" id="salesman">
          <option value="">Pilih Salesman</option>
          <?php foreach ($salesman as $s) { ?>
            <option value="<?php echo $s->id_karyawan; ?>"><?php echo $s->nama_karyawan; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="form-label">No Giro</label>
        <div class="input-icon">
          <input type="text" id="nogiro" name="nogiro" class="form-control" placeholder="No Giro" />
          <span class="input-icon-addon">
            <i class="fa fa-barcode"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="form-label">Nama Bank</label>
        <div class="input-icon">
          <input type="text" id="namabank" name="namabank" class="form-control" placeholder="Nama Bank" />
          <span class="input-icon-addon">
            <i class="fa fa-bank"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="form-label">Jatuh Tempo</label>
        <div class="input-icon">
          <input type="date" value="" id="tglcair" name="tglcair" class="form-control" placeholder="Jatuh Tempo" />
          <span class="input-icon-addon">
            <i class="fa fa-calendar"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-12">
      <div class="form-group">
        <label class="form-label">Jumlah</label>
        <div class="input-icon">
          <input type="text" style="text-align:right" id="jmlbayar" name="jmlbayar" class="form-control" placeholder="Jumlah Bayar" />
          <div id="terbilang" style="float:right;"></div>
          <span class="input-icon-addon">
            <i class="fa fa-money"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="form-group">
      <div class="d-flex justify-content-end">
        <button type="submit" name="simpan" class="btn btn-primary" value="1"><i class="fa fa-save mr-2"></i>SIMPAN</button>
      </div>
    </div>
  </div>
</form>
<script>
  flatpickr(document.getElementById('tglgiro'), {});
  flatpickr(document.getElementById('tglcair'), {});
</script>
<script>
  $(function() {
    $('.giroForm').bootstrapValidator({
      message: 'This value is not valid',
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        tglgiro: {
          validators: {
            notEmpty: {
              message: 'Tanggal Pencatatan Giro Harus Diisi !'
            }


          }
        },

        jmlbayar: {
          validators: {
            notEmpty: {
              message: 'Jumlah Bayar Harus Diisi !'
            }


          }
        },

        nogiro: {
          validators: {
            notEmpty: {
              message: 'No Giro Harus Diisi !'
            }


          }
        },

        namabank: {
          validators: {
            notEmpty: {
              message: 'Nama Bank Harus Diisi !'
            }


          }
        },

        tglcair: {
          validators: {
            notEmpty: {
              message: 'Jatuh Tempo Harus Diisi !'
            }


          }
        },

        salesman: {
          validators: {
            notEmpty: {
              message: 'Salesman Harus Diisi !'
            }


          }
        },

      }
    });

    function cektutuplaporan() {
      var tanggal = $("#tglgiro").val();
      var jenis = "penjualan";
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>setting/cektutuplaporan',
        data: {
          tanggal: tanggal,
          jenis: jenis
        },
        cache: false,
        success: function(respond) {
          console.log(respond);
          var status = respond;
          if (status != 0) {
            swal("Oops!", "Laporan Untuk Periode Ini Sudah Di Tutup !", "warning");
            $("#tglgiro").val("");
          }
        }
      });
    }
    $("#tglgiro").change(function() {
      cektutuplaporan();
    });

    $("form").submit(function() {
      var jmlbayar = $("#jmlbayar").val();
      var piutang = $("#piutang").val();
      var totbayar = $("#totalbayar2").val();
      var jumlahbayar = (jmlbayar * 1) + (totbayar * 1);
      if (jumlahbayar > piutang) {
        swal("Oops!", "Jumlah Bayar Lebih Dari Total Piutang !", "warning");
        return false;
      } else {
        return true;
      }
    });

    $("#jmlbayar").on('keyup keydown change', function() {
      var jmlbayar = $("#jmlbayar").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pembayaran/terbilang',
        data: {
          jmlbayar: jmlbayar
        },
        cache: false,
        success: function(respond) {
          $("#terbilang").html(respond);
        }
      });

    });
  })
</script>
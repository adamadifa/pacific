<form autocomplete="off" class="formValidate" name="autoSumForm" id="formValidate" method="POST" action="<?php echo base_url(); ?>penjualan/editsetoranpusat">
  <input type="hidden" value="<?php echo $setoranpusat['kode_setoranpusat']; ?>" name="kode_setoranpusat" class="form-control">
  <div class="row mb-3">
    <div class="col-md-12">
      <label class="form-label">Tanggal</label>
      <div class="input-icon">
        <input type="date" value="<?php echo $setoranpusat['tgl_setoranpusat']; ?>" id="tgl_setoran" name="tgl_setoran" class="form-control" placeholder="Tanggal Setoran" />
        <span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <rect x="4" y="5" width="16" height="16" rx="2" />
            <line x1="16" y1="3" x2="16" y2="7" />
            <line x1="8" y1="3" x2="8" y2="7" />
            <line x1="4" y1="11" x2="20" y2="11" />
            <line x1="11" y1="15" x2="12" y2="15" />
            <line x1="12" y1="15" x2="12" y2="18" />
          </svg>
        </span>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <?php if ($sess_cab == 'pusat') { ?>
      <label class="form-label">Cabang</label>
      <div class="form-group">
        <select <?php if ($status == 1) {
                  echo "readonly";
                } ?> class="form-select" id="cabangkb" name="cabangkb" data-error=".errorTxt1">
          <option value="">-- Pilih Cabang --</option>
          <?php foreach ($cabang as $c) { ?>
            <option <?php if ($setoranpusat['kode_cabang'] == $c->kode_cabang) {
                      echo "selected";
                    } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
          <?php } ?>
        </select>
      </div>
    <?php } else { ?>
      <input type="hidden" name="cabangkb" id="cabangkb" value="<?php echo $setoranpusat['kode_cabang']; ?>">
    <?php } ?>
  </div>
  <label class="form-label">VIA</label>
  <div class="form-group mb-3">
    <div class="form-line">
      <select class="form-select" id="via" name="via">
        <option value="">-- Pilih --</option>
        <?php foreach ($bank as $b) { ?>
          <option <?php if ($setoranpusat['bank'] == $b->kode_bank) {
                    echo "selected";
                  } ?> value="<?php echo $b->kode_bank; ?>"><?php echo $b->nama_bank; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <h4 style="color:#dc3545">SETORAN</h4>
  <?php if (empty($setoranpusat['no_ref'])) { ?>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-label">Uang Kertas</label>
          <div class="input-icon">
            <input type="text" <?php if ($status == 1) {
                                  echo "readonly";
                                } ?> value="<?php echo number_format($setoranpusat['uang_kertas'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="uangkertas" name="uangkertas" class="form-control" placeholder="Uang Kertas" data-error=".errorTxt11">
            <span class="input-icon-addon">
              <i class="fa fa-money"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-label">Uang Logam</label>
          <div class="input-icon">
            <input type="text" <?php if ($status == 1) {
                                  echo "readonly";
                                } ?> value="<?php echo number_format($setoranpusat['uang_logam'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="uanglogam" name="uanglogam" class="form-control" placeholder="Uang Logam" data-error=".errorTxt11">
            <span class="input-icon-addon">
              <i class="fa fa-money"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-label">Total Setoran</label>
          <div class="input-icon">
            <input type="text" value="<?php echo number_format($setoranpusat['uang_kertas'] + $setoranpusat['uang_logam'], '0', '', '.'); ?>" readonly style="text-align:right; font-weight:bold; color:#dc3545" id="totalsetoran" name="totalsetoran" class="form-control" placeholder="Total Setoran" data-error=".errorTxt11">
            <span class="input-icon-addon">
              <i class="fa fa-money"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <input type="hidden" value="<?php echo number_format($setoranpusat['uang_kertas'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="uangkertas" name="uangkertas" class="form-control" placeholder="" data-error=".errorTxt11">
    <input type="hidden" value="<?php echo number_format($setoranpusat['uang_logam'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="uanglogam" name="uanglogam" class="form-control" placeholder="" data-error=".errorTxt11">
    <?php if (!empty($setoranpusat['transfer'])) { ?>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="form-label">Transfer</label>
            <div class="input-icon">
              <input type="text" <?php if ($status == 1) {
                                    echo "readonly";
                                  } ?> value="<?php echo number_format($setoranpusat['transfer'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="transfer" name="transfer" class="form-control" placeholder="Uang Kertas" data-error=".errorTxt11">
              <span class="input-icon-addon">
                <i class="fa fa-money"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    <?php } else { ?>
      <input type="hidden" value="<?php echo number_format($setoranpusat['uang_kertas'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="uangkertas" name="uangkertas" class="form-control" placeholder="" data-error=".errorTxt11">
      <input type="hidden" value="<?php echo number_format($setoranpusat['uang_logam'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="uanglogam" name="uanglogam" class="form-control" placeholder="" data-error=".errorTxt11">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="form-label">Giro</label>
            <div class="input-icon">
              <input type="text" <?php if ($status == 1) {
                                    echo "readonly";
                                  } ?> value="<?php echo number_format($setoranpusat['giro'], '0', '', '.'); ?>" onkeyup="calc()" style="text-align:right; font-weight:bold; color:#dc3545" id="giro" name="giro" class="form-control" placeholder="Uang Kertas" data-error=".errorTxt11">
              <span class="input-icon-addon">
                <i class="fa fa-money"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php } ?>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="form-label">Keterangan</label>
        <div class="input-icon">
          <input type="text" id="keterangan" value="<?php echo $setoranpusat['keterangan']; ?>" name="keterangan" class="form-control" placeholder="Keterangan">
          <span class="input-icon-addon">
            <i class="fa fa-file"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="form-group">
      <div class="d-flex justify-content-end">
        <button type="submit" name="simpan" class="btn btn-primary btn-block" value="1"><i class="fa fa-save mr-2"></i>SIMPAN</button>
      </div>
    </div>
  </div>
</form>
<script>
  flatpickr(document.getElementById('tgl_setoran'), {});
</script>
<script type="text/javascript">
  var uk = document.getElementById('uangkertas');
  var ul = document.getElementById('uanglogam');
  uk.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    uk.value = formatRupiah(this.value, '');
  });

  ul.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    ul.value = formatRupiah(this.value, '');
  });
  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
  }

  function calc() {
    uangkertasrupiah = document.getElementById("uangkertas").value;
    uangkertas = uangkertasrupiah.replace(/\./g, '');
    uanglogamrupiah = document.getElementById("uanglogam").value;
    uanglogam = uanglogamrupiah.replace(/\./g, '');
    if (uangkertas == "") {
      uangkertas = 0;
    }
    if (uanglogam == "") {
      uanglogam = 0;
    }
    var result = parseInt(uangkertas) + parseInt(uanglogam);
    if (!isNaN(result)) {
      totalsetoran = document.getElementById('totalsetoran').value = result;
      document.getElementById("totalsetoran").value = convertToRupiah(totalsetoran);
    }
  }

  function convertToRupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
      if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return rupiah.split('', rupiah.length - 1).reverse().join('');
  }
</script>
<script>
  $(function() {
    $("#formValidate").submit(function() {

      var tgl_setoran = $("#tgl_setoran").val();
      var cabang = $("#cabangkb").val();
      var via = $("#via").val();
      var totalsetoran = $("#totalsetoran").val();
      var keterangan = $("#keterangan").val();


      if (tgl_setoran == "") {
        swal("Oops!", "Tanggal Setoran Harus Diisi.. !", "warning");
        return false;
      } else if (cabang == "") {
        swal("Oops!", "Cabang Harus Diisi!", "warning");
        return false;
      } else if (via == "") {
        swal("Oops!", "Bank Harus Dipilih!", "warning");
        return false;
      } else if (totalsetoran == "" || totalsetoran == 0) {
        swal("Oops!", "Total Setoran Tidak Boleh 0", "warning");
        return false;
      } else if (keterangan == "") {
        swal("Oops!", "Keterangan Harus Diisi!", "warning");
        return false;
      } else {
        return true;
      }
    });



  })
</script>
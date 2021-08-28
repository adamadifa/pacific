<input type="hidden" name="kode_lpc" id="kode_lpc" value="<?php echo $lpc['kode_lpc']; ?>">
<div class="row mb-3">
  <?php if ($sess_cab == 'pusat') { ?>
    <div class="form-group">
      <select name="cabang" id="cabang" class="form-select" disabled>
        <option value="">-- Pilih Cabang --</option>
        <?php foreach ($cabang as $c) { ?>
          <option <?php if ($lpc['kode_cabang'] == $c->kode_cabang) {
                    echo "selected";
                  } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
        <?php } ?>
      </select>
    </div>
  <?php } else { ?>
    <input type="hidden" name="cabang" id="cabang" value="<?php echo $sess_cab; ?>">
  <?php } ?>
</div>
<div class="form-group mb-3">
  <select name="bulanlpc" id="bulanlpc" class="form-select" disabled>
    <option value="">Bulan</option>
    <?php
    $bl = date("m");
    for ($i = 1; $i < count($bln); $i++) {
    ?>
      <option <?php if ($lpc['bulan'] == $i) {
                echo "selected";
              } ?> value="<?php echo $i; ?>"><?php echo $bln[$i]; ?></option>
    <?php
    }
    ?>
  </select>
</div>
<div class="form-group mb-3">

  <select name="tahunlpc" class="form-select" id="tahunlpc" name="tahunlpc" disabled>
    <option value="">Tahun</option>
    <?php
    $tahun = date("Y");
    $tahunmulai = 2020;
    for ($thn = $tahunmulai; $thn <= date('Y'); $thn++) {
    ?>
      <option <?php if ($lpc['tahun'] == $thn) {
                echo "selected";
              } ?> value="<?php echo $thn; ?>"><?php echo $thn; ?>
      </option>
    <?php
    }
    ?>
  </select>
</div>
<div class="row mb-3">
  <div class="col-md-12">
    <div class="input-icon">
      <input type="date" id="tgl_lpcedit" name="tgl_lpc" class="form-control" placeholder="Tanggal LPC" value="<?php echo $lpc['tgl_lpc']; ?>" />
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
<div class="form-group mb-3">
  <a href="#" class="btn btn-primary w-100" id="updatelpc">Submit</a>
</div>

<script>
  flatpickr(document.getElementById('tgl_lpcedit'), {});
</script>
<script>
  $(function() {
    function loadlpc() {
      var tahun = $("#tahun").val();
      var bulan = $("#bulan").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>/penjualan/loadlpc',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          $("#loadlpc").html(respond);
        }
      });
    }
    $("#updatelpc").click(function(e) {
      e.preventDefault();
      var tgl_lpc = $("#tgl_lpcedit").val();
      var kode_lpc = $("#kode_lpc").val();


      if (tgl_lpc == "") {
        swal("Oops", "Tanggal LPC Harus Diisi !", "warning")
      } else {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>penjualan/updatelpc',
          data: {
            tgl_lpc: tgl_lpc,
            kode_lpc: kode_lpc
          },
          cache: false,
          success: function(respond) {
            if (respond == 1) {
              swal("Berhasil", "Data Berhasil Di Update", "success");
            } else {
              swal("Oops", "Data Gagal Di Update", "danger");
            }
            loadlpc();
            $("#modaleditlpc").modal("hide");
          }
        });
      }
    });
  });
</script>
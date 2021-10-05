<?php
$id_user = $this->session->userdata('id_user');
?>
<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
    </div>
  </div>
  <?php if ($id_user != 234) { ?>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive mb-4">
          <div id="loadrekappenjualan">
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- Content here -->
  <?php if ($id_user != 26 and $id_user != 9) { ?>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <h4 class="card-title">DATA PERSEDIAAN GOOD STOK GUDANG CABANG</h4>
          </div>
          <div class="card-body">
            <?php if ($cb == 'pusat') { ?>
              <div class="form-group mb-3">
                <select class="form-select" id="cabang" name="cabang">
                  <?php foreach ($cabang as $c) { ?>
                    <option <?php if ($cb == $c->kode_cabang) {
                              echo "selected";
                            } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                  <?php } ?>
                </select>
              </div>
            <?php } else { ?>
              <input type="hidden" readonly id="cabang" name="cabang" value="<?php echo $cb; ?>" class="form-control" placeholder="Kode Cabang" />
            <?php } ?>
            <div id="loadsaldo">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-red text-white">
            <h4 class="card-title">DATA PERSEDIAAN BAD STOK GUDANG CABANG</h4>
          </div>
          <div class="card-body">
            <?php if ($cb == 'pusat') { ?>
              <div class="form-group mb-3">
                <select class="form-select" id="cabangs" name="cabang">
                  <?php foreach ($cabang as $c) { ?>
                    <option <?php if ($cb == $c->kode_cabang) {
                              echo "selected";
                            } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                  <?php } ?>
                </select>
              </div>
            <?php } else { ?>
              <input type="hidden" readonly id="cabangs" name="cabang" value="<?php echo $cb; ?>" class="form-control" placeholder="Kode Cabang" />
            <?php } ?>
            <div id="loadsaldobs">
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<script type="text/javascript">
  $(function() {
    function loadsaldo() {
      var kodecabang = $("#cabang").val();
      var status = 'GS';
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>dashboard/loadsaldo',
        data: {
          kodecabang: kodecabang,
          status: status
        },
        cache: false,
        success: function(respond) {
          $("#loadsaldo").html(respond);
        }
      });
    }

    function loadsaldobs() {
      var kodecabang = $("#cabangs").val();
      var status = 'BS';
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>dashboard/loadsaldobs',
        data: {
          kodecabang: kodecabang,
          status: status
        },
        cache: false,
        success: function(respond) {
          $("#loadsaldobs").html(respond);
        }
      });
    }
    loadsaldo();
    loadsaldobs();

    $("#cabang").change(function() {
      loadsaldo();
    });

    $("#cabangs").change(function() {
      loadsaldobs();
    });

    function loadrekappenjualan() {
      var bulan = "<?php echo date("m"); ?>";
      var tahun = "<?php echo date("Y"); ?>"
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/loadrekappenjualanka',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          $("#loadrekappenjualan").html(respond);
        }
      });
    }
    loadrekappenjualan();
  });
</script>
<?php

$id_user = $this->session->userdata('id_user');

?>

<form autocomplete="off" class="Form" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>pengajuan/jenisPengajuan">
  <div class="container-fluid" style="zoom:90%">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="page-title">
            DATA PENGAJUAN KE-PUSAT
          </h2>
        </div>
      </div>
    </div>
    <!-- Content here -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">DATA PENGAJUAN KE-PUSAT</h4>
          </div>
          <div class="card-body">
            <?php if ($id_user != '6' && $id_user != '5' && $id_user != '11' && $id_user != '10' && $id_user != '73' && $id_user != '244') { ?>
              <div class="mb-3 d-flex justify-content-start">
                <a href="<?php echo base_url(); ?>pengajuan/inputPengajuanBarang" class="btn btn-primary">TAMBAH DATA</a>
              </div>
              <br>
            <?php } ?>
            <div class="col-md-2 col-xs-2">
              <div class="mb-3">
                <select class="form-control" id="jenis_pengajuan" name="jenis_pengajuan">
                  <?php if ($id_user == '6') { ?>
                    <option value="Barang">Barang</option>
                    <option value="Jasa">Jasa - Service</option>
                    <option value="ATK">ATK</option>
                    <option value="Lainnya">Lainnya</option>
                  <?php } else if ($id_user == '5') { ?>
                    <option value="Lainnya">Lainnya</option>
                  <?php } else if ($id_user == '244') { ?>
                    <option value="Barang">Barang</option>
                    <option value="Jasa">Jasa - Service</option>
                    <option value="Lainnya">Lainnya</option>
                  <?php } else if ($id_user == '10') { ?>
                    <option value="Barang">Barang</option>
                    <option value="Jasa">Jasa - Service</option>
                    <option value="Lainnya">Lainnya</option>
                  <?php } else if ($id_user == '11') { ?>
                    <option value="Barang">Barang</option>
                    <option value="Jasa">Jasa - Service</option>
                    <option value="Lainnya">Lainnya</option>
                  <?php } else if ($id_user == '73') { ?>
                    <option value="ATK">ATK</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="mt-3">
              <div id="loadpengajuan">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  $(document).ready(function() {
    $('#mytable').DataTable({
      responsive: true
    });

    var jenis_pengajuan = $("#jenis_pengajuan").val();
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>pengajuan/jenisPengajuan',
      data: {
        jenis_pengajuan: jenis_pengajuan
      },
      cache: false,
      success: function(respond) {
        $("#loadpengajuan").html(respond);
      }
    });

    $('select').on('change', function(e) {
      e.preventDefault();

      var jenis_pengajuan = this.value;
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pengajuan/jenisPengajuan',
        data: {
          jenis_pengajuan: jenis_pengajuan
        },
        cache: false,
        success: function(respond) {
          $("#loadpengajuan").html(respond);
        }
      });

    });

  });
</script>
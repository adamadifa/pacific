<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-6 col-xs-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Target</h4>
            </div>
            <div class="card-body">

              <form action="<?php echo base_url(); ?>komisi/targetkomisi" method="POST">

                <div class="form-group mb-3">
                  <select name="tahun" class="form-select" id="tahun" name="tahun">
                    <?php
                    $tahunmulai = 2020;

                    for ($thn = $tahunmulai; $thn <= date('Y'); $thn++) {
                    ?>
                      <option <?php if (date('Y') == $thn) {
                                echo "Selected";
                              } ?> value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </form>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th>Kode Target</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th colspan="2" style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="loadapprovletarget">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_marketing_administrator'); ?>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalsettarget" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" style="max-width:95% !important" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Input Target Quantity</h5>
      </div>
      <div class="modal-body">
        <div id="loadformsettarget"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalsettargetcashin" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Input Target Cash IN</h5>
      </div>
      <div class="modal-body">
        <div id="loadformsettargetcashin"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modalsettargetcollection" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Input Target Collection</h5>
      </div>
      <div class="modal-body">
        <div id="loadformsettargetcollection"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {
    function loadapprovletarget() {
      var bulan = $("#bulan").val();
      var tahun = $("#tahun").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/loadapprovletarget',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          $("#loadapprovletarget").html(respond);
        }
      });
    }
    loadapprovletarget();
    $("#showtarget").click(function(e) {
      e.preventDefault();
      var bulan = $("#bulan").val();
      var tahun = $("#tahun").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>komisi/settarget',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          if (respond == 2) {
            swal("Success", "Target Berhasil Di Buat !", "success");
            loadapprovletarget();
          } else {
            swal("Opps", "Target Sudah Ada !", "warning");
          }
          console.log(respond);
        }
      });
    });

    $("#bulan").click(function(e) {
      e.preventDefault();
      loadapprovletarget();
    });

    $("#tahun").click(function(e) {
      e.preventDefault();
      loadapprovletarget();
    });

  });
</script>
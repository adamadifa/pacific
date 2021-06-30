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
              <h4 class="card-title">Data Approval Target</h4>
            </div>
            <div class="card-body">

              <form action="<?php echo base_url(); ?>komisi/approvetargetkomisi" method="POST">
                <div class="form-group mb-3">
                  <select name="bulan" id="bulan" class="form-select">
                    <option value="">Bulan</option>
                    <?php

                    for ($i = 1; $i < count($bln); $i++) {
                    ?>
                      <option <?php if ($bl == $i) {
                                echo "selected";
                              } ?> value="<?php echo $i; ?>"><?php echo $bln[$i]; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group mb-3">

                  <select name="tahun" class="form-select" id="tahun" name="tahun">
                    <option value="">Tahun</option>
                    <?php
                    $tahunmulai = 2020;
                    for ($thn = $tahunmulai; $thn <= date('Y'); $thn++) {
                    ?>
                      <option <?php if ($tahun == $thn) {
                                echo "selected";
                              } ?> value="<?php echo $thn; ?>"><?php echo $thn; ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <button class="btn btn-primary" name="submit" type="submit">Search</button>
                <br>
                <br>
              </form>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th>Cabang</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>KP</th>
                        <th>MM</th>
                        <th>EM</th>
                        <th>Direktur</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($komisicabang as $k) { ?>
                        <tr>
                          <td><?php echo $k->kode_cabang; ?></td>
                          <td><?php echo $bln[$k->bulan]; ?></td>
                          <td><?php echo $k->tahun; ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      <?php } ?>
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
  <div class="modal-dialog  modal-dialog-centered" style="max-width:1300px !important" role="document">
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


  });
</script>
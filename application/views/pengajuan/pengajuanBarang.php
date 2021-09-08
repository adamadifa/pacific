<div class="container-fluid">
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
          <div class="mb-3 d-flex justify-content-start">
            <a href="<?php echo base_url();?>pengajuan/inputPengajuanBarang" class="btn btn-primary">TAMBAH DATA</a>
          </div>
          <div class="table-responsive">
            <table style="zoom:100%" class="table table-bordered table-striped table-hover" id="mytable">
              <thead class="thead-dark">
                <tr>
                  <th style="width: 1%;">No</th>
                  <th style="width: 7%;">No Bukti</th>
                  <th>Nama Pemohon</th>
                  <th style="width: 10%;">Tanggal</th>
                  <th style="width: 10%;">Cabang</th>
                  <th style="width: 10%;">Jenis Pengajuan</th>
                  <th style="width: 5%;">GA</th>
                  <th style="width: 5%;">MA</th>
                  <th style="width: 5%;">MG</th>
                  <th style="width: 5%;">MM</th>
                  <th style="width: 5%;">em</th>
                  <th style="width: 5%;">DIRUT</th>
                  <th style="width: 7%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sno  = 1;
                foreach ($data->result_array() as $d) {
                  $nobukti       = str_replace("/",".",$d['nobukti']);
                  ?>
                  <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $d['nobukti']; ?></td>
                    <td><?php echo $d['nama_lengkap']; ?></td>
                    <td><?php echo dateToIndo2($d['tanggal']) ?></td>
                    <td><?php echo $d['kode_cabang']; ?></td>
                    <td><?php echo $d['keterangan']; ?></td>

                    <?php if($d['ga'] == 1){ ?>
                      <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
                    <?php }else if($d['ga'] == 2){ ?>
                      <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    <?php }else if($d['ga'] != ''){ ?>
                      <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
                    <?php }else{ ?>
                      <td></td>
                    <?php } ?>

                    <?php if($d['ma'] == 1){ ?>
                      <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
                    <?php }else if($d['ma'] == 2){ ?>
                      <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    <?php }else if($d['ma'] != ''){ ?>
                      <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
                    <?php }else{ ?>
                      <td></td>
                    <?php } ?>

                    <?php if($d['mg'] == 1){ ?>
                      <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
                    <?php }else if($d['mg'] == 2){ ?>
                      <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    <?php }else if($d['mg'] != ''){ ?>
                      <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
                    <?php }else{ ?>
                      <td></td>
                    <?php } ?>

                    <?php if($d['mm'] == 1){ ?>
                      <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
                    <?php }else if($d['mm'] == 2){ ?>
                      <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    <?php }else if($d['mm'] != ''){ ?>
                      <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
                    <?php }else{ ?>
                      <td></td>
                    <?php } ?>

                    <?php if($d['em'] == 1){ ?>
                      <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
                    <?php }else if($d['em'] == 2){ ?>
                      <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    <?php }else if($d['em'] != ''){ ?>
                      <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
                    <?php }else{ ?>
                      <td></td>
                    <?php } ?>

                    <?php if($d['dirut'] == 1){ ?>
                      <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
                    <?php }else if($d['dirut'] == 2){ ?>
                      <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                    <?php }else if($d['dirut'] != ''){ ?>
                      <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
                    <?php }else{ ?>
                      <td></td>
                    <?php } ?>

                    <td>
                      <?php if($d['ga'] == 1 ){ ?>
                        <a href="<?php echo base_url();?>pengajuan/approvalpengajuan/<?php echo $nobukti;?>/1" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></a>
                      <?php } else if($d['ma'] == '' && $d['ga'] == 1 ){ ?>
                        <a href="<?php echo base_url();?>pengajuan/approvalpengajuan/<?php echo $nobukti;?>/2" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php
                  $sno++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="detailmaintenance" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Detail</h5>
      </div>
      <div class="modal-body">
        <div id="loaddetail"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('dari'), {});
    flatpickr(document.getElementById('sampai'), {});
  });
</script>
<script>
  $(document).ready(function() {
    $('#mytable').DataTable({
            responsive: true
        });
    $('.detail').click(function(e) {
      e.preventDefault();
      var kode_pengajuan = $(this).attr('data-kode_pengajuan');
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>maintenance/detail_maintenance',
        data: {
          kode_pengajuan: kode_pengajuan
        },
        cache: false,
        success: function(respond) {
          $("#loaddetail").html(respond);
          $("#detailmaintenance").modal("show");
        }
      });
    });

  });
</script>
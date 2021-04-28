<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Data Maintenance
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Maintenance</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?php echo base_url(); ?>maintenance/view_maintenance" autocomplete="off" class="mb-4">
            <div class="mb-3">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-icon">
                    <input id="dari" type="date" value="<?php echo $dari; ?>" placeholder="Dari" class="form-control" name="dari" />
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

                <div class="col-md-6">
                  <div class="input-icon">
                    <input id="sampai" type="date" value="<?php echo $sampai; ?>" placeholder="Sampai" class="form-control" name="sampai" />
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
            </div>
            <!-- <div class="mb-3">
                <div class="col-md-2">
                  <select name="cabang" id="cabang" class="form-select">
                    <option value="">-- Status --</option>
                    <option value="0">Pending</option>
                    <option value="1">Disetujui</option>
                    <option value="2">Proses</option>
                    <option value="3">Tolak</option>
                    <option value="4">Selesai</option>
                  </select>
                </div>
              </div> -->
            <div class="mb-3 d-flex justify-content-start">
              <button type="submit" name="submit" class="btn btn-primary mr-2 btn-block" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
            </div>
          </form>
          <div class="mb-3 d-flex justify-content-start">
            <a href="<?php echo base_url();?>maintenance/input_maintenance" class="btn btn-primary">TAMBAH DATA</a>
          </div>
          <div class="table-responsive">
            <table style="zoom:90%" class="table table-bordered table-striped table-hover" id="mytable">
              <thead class="thead-dark">
                <tr>
                  <th style="width: 2%;">No</th>
                  <th style="width: 7%;">No Bukti</th>
                  <th>Nama Pemohon</th>
                  <th style="width: 11%;">Tgl Mengajukan</th>
                  <th style="width: 10%;">Tgl Input</th>
                  <th style="width: 10%;">Tgl Selesai</th>
                  <th style="width: 10%;">Dibuat</th>
                  <th style="width: 13%;">Departemen</th>
                  <!-- <th>Jenis Permohonan</th> -->
                  <!-- <th>Keterangan</th> -->
                  <th style="width: 5%;">Status</th>
                  <th style="width: 7%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sno  = 1;
                foreach ($result as $d) {
                ?>
                  <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $d['kode_pengajuan']; ?></td>
                    <td><?php echo $d['nama_pemohon']; ?></td>
                    <td><?php echo $d['tanggal_pengajuan']; ?></td>
                    <td><?php echo $d['created_at']; ?></td>
                    <td><?php echo $d['tanggal_selesai']; ?></td>
                    <td><?php echo $d['nama_lengkap']; ?></td>
                    <td><?php echo $d['departemen']; ?></td>
                    <td>
                      <?php
                      if ($d['status'] == "1") {
                        $color = "green";
                        $text = "Proses";
                      } else if ($d['status'] == "2") {
                        $color = "red";
                        $text = "Tolak";
                      } else if ($d['status'] == "3") {
                        $color = "blue";
                        $text = "Selesai";
                      }else{
                        $color = "orange";
                        $text = "Pending";
                      }
                      ?>
                      <span class="badge bg-<?php echo $color; ?>"><?php echo $text; ?></span>
                    </td>  
                      <td>
                        <!-- <a href="#" class="btn-sm btn btn-primary detail" data-kode_pengajuan="<?php echo $d['kode_pengajuan']; ?>"><i class="fa fa-list"></i></a> -->
                        <?php if ($d['status'] == "0") { ?>
                          <?php if ($d['id_user'] == $this->session->userdata('id_user')) { ?>
                            <a href="<?php echo base_url(); ?>maintenance/hapusmaintenance/<?php echo $d['kode_pengajuan'] ?>/1" class="btn-sm btn btn-danger"><i class="fa fa-trash"></i></a>
                          <?php } ?>
                          <?php if($level == "manager accounting"){ ?>
                            <a href="<?php echo base_url(); ?>maintenance/approvemanager/<?php echo $d['kode_pengajuan'] ?>/1" class="btn-sm btn btn-success"><i class="fa fa-check"></i></a>
                            <a href="<?php echo base_url(); ?>maintenance/approvemanager/<?php echo $d['kode_pengajuan'] ?>/2" class="btn-sm btn btn-danger"><i class="fa fa-remove"></i></a>
                          <?php } ?>
                        <?php } else if ($d['status'] == "1") { ?>
                          <?php if($level == "Administrator"){ ?>
                            <a href="<?php echo base_url(); ?>maintenance/approvemanager/<?php echo $d['kode_pengajuan'] ?>/3" class="btn-sm btn btn-success"><i class="fa fa-check"></i></a>
                          <?php } ?>
                          <?php if($level == "manager accounting"){ ?>
                            <a href="<?php echo base_url(); ?>maintenance/approvemanager/<?php echo $d['kode_pengajuan'] ?>/0" class="btn-sm btn btn-danger"><i class="fa fa-remove"></i></a>
                          <?php } ?>
                        <?php } else if ($d['status'] == "2") { ?>
                          <?php if($level == "manager accounting"){ ?>
                            <a href="<?php echo base_url(); ?>maintenance/approvemanager/<?php echo $d['kode_pengajuan'] ?>/1" class="btn-sm btn btn-success"><i class="fa fa-check"></i></a>
                          <?php } ?>
                        <?php }else{ ?>
                          <?php if($level == "Administrator"){ ?>
                            <a href="<?php echo base_url(); ?>maintenance/approvemanager/<?php echo $d['kode_pengajuan'] ?>/1" class="btn-sm btn btn-danger"><i class="fa fa-remove"></i></a>
                          <?php } ?>
                        <?php } ?>
                        <a href="<?php echo base_url();?>maintenance/view_komentar/<?php echo $d['kode_pengajuan']; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
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
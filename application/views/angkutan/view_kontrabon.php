<?php 
  $level = $this->session->userdata('level_user');
  $username = $this->session->userdata('username');
?>
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
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-10">
        <!-- Content here -->
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">DATA ANGKUTAN</h4>

              </div>
              <div class="card-body">
                  <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>angkutan/kontrabon" autocomplete="off">
                  <div class="mb-3">
                    <input type="text" value="<?php echo $no_kontrabon; ?>" id="no_kontrabon" name="no_kontrabon" class="form-control" placeholder="No Kontrabon" data-error=".errorTxt19" />
                  </div>
                  <div class="mb-3">
                    <input type="text" value="<?php echo $keterangan; ?>" id="keterangan" name="keterangan" class="form-control" placeholder="Angkutan" data-error=".errorTxt19" />
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-icon">
                          <input id="tgl_kontrabon" type="date" value="<?php echo $tgl_kontrabon; ?>" placeholder="Tanggal" class="form-control" name="tgl_kontrabon" />
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
                  <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
                  </div>
                </form>
                <?php if ($level == "Administrator" || $level == "keuangan" && $username != 'ika') { ?>
                  <a href="<?php echo base_url();?>angkutan/input_kontrabon" class="btn btn-danger mb-3">Tambah Data</a>
                <?php } ?>
                <div class="table-responsive" style="zoom:90%">
                  <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead class="thead-dark">
                      <tr>
                        <th>No Surat Jalan</th>
                        <th>Angkutan</th>
                        <th>Tgl Surat Jalan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no  = $row + 1;
                      foreach ($result as $d) {
                        $no_kontrabon = str_replace("/", ".", $d['no_kontrabon']);
                      ?>
                        <tr>
                          <td><?php echo $d['no_kontrabon']; ?></td>
                          <td><?php echo $d['keterangan']; ?></td>
                          <td><?php echo DateToIndo2($d['tgl_kontrabon']); ?></td>
                          <td>
                            <?php if($d['status'] != NULL){ ?>
                              <a href="#" class="btn btn-sm btn-success">Sudah Diproses</a>
                            <?php }else{ ?>
                              <a href="#" class="btn btn-sm btn-warning">Belum Diproses</a>
                            <?php } ?>
                          </td>
                          <td width="150px">
                            <?php if ($level == "Administrator" || $level == "keuangan" && $username != 'ika') { ?>
                              <?php if ($d['status'] == NULL) { ?>
                                <a href="#" data-href="<?php echo base_url(); ?>angkutan/hapuskontrabon/<?php echo $no_kontrabon; ?>" class="btn btn-sm btn-danger hapus">Hapus</a>
                              <?php } ?>
                              <a href="<?php echo base_url(); ?>angkutan/detailkontrabon/<?php echo $no_kontrabon; ?>" class="btn btn-sm btn-primary">Detail</a>
                            <?php } ?>
                            <?php if ($level == "Administrator" || $username == "ika") { ?>
                              <?php if ($d['status'] == NULL) { ?>
                                <a href="<?php echo base_url(); ?>angkutan/detailkontrabon/<?php echo $no_kontrabon; ?>" class="btn btn-sm btn-success">Proses</a>
                              <?php } ?>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <div style='margin-top: 10px;'>
                    <?php echo $pagination; ?>
                  </div>
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


<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tgl_kontrabon'), {});
  });
</script>

<script type="text/javascript">
  $(function() {

    $('.detail').click(function(e) {
      e.preventDefault();
      var sj = $(this).attr('data-sj');
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>angkutan/bayar_angkutan',
        data: {
          sj: sj
        },
        cache: false,
        success: function(respond) {
          $("#loadpembayaran").html(respond);
          $("#pembayaran").modal("show");
        }
      });
    });

    $(".hapus").click(function(e) {
      e.preventDefault();
      var getLink = $(this).attr('data-href');
      swal({
        title: 'Alert',
        text: 'Hapus Data ?',
        html: true,
        confirmButtonColor: '#d43737',
        showCancelButton: true,
      }, function() {
        window.location.href = getLink
      });
    });

    function formatAngka(angka) {
      if (typeof(angka) != 'string') angka = angka.toString();
      var reg = new RegExp('([0-9]+)([0-9]{3})');
      while (reg.test(angka)) angka = angka.replace(reg, '$1,$2');
      return angka;
    }

    // $(document).on('input', '#tarif', (function(){
    //   var tarif      = $('#tarif').val();
    //   $('#tarif').val(formatAngka(tarif));
    // });
    $('#tambahdata').hide("hidden");
    $(document).on('click', '.tambahdata', (function(){
      var tambahdata  = $('#tambahdata').show();
    }));
    
    $(document).on('click', '.edit', (function(e){
      e.preventDefault();
      var sj         = $(this).attr("data-sj");
      var tarif         = $(this).attr("data-tarif");
      var tepung         = $(this).attr("data-tepung");
      var tujuan         = $(this).attr("data-tujuan");
      var nopol         = $(this).attr("data-nopol");
      var bs         = $(this).attr("data-bs");
      var angkutan         = $(this).attr("data-angkutan");
      var keterangan         = $(this).attr("data-keterangan");
      $('#no_sj').val(sj);
      $('#tarif').val(tarif);
      $('#tepung').val(tepung);
      $('#tujuan').val(tujuan);
      $('#nopol').val(nopol);
      $('#bs').val(bs);
      $('#angkutan').val(angkutan);
      $('#keterangan').val(1);

    }));


     $(document).on('click', '.simpandata', (function(e){
      e.preventDefault();

      var no_kontrabon  = $('#no_sj').val();
      var tarif           = $('#tarif').val();
      var tepung          = $('#tepung').val();
      var tujuan          = $('#tujuan').val();
      var nopol           = $('#nopol').val();
      var bs              = $('#bs').val();
      var angkutan        = $('#angkutan').val();
      var keterangan      = $('#keterangan').val();

      if (no_kontrabon == 0) {

        swal("Oops!", "No SJ Harus Diisi !", "warning");

      } else if (tarif == 0) {

        swal("Oops!", "tarif Harus Diisi!", "warning");

      } else if (tujuan == 0) {

        swal("Oops!", "tujuan Harus Diisi!", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>angkutan/simpan',
          data: {
            no_kontrabon: no_kontrabon,
            tarif: tarif,
            tepung: tepung,
            tujuan: tujuan,
            bs: bs,
            angkutan: angkutan,
            nopol: nopol,
            keterangan: keterangan
          },
          cache: false,
          success: function(respond) {
            window.location.reload();
          }

        });

      }
    }));

  });
    
</script>

<?php 
  $level = $this->session->userdata('level_user');
?>
<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Input Angkutan
        </h2>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-10">
        <!-- Content here -->
        <div class="row">
          <?php if ($level == "Administrator" || $level == "admin gudang pusat") { ?>
          <div class="col-md-5 col-xs-12" id="tambahdata">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Input Angkutan</h4>
              </div>
              <div class="card-body">
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="hidden" value="" id="cekdata" name="cekdata" />
                    <input type="text" id="no_sj" name="no_sj" class="form-control" placeholder="No SJ" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-car"></i>
                    </span>
                    <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" id="nopol" name="nopol" class="form-control" placeholder="No Polisi" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-money"></i>
                    </span>
                    <input type="number" id="tarif" name="tarif" style="text-align:right" class="form-control" placeholder="Tarif" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-money"></i>
                    </span>
                    <input type="number" id="tepung" name="tepung" style="text-align:right" class="form-control" placeholder="Tepung" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-money"></i>
                    </span>
                    <input type="number" id="bs" name="bs" style="text-align:right" class="form-control" placeholder="BS" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-car"></i>
                    </span>
                    <input type="text" id="angkutan" name="angkutan" class="form-control" placeholder="Angkutan" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3" hidden>
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-book"></i>
                    </span>
                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" data-error=".errorTxt19" />
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-icon">
                    <a href="#" class="btn btn-danger mb-3 simpandata btn-block">Simpan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="col-md-12 col-xs-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">DATA ANGKUTAN</h4>

              </div>
              <div class="card-body">
                <?php if ($level == "Administrator" || $level == "admin gudang pusat") { ?>
                  <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>angkutan/index" autocomplete="off">
                <?php } ?>
                  <div class="mb-3">
                    <input type="text" value="<?php echo $no_surat_jalan; ?>" id="no_surat_jalan" name="no_surat_jalan" class="form-control" placeholder="No Surat Jalan" data-error=".errorTxt19" />
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-icon">
                          <input id="tgl_mutasi_gudang" type="date" value="<?php echo $tgl_mutasi_gudang; ?>" placeholder="Tanggal" class="form-control" name="tgl_mutasi_gudang" />
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
                <a href="#" class="btn btn-danger mb-3 tambahdata">Tambah Data</a>
                <div class="table-responsive" style="zoom:80%">
                  <table class="table table-bordered table-striped table-hover" id="datatable">
                    <thead class="thead-dark">
                      <tr>
                        <th>No SJ</th>
                        <th>Tgl SJ</th>
                        <th>Tujuan</th>
                        <th>Angkutan</th>
                        <th>No. Pol</th>
                        <th>Tarif</th>
                        <th>Tepung</th>
                        <th>BS</th>
                        <th>Tgl Kontrabon</th>
                        <th>Tgl Bayar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no  = $row + 1;
                      foreach ($result as $d) {
                        $no_surat_jalan = str_replace("/", ".", $d['no_surat_jalan']);
                      ?>
                        <tr>
                          <td><?php echo $d['no_surat_jalan']; ?></td>
                          <td><?php echo DateToIndo2($d['tgl_mutasi_gudang']); ?></td>
                          <td><?php echo $d['tujuan']; ?></td>
                          <td><?php echo $d['angkutan']; ?></td>
                          <td><?php echo $d['nopol']; ?></td>
                          <td align="right"><?php echo number_format($d['tarif']); ?></td>
                          <td align="right"><?php echo number_format($d['tepung']); ?></td>
                          <td align="right"><?php echo number_format($d['bs']); ?></td>
                          <td><?php if($d['tgl_kontrabon'] != ''){ echo '<button class="btn btn-success btn-sm">'.DateToIndo2($d['tgl_kontrabon']).'</button>'; }else{ echo ""; } ?></td>
                          <td><?php if($d['tgl_bayar'] != ''){ echo '<button class="btn btn-success btn-sm">'.DateToIndo2($d['tgl_bayar']).'</button>'; }else{ echo ""; } ?></td>
                          <td width="170px">
                            <?php if ($level == "Administrator" || $level == "admin gudang pusat") { ?>
                              <a href="<?php echo base_url(); ?>angkutan/hapusangkutan/<?php echo $no_surat_jalan; ?>" class="btn btn-sm btn-danger">Hapus</a>
                              <a href="#" data-sj="<?php echo $no_surat_jalan; ?>" data-bs="<?php echo $d['bs']; ?>" data-tepung="<?php echo $d['tepung']; ?>" data-tarif="<?php echo $d['tarif']; ?>" data-nopol="<?php echo $d['nopol']; ?>"  data-tujuan="<?php echo $d['tujuan']; ?>"  data-angkutan="<?php echo $d['angkutan']; ?>" class="btn btn-sm btn-warning edit tambahdata">Edit</a>
                            <?php } else if ($level == "Administrator" || $level == "keuangan") { ?>
                              <?php if($d['tgl_kontrabon'] == ''){ ?>
                                <a href="<?php echo base_url(); ?>angkutan/kontrabon/<?php echo $no_surat_jalan; ?>" class="btn btn-sm btn-success">Kontrabon</a>
                              <?php }else{ ?>
                                <a href="<?php echo base_url(); ?>angkutan/batalKontrabon/<?php echo $no_surat_jalan; ?>" class="btn btn-sm btn-danger">Batal</a>
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
      <?php if ($level == "Administrator" || $level == "admin gudang pusat") { ?>
        <div class="col-md-2">
          <?php $this->load->view('menu/menu_gudangpusat_administrator.php'); ?>
        </div>
      <?php } else if ($level == "Administrator" || $level == "keuangan") { ?>
        <div class="col-md-2">
          <?php $this->load->view('menu/menu_keuangan_administrator.php'); ?>
        </div>
      <?php } ?>
      
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tgl_mutasi_gudang'), {});
  });
</script>

<script>

     
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

      var no_surat_jalan  = $('#no_sj').val();
      var tarif           = $('#tarif').val();
      var tepung          = $('#tepung').val();
      var tujuan          = $('#tujuan').val();
      var nopol           = $('#nopol').val();
      var bs              = $('#bs').val();
      var angkutan        = $('#angkutan').val();
      var keterangan      = $('#keterangan').val();

      if (no_surat_jalan == 0) {

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
            no_surat_jalan: no_surat_jalan,
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
    
</script>

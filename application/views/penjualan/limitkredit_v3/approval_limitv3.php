<?php
$level = $this->session->userdata('level_user');
?>
<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Approval Limit Kredit
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-10 col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Approval Limit Kredit</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?php echo base_url(); ?>penjualan/approvallimitv3" autocomplete="off">
            <div class="mb-3">
              <select name="cabang" id="cabang" class="form-select">
                <option value="">-- Semua Cabang --</option>
                <?php foreach ($cabang as $c) { ?>
                  <option <?php if ($cbg == $c->kode_cabang) {
                            echo "selected";
                          } ?> value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <select name="salesman" id="salesman" class="form-select">
                <option value="">-- Semua Salesman --</option>
              </select>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" value="<?php echo $pelanggan; ?>" name="pelanggan" placeholder="Nama Pelanggan">
            </div>
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
            <div class="mb-3">
              <div class="form-group">
                <select class="form-select" name="status">
                  <option value="">Semua Status</option>
                  <option <?php if ($status == '-') {
                            echo "selected";
                          } ?> value="-">Belum di Approve</option>
                  <option <?php if ($status == '1') {
                            echo "selected";
                          } ?> value="1">Approved</option>
                  <option <?php if ($status == '2') {
                            echo "selected";
                          } ?> value="2">Ditolak</option>
                </select>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
            </div>
          </form>
          <div class="alert alert-icon alert-success" style="font-size:18px !important" role="alert">
            <i class="fa fa-bell mr-2" aria-hidden="true"></i> <b>Informasi Upadate Pengajuan Komisi Versi 3</b> <br>
            Sehubungan Adanya Memo Mengenai Proses Pengajuan Komisi, Yang Berlaku pertanggal 1 Juni 2021
            maka kami buatkan kembali form pengajuan limit versi 3 dengan aturan yang mengacu pada memo yang telah diterbitkan
            <ol>
              <li>Transaksi < 2 Juta Maka tidak perlu melakukan pengajuan Limit </li>
              <li>Transaksi 2 - 5 Juta Perlu Persetujuan <b>Kepala Penjualan</b> </li>
              <li>Transaksi >5 - 10 Juta Juta Perlu Persetujuan <b>Kepala Penjualan, Manager Marketing</b></li>
              <li>Transaksi >10 - 15 Juta Juta Perlu Persetujuan <b>Kepala Penjualan, Manager Marketing, EM</b></li>
              <li>Transaksi >15 Juta Juta Perlu Persetujuan <b>Kepala Penjualan, Manager Marketing, EM, Direktur</b></li>

            </ol>
            Untuk History Pengajuan Limit Kredit, dengan ketentuan sebelumnya bisa di lihat <a href="<?php echo base_url(); ?>penjualan/limitkreditv2"><b>Disini</b></a>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="mytable" style="font-size:11px !important">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th>No Pengajuan</th>
                  <th>Kode Pel</th>
                  <th>Tanggal</th>

                  <th>Pelanggan</th>
                  <th>Salesman</th>
                  <th>Jumlah</th>
                  <th>JT</th>
                  <th>
                    <i class="fa fa-arrows-v"></i>
                    (Rp)PENY
                  </th>
                  <th>Total</th>
                  <th>JT FIX</th>
                  <th>Skor</th>
                  <th>Ket</th>
                  <!-- <th>Status</th>
                      <th>Ket</th> -->
                  <th>KP</th>
                  <th>RSM</th>
                  <th>GM</th>
                  <th>Dirut</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sno   = $row + 1;
                foreach ($result as $d) {
                  $kodepelanggan = $d['kode_pelanggan'];
                  $nopengajuan = $d['no_pengajuan'];
                  $cek = $this->db->query("SELECT * FROM pengajuan_limitkredit_v3 WHERE kode_pelanggan='$kodepelanggan' AND no_pengajuan > '$nopengajuan'")->num_rows();
                ?>
                  <tr>
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $d['no_pengajuan']; ?></td>
                    <td><?php echo $d['kode_pelanggan']; ?></td>
                    <td><?php echo $d['tgl_pengajuan']; ?></td>
                    <td><?php echo $d['nama_pelanggan']; ?></td>
                    <td><?php echo $d['nama_karyawan']; ?></td>
                    <td align="right"><?php echo number_format($d['jumlah'], '0', '', '.'); ?></td>
                    <td align="right">

                      <?php
                      if ($d['jatuhtempo'] == 14) {
                        $lama = "14 Hari";
                      } else if ($d['jatuhtempo'] == 30) {
                        $lama = "30 Hari";
                      } else if ($d['jatuhtempo'] == 45) {
                        $lama = "45 Hari";
                      } else if ($d['jatuhtempo'] == 60) {
                        $lama = "2 Bulan";
                      } else if ($d['jatuhtempo'] == 90) {
                        $lama = "3 Bulan";
                      } else if ($d['jatuhtempo'] == "180") {
                        $lama = "6 Bulan";
                      } else if ($d['jatuhtempo'] == 360) {
                        $lama = "1 Tahun";
                      } else {
                        $lama = "";
                      }
                      if ($lama == "") {
                        echo '<span class="badge bg-red">NA</span>';
                      } else {
                        echo $lama;
                      }
                      ?>
                    </td>
                    <td align="center">
                      <?php

                      if ($level == 'Administrator' or $level == 'manager accounting') {
                        if ($cek == 0) {
                      ?>
                          <?php if ($d['status'] != '2') { ?>
                            <?php if (empty($d['jumlah_rekomendasi'])) { ?>
                              <a href="#" data-id="<?php echo $d['no_pengajuan']; ?>" class="btn btn-blue btn-sm edit">
                                <i class="fa fa-arrows-v"></i>
                              </a>
                            <?php } else {
                              $jumlah = $d['jumlah'];
                              $jumlah_rekomendasi = $d['jumlah_rekomendasi'];
                              $selisih = $jumlah_rekomendasi - $jumlah;
                              $persentase = ($selisih / $jumlah) * 100;
                              if ($persentase >= 0) {
                                $icon = "fa-arrow-up";
                                $color = "btn-green";
                              } else {
                                $icon = " fa-arrow-down";
                                $color = "btn-red";
                              }
                            ?>
                              <a href="#" data-id="<?php echo $d['no_pengajuan']; ?>" class="btn <?php echo $color; ?> btn-sm edit">
                                <i class="fa <?php echo $icon ?>"></i>
                                <?php echo round(str_replace("-", "", $persentase), 2) . "%"; ?>
                              </a>

                            <?php } ?>
                          <?php } ?>
                      <?php }
                      }
                      ?>
                    </td>
                    <td align="right">
                      <?php
                      if (empty($d['jumlah_rekomendasi'])) {
                        echo number_format($d['jumlah'], '0', '', '.');
                      } else {
                        echo number_format($d['jumlah_rekomendasi'], '0', '', '.');
                      }
                      ?></td>
                    <td align="right">
                      <?php
                      if (empty($d['jatuhtempo_rekomendasi'])) {
                        $jatuhtempo = $d['jatuhtempo'];
                      } else {
                        $jatuhtempo = $d['jatuhtempo_rekomendasi'];
                      }
                      if ($jatuhtempo == 14) {
                        $lama = "14 Hari";
                      } else if ($jatuhtempo == 30) {
                        $lama = "30 Hari";
                      } else if ($jatuhtempo == 45) {
                        $lama = "45 Hari";
                      } else if ($jatuhtempo == 60) {
                        $lama = "2 Bulan";
                      } else if ($jatuhtempo == 90) {
                        $lama = "3 Bulan";
                      } else if ($jatuhtempo == 180) {
                        $lama = "6 Bulan";
                      } else if ($jatuhtempo == 360) {
                        $lama = "1 Tahun";
                      } else {
                        $lama = "";
                      }
                      if ($lama == "") {
                        echo '<span class="badge bg-red">NA</span>';
                      } else {
                        echo $lama;
                      }
                      ?></td>
                    <td>
                      <?php
                      $scoreakhir =  $d['skor'];
                      if ($scoreakhir <= 2) {
                        $rekomendasi = "TL";
                      } else if ($scoreakhir > 2 && $scoreakhir <= 4) {
                        $rekomendasi = "TD";
                      } else if ($scoreakhir > 4 && $scoreakhir <= 6) {
                        $rekomendasi = "B";
                      } else if ($scoreakhir > 6 && $scoreakhir <= 8.5) {
                        $rekomendasi = "LDP";
                      } else if ($scoreakhir > 8.5 && $scoreakhir <= 10) {
                        $rekomendasi = "L";
                      }

                      if ($scoreakhir <= 4) {
                        $bg = "red";
                      } else if ($scoreakhir <= 6) {
                        $bg = "orange";
                      } else {
                        $bg = "green";
                      }
                      //echo $scoreakhir;
                      ?>
                      <span class="badge bg-<?php echo $bg; ?>"><?php echo $scoreakhir; ?></span>
                    </td>
                    <td>
                      <span class="badge bg-<?php echo $bg; ?>"><?php echo $rekomendasi; ?></span>
                    </td>
                    <td>
                      <?php
                      if ($d['jumlah'] > 2000000) {
                        if (empty($d['kacab'])) {
                      ?>
                          <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                        <?php
                        } else if (
                          !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 2
                          or !empty($d['kacab']) && empty($d['mm']) && $d['status'] == 0
                          or !empty($d['kacab']) && empty($d['mm']) && $d['status'] == 1
                          or !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 0
                          or !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 1
                        ) {
                        ?>
                          <span class="badge bg-green"><i class="fa fa-check"></i></span>
                        <?php
                        } else {
                        ?>
                          <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                        }
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($d['jumlah'] > 5000000) {
                        if (empty($d['mm'])) {
                      ?>
                          <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                        <?php
                        } else if (
                          !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 2
                          or !empty($d['mm']) && empty($d['gm']) && $d['status'] == 1
                          or !empty($d['mm']) && empty($d['gm']) && $d['status'] == 0
                          or !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 0
                          or !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 1
                        ) {
                        ?>
                          <span class="badge bg-green"><i class="fa fa-check"></i></span>
                        <?php
                        } else {
                        ?>
                          <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                        }
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($d['jumlah'] > 10000000) {
                        if (empty($d['gm'])) {
                      ?>
                          <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                        <?php
                        } else if (
                          !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 2
                          or !empty($d['gm']) && empty($d['dirut']) && $d['status'] == 1
                          or !empty($d['gm']) && empty($d['dirut']) && $d['status'] == 0
                          or !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 0
                          or !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 1
                        ) {
                        ?>
                          <span class="badge bg-green"><i class="fa fa-check"></i></span>
                        <?php
                        } else {
                        ?>
                          <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                        }
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($d['jumlah'] > 15000000) {
                        if (empty($d['dirut'])) {
                      ?>
                          <span class="badge bg-orange"><i class="fa fa-history"></i></span>
                        <?php
                        } else if (
                          !empty($d['dirut']) && $d['status'] != 2
                        ) {
                        ?>
                          <span class="badge bg-green"><i class="fa fa-check"></i></span>
                        <?php
                        } else {
                        ?>
                          <span class="badge bg-red"><i class="fa fa-close"></i></span>
                      <?php
                        }
                      }
                      ?>
                    </td>
                    <td>
                      <a href="<?php echo base_url(); ?>penjualan/cetak_ajuankredit_v3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>

                      <a href="#" data-nopengajuan="<?php echo $d['no_pengajuan']; ?>" id="inputkomentar" class="btn btn-primary btn-sm inputkomentar"><i class="fa fa-wechat "></i></a>
                      <?php

                      if (
                        $level == 'manager marketing' and !empty($d['kacab']) and empty($d['mm']) and empty($d['gm']) && $d['status'] == 0
                        or $level == 'manager marketing' and !empty($d['kacab']) and !empty($d['mm']) and empty($d['gm']) && $d['status'] == 2
                        or $level == 'manager marketing' and !empty($d['kacab']) and !empty($d['mm']) and empty($d['gm']) && $d['status'] == 0
                      ) {
                        if ($cek == 0) {
                      ?>
                          <a href="<?php echo base_url(); ?>penjualan/approvelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-green btn-sm"><i class="fa fa-check"></i></a>
                          <a href="<?php echo base_url(); ?>penjualan/declinelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-red btn-sm"><i class="fa fa-close"></i></a>

                        <?php }
                      } else if (
                        $level == 'general manager' and !empty($d['mm']) and empty($d['gm']) and empty($d['dirut']) && $d['status'] == 0 && $d['jumlah'] > 2000000
                        or $level == 'general manager' and !empty($d['mm']) and !empty($d['gm']) and empty($d['dirut']) && $d['status'] == 2 && $d['jumlah'] > 2000000
                        or $level == 'general manager' and !empty($d['mm']) and !empty($d['gm']) and empty($d['dirut']) && $d['status'] == 0 && $d['jumlah'] > 2000000
                      ) {
                        if ($cek == 0) {
                        ?>
                          <a href="<?php echo base_url(); ?>penjualan/approvelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-green btn-sm"><i class="fa fa-check"></i></a>
                          <a href="<?php echo base_url(); ?>penjualan/declinelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-red btn-sm"><i class="fa fa-close"></i></a>

                        <?php }
                      } else if (
                        $level == 'Administrator' and !empty($d['gm'])   && $d['status'] == 0 && $d['jumlah'] > 2000000
                        or $level == 'Administrator' and !empty($d['gm']) && $d['status'] == 2 && $d['jumlah'] > 2000000
                        or $level == 'Administrator' and !empty($d['gm'])   && $d['status'] == 0 && $d['jumlah'] > 2000000
                        or $level == 'Administrator' and !empty($d['gm'])   && $d['status'] == 1 && $d['jumlah'] > 2000000
                      ) {
                        if ($cek == 0) {
                          //echo $cek;
                        ?>
                          <a href="<?php echo base_url(); ?>penjualan/approvelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-green btn-sm"><i class="fa fa-check"></i></a>
                          <a href="<?php echo base_url(); ?>penjualan/declinelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-red btn-sm"><i class="fa fa-close"></i></a>

                        <?php }
                      } else if ($level == 'kepala cabang'  and empty($d['kacab']) and empty($d['mm']) and $d['status'] == 0 or $level == 'kepala cabang' and !empty($d['kacab']) and empty($d['mm'])  and $d['status'] == 2 or $level == 'kepala cabang' and !empty($d['kacab']) and empty($d['mm'])  and $d['status'] == 0) {
                        if ($cek == 0) {
                        ?>
                          <a href="<?php echo base_url(); ?>penjualan/approvelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-green btn-sm"><i class="fa fa-check"></i></a>
                          <a href="<?php echo base_url(); ?>penjualan/declinelimitproses3/<?php echo $d['no_pengajuan']; ?>" class="btn btn-red btn-sm"><i class="fa fa-close"></i></a>
                      <?php }
                      }
                      ?>

                    </td>
                  </tr>
                <?php
                  $sno++;
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
    <div class="col-md-2">
      <?php $this->load->view('menu/menu_penjualan_administrator'); ?>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="hapusdata" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-title">
          Yakin Untuk Di Hapus ?
        </div>
        <div>Jika Di Hapus, Kamu Akan Kehilangan Data Ini !</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger delete">Yes, Hapus !</a>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="editpengajuanlimit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Penyesuaian Limit Kredit dan Jatuh Tempo</h5>
      </div>
      <div class="modal-body">
        <div id="loadcontent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modal-komentar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title">Uraian Analisa</h5>
      </div>
      <div class="modal-body">
        <input type="hidden" id="no_peng">
        <textarea name="komentar" id="komentar" cols="30" rows="10" placeholder="Uraian Analisa" class="form-control"></textarea>
        <div class="form-group mt-3">
          <a href="#" class="btn btn-primary w-100" id="updatekomentar">Update Analisa</a>
        </div>
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
    $('#cabang').selectize({});
    $('#pelanggan').selectize({});

    function loadSalesman() {
      var cabang = $("#cabang").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>laporanpenjualan/get_salesman',
        data: {
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $('#salesman').selectize()[0].selectize.destroy();
          $("#salesman").html(respond);
          $('#salesman').selectize({});

        }
      });
    }



    $("#updatekomentar").click(function(e) {
      e.preventDefault();
      var no_pengajuan = $("#no_peng").val();
      var komentar = $("#komentar").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjualan/updatekomentarv3',
        data: {
          no_pengajuan: no_pengajuan,
          komentar: komentar
        },
        cache: false,
        success: function(respond) {
          $("#modal-komentar").modal("hide");
        }
      });
    });
    $(".inputkomentar").click(function(e) {
      e.preventDefault();
      var no_pengajuan = $(this).attr("data-nopengajuan");
      var komentar = $("#komentar").val();
      $("#no_peng").val(no_pengajuan);
      $("#modal-komentar").modal("show");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjualan/getkomentar',
        data: {
          no_pengajuan: no_pengajuan
        },
        cache: false,
        success: function(respond) {
          $("#komentar").val(respond);
        }
      });
    });
    loadSalesman();

    $("#cabang").change(function() {
      loadSalesman();
    });
    $(".hapus").click(function() {
      var href = $(this).attr("data-href");
      //alert(href);
      $("#hapusdata").modal({
        backdrop: "static", //remove ability to close modal with click
        keyboard: false, //remove option to close with keyboard
        show: true //Display loader!
      });
      $(".delete").attr("href", href);
    });

    $(".edit").click(function(e) {
      e.preventDefault();
      var id = $(this).attr("data-id");
      $("#editpengajuanlimit").modal({
        backdrop: "static", //remove ability to close modal with click
        keyboard: false, //remove option to close with keyboard
        show: true //Display loader!
      });
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjualan/edit_pengajuanlimitv3',
        data: {
          id: id
        },
        cache: false,
        success: function(respond) {
          //console.log(respond);
          $('#loadcontent').html(respond);
        }
      });
    });


  });
</script>
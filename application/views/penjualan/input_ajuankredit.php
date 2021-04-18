<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Input Ajuan Limit Kredit
        </h2>
      </div>
    </div>
  </div>

  <form autocomplete="off" class="limitForm" id="formValidate" method="POST" action="<?php echo base_url(); ?>penjualan/insertpengajuanlimitv3">
    <input type="hidden" name="skor" id="skor">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Input Ajuan Limit Kredit</h4>
          </div>
          <div class="card-body">

            <div class="row mb-3">
              <div class="col-md-12">
                <!-- <label class="form-label">Tanggal</label> -->
                <div class="input-icon">
                  <input type="date" id="tgl_pengajuan" name="tgl_pengajuan" class="form-control" placeholder="Ex: 2018-07-16" />
                  <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-user"></i>
                    </span>
                    <input type="text" id="kode_pelanggan" name="kode_pelanggan" class="form-control" placeholder="Kode Pelanggan" value="<?= $pelanggan['kode_pelanggan'] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-user"></i>
                    </span>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-map"></i>
                    </span>
                    <input type="text" id="alamat_pelanggan" name="alamat_pelanggan" class="form-control" placeholder="Alamat Pelanggan" value="<?= $pelanggan['alamat_pelanggan'] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-credit-card"></i>
                    </span>
                    <input type="text" id="nik" name="nik" class="form-control" placeholder="No KTP / SIM" value="<?= $pelanggan['nik'] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-map"></i>
                    </span>
                    <input type="text" id="alamat_toko" name="alamat_toko" value="<?= $pelanggan['alamat_toko'] ?>" class="form-control" placeholder="Alamat Toko" value="" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-map-pin"></i>
                    </span>
                    <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" value="<?= $pelanggan['longitude'] ?>" />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-map-pin"></i>
                    </span>
                    <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" value="<?= $pelanggan['latitude'] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Nama Pelanggan</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-phone"></i>
                    </span>
                    <input type="text" id="nohp" name="nohp" class="form-control" placeholder="Alamat Toko" value="<?= $pelanggan['no_hp'] ?>" />
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <!-- <label class="form-label">Hari</label> -->
                <div class="form-group">
                  <select id="hari" name="hari" class="form-select">
                    <option value="">Hari Kunjungan</option>
                    <option <?php if ($pelanggan['hari'] == "Senin") {
                              echo "selected";
                            } ?> value="Senin">Senin</option>
                    <option <?php if ($pelanggan['hari'] == "Selasa") {
                              echo "selected";
                            } ?> value="Selasa">Selasa</option>
                    <option <?php if ($pelanggan['hari'] == "Rabu") {
                              echo "selected";
                            } ?> value="Rabu">Rabu</option>
                    <option <?php if ($pelanggan['hari'] == "Kamis") {
                              echo "selected";
                            } ?> value="Kamis">Kamis</option>
                    <option <?php if ($pelanggan['hari'] == "Jumat") {
                              echo "selected";
                            } ?> value="Jumat">Jumat</option>
                    <option <?php if ($pelanggan['hari'] == "Sabtu") {
                              echo "selected";
                            } ?> value="Sabtu">Sabtu</option>
                    <option <?php if ($pelanggan['hari'] == "Minggu") {
                              echo "selected";
                            } ?> value="Minggu">Minggu</option>
                  </select>
                </div>
              </div>

            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Cabang</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-bank"></i>
                    </span>
                    <input type="text" readonly id="cabang" name="cabang" class="form-control" placeholder="Cabang" value="<?= $pelanggan['kode_cabang'] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Cabang</label> -->
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-users"></i>
                    </span>
                    <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $pelanggan['id_sales'] ?>">
                    <input type="text" readonly id="nama_karyawan" name="nama_karyawan" class="form-control" placeholder="Cabang" value="<?= $pelanggan['nama_karyawan'] ?>" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Jumlah</label> -->
                  <div class="input-icon">
                    <input type="text" style="text-align:right" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah Ajuan Kredit" />
                    <div id="terbilang" style="float:right;"></div>
                    <span class="input-icon-addon">
                      <i class="fa fa-money"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <textarea name="komentar" id="komentar" cols="30" rows="10" class="form-control" placeholder="Uraian Analisa"></textarea>
                </div>
              </div>
            </div>


            <div class="row ">
              <div class="form-group">
                <div class="d-flex justify-content-end">
                  <button type="submit" name="simpan" class="btn btn-primary btn-block" value="1"><i class="fa fa-save mr-2"></i>SIMPAN</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">KUANTITATIF SCORING</h4>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <select name="status_outlet" id="status_outlet" class="form-select">
                    <option value="">Status Outlet</option>
                    <option <?php if ($pelanggan['status_outlet'] == "1") {
                              echo "selected";
                            } ?> value="1">New Outlet</option>
                    <option <?php if ($pelanggan['status_outlet'] == "2") {
                              echo "selected";
                            } ?> value="2">Exsiting Outlet</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <select name="typeoutlet" id="typeoutlet" class="form-select">
                    <option value="">Type Outlet</option>
                    <option <?php if ($pelanggan['type_outlet'] == "1") {
                              echo "selected";
                            } ?> value="1">Grosir</option>
                    <option <?php if ($pelanggan['type_outlet'] == "2") {
                              echo "selected";
                            } ?> value="2">Retail</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <select id="jatuhtempo" name="jatuhtempo" class="form-select">
                    <option value="">Pilih Jatuh Tempo</option>
                    <option <?php if ($pelanggan['jatuhtempo'] == "14") {
                              echo "selected";
                            } ?> value="14">14 Hari</option>
                    <option <?php if ($pelanggan['jatuhtempo'] == "30") {
                              echo "selected";
                            } ?> value="30">30 Hari</option>
                    <option <?php if ($pelanggan['jatuhtempo'] == "45") {
                              echo "selected";
                            } ?> value="45">45 Hari</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <select name="cara_pembayaran" id="cara_pembayaran" class="form-select">
                    <option value="">Cara Pembayaran</option>
                    <option <?php if ($pelanggan['cara_pembayaran'] == "1") {
                              echo "selected";
                            } ?> value="1">Bank Transfer</option>
                    <option <?php if ($pelanggan['cara_pembayaran'] == "2") {
                              echo "selected";
                            } ?> value="2">Advance Cash</option>
                    <option <?php if ($pelanggan['cara_pembayaran'] == "3") {
                              echo "selected";
                            } ?> value="2">Cheque / Bilyet Giro</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <select name="kepemilikan" id="kepemilikan" class="form-select">
                    <option value="">Kepemilikan</option>
                    <option <?php if ($pelanggan['kepemilikan'] == "Milik Sendiri") {
                              echo "selected";
                            } ?> value="Milik Sendiri">Milik Sendiri</option>
                    <option <?php if ($pelanggan['kepemilikan'] == "Sewa") {
                              echo "selected";
                            } ?> value="Sewa">Sewa</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="" class="form-label">Top Up Terakhir</label>
              <div class="form-group">
                <!-- <label class="form-label">Cabang</label> -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar"></i>
                      </span>
                      <input type="text" readonly id="topup_terakhir" name="topup_terakhir" class="form-control" placeholder="Top Up Terakhir" value="<?= $lasttopup['tgl_pengajuan'] ?>" />
                      <?php
                      $tgl1 = new DateTime($lasttopup['tgl_pengajuan']);
                      $tgl2 = new DateTime(date('Y-m-d'));
                      $lamatopup = $tgl2->diff($tgl1)->days + 1;

                      // tahun
                      $y = $tgl2->diff($tgl1)->y;

                      // bulan
                      $m = $tgl2->diff($tgl1)->m;

                      // hari
                      $d = $tgl2->diff($tgl1)->d;

                      $usia_topup =  $y . " tahun " . $m . " bulan " . $d . " hari";
                      ?>
                      <input type="hidden" value="<?= $lamatopup ?>" id="lamatopup" name="lamatopup">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <i class="fa fa-calendar"></i>
                      </span>
                      <input type="text" readonly id="usia_topup" name="usia_topup" class="form-control" placeholder="Usia Top UP" value="<?= $usia_topup ?>" />
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <select name="historitransaksi" id="historitransaksi" class="form-select">
                    <option value="">Histori Pembayaran Transaksi</option>
                    <option value="< TOP">
                      < TOP</option>
                    <option value="= TOP">= TOP</option>
                    <option value="> TOP">> TOP</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <select name="lamalangganan" id="lamalangganan" class="form-select">
                    <option value="">Lama Berlangganan</option>
                    <option <?php if ($pelanggan['lama_langganan'] == "< 2 Tahun") {
                              echo "selected";
                            } ?> value="< 2 Tahun">
                      < 2 Tahun</option>
                    <option <?php if ($pelanggan['lama_langganan'] == "> 2 Tahun") {
                              echo "selected";
                            } ?> value="> 2 Tahun">> 2 Tahun</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <select name="lamausaha" id="lamausaha" class="form-select">
                    <option value="">Lama Usaha</option>
                    <option <?php if ($pelanggan['lama_usaha'] == "< 2 Tahun") {
                              echo "selected";
                            } ?> value="< 2 Tahun">
                      < 2 Tahun</option>
                    <option <?php if ($pelanggan['lama_usaha'] == "2-5 Tahun") {
                              echo "selected";
                            } ?> value="2-5 Tahun">2-5 Tahun</option>
                    <option <?php if ($pelanggan['lama_usaha'] == "> 5 Tahun") {
                              echo "selected";
                            } ?> value="> 5 Tahun">> 5 Tahun</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="form-group">
                <div class="col-md-12">
                  <select name="jaminan" id="jaminan" class="form-select">
                    <option value="">Jaminan</option>
                    <option <?php if ($pelanggan['jaminan'] == "1") {
                              echo "selected";
                            } ?> value="1">Ada</option>
                    <option <?php if ($pelanggan['jaminan'] == "2") {
                              echo "selected";
                            } ?> value="2">Tidak Ada</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <!-- <label class="form-label">Jumlah</label> -->
                  <div class="input-icon">
                    <input type="text" style="text-align:right" value="<?= number_format($pelanggan['omset_toko'], '0', '', '.') ?>" id="omsettoko" name="omsettoko" class="form-control" placeholder="Omset Toko" />
                    <div id="terbilang" style="float:right;"></div>
                    <span class="input-icon-addon">
                      <i class="fa fa-money"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Content here -->
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Jumlah Faktur Belum Lunas</h4>
                      </div>
                      <div class="card-body">

                        <div class="table-responsive">
                          <table class="table table-bordered table-striped table-hover" id="mytable">
                            <thead class="thead-dark">
                              <tr>
                                <th>No Faktur</th>
                                <th>Tanggal</th>
                                <th>Piutang</th>
                                <th>Jml Bayar</th>
                                <th>Sisa Bayar</th>
                                <th>Salesman</th>
                                <th>Ket</th>


                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $totalallpiutang    = 0;
                              $totalallbayar      = 0;
                              $totalallsisabayar  = 0;
                              $no = 1;
                              foreach ($pmb as $p) {

                                if ($p->sisabayar == 0) {
                                  $color = "bg-green";
                                  $ket   = "LUNAS";
                                } else {

                                  $color = "bg-red";
                                  $ket   = "BELUM LUNAS";
                                }

                                $totalallpiutang    = $totalallpiutang + $p->totalpiutang;
                                $totalallbayar      = $totalallbayar + $p->totalbayar;

                                $totalallsisabayar  = $totalallsisabayar + $p->sisabayar;

                                $cekretur = $this->db->get_where('retur', array('no_fak_penj' => $p->no_fak_penj));
                                $retur    = $cekretur->num_rows();
                              ?>
                                <tr>
                                  <td><a href="<?php echo base_url(); ?>penjualan/detailfaktur/<?php echo $p->no_fak_penj; ?>"><?php echo $p->no_fak_penj; ?></a></td>
                                  <td><?php echo $p->tgltransaksi; ?></td>
                                  <td align="right"><?php echo  number_format($p->totalpiutang, '0', '', '.'); ?></td>
                                  <td align="right"><?php echo  number_format($p->totalbayar, '0', '', '.'); ?></td>
                                  <td align="right"><?php echo  number_format($p->sisabayar, '0', '', '.'); ?></td>

                                  <td><?php echo ucwords($p->nama_karyawan); ?></td>
                                  <td><span class="badge <?php echo $color ?>"><?php echo $ket; ?></span></td>
                                </tr>
                              <?php $no++;
                              } ?>

                            </tbody>
                            <tr>
                              <td colspan="2"><b>TOTAL</b></td>
                              <td align="right" id="totalpiutang"><b><?php echo  number_format($totalallpiutang, '0', '', '.'); ?></b></td>
                              <td align="right"><b><?php echo  number_format($totalallbayar, '0', '', '.'); ?></b></td>
                              <td align="right"><b><?php echo  number_format($totalallsisabayar, '0', '', '.'); ?></b></td>
                              <td colspan="5"></td>
                            </tr>
                          </table>
                          <input type="hidden" value="<?php echo $no - 1; ?>" id="jmlfaktur" name="jmlfaktur">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <td>
                      <h2 style="color:green">SKOR</h2>
                    </td>
                    <td>
                      <h2 id="totalscore"></h2>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h2 style="color:red">KETERANGAN</h2>
                    </td>
                    <td>
                      <h2 id="rekomendasi"></h2>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  flatpickr(document.getElementById('tgl_pengajuan'), {});
</script>
<script type="text/javascript">
  var jumlah = document.getElementById('jumlah');
  jumlah.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    jumlah.value = formatRupiah(this.value, '');
  });

  var ot = document.getElementById('omsettoko');
  ot.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    ot.value = formatRupiah(this.value, '');
  });


  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
  }
</script>

<script>
  $(function() {

    function loadSkor() {
      var status_outlet = $("#status_outlet").val();
      var type_outlet = $("#typeoutlet").val();
      var jatuhtempo = $("#jatuhtempo").val();
      var cara_pembayaran = $("#cara_pembayaran").val();
      var kepemilikan = $("#kepemilikan").val();
      var lamatopup = $("#lamatopup").val();
      var lamalangganan = $("#lamalangganan").val();
      var lamausaha = $("#lamausaha").val();
      var jaminan = $("#jaminan").val();
      var historitransaksi = $("#historitransaksi").val();
      var omsettoko = $("#omsettoko").val();
      var jumlah = $("#jumlah").val();
      var jmlfaktur = $("#jmlfaktur").val();
      var ot = omsettoko.replace(/\./g, '');
      var jm = jumlah.replace(/\./g, '');


      var ratioomset = Math.round(parseInt(ot) / parseInt(jm));

      if (ratioomset < 3) {
        score_omset = 0.35;
      } else if (ratioomset >= 3) {
        score_omset = 0.50;
      } else {
        score_omset = 0;
      }

      if (jmlfaktur == 1) {
        score_faktur = 0.50;
      } else if (jmlfaktur == 2) {
        score_faktur = 0.40;
      } else if (jmlfaktur == 3) {
        score_faktur = 0.30;
      } else if (jmlfaktur > 3) {
        score_faktur = 0.20;
      } else {
        score_faktur = 0;
      }

      if (status_outlet == 1) {
        score_outlet = 1.05;
      } else if (status_outlet == 2) {
        score_outlet = 1.50;
      } else {
        score_outlet = 0.00;
      }

      if (jaminan == 1) {
        score_jaminan = 1.00;
      } else if (jaminan == 2) {
        score_jaminan = 0.70;
      } else {
        score_jaminan = 0.00;
      }

      if (type_outlet == 1) {
        score_typeoutlet = 0.50;
      } else if (type_outlet == 2) {
        score_typeoutlet = 0.35;
      } else {
        score_typeoutlet = 0.00;
      }

      if (jatuhtempo == 14) {
        score_top = 1.00;
      } else if (jatuhtempo == 30) {
        score_top = 0.70;
      } else if (jatuhtempo == 45) {
        score_top = 0.40;
      } else {
        score_top = 0.00;
      }

      if (cara_pembayaran == 1) {
        score_carabayar = 0.50;
      } else if (cara_pembayaran == 2) {
        score_carabayar = 0.35;
      } else if (cara_pembayaran == 3) {
        score_carabayar = 0.20;
      } else {
        score_carabayar = 0.00;
      }
      //alert(score_carabayar);
      if (kepemilikan == "Milik Sendiri") {
        score_kepemilikan = 1.00;
      } else if (kepemilikan == "Sewa") {
        score_kepemilikan = 0.70;
      } else {
        score_kepemilikan = 0.00;
      }

      if (historitransaksi == "< TOP") {
        score_ht = 1.00;
      } else if (historitransaksi == "= TOP") {
        score_ht = 0.70;
      } else if (historitransaksi == "> TOP") {
        score_ht = 0.40;
      } else {
        score_ht = 0.00;
      }

      if (lamausaha == "< 2 Tahun") {
        score_lamausaha = 0.40;
      } else if (lamausaha == "2-5 Tahun") {
        score_lamausaha = 0.70;
      } else if (lamausaha == "> 5 Tahun") {
        score_lamausaha = 1.00;
      } else {
        score_lamausaha = 0.00;
      }

      if (lamalangganan == "< 2 Tahun") {
        score_lamalangganan = 0.70;
      } else if (lamalangganan == "> 2 Tahun") {
        score_lamalangganan = 1.00;
      } else {
        score_lamalangganan = 0.00;
      }

      if (lamatopup == 0) {
        score_lamatopup = 0.50;
      } else if (lamatopup <= 31) {
        score_lamatopup = 0.50;
      } else if (lamatopup > 31) {
        score_lamatopup = 0.35;
      } else {
        score_lamatopup = 0.00;
      }

      var totalscore = parseFloat(score_outlet) + parseFloat(score_top) + parseFloat(score_carabayar) + parseFloat(score_kepemilikan) + parseFloat(score_lamausaha) + parseFloat(score_jaminan) +
        parseFloat(score_lamatopup) + parseFloat(score_lamalangganan) + parseFloat(score_ht) + parseFloat(score_omset) + parseFloat(score_faktur) + parseFloat(score_typeoutlet);
      var scoreakhir = totalscore.toFixed(2);
      $("#skor").val(scoreakhir);
      var rekomendasi = "";
      if (scoreakhir <= 2) {
        rekomendasi = "Tidak Layak";
      } else if (scoreakhir > 2 && scoreakhir <= 4) {
        rekomendasi = "Tidak Disarankan";
      } else if (scoreakhir > 4 && scoreakhir <= 6) {
        rekomendasi = "Beresiko";
      } else if (scoreakhir > 6.75 && scoreakhir <= 8.5) {
        rekomendasi = "Layak Dengan Pertimbangan";
      } else if (scoreakhir > 8.5 && scoreakhir <= 10) {
        rekomendasi = "Layak";
      }
      $("#totalscore").text(scoreakhir);
      $("#rekomendasi").text(rekomendasi);
    }

    $("#lamausaha").change(function() {
      loadSkor();
    });

    $("#typeoutlet").change(function() {
      loadSkor();
    });


    $("#historitransaksi").change(function() {
      loadSkor();
    });

    $("#lamalangganan").change(function() {
      loadSkor();
    });

    $("#jaminan").change(function() {
      loadSkor();
    });

    $("#status_outlet").change(function() {
      loadSkor();
    });

    $("#jatuhtempo").change(function() {
      loadSkor();
    });

    $("#cara_pembayaran").change(function() {
      loadSkor();
    });

    $("#kepemilikan").change(function() {
      loadSkor();
    });


    loadSkor();



    $("#omsettoko").on('keyup keydown change', function() {
      var jumlah = $("#jumlah").val();

      if (jumlah == "" || jumlah == 0) {
        alert("Jumlah Ajuan Kredit Harus Diisi Dulu");
        $(this).prop('readonly', true);
      }
      loadSkor();
    });

    $("#jumlah").on('keyup keydown change', function() {
      var jumlah = $("#jumlah").val();

      if (jumlah == "" || jumlah == 0) {
        $("#omsettoko").prop('readonly', true);
      } else {
        $("#omsettoko").prop('readonly', false);
      }
      loadSkor();
    });
    $("#formValidate").submit(function() {
      var tanggal = $("#tgl_pengajuan").val();
      var cabang = $("#cabang").val();
      var salesman = $("#id_karyawan").val();
      var pelanggan = $("#kode_pelanggan").val();
      var alamat_pelanggan = $("#alamat_pelanggan").val();
      var nik = $("#nik").val();
      var alamat_toko = $("#alamat_toko").val();
      var longitude = $("#longitude").val();
      var latitude = $("#latitude").val();
      var nohp = $("#nohp").val();
      var hari = $("#hari").val();
      var status_outlet = $("#status_outlet").val();
      var type_outlet = $("#typeoutlet").val();
      var jatuhtempo = $("#jatuhtempo").val();
      var cara_pembayaran = $("#cara_pembayaran").val();
      var kepemilikan = $("#kepemilikan").val();
      var lamatopup = $("#lamatopup").val();
      var lamalangganan = $("#lamalangganan").val();
      var lamausaha = $("#lamausaha").val();
      var jaminan = $("#jaminan").val();
      var historitransaksi = $("#historitransaksi").val();
      var omsettoko = $("#omsettoko").val();
      var jumlah = $("#jumlah").val();
      var komentar = $("#komentar").val();
      //alert(hari);
      if (tanggal == "") {
        swal("Oops!", "Tanggal Masih Kosong!", "warning");
        $("#tanggal").focus()
        return false;
      } else if (cabang == "") {
        swal("Oops!", "Cabang Masih Kosong!", "warning");
        return false;
      } else if (salesman == "") {
        swal("Oops!", "Salesman Masih Kosong!", "warning");
        return false;
      } else if (pelanggan == "") {
        swal("Oops!", "Pelanggan Masih Kosong!", "warning");
        return false;
      } else if (alamat_pelanggan == "") {
        swal("Oops!", "Alamat Pelanggan Masih Kosong!", "warning");
        return false;
      } else if (alamat_toko == "") {
        swal("Oops!", "Alamat Toko Masih Kosong!", "warning");
        return false;
      } else if (longitude == "") {
        swal("Oops!", "Longitude Masih Kosong!", "warning");
        return false;
      } else if (latitude == "") {
        swal("Oops!", "Latitude Masih Kosong!", "warning");
        return false;
      } else if (nohp == "") {
        swal("Oops!", "No HP Masih Kosong!", "warning");
        return false;
      } else if (jumlah == "") {
        swal("Oops!", "Jumlah Ajuan Masih Kosong!", "warning");
        return false;
      } else if (status_outlet == "") {
        swal("Oops!", "Status Outlet Masih Kosong!", "warning");
        return false;
      } else if (type_outlet == "") {
        swal("Oops!", "Type Outlet Masih Kosong!", "warning");
        return false;
      } else if (jatuhtempo == "") {
        swal("Oops!", "Jatuh Temo Masih Kosong!", "warning");
        return false;
      } else if (cara_pembayaran == "") {
        swal("Oops!", "Jenis Transaksi Masih Kosong!", "warning");
        return false;
      } else if (kepemilikan == "") {
        swal("Oops!", "Kepemilikan Toko Masih Kosong!", "warning");
        return false;
      } else if (historitransaksi == "") {
        swal("Oops!", "Histori Transaksi Masih Kosong!", "warning");
        return false;
      } else if (lamalangganan == "") {
        swal("Oops!", "Lama Berlangganan Masih Kosong!", "warning");
        return false;
      } else if (lamausaha == "") {
        swal("Oops!", "Lama Usaha Masih Kosong!", "warning");
        return false;
      } else if (jaminan == "") {
        swal("Oops!", "Jaminan Masih Kosong!", "warning");
        return false;
      } else if (omsettoko == "") {
        swal("Oops!", "Omset Toko Masih Kosong!", "warning");
        return false;
      } else if (komentar == "") {
        swal("Oops!", "Uraian Analisa Masih Kosong!", "warning");
        return false;
      } else {
        return true;
      }
    });
  })
</script>
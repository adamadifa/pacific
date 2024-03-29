<?php
$id_user = $this->session->userdata('id_user');
$level = $this->session->userdata('level_user');
if ($level == "Administrator") {
  if ($this->session->userdata('id_user') != "11") {
?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Data Penjualan
        </a>
        <a href="<?php echo base_url(); ?>penjualan/input_penjualan" class="list-group-item list-group-item-action">
          <i class="fa fa-shopping-cart mr-2"></i>Input Penjualan
        </a>
        <a href="<?php echo base_url(); ?>penjualan/input_lpc" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Input Pengiriman LPC
        </a>

        <a href="<?php echo base_url(); ?>penjualan/suratjalan" class="list-group-item list-group-item-action">
          <i class="fa fa-truck mr-2"></i>Data Penjualan & Surat Jalan
        </a>

        <a href="<?php echo base_url(); ?>pembayaran" class="list-group-item list-group-item-action">
          <i class="fa fa-balance-scale mr-2"></i>Histori Penjualan Pelanggan
        </a>
        <a href="<?php echo base_url(); ?>penjualan/penjualanpend" class="list-group-item list-group-item-action">
          <i class="fa fa-history mr-2"></i>Penjualan Pending
        </a>
        <a href="<?php echo base_url(); ?>penjualan/koreksifaktur" class="list-group-item list-group-item-action">
          <i class="fa fa-pencil mr-2"></i>Koreksi Faktur
        </a>
        <a href="<?php echo base_url(); ?>penjualan/movesales" class="list-group-item list-group-item-action">
          <i class="fa fa-retweet mr-2"></i>Pindah Piutang Sales
        </a>
      </div>
    </div>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Data Retur
        </a>
        <a href="<?php echo base_url(); ?>penjualan/retur_penjualan" class="list-group-item list-group-item-action">
          <i class="fa fa-scissors mr-2"></i>Retur Potong Faktur
        </a>
        <a href="<?php echo base_url(); ?>penjualan/retur_penjualangb" class="list-group-item list-group-item-action">
          <i class="fa fa-object-ungroup mr-2"></i>Retur Ganti Barang
        </a>
        <a href="<?php echo base_url(); ?>penjualan/retur" class="list-group-item list-group-item-action">
          <i class="fa fa-th mr-2"></i>Data Retur
        </a>
      </div>
    </div>

    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Data Pembayaran
        </a>
        <a href="<?php echo base_url(); ?>pembayaran/listbayar" class="list-group-item list-group-item-action">
          <i class="fa fa-money mr-2"></i>Bayar Piutang
        </a>
        <a href="<?php echo base_url(); ?>penjualan/listgiro" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Giro
        </a>
        <a href="<?php echo base_url(); ?>penjualan/listtransfer" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Transfer
        </a>
      </div>
    </div>

    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Data Pengajuan
        </a>
        <a href="<?php echo base_url(); ?>penjualan/limitkreditv3" class="list-group-item list-group-item-action">
          <i class="fa fa-money mr-2"></i>Pengajuan Limit Kredit
        </a>
        <a href="<?php echo base_url(); ?>penjualan/jatuhtempo" class="list-group-item list-group-item-action">
          <i class="fa fa-calendar-times-o mr-2"></i>Pengajuan Jatuh Tempo
        </a>
      </div>
    </div>

  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Approval Pengajuan
      </a>
      <a href="<?php echo base_url(); ?>penjualan/approvallimitv3" class="list-group-item list-group-item-action">
        <i class="fa fa-check-square mr-2"></i>Approval Limit Kredit
      </a>
      <a href="<?php echo base_url(); ?>penjualan/approvejatuhtempo" class="list-group-item list-group-item-action">
        <i class="fa fa-calendar-check-o mr-2"></i>Approval Jatuh Tempo
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kartupiutang" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Kartu Piutang
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/aup" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>AUP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/tunaikredit" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Tunai Kredit
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lebihsatufaktur" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Lebih 1 Faktur
      </a>

      <a href="<?php echo base_url(); ?>laporanpenjualan/lapdppp_v2" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPPP V2
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/repo" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>REPO
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/dpp" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapomset" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Omset Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappelanggan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappenjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualanpending" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Penjualan Pending
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapkendaraan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Kendaraan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/harganet" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Harga Net
      </a>
    </div>
  </div>
<?php } else if ($level == "admin penjualan" || $level == "kepala admin" || $level == "spv cabang") { ?>
  <?php if ($id_user != 26 and $id_user != 9) { ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Order Management (OMAN)
        </a>
        <a href="<?php echo base_url(); ?>oman/omancabang" class="list-group-item list-group-item-action">
          <i class="fa  fa-file-text mr-2"></i>Order Management
        </a>
      </div>
    </div>
  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Penjualan
      </a>
      <a href="<?php echo base_url(); ?>penjualan/input_penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-shopping-cart mr-2"></i>Input Penjualan
      </a>
      <?php if ($id_user != 26 and $id_user != 9 and $id_user != 234) { ?>
        <a href="<?php echo base_url(); ?>penjualan/input_lpc" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Input Pengiriman LPC
        </a>
      <?php } ?>

      <a href="<?php echo base_url(); ?>penjualan/suratjalan" class="list-group-item list-group-item-action">
        <i class="fa fa-truck mr-2"></i>Data Penjualan & Surat Jalan
      </a>


      <a href="<?php echo base_url(); ?>pembayaran" class="list-group-item list-group-item-action">
        <i class="fa fa-balance-scale mr-2"></i>Histori Penjualan Pelanggan
      </a>

      <?php if ($id_user != 234) { ?>
        <a href="<?php echo base_url(); ?>penjualan/penjualanpend" class="list-group-item list-group-item-action">
          <i class="fa fa-history mr-2"></i>Penjualan Pending
        </a>
      <?php } ?>
      <a href="<?php echo base_url(); ?>penjualan/koreksifaktur" class="list-group-item list-group-item-action">
        <i class="fa fa-pencil mr-2"></i>Koreksi Faktur
      </a>
      <?php if ($id_user != 9 and $id_user != 234) { ?>
        <a href="<?php echo base_url(); ?>penjualan/movesales" class="list-group-item list-group-item-action">
          <i class="fa fa-retweet mr-2"></i>Pindah Piutang Sales
        </a>
      <?php } ?>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Retur
      </a>
      <a href="<?php echo base_url(); ?>penjualan/retur_penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-scissors mr-2"></i>Retur Potong Faktur
      </a>
      <a href="<?php echo base_url(); ?>penjualan/retur_penjualangb" class="list-group-item list-group-item-action">
        <i class="fa fa-object-ungroup mr-2"></i>Retur Ganti Barang
      </a>
      <a href="<?php echo base_url(); ?>penjualan/retur" class="list-group-item list-group-item-action">
        <i class="fa fa-th mr-2"></i>Data Retur
      </a>
    </div>
  </div>

  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Pembayaran
      </a>
      <a href="<?php echo base_url(); ?>pembayaran/listbayar" class="list-group-item list-group-item-action">
        <i class="fa fa-money mr-2"></i>Bayar Piutang
      </a>
      <a href="<?php echo base_url(); ?>penjualan/listgiro" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Giro
      </a>
      <a href="<?php echo base_url(); ?>penjualan/listtransfer" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Transfer
      </a>
    </div>
  </div>
  <?php if ($id_user != 234) { ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Data Pengajuan
        </a>
        <a href="<?php echo base_url(); ?>penjualan/limitkreditv3" class="list-group-item list-group-item-action">
          <i class="fa fa-money mr-2"></i>Pengajuan Limit Kredit
        </a>
        <?php if ($id_user != 9) { ?>
          <a href="<?php echo base_url(); ?>penjualan/jatuhtempo" class="list-group-item list-group-item-action">
            <i class="fa fa-calendar-times-o mr-2"></i>Pengajuan Jatuh Tempo
          </a>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kartupiutang" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Kartu Piutang
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/aup" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>AUP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/tunaikredit" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Tunai Kredit
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lebihsatufaktur" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Lebih 1 Faktur
      </a>
	  <a href="<?php echo base_url(); ?>laporanpenjualan/dpp" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPP
      </a>
      <?php if ($id_user != 9 and $id_user != 34  and $id_user != 197) { ?>
        <a href="<?php echo base_url(); ?>laporanpenjualan/lapdppp_v2" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i>DPPP V2
        </a>
        <?php if ($id_user != 234 and $id_user != 34) { ?>
          <a href="<?php echo base_url(); ?>laporanpenjualan/repo" class="list-group-item list-group-item-action">
            <i class="fa fa-file mr-2"></i>REPO
          </a>
        <?php } ?>
      <?php } ?>

      <?php if ($id_user != 234) { ?>
        <a href="<?php echo base_url(); ?>laporanpenjualan/rekapomset" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i>Rekap Omset Pelanggan
        </a>
      <?php } ?>
      <?php if ($id_user != 34  and $id_user != 197) { ?>
        <a href="<?php echo base_url(); ?>laporanpenjualan/rekappelanggan" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i>Rekap Pelanggan
        </a>
      <?php } ?>
      <?php if ($id_user != 163 and $id_user != 234) { ?>
        <a href="<?php echo base_url(); ?>laporanpenjualan/penjualanpending" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i>Penjualan Pending
        </a>
      <?php } ?>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappenjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Penjualan
      </a>
      <?php if ($level == "kepala admin") { ?>
        <a href="<?php echo base_url(); ?>komisi/insentif" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i>Insentif
        </a>
      <?php } ?>
    </div>
  </div>
<?php } else if ($level == "audit" || $level == "manager accounting") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Penjualan
      </a>
      <a href="<?php echo base_url(); ?>penjualan/penjualanpend" class="list-group-item list-group-item-action">
        <i class="fa fa-history mr-2"></i>Penjualan Pending
      </a>
      <a href="<?php echo base_url(); ?>penjualan/limitkreditv3" class="list-group-item list-group-item-action">
        <i class="fa fa-money mr-2"></i>Pengajuan Limit Kredit
      </a>
      <a href="<?php echo base_url(); ?>penjualan/jatuhtempo" class="list-group-item list-group-item-action">
        <i class="fa fa-money mr-2"></i>Pengajuan Jatuh Tempo
      </a>
      <a href="<?php echo base_url(); ?>pembayaran" class="list-group-item list-group-item-action">
        <i class="fa fa-balance-scale mr-2"></i>Histori Penjualan Pelanggan
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Approval Pengajuan
      </a>
      <a href="<?php echo base_url(); ?>penjualan/approvallimitv3" class="list-group-item list-group-item-action">
        <i class="fa fa-check-square mr-2"></i>Approval Limit Kredit
      </a>
      <a href="<?php echo base_url(); ?>penjualan/approvejatuhtempo" class="list-group-item list-group-item-action">
        <i class="fa fa-calendar-check-o mr-2"></i>Approval Jatuh Tempo
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kartupiutang" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Kartu Piutang
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/aup" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>AUP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/tunaikredit" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Tunai Kredit
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lebihsatufaktur" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Lebih 1 Faktur
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lapdppp_v2" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPPP V2
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/repo" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>REPO
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/dpp" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapomset" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Omset Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappelanggan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappenjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapproduk" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Penjualan Produk
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualanpending" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Penjualan Pending
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapkendaraan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Kendaraan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/harganet" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Harga NET
      </a>
    </div>
  </div>
<?php } else if ($level == "general manager" || $level == "kepala cabang" || $level == "manager marketing") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Approval Pengajuan
      </a>
      <a href="<?php echo base_url(); ?>penjualan/approvallimitv3" class="list-group-item list-group-item-action">
        <i class="fa fa-check-square mr-2"></i>Approval Limit Kredit
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kartupiutang" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Kartu Piutang
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/aup" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>AUP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/tunaikredit" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Tunai Kredit
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lebihsatufaktur" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Lebih 1 Faktur
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lapdppp_v2" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPPP V2
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/repo" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>REPO
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/dpp" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapomset" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Omset Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappelanggan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Pelanggan
      </a>
    </div>
  </div>
<?php } else if ($level == "spv accounting") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Pembayaran
      </a>
      <a href="<?php echo base_url(); ?>pembayaran/listbayar" class="list-group-item list-group-item-action">
        <i class="fa fa-money mr-2"></i>Bayar Piutang
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kartupiutang" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Kartu Piutang
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/aup" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>AUP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/tunaikredit" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Tunai Kredit
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lebihsatufaktur" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Lebih 1 Faktur
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lapdppp_v2" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPPP V2
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/repo" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>REPO
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/dpp" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapomset" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Omset Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappelanggan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappenjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualanpending" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Penjualan Pending
      </a>

    </div>
  </div>
<?php } else if ($level == "supervisor cabang") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Master
      </a>
      <a href="<?php echo base_url(); ?>pelanggan/view_pelanggan" class="list-group-item list-group-item-action">Data Pelanggan</a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i> Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/kartupiutang" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Kartu Piutang
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/aup" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>AUP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/tunaikredit" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Tunai Kredit
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lebihsatufaktur" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Lebih 1 Faktur
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lapdppp_v2" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPPP V2
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/repo" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>REPO
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/dpp" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>DPP
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapomset" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Omset Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappelanggan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Pelanggan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekappenjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Rekap Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualanpending" class="list-group-item list-group-item-action">
        <i class="fa fa-file mr-2"></i>Penjualan Pending
      </a>

    </div>
  </div>
<?php } else if ($level == "keuangan") {
  $this->load->view('menu/menu_keuangan_administrator'); ?>
<?php } ?>
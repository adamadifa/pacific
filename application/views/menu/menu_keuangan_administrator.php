<?php
$id_user = $this->session->userdata('id_user');
$level = $this->session->userdata('level_user');
if ($level == "Administrator") {
  if ($this->session->userdata('id_user') != "11") {
?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Penjualan
        </a>
        <a href="<?php echo base_url(); ?>pembayaran/listgiro" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Giro
        </a>
        <a href="<?php echo base_url(); ?>pembayaran/listtransfer" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Transfer
        </a>
        <a href="<?php echo base_url(); ?>pembayaran/listtransferpenjpending" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Transfer Penjualan Pending
        </a>
      </div>
    </div>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Kas Besar
        </a>
        <a href="<?php echo base_url(); ?>penjualan/saldoawalkb" class="list-group-item list-group-item-action">
          <i class="fa fa-gears mr-2"></i>Saldo Awal Kas Besar
        </a>
        <a href="<?php echo base_url(); ?>penjualan/ceksetoranpusat" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Penerimaan Setoran
        </a>
      </div>
    </div>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Pembelian
        </a>
        <a href="<?php echo base_url(); ?>pembelian" class="list-group-item list-group-item-action">
          <i class="fa fa-shopping-cart mr-2"></i>Data Pembelian
        </a>
        <a href="<?php echo base_url(); ?>pembelian/kontrabonkeuangan" class="list-group-item list-group-item-action">
          <i class="fa fa-bookmark-o mr-2"></i>Kontrabon
        </a>
      </div>
    </div>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Kas Kecil
        </a>
        <a href="<?php echo base_url(); ?>kaskecil" class="list-group-item list-group-item-action">
          <i class="fa fa-book mr-2"></i>Kas Kecil
        </a>
        <a href="<?php echo base_url(); ?>kaskecil/klaim" class="list-group-item list-group-item-action">
          <i class="fa fa-file-archive-o mr-2"></i>Buat Klaim
        </a>
        <a href="<?php echo base_url(); ?>kaskecil/klaimcabang" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text-o mr-2"></i>Klaim Cabang
        </a>
        <a href="<?php echo base_url(); ?>kaskecil/penerimaankaskecil" class="list-group-item list-group-item-action">
          <i class="fa fa-file-text mr-2"></i>Penerimaan Kas Kecil
        </a>
      </div>
    </div>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Mutasi Bank
        </a>
        <a href="<?php echo base_url(); ?>kaskecil/mutasibank" class="list-group-item list-group-item-action">
          <i class="fa fa-bank mr-2"></i>Mutasi Bank
        </a>
      </div>
    </div>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Ledger
        </a>
        <a href="<?php echo base_url(); ?>keuangan/saldoledger" class="list-group-item list-group-item-action">
          <i class="fa fa-gear mr-2"></i>Saldo Awal Ledger
        </a>
        <a href="<?php echo base_url(); ?>keuangan/ledger" class="list-group-item list-group-item-action">
          <i class="fa fa-book mr-2"></i>Ledger
        </a>
      </div>
    </div>
  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/saldokasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Saldo Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualankasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Laporan Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/uanglogam" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Uang Logam
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapbg" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Rekap BG
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lpu" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>LPU
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/omset" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Omsets
      </a>
    </div>
  </div>
<?php } else if ($level == "keuangan") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Penjualan
      </a>
      <?php
      if ($this->session->userdata('username') == "nurman") {
      ?>
        <a href="<?php echo base_url(); ?>penjualan/setoranpenjualan" class="list-group-item list-group-item-action">
          <i class="fa fa-money mr-2"></i>Setoran Penjualan
        </a>
      <?php } ?>
      <a href="<?php echo base_url(); ?>pembayaran/listgiro" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Giro
      </a>
      <a href="<?php echo base_url(); ?>pembayaran/listtransfer" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Transfer
      </a>
      <a href="<?php echo base_url(); ?>pembayaran/listtransferpenjpending" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Transfer Penjualan Pending
      </a>

    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>penjualan/saldoawalkb" class="list-group-item list-group-item-action">
        <i class="fa fa-gears mr-2"></i>Saldo Awal Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>penjualan/ceksetoranpusat" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Penerimaan Setoran
      </a>
    </div>
  </div>
  <?php
  if ($this->session->userdata('username') != "nurmans") {
  ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Pembelian
        </a>
        <a href="<?php echo base_url(); ?>pembelian" class="list-group-item list-group-item-action">
          <i class="fa fa-shopping-cart mr-2"></i>Data Pembelian
        </a>
        <a href="<?php echo base_url(); ?>pembelian/kontrabonkeuangan" class="list-group-item list-group-item-action">
          <i class="fa fa-bookmark-o mr-2"></i>Kontrabon
        </a>
      </div>
    </div>
  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Kas Kecil
      </a>
      <?php
      if ($this->session->userdata('username') != "nurman") {
      ?>
      <?php } ?>
      <a href="<?php echo base_url(); ?>kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-book mr-2"></i>Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/klaim" class="list-group-item list-group-item-action">
        <i class="fa fa-file-archive-o mr-2"></i>Buat Klaim
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/klaimcabang" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text-o mr-2"></i>Klaim Cabang
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/penerimaankaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Penerimaan Kas Kecil
      </a>
    </div>
  </div>

  <?php
  if ($this->session->userdata('username') == "siskapusat" || $this->session->userdata('username') == "nurman") {
  ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Angkutan
        </a>
        <a href="<?php echo base_url(); ?>angkutan/kontrabon" class="list-group-item list-group-item-action">
          <i class="fa fa-book mr-2"></i>Kontrabon Angkutan
        </a>
        <a href="<?php echo base_url(); ?>angkutan/angkutan" class="list-group-item list-group-item-action">
          <i class="fa fa-book mr-2"></i>Laporan Angkutan
        </a>
      </div>
    </div>
  <?php } ?>
  <?php
  if ($this->session->userdata('username') == "ika") {
  ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Angkutan
        </a>
        <a href="<?php echo base_url(); ?>angkutan/kontrabon" class="list-group-item list-group-item-action">
          <i class="fa fa-book mr-2"></i>Kontrabon Angkutan
        </a>
        <a href="<?php echo base_url(); ?>angkutan/angkutan" class="list-group-item list-group-item-action">
          <i class="fa fa-book mr-2"></i>Laporan Angkutan
        </a>
      </div>
    </div>
  <?php } ?>
  <?php
  if ($this->session->userdata('username') != "siskapusat" && $this->session->userdata('username') != "nurman") {
  ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Ledger
        </a>
        <a href="<?php echo base_url(); ?>keuangan/saldoledger" class="list-group-item list-group-item-action">
          <i class="fa fa-gear mr-2"></i>Saldo Awal Ledger
        </a>
        <a href="<?php echo base_url(); ?>keuangan/ledger" class="list-group-item list-group-item-action">
          <i class="fa fa-book mr-2"></i>Ledger
        </a>
      </div>
    </div>
  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <?php
      if ($this->session->userdata('username') != "siskapusat" && $this->session->userdata('username') != "nurman") {
      ?>
        <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
          <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
        </a>
        <a href="<?php echo base_url(); ?>laporanpenjualan/kasbesar" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i> Kas Besar
        </a>
      <?php } ?>
      <a href="<?php echo base_url(); ?>laporanpenjualan/saldokasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Saldo Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualankasbesar" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Laporan Penjualan Kas Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/penjualan" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Laporan Penjualan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/uanglogam" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Uang Logam
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/rekapbg" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Rekap BG
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/lpu" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>LPU
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/omset" class="list-group-item list-group-item-action">
        <i class="fa fa-file-pdf-o mr-2"></i>Omset
      </a>

      <?php
      if ($this->session->userdata('username') != "siskapusat" && $this->session->userdata('username') != "nurman") {
      ?>
        <a href="<?php echo base_url(); ?>laporanpenjualan/tunaikredit" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i>Tunai Kredit
        </a>
        <a href="<?php echo base_url(); ?>laporanpenjualan/kartupiutang" class="list-group-item list-group-item-action">
          <i class="fa fa-file mr-2"></i>Kartu Piutang
        </a>
        <?php if ($this->session->userdata('username') != "ika") { ?>
          <a href="<?php echo base_url(); ?>laporangudangjadi/persediaan" class="list-group-item list-group-item-action">
            <i class="fa  fa-file-text-o mr-2"></i>Persediaan Barang
          </a>
          <a href="<?php echo base_url(); ?>laporangudangjadi/rekappersediaan" class="list-group-item list-group-item-action">
            <i class="fa  fa-file-text-o mr-2"></i>Rekap Persediaan
          </a>
        <?php } ?>
      <?php } ?>
      <?php if ($this->session->userdata('id_user') == "72") { ?>
        <a href="<?php echo base_url(); ?>komisi/laporankomisi" class="list-group-item list-group-item-action">
          <i class="fa fa-file-o mr-2"></i>Komisi
        </a>
        <a href="<?php echo base_url(); ?>komisi/insentif" class="list-group-item list-group-item-action">
          <i class="fa fa-file-o mr-2"></i>Insentif KA Admin
        </a>
      <?php } ?>
    </div>
  </div>
<?php } else if ($level == "audit") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Penjualan
      </a>
      <a href="<?php echo base_url(); ?>pembayaran/listgiro" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Giro
      </a>
      <a href="<?php echo base_url(); ?>pembayaran/listtransfer" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Transfer
      </a>
      <a href="<?php echo base_url(); ?>penjualan/ceksetoranpusat" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Penerimaan Setoran
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
      </a>
    </div>
  </div>
<?php } else if ($level == "general manager" || $level == "kepala cabang" || $level == "admin pembelian") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <?php if ($this->session->userdata('id_user') != "29") { ?>
        <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
          <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
        </a>
      <?php } ?>
    </div>
  </div>
<?php } else if ($level == "kepala admin" || $level == "spv cabang") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-book mr-2"></i>Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/klaim" class="list-group-item list-group-item-action">
        <i class="fa fa-file-archive-o mr-2"></i>Buat Klaim
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/klaimcabang" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text-o mr-2"></i>Klaim Cabang
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/penerimaankaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Penerimaan Kas Kecil
      </a>
    </div>
  </div>
  <?php if ($id_user != 161) { ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Mutasi Bank
        </a>
        <a href="<?php echo base_url(); ?>kaskecil/mutasibank" class="list-group-item list-group-item-action">
          <i class="fa fa-bank mr-2"></i>Mutasi Bank
        </a>
      </div>
    </div>
  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <?php if ($id_user != 161 and $id_user != 230) { ?>
        <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
          <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
        </a>
      <?php } ?>
    </div>
  </div>
<?php } else if ($level == "keuangan2") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-book mr-2"></i>Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/klaim" class="list-group-item list-group-item-action">
        <i class="fa fa-file-archive-o mr-2"></i>Buat Klaim
      </a>

      <a href="<?php echo base_url(); ?>kaskecil/penerimaankaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Penerimaan Kas Kecil
      </a>
    </div>
  </div>
  <?php if ($id_user != 58) { ?>
    <div class="card">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Mutasi Bank
        </a>
        <a href="<?php echo base_url(); ?>kaskecil/mutasibank" class="list-group-item list-group-item-action">
          <i class="fa fa-bank mr-2"></i>Mutasi Bank
        </a>
      </div>
    </div>
  <?php } ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <?php if ($id_user != 58) { ?>
        <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
          <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
        </a>
      <?php } ?>
    </div>
  </div>
<?php } else if ($level == "manager marketing") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
      </a>
    </div>
  </div>
<?php } else if ($level == "manager accounting"  || $level == "spv accounting") { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Klaim
      </a>
      <a href="<?php echo base_url(); ?>kaskecil/klaimcabang" class="list-group-item list-group-item-action">
        <i class="fa fa-book mr-2"></i>Klaim Cabang
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Ledger
      </a>
      <a href="<?php echo base_url(); ?>keuangan/ledger" class="list-group-item list-group-item-action">
        <i class="fa fa-book mr-2"></i>Ledger
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporankaskecil/kaskecil" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Kas Kecil
      </a>
      <a href="<?php echo base_url(); ?>laporankeuangan/ledger" class="list-group-item list-group-item-action">
        <i class="fa fa-file-o mr-2"></i>Ledger / Mutasi Bank
      </a>
      <a href="<?php echo base_url(); ?>angkutan/angkutan" class="list-group-item list-group-item-action">
        <i class="fa fa-book mr-2"></i>Laporan Angkutan
      </a>
    </div>
  </div>

<?php } ?>
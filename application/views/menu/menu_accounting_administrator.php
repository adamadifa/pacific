<?php
$level = $this->session->userdata('level_user');
if ($level == "Administrator" || $level == "manager accounting" || $level == "spv accounting") {
?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        COA
      </a>
      <a href="<?php echo base_url(); ?>coa" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>COA
      </a>
      <a href="<?php echo base_url(); ?>coa/setcoacabang" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>COA Cabang
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Gudang Jadi
      </a>
      <a href="<?php echo base_url(); ?>accounting/inputhpp" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Input HPP
      </a>
      <a href="<?php echo base_url(); ?>accounting/inputhargaawal" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Input Saldo Awal Harga
      </a>
      <a href="<?php echo base_url(); ?>laporangudangjadi/rekaphpp" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Rekap Persediaan Barang Jadi
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Cost Ratio
      </a>

      <a href="<?php echo base_url(); ?>accounting/costratiobiaya" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Ratio Biaya
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Jurnal Umum
      </a>
      <a href="<?php echo base_url(); ?>accounting/view_jurnal_umum" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Jurnal Umum
      </a>
      <a href="<?php echo base_url(); ?>laporanaccounting/frmjurnalumum" class="list-group-item list-group-item-action">
        <i class="fa  fa-print mr-2"></i>Cetak Jurnal Umum
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Buku Besar
      </a>
      <a href="<?php echo base_url(); ?>accounting/view_saldoawal" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Saldo Awal Buku Besar
      </a>
      <a href="<?php echo base_url(); ?>accounting/view_accounting" class="list-group-item list-group-item-action">
        <i class="fa fa-file-text mr-2"></i>Buku Besar
      </a>
      <a href="<?php echo base_url(); ?>laporanaccounting/frmbukubesar" class="list-group-item list-group-item-action">
        <i class="fa fa-print mr-2"></i>Cetak Buku Besar
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Komisi & Insentif
      </a>
      <a href="<?php echo base_url(); ?>komisi/approvetargetkomisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Approve Target Komisi
      </a>
      <a href="<?php echo base_url(); ?>penjualan/input_lpc" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Approve LPC
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>

      <a href="<?php echo base_url(); ?>laporanpenjualan/costratio" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Rasio
      </a>
      <a href="<?php echo base_url(); ?>komisi/laporankomisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Komisi
      </a>
      <a href="<?php echo base_url(); ?>komisi/insentif" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Insentif KA Admin
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/detail_costratio" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Detail Cost Rasio
      </a>
    </div>
  </div>
<?php } else { ?>

  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Cost Ratio
      </a>

      <a href="<?php echo base_url(); ?>accounting/costratiobiaya" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Ratio Biaya
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/costratio" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Cost Rasio
      </a>
      <a href="<?php echo base_url(); ?>laporanpenjualan/detail_costratio" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Detail Cost Rasio
      </a>
    </div>
  </div>
<?php } ?>
<?php
$level = $this->session->userdata('level_user');
if ($level == "Administrator") {
?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Order Management (OMAN)
      </a>

      <a href="<?php echo base_url(); ?>oman" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Order Management (OMAN)
      </a>
      <a href="<?php echo base_url(); ?>oman/omancabang" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Order Management Cabang
      </a>
      <a href="<?php echo base_url(); ?>oman/permintaan_pengiriman" class="list-group-item list-group-item-action">
        <i class="fa  fa-truck mr-2"></i>Permintaan Pengiriman
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Saldo Awal Piutang
      </a>
      <a href="<?php echo base_url(); ?>komisi/saldoawalpiutang" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Saldo Awal Piutang
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Komisi
      </a>
      <a href="<?php echo base_url(); ?>komisi/set_ratio_komisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Set Ratio Komisi
        <a href="<?php echo base_url(); ?>komisi/approvle_targetkomisi" class="list-group-item list-group-item-action">
          <i class="fa  fa-file-text mr-2"></i>Input Target Komisi
        </a>
        <a href="<?php echo base_url(); ?>komisi/approvetargetkomisi" class="list-group-item list-group-item-action">
          <i class="fa  fa-file-text mr-2"></i>Approve Target Komisi
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

    </div>
  </div>
<?php
} else if ($level == "admin gudang pusat") {
  $this->load->view('menu/menu_gudangpusat_administrator');
} else if ($level == "admin gudang") {
  $this->load->view('menu/menu_gudangcabang_administrator');
} else if ($level == "kepala admin" || $level == "kepala cabang") { ?>

  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Komisi
      </a>

      <a href="<?php echo base_url(); ?>komisi/approvle_targetkomisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Input Target Komisi
      </a>
      <a href="<?php echo base_url(); ?>komisi/approvetargetkomisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Approve Target Komisi
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Laporan
      </a>
      <a href="<?php echo base_url(); ?>komisi/laporankomisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Komisi
      </a>
    </div>
  </div>
<?php } else if ($level == "manager marketing") { ?>

  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Order Management (OMAN)
      </a>

      <a href="<?php echo base_url(); ?>oman" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Order Management (OMAN)
      </a>
      <a href="<?php echo base_url(); ?>oman/omancabang" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Order Management Cabang
      </a>
      <a href="<?php echo base_url(); ?>oman/permintaan_pengiriman" class="list-group-item list-group-item-action">
        <i class="fa  fa-truck mr-2"></i>Permintaan Pengiriman
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Komisi
      </a>
      <a href="<?php echo base_url(); ?>komisi/approvetargetkomisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Approve Target Komisi
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

    </div>
  </div>
<?php } else if ($level == "general manager") { ?>

  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Order Management (OMAN)
      </a>

      <a href="<?php echo base_url(); ?>oman" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Order Management (OMAN)
      </a>
      <a href="<?php echo base_url(); ?>oman/omancabang" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Order Management Cabang
      </a>
      <a href="<?php echo base_url(); ?>oman/permintaan_pengiriman" class="list-group-item list-group-item-action">
        <i class="fa  fa-truck mr-2"></i>Permintaan Pengiriman
      </a>
    </div>
  </div>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        Data Komisi
      </a>
      <a href="<?php echo base_url(); ?>komisi/approvetargetkomisi" class="list-group-item list-group-item-action">
        <i class="fa  fa-file-text mr-2"></i>Approve Target Komisi
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

    </div>
  </div>
<?php } ?>
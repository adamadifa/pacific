<?php
$level = $this->session->userdata('level_user');
if ($level == 'Administrator' || $level == 'admin mtc') { ?>

  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        DATA TRANSAKSI
      </a>
      <a href="<?php echo base_url(); ?>bahan_bakar/pembelian" class="list-group-item list-group-item-action">
        <i class="fa  fa-list mr-2"></i>PEMBELIAN
      </a>
      <a href="<?php echo base_url(); ?>bahan_bakar/pemasukan" class="list-group-item list-group-item-action">
        <i class="fa  fa-send mr-2"></i>PEMASUKAN
      </a>
      <a href="<?php echo base_url(); ?>bahan_bakar/pengeluaran" class="list-group-item list-group-item-action">
        <i class="fa  fa-share mr-2"></i>PENGELUARAN
      </a>
    </div>
  </div>
<?php } ?>

<?php
$level = $this->session->userdata('level_user');
if ($level == 'Administrator' || $level == 'admin mtc'  || $level == 'manager mtc') { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        LAPORAN
      </a>
      <a href="<?php echo base_url(); ?>bahan_bakar/rekap_bahan_bakar" class="list-group-item list-group-item-action">
        <i class="fa  fa-copy mr-2"></i>REKAP BAHAN BAKAR
      </a>
    </div>
  </div>
<?php } ?>

<?php if ($level == 'manager accounting' ||  $level == 'spv accounting') { ?>
  <div class="card">
    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action active">
        LAPORAN MAINTENANCE
      </a>
      <a href="<?php echo base_url(); ?>bahan_bakar/rekap_bahan_bakar" class="list-group-item list-group-item-action">
        <i class="fa  fa-copy mr-2"></i>REKAP BAHAN BAKAR
      </a>
    </div>
  </div>
<?php } ?>
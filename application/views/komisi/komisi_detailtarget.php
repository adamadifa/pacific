<table class="table table-bordered table-striped" style="font-size:11px">
  <thead class="thead-dark" style="text-align:center;">
    <tr>
      <th rowspan="2">ID Sales</th>
      <th rowspan="2">Nama Sales</th>
      <th colspan="<?php echo $jmlproduk; ?>">Target Quantity</th>
    </tr>
    <tr>
      <?php foreach ($produk as $p) { ?>
        <th><?php echo $p->kode_produk; ?></th>
      <?php } ?>
    </tr>
  </thead>
  <?php foreach ($salesman as $s) { ?>
    <tr>
      <td style="width:10%"><?php echo $s->id_karyawan; ?></td>
      <td style="width:10%"><?php echo $s->nama_karyawan; ?></td>
      <?php foreach ($produk as $p) {
        $cekvaluetarget = $this->db->get_where('komisi_target_qty_detail', array('kode_target' => $kodetarget, 'id_karyawan' => $s->id_karyawan, 'kode_produk' => $p->kode_produk))->row_array();

      ?>
        <td style="text-align: right;">
          <?php if (!empty($cekvaluetarget['jumlah_target'])) {
            echo number_format($cekvaluetarget['jumlah_target'], '0', '', '.');
          } ?>
        </td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>

<table class="table table-bordered table-striped" style="font-size:11px; width:60%">
  <thead class="thead-dark" style="text-align:center;">
    <tr>
      <th>ID Sales</th>
      <th>Nama Sales</th>
      <th>Target Cashin</th>
    </tr>

  </thead>
  <?php foreach ($salesman as $s) {
    $cekvaluetarget = $this->db->get_where('komisi_target_cashin_detail', array('kode_target' => $kodetarget, 'id_karyawan' => $s->id_karyawan))->row_array(); ?>
    <tr>
      <td><?php echo $s->id_karyawan; ?></td>
      <td><?php echo $s->nama_karyawan; ?></td>
      <td style="text-align: right;">
        <?php if (!empty($cekvaluetarget['jumlah_target_cashin'])) {
          echo number_format($cekvaluetarget['jumlah_target_cashin'], '0', '', '.');
        } ?>
      </td>

    </tr>
  <?php } ?>
</table>
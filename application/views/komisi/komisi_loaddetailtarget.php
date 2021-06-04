<?php foreach ($salesman as $s) { ?>
  <tr>
    <td style="width:10%"><?php echo $s->id_karyawan; ?></td>
    <td style="width:10%"><?php echo $s->nama_karyawan; ?></td>
    <?php foreach ($produk as $p) {
      $cekvaluetarget = $this->db->get_where('komisi_target_qty_detail', array('kode_target' => $kodetarget, 'id_karyawan' => $s->id_karyawan, 'kode_produk' => $p->kode_produk))->row_array();
      if ($cekvaluetarget['jumlah_target'] > 0) {
        $bgcolor = "#d1ff7a";
      } else {
        $bgcolor = "";
      }
    ?>
      <td><?php echo $cekvaluetarget['jumlah_target']; ?></td>
    <?php } ?>
  </tr>
<?php } ?>
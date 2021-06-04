<?php foreach ($salesman as $s) {
  $cekvaluetarget = $this->db->get_where('komisi_target_cashin_detail', array('kode_target' => $kodetarget, 'id_karyawan' => $s->id_karyawan))->row_array();
  if ($cekvaluetarget['jumlah_target_cashin'] > 0) {
    $bgcolor = "#d1ff7a";
  } else {
    $bgcolor = "";
  }
?>
  <tr>
    <td style="width:20%"><?php echo $s->id_karyawan; ?></td>
    <td style="width:20%"><?php echo $s->nama_karyawan; ?></td>
    <td><?php echo number_format($cekvaluetarget['jumlah_target_cashin'], '0', '', '.'); ?></td>
  </tr>
<?php } ?>

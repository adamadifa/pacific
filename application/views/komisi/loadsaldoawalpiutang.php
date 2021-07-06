<?php
$no = 1;
foreach ($piutang as $p) {
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $p->id_karyawan; ?></td>
    <td><?php echo $p->nama_karyawan; ?></td>
    <td align="right"><?php echo number_format($p->saldo_piutang, 0, '', '.'); ?></td>
  </tr>
<?php
  $no++;
}
?>
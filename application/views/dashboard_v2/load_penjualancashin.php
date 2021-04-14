<table class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>CABANG</th>
      <th>TUNAI KREDIT</th>
      <th>CASH IN</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($pnj as $d) { ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo strtoupper($d->nama_cabang); ?></td>
        <td align="right"><?php echo number_format($d->netto, '0', '', '.'); ?></td>
        <td align="right"><?php echo number_format($d->totalbayar, '0', '', '.'); ?></td>
      </tr>
    <?php
      $no++;
    } ?>
  </tbody>
</table>
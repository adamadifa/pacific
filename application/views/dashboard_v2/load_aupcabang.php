<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>KODE SALES</th>
      <th>SALESMAN</th>
      <th>1 S/D 15</th>
      <th>16 S/D 31</th>
      <th>32 S/D 45</th>
      <th>46 S/D 2B</th>
      <th>2B S/D 3B</th>
      <th>3B S/D 6B</th>
      <th>6B+</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($aup as $d) { ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo strtoupper(($d->salesbarunew)); ?></td>
        <td><?php echo strtoupper(($d->nama_sales)); ?></td>
        <td align="right"><?php echo number_format($d->duaminggu, '0', '', '.'); ?></td>
        <td align="right"><?php echo number_format($d->satubulan, '0', '', '.'); ?></td>
        <td align="right"><?php echo number_format($d->satubulan15, '0', '', '.'); ?></td>
        <td align="right"><?php echo number_format($d->duabulan, '0', '', '.'); ?></td>
        <td align="right"><?php echo number_format($d->tigabulan, '0', '', '.'); ?></td>
        <td align="right"><?php echo number_format($d->enambulan, '0', '', '.'); ?></td>
        <td align="right"><?php echo number_format($d->lebihenambulan, '0', '', '.'); ?></td>

      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>
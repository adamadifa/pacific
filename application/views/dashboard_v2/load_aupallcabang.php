<table class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>CABANG</th>
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
    <?php
    $no = 1;
    $totalduaminggu = 0;
    $totalsatubulan = 0;
    $totalsatubulan15 = 0;
    $totalduabulan = 0;
    $totaltigabulan = 0;
    $totalenambulan = 0;
    $totallebihenambulan = 0;
    foreach ($aup as $d) {
      $totalduaminggu += $d->duaminggu;
      $totalsatubulan  += $d->satubulan;
      $totalsatubulan15 += $d->satubulan15;
      $totalduabulan += $d->duabulan;
      $totaltigabulan += $d->tigabulan;
      $totalenambulan += $d->enambulan;
      $totallebihenambulan += $d->lebihenambulan;
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo strtoupper(($d->cabangbarunew)); ?></td>
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
    <tr style="font-weight: bold;">
      <td colspan="2">TOTAL</td>
      <td align="right"><?php echo number_format($totalduaminggu, '0', '', '.'); ?></td>
      <td align="right"><?php echo number_format($totalsatubulan, '0', '', '.'); ?></td>
      <td align="right"><?php echo number_format($totalsatubulan15, '0', '', '.'); ?></td>
      <td align="right"><?php echo number_format($totalduabulan, '0', '', '.'); ?></td>
      <td align="right"><?php echo number_format($totaltigabulan, '0', '', '.'); ?></td>
      <td align="right"><?php echo number_format($totalenambulan, '0', '', '.'); ?></td>
      <td align="right"><?php echo number_format($totallebihenambulan, '0', '', '.'); ?></td>
    </tr>
  </tbody>
</table>
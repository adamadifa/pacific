<table class="table table-bordered table-striped table-hover">
  <thead class="thead-dark">
    <tr style="text-align: center;">
      <th>#</th>
      <th>No Polisi</th>
      <th>Jenis</th>
      <th>Kbrgktn</th>
      <th>Penjualan</th>
      <th>Rata Rata</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
    foreach ($kendaraan as $d) {
      if (!empty($d->jml_berangkat)) {
        $jmlberangkat = $d->jml_berangkat . " x";
        $rataratapnj = ROUND($d->jmlpenjualan / $d->jml_berangkat, 2);
      } else {
        $jmlberangkat = "";
        $rataratapnj = "";
      }
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->no_polisi; ?></td>
        <td><?php echo $d->model; ?></td>
        <td align="center"><?php echo $jmlberangkat; ?></td>
        <td align="right"><?php echo $d->jmlpenjualan; ?></td>
        <td align="right"><?php echo $rataratapnj; ?></td>
      </tr>
    <?php
      $no++;
    }
    ?>
  </tbody>
</table>
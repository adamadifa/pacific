<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr style="font-weight:bold">
      <th>Kode Retur</th>
      <th>Tanggal Retur</th>
      <th>Kode Supplier</th>
      <th>Supplier</th>
    </tr>
    <tr>
    <td><?php echo $data['kode_retur'];?></td>
    <td><?php echo $data['tanggal'];?></td>
    <td><?php echo $data['kode_supplier'];?></td>
    <td><?php echo $data['nama_supplier'];?></td>
    </tr>
  </thead>
</table>
<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Keterangan</th>
      <th>Bruto</th>
      <th>Berat Roll</th>
      <th>Netto</th>
      <th>Berat PCS</th>
      <th>Tinggi</th>
      <th>Panjang</th>
      <th>Jml Meter</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $no = 1;
      foreach ($detail as $key => $d) { 
      $netto = $d->bruto-$d->berat_roll;
    ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $d->kode_barang; ?></td>
          <td><?php echo $d->nama_barang; ?></td>
          <td><?php echo $d->keterangan; ?></td>
          <td align="right"><?php echo number_format($d->bruto, 2); ?></td>
          <td><?php echo number_format($d->berat_roll, 2); ?></td>
          <td><?php echo number_format($netto, 2); ?></td>
          <td><?php echo number_format($d->berat_pcs, 2); ?></td>
          <td><?php echo number_format($d->tinggi, 2); ?></td>
          <td><?php echo number_format($d->panjang, 2); ?></td>
          <td><?php echo number_format(($netto/$d->berat_pcs)*($d->tinggi/$d->panjang), 2); ?></td>
        </tr>
    <?php  } ?>
  </tbody>
</table>
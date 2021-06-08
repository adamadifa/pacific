<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr style="font-weight:bold">
      <th>NO Bukti</th>
      <th>Tanggal Pemasukan</th>
      <th>Kode Supplier</th>
      <th>Nama Supplier</th>
    </tr>
    <tr>
      <td><?php echo $data['nobukti_pemasukan']; ?></td>
      <td><?php echo DateToIndo2($data['tgl_pemasukan']); ?></td>
      <td><?php echo $data['kode_supplier']; ?></td>
      <td><?php echo $data['nama_supplier']; ?></td>
    </tr>
  </thead>
</table>
<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Satuan</th>
      <th>Ket</th>
      <th>Qty</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no     = 1;
    $total  = 0;
    foreach ($detail->result() as $d) {
      $total = $total + $d->qty;
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <td><?php echo $d->keterangan; ?></td>
        <td><?php echo $d->qty; ?></td>
      </tr>
    <?php $no++;
    }  ?>
    <tr>
      <th colspan="5">TOTAL</th>
      <td align="left"><b> <?php echo number_format($total, '2', ',', '.'); ?></b></td>
    </tr>
  </tbody>
</table>
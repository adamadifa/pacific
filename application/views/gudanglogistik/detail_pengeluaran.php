<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr style="font-weight:bold">
      <th>Tanggal</th>
      <th>NO Bukti</th>
      <th>Departemen</th>
    </tr>
    <tr>
      <td><?php echo DateToIndo2($data['tgl_pengeluaran']); ?></td>
      <td><?php echo $data['nobukti_pengeluaran']; ?></td>
      <td><?php echo $data['nama_dept']; ?></td>
    </tr>
  </thead>
</table>
<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Ket</th>
      <th>Cabang</th>
      <th>Qty</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no     = 1;
    foreach ($detail->result() as $d) {
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->keterangan; ?></td>
        <td><?php echo $d->nama_cabang; ?></td>
        <td><?php echo $d->qty; ?></td>
      </tr>
    <?php $no++;
    }  ?>
  </tbody>
</table>
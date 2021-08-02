<table class="table table-bordered table-hover table-striped">
  <thead class="thead-dark">
    <tr style="font-weight:bold">
      <th>NO Bukti</th>
      <th>Tanggal Pemasukan</th>
      <th>Nama Pemohon</th>
      <th>Cabang</th>
    </tr>
    <tr>
      <td><?php echo $data['nobukti']; ?></td>
      <td><?php echo DateToIndo2($data['tanggal']); ?></td>
      <td><?php echo $data['nama_lengkap']; ?></td>
      <td><?php echo $data['kode_cabang']; ?></td>
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
      <th>Kebutuhan</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no     = 1;
    $total  = 0;
    foreach ($detail->result() as $d) {
      $total = $total + $d->jumlah;
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <td><?php echo $d->keterangan; ?></td>
        <td align="center"><?php echo $d->jumlah; ?></td>
      </tr>
    <?php $no++;
    }  ?>
    <tr>
      <th colspan="5">TOTAL</th>
      <td align="center"><b> <?php echo number_format($total, '0', ',', '.'); ?></b></td>
    </tr>
  </tbody>
</table>
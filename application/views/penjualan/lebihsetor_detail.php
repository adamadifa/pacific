<table class="table">
  <tr>
    <th>Kode Belum Setor</th>
    <td><?php echo $lebihsetor['kode_ls']; ?></td>
  </tr>
  <tr>
    <th>Bulan</th>
    <td><?php echo $lebihsetor['bulan']; ?></td>
  </tr>
  <tr>
    <th>Tahun</th>
    <td><?php echo $lebihsetor['tahun']; ?></td>
  </tr>
  <tr>
    <th>Tahun</th>
    <td><?php echo $lebihsetor['kode_cabang']; ?></td>
  </tr>
</table>
<table class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Tgl</th>
      <th>Bank</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <?php
  $no = 1;
  foreach ($detaillebihsetor as $d) {
  ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $d->tanggal_disetorkan; ?></td>
      <td><?php echo $d->nama_bank; ?></td>
      <td><?php echo number_format($d->jumlah, '0', '', '.'); ?></td>
    </tr>
  <?php
    $no++;
  }
  ?>

</table>

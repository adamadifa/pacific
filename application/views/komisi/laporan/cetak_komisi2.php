<?php
function formatnumber($nilai)
{

  return number_format($nilai, '2', ',', '.');
}

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:16px; font-family:Calibri">
  LAPORAN KOMISI<br>
  PERIODE BULAN <?= $bulan[$bln]; ?> TAHUN <?= $tahun; ?><br>
  CABANG <?= $cabang; ?>
</b>

<table class="datatable3">
  <thead>
    <tr>
      <th rowspan="2">NO</th>
      <th rowspan="2">ID KARYAWAN</th>
      <th rowspan="2">NAMA KARYAWAN</th>
      <th colspan="2">SELLING OUT</th>
      <th colspan="2">CASH IN</th>
      <th colspan="2">COLLECTION</th>
      <th rowspan="2">NILAI</th>
      <th rowspan="2">RASIO</th>
      <th rowspan="2">KOMISI</th>
      <th rowspan="2">POTONGAN PIUTANG</th>
      <th rowspan="2">KOMISI AKHIR</th>
    </tr>
    <tr>
      <th>TARGET</th>
      <th>REALISASI</th>
      <th>TARGET</th>
      <th>REALISASI</th>
      <th>TARGET</th>
      <th>REALISASI</th>
    </tr>
  </thead>
  <tbody style="font-size:14px !important">
    <?php
    $no = 1;
    foreach ($komisi as $k) {
      $totaltarget = $k->targetkategoriA + $k->targetkategoriB + $k->targetproductfocus;
      $totalrealisasi = $k->realisasitargetA + $k->realisasitargetB + $k->realisasitargetproductfocus;

    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $k->id_karyawan; ?></td>
        <td><?php echo $k->nama_karyawan; ?></td>
        <td align="right"><?php echo formatnumber($totaltarget); ?></td>
        <td align="right"><?php echo formatnumber($totalrealisasi); ?></td>
        <td align="right"><?php echo formatnumber($k->jumlah_target_cashin); ?></td>
        <td align="right"><?php echo formatnumber($k->jml_cashin); ?></td>
      </tr>
    <?php
      $no++;
    }
    ?>
  </tbody>
</table>
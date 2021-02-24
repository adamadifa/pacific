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
      <th colspan="3">TARGET & REALISASI KATEGORI A (BB)(50)</th>
      <th colspan="3">TARGET & REALISASI KATEGORI B (ALL AIDA)(30)</th>
      <th colspan="3">TARGET & REALISASI KATEGORI PF (PRODUCT FOCUS)(20)</th>
      <th rowspan="2">TOTAL POIN (A,B,PF)</th>
      <th colspan="4">TARGET & REALISASI CASHIN</th>
      <th rowspan="2"> PIUTANG JATUH TEMPO</th>
      <th rowspan="2">BF(%)</th>
      <th rowspan="2">TOTAL BF(%)</th>
    </tr>
    <tr>
      <th>TARGET</th>
      <th>REALISASI</th>
      <th>REALISASI/TARGET * 50</th>
      <th>TARGET</th>
      <th>REALISASI</th>
      <th>REALISASI/TARGET * 30</th>
      <th>TARGET</th>
      <th>REALISASI</th>
      <th>REALISASI/TARGET * 20</th>
      <th>TARGET</th>
      <th>REALISASI</th>
      <th>%</th>
      <th>BF(%)</th>
    </tr>
  </thead>
  <tbody style="font-size:14px !important">
    <?php
    $no = 1;
    $poinkategoriA = 50;
    $poinkategoriB = 30;
    $poinkategoriPF = 20;

    foreach ($komisi as $k) {
      if (!empty($k->targetkategoriA)) {
        $hasilkategoriA = ($k->realisasitargetA / $k->targetkategoriA) * $poinkategoriA;
      } else {
        $hasilkategoriA = 0;
      }

      if (!empty($k->targetkategoriB)) {
        $hasilkategoriB = ($k->realisasitargetB / $k->targetkategoriB) * $poinkategoriB;
      } else {
        $hasilkategoriB = 0;
      }

      if (!empty($k->targetproductfocus)) {
        $hasilkategoriPF = ($k->realisasitargetproductfocus / $k->targetproductfocus) * $poinkategoriPF;
      } else {
        $hasilkategoriPF = 0;
      }

      if (!empty($k->jumlah_target_cashin)) {
        $hasilcashin = ($k->jml_cashin / $k->jumlah_target_cashin) * 100;
      } else {
        $hasilcashin = 0;
      }

      if (!empty($k->jml_cashin)) {
        $bfjt = ($k->sisapiutang / $k->jml_cashin) * 100;
      } else {
        $bfjt = 0;
      }

      $totalpoin = ($hasilkategoriA + $hasilkategoriB + $hasilkategoriPF);
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $k->id_karyawan; ?></td>
        <td><?php echo $k->nama_karyawan; ?></td>
        <td align="right"><?php echo formatnumber($k->targetkategoriA); ?></td>
        <td align="right"><?php echo formatnumber($k->realisasitargetA); ?></td>
        <td align="right"><?php echo formatnumber($hasilkategoriA); ?></td>
        <td align="right"><?php echo formatnumber($k->targetkategoriB); ?></td>
        <td align="right"><?php echo formatnumber($k->realisasitargetB); ?></td>
        <td align="right"><?php echo formatnumber($hasilkategoriB); ?></td>
        <td align="right"><?php echo formatnumber($k->targetproductfocus); ?></td>
        <td align="right"><?php echo formatnumber($k->realisasitargetproductfocus); ?></td>
        <td align="right"><?php echo formatnumber($hasilkategoriPF); ?></td>
        <td align="right"><?php echo formatnumber($totalpoin); ?></td>
        <td align="right"><?php echo formatnumber($k->jumlah_target_cashin); ?></td>
        <td align="right"><?php echo formatnumber($k->jml_cashin); ?></td>
        <td align="right"><?php echo formatnumber($hasilcashin); ?></td>
        <td align="right"><?php if (!empty($totalpoin)) {
                            echo formatnumber(100 - $hasilcashin);
                          } ?></td>
        <td align="right"><?php echo formatnumber($k->sisapiutang); ?></td>
        <td align="right"><?php if (!empty($totalpoin)) {
                            echo formatnumber($bfjt);
                          } ?></td>
        <td align="right"><?php if (!empty($totalpoin)) {
                            echo formatnumber($bfjt + (100 - $hasilcashin));
                          } ?></td>
      </tr>
    <?php $no++;
    } ?>
  </tbody>
</table>
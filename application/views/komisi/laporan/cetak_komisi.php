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
      <th rowspan="3">NO</th>
      <th rowspan="3">ID KARYAWAN</th>
      <th rowspan="3">NAMA KARYAWAN</th>
      <th colspan="3" style="background-color: #35ce35;">TARGET & REALISASI BB & DEP</th>
      <th colspan="3" style="background-color: #ffcb00;">TARGET & REALISASI DS </th>
      <th colspan="3" style="background-color: #058cbe;">TARGET & REALISASI SP </th>
      <th colspan="3" style="background-color: #ce3ae4;">TARGET & REALISASI AR </th>
      <th colspan="3" style="background-color: #ff9b0d;">TARGET & REALISASI AS,AB,CG5</th>
      <th rowspan="3" style="background-color: #ff570d;">TOTAL POIN</th>
      <th rowspan="2" colspan="2" style="background-color: #9e9895;">CASH IN</th>
      <th rowspan="2" colspan="2" style="background-color: #ffd83e;">COLLECTION</th>
      <th rowspan="3" style="background-color: #ffd83e;">OVER DUE</th>
      <th rowspan="3" style="background-color: #ff570d;">PENALTY</th>
      <th rowspan="3">POIN AKHIR</th>


    </tr>
    <tr style="text-align: center;">
      <th colspan="3" style="background-color: #35ce35;">40</th>
      <th colspan="3" style="background-color: #ffcb00;">7.5</th>
      <th colspan="3" style="background-color: #058cbe;">15</th>
      <th colspan="3" style="background-color: #ce3ae4;">22.5</th>
      <th colspan="3" style="background-color: #ff9b0d;">15</th>
    </tr>
    <tr>
      <th style="background-color: #35ce35;">TARGET</th>
      <th style="background-color: #35ce35;">REALISASI</th>
      <th style="background-color: #35ce35;">POIN</th>
      <th style="background-color: #ffcb00;">TARGET</th>
      <th style="background-color: #ffcb00;">REALISASI</th>
      <th style="background-color: #ffcb00;">POIN</th>
      <th style="background-color: #058cbe;">TARGET</th>
      <th style="background-color: #058cbe;">REALISASI</th>
      <th style="background-color: #058cbe;">POIN</th>
      <th style="background-color: #ce3ae4;">TARGET</th>
      <th style="background-color: #ce3ae4;">REALISASI</th>
      <th style="background-color: #ce3ae4;">POIN</th>
      <th style="background-color: #ff9b0d;">TARGET</th>
      <th style="background-color: #ff9b0d;">REALISASI</th>
      <th style="background-color: #ff9b0d;">POIN</th>
      <th style="background-color: #9e9895;">TARGET</th>
      <th style="background-color: #9e9895;">REALISASI</th>
      <th style="background-color: #ffd83e;">TARGET</th>
      <th style="background-color: #ffd83e;">REALISASI</th>
    </tr>
  </thead>
  <tbody style="font-size:14px !important">
    <?php
    $no = 1;
    foreach ($komisi as $d) {
      $poinBBDP = 40;
      $poinDS = 7.5;
      $poinSP = 15;
      $poinAR = 22.5;
      $poinASABCG5 = 15;

      $ratioBBDP = $d->realisasi_BB_DP / $d->target_BB_DP;
      if ($ratioBBDP > 1) {
        $hasilpoinBBDP =  $poinBBDP;
      } else {
        $hasilpoinBBDP = $ratioBBDP * $poinBBDP;
      }

      $ratioDS = $d->realisasi_DS / $d->target_DS;
      if ($ratioDS > 1) {
        $hasilpoinDS =  $poinDS;
      } else {
        $hasilpoinDS = $ratioDS * $poinDS;
      }

      $ratioSP = $d->realisasi_SP / $d->target_SP;
      if ($ratioSP > 1) {
        $hasilpoinSP =  $poinSP;
      } else {
        $hasilpoinSP = $ratioSP * $poinSP;
      }

      $ratioAR = $d->realisasi_AR / $d->target_AR;
      if ($ratioAR > 1) {
        $hasilpoinAR =  $poinAR;
      } else {
        $hasilpoinAR = $ratioAR * $poinAR;
      }

      $ratioAB_AS_CG5 = $d->realisasi_AB_AS_CG5 / $d->target_AB_AS_CG5;
      if ($ratioAB_AS_CG5 > 1) {
        $hasilpoinAB_AS_CG5 =  $poinASABCG5;
      } else {
        $hasilpoinAB_AS_CG5 = $ratioAB_AS_CG5 * $poinASABCG5;
      }

      $totalpoin = $hasilpoinBBDP + $hasilpoinDS + $hasilpoinAR + $hasilpoinSP + $hasilpoinAB_AS_CG5;
      if (!empty($d->target_collection)) {
        $penalty = (($d->realisasi_collection / $d->target_collection) - 1) * $totalpoin;
      } else {
        $penalty = 0;
      }

      $poinakhir = $totalpoin - $penalty;
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->id_karyawan; ?></td>
        <td><?php echo $d->nama_karyawan; ?></td>
        <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($d->target_BB_DP); ?></td>
        <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($d->realisasi_BB_DP); ?></td>
        <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($hasilpoinBBDP); ?></td>
        <td align="right" style="background-color: #ffcb00;"><?php echo formatnumber($d->target_DS); ?></td>
        <td align="right" style="background-color: #ffcb00;"><?php echo formatnumber($d->realisasi_DS); ?></td>
        <td align="right" style="background-color: #ffcb00;"><?php echo formatnumber($hasilpoinDS); ?></td>
        <td align="right" style="background-color: #058cbe;"><?php echo formatnumber($d->target_SP); ?></td>
        <td align="right" style="background-color: #058cbe;"><?php echo formatnumber($d->realisasi_SP); ?></td>
        <td align="right" style="background-color: #058cbe;"><?php echo formatnumber($hasilpoinSP); ?></td>
        <td align="right" style="background-color: #ce3ae4;"><?php echo formatnumber($d->target_AR); ?></td>
        <td align="right" style="background-color: #ce3ae4;"><?php echo formatnumber($d->realisasi_AR); ?></td>
        <td align="right" style="background-color: #ce3ae4;"><?php echo formatnumber($hasilpoinAR); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($d->target_AB_AS_CG5); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($d->realisasi_AB_AS_CG5); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($hasilpoinAB_AS_CG5); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($totalpoin); ?></td>
        <td align="right" style="background-color: #9e9895;"><?php echo formatnumber($d->target_cashin); ?></td>
        <td align="right" style="background-color: #9e9895;"><?php echo formatnumber($d->realisasi_cashin); ?></td>
        <td align="right" style="background-color: #ffd83e;"><?php echo formatnumber($d->target_collection); ?></td>
        <td align="right" style="background-color: #ffd83e;"><?php echo formatnumber($d->realisasi_collection); ?></td>
        <td align="right" style="background-color: #ffd83e;"><?php echo formatnumber($d->sisapiutang); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($penalty); ?></td>
        <td align="right"><?php echo formatnumber($poinakhir); ?></td>

      </tr>
    <?php
      $no++;
    }
    ?>
  </tbody>
</table>
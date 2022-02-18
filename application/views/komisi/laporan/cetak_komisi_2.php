<?php
error_reporting(0);
function formatnumber($nilai)
{

  return number_format($nilai, '2', ',', '.');
}

function formatnumber2($nilai)
{

  return number_format($nilai, '0', ',', '.');
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:16px; font-family:Calibri">
  LAPORAN KOMISI<br>
  PERIODE BULAN <?= $bulan[$bln]; ?> TAHUN <?= $tahun; ?><br>
  CABANG <?= $cabang; ?>
</b>

<table class="datatable3" style="width:120%">
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
      <th rowspan="2" colspan="2" style="background-color: #ff570d;">TOTAL POIN</th>
      <th rowspan="2" colspan="3" style="background-color: #9e9895;">CASH IN</th>
      <th rowspan="2" colspan="3" style="background-color: #e43a90;">LJT > 14 Hari</th>
      <th rowspan="3" style="background-color: #ff570d;">TOTAL REWARD</th>

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
      <th style="background-color: #ff570d;">TOTAL POIN</th>
      <th style="background-color: #ff570d;">REWARD</th>
      <th style="background-color: #9e9895;">REALISASI</th>
      <th style="background-color: #9e9895;">RATIO</th>
      <th style="background-color: #9e9895;">REWARD</th>
      <th style="background-color: #e43a90;">REALISASI</th>
      <th style="background-color: #e43a90;">RATIO</th>
      <th style="background-color: #e43a90;">REWARD</th>
    </tr>
  </thead>
  <tbody style="font-size:12px !important">
    <?php

    foreach ($barang as $b) {


      if ($b->kode_produk == "AB") {
        $isipcsdusAB = $b->isipcsdus;
      }

      if ($b->kode_produk == "AR") {
        $isipcsdusAR = $b->isipcsdus;
      }

      if ($b->kode_produk == "AS") {
        $isipcsdusAS = $b->isipcsdus;
      }

      if ($b->kode_produk == "BB") {
        $isipcsdusBB = $b->isipcsdus;
      }

      if ($b->kode_produk == "CG") {
        $isipcsdusCG = $b->isipcsdus;
      }

      if ($b->kode_produk == "CGG") {
        $isipcsdusCGG = $b->isipcsdus;
      }

      if ($b->kode_produk == "DEP") {
        $isipcsdusDEP = $b->isipcsdus;
      }

      if ($b->kode_produk == "DK") {
        $isipcsdusDK = $b->isipcsdus;
      }

      if ($b->kode_produk == "DS") {
        $isipcsdusDS = $b->isipcsdus;
      }

      if ($b->kode_produk == "SP") {
        $isipcsdusSP = $b->isipcsdus;
      }

      if ($b->kode_produk == "BBP") {
        $isipcsdusBBP = $b->isipcsdus;
      }

      if ($b->kode_produk == "SPP") {
        $isipcsdusSPP = $b->isipcsdus;
      }

      if ($b->kode_produk == "CG5") {
        $isipcsdusCG5 = $b->isipcsdus;
      }

      if ($b->kode_produk == "SC") {
        $isipcsdusSC = $b->isipcsdus;
      }

      if ($b->kode_produk == "SP8") {
        $isipcsdusSP8 = $b->isipcsdus;
      }
    }

    $no = 1;
    foreach ($komisi as $d) {
      $poinBBDP = 40;
      $poinDS = 7.5;
      $poinSP = 15;
      $poinAR = 22.5;
      $poinASABCG5 = 15;

      $BB = $d->BB / $isipcsdusBB;
      $DEP = $d->DEP / $isipcsdusDEP;
      $realisasi_BB_DEP = $BB + $DEP;
      if (empty($d->target_BB_DP)) {
        $ratioBBDP = 0;
      } else {
        $ratioBBDP = $realisasi_BB_DEP / $d->target_BB_DP;
      }

      if ($ratioBBDP > 1) {
        $hasilpoinBBDP =  $poinBBDP;
      } else {
        $hasilpoinBBDP = $ratioBBDP * $poinBBDP;
      }

      $DS = $d->DS / $isipcsdusDS;
      $SP8 = $d->SP8 / $isipcsdusSP8;
      $realisasi_DS = $DS + $SP8;
      if (empty($d->target_DS)) {
        $ratioDS = 0;
      } else {
        $ratioDS = $realisasi_DS / $d->target_DS;
      }

      if ($ratioDS > 1) {
        $hasilpoinDS =  $poinDS;
      } else {
        $hasilpoinDS = $ratioDS * $poinDS;
      }

      $SP = $d->SP / $isipcsdusSP;
      $SC = $d->SC / $isipcsdusSC;
      $realisasi_SP = $SP + $SC;
      if (empty($d->target_SP)) {
        $ratioSP = 0;
      } else {
        $ratioSP = $realisasi_SP / $d->target_SP;
      }

      if ($ratioSP > 1) {
        $hasilpoinSP =  $poinSP;
      } else {
        $hasilpoinSP = $ratioSP * $poinSP;
      }

      $AR = $d->AR / $isipcsdusAR;
      $realisasi_AR = $AR;
      if (empty($d->target_AR)) {
        $ratioAR = 0;
      } else {
        $ratioAR = $realisasi_AR / $d->target_AR;
      }

      if ($ratioAR > 1) {
        $hasilpoinAR =  $poinAR;
      } else {
        $hasilpoinAR = $ratioAR * $poinAR;
      }



      $AB = $d->AB / $isipcsdusAB;
      $AS = $d->AS / $isipcsdusAS;
      $CG5 = $d->CG5 / $isipcsdusCG5;
      $realisasi_AB_AS_CG5 = $AB + $AS + $CG5;
      if (empty($d->target_AB_AS_CG5)) {
        $ratioAB_AS_CG5 = 0;
      } else {
        $ratioAB_AS_CG5 = $realisasi_AB_AS_CG5 / $d->target_AB_AS_CG5;
      }


      //$ratioAB_AS_CG5 = $d->realisasi_AB_AS_CG5 / $d->target_AB_AS_CG5;
      if ($ratioAB_AS_CG5 > 1) {
        $hasilpoinAB_AS_CG5 =  $poinASABCG5;
      } else {
        $hasilpoinAB_AS_CG5 = $ratioAB_AS_CG5 * $poinASABCG5;
      }

      $totalpoin = $hasilpoinBBDP + $hasilpoinDS + $hasilpoinAR + $hasilpoinSP + $hasilpoinAB_AS_CG5;
      $rewardcashin = $d->realisasi_cashin * (0.10 / 100);

      if ($cabang == "BDG") {
        $kebijakan = 25;
      } else if ($cabang == "PWT") {
        $kebijakan = 100;
      } else if ($cabang == "SKB") {
        $kebijakan = 100;
      } else if ($cabang == "BGR") {
        $kebijakan = 100;
      } else if ($cabang == "TGL") {
        $kebijakan = 50;
      } else if ($cabang == "TSM") {
        $kebijakan = 100;
      }

      $ratioljt = ($d->sisapiutang / $d->realisasi_cashin * 100) * ($kebijakan / 100);
      if ($bln == 12 && $tahun == 2021 || $bln >= 1 && $tahun >= 2022) {
        if ($ratioljt >= 0 and $ratioljt <= 0.50) {
          $rewardljt = 1250000;
        } else  if ($ratioljt > 0.50 and $ratioljt <= 1) {
          $rewardljt = 1125000;
        } else  if ($ratioljt > 1 and $ratioljt <= 1.50) {
          $rewardljt = 1000000;
        } else  if ($ratioljt > 1.50 and $ratioljt <= 2) {
          $rewardljt = 875000;
        } else  if ($ratioljt > 2 and $ratioljt <= 2.50) {
          $rewardljt = 750000;
        } else  if ($ratioljt > 2.50 and $ratioljt <= 3) {
          $rewardljt = 625000;
        } else  if ($ratioljt > 3 and $ratioljt <= 3.50) {
          $rewardljt = 500000;
        } else  if ($ratioljt > 3.50 and $ratioljt <= 4) {
          $rewardljt = 375000;
        } else  if ($ratioljt > 4 and $ratioljt <= 4.50) {
          $rewardljt = 250000;
        } else  if ($ratioljt > 4.50 and $ratioljt <= 5) {
          $rewardljt = 125000;
        } else {
          $rewardljt = 0;
        }
      } else {
        if ($ratioljt >= 0 and $ratioljt <= 2) {
          $rewardljt = 2000000;
        } else  if ($ratioljt > 2 and $ratioljt <= 4) {
          $rewardljt = 1800000;
        } else  if ($ratioljt > 4 and $ratioljt <= 6) {
          $rewardljt = 1600000;
        } else  if ($ratioljt > 6 and $ratioljt <= 8) {
          $rewardljt = 1400000;
        } else  if ($ratioljt > 8 and $ratioljt <= 10) {
          $rewardljt = 1200000;
        } else  if ($ratioljt > 10 and $ratioljt <= 12) {
          $rewardljt = 1000000;
        } else  if ($ratioljt > 12 and $ratioljt <= 14) {
          $rewardljt = 800000;
        } else  if ($ratioljt > 14 and $ratioljt <= 16) {
          $rewardljt = 600000;
        } else  if ($ratioljt > 16 and $ratioljt <= 18) {
          $rewardljt = 400000;
        } else  if ($ratioljt > 18 and $ratioljt <= 20) {
          $rewardljt = 200000;
        } else {
          $rewardljt = 0;
        }
      }


      if ($totalpoin < 70) {
        $rewardpoin = 0;
      } else if ($totalpoin >= 70 and $totalpoin <= 75) {
        $rewardpoin = 750000;
      } else if ($totalpoin >= 76 and $totalpoin <= 80) {
        $rewardpoin = 1500000;
      } else if ($totalpoin >= 81 and $totalpoin <= 85) {
        $rewardpoin = 2250000;
      } else if ($totalpoin >= 86 and $totalpoin <= 90) {
        $rewardpoin = 3000000;
      } else if ($totalpoin >= 91 and $totalpoin <= 95) {
        $rewardpoin = 3750000;
      } else if ($totalpoin >= 96 and $totalpoin <= 100) {
        $rewardpoin = 4500000;
      } else {
        $rewardpoin = "NA";
      }

      $totalreward = $rewardcashin + $rewardljt + $rewardpoin;
    ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $d->id_karyawan; ?></td>
        <td><?php echo $d->nama_karyawan; ?></td>
        <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($d->target_BB_DP); ?></td>
        <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($realisasi_BB_DEP); ?></td>
        <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($hasilpoinBBDP); ?></td>
        <td align="right" style="background-color: #ffcb00;"><?php echo formatnumber($d->target_DS); ?></td>
        <td align="right" style="background-color: #ffcb00;"><?php echo formatnumber($realisasi_DS); ?></td>
        <td align="right" style="background-color: #ffcb00;"><?php echo formatnumber($hasilpoinDS); ?></td>
        <td align="right" style="background-color: #058cbe;"><?php echo formatnumber($d->target_SP); ?></td>
        <td align="right" style="background-color: #058cbe;"><?php echo formatnumber($realisasi_SP); ?></td>
        <td align="right" style="background-color: #058cbe;"><?php echo formatnumber($hasilpoinSP); ?></td>
        <td align="right" style="background-color: #ce3ae4;"><?php echo formatnumber($d->target_AR); ?></td>
        <td align="right" style="background-color: #ce3ae4;"><?php echo formatnumber($realisasi_AR); ?></td>
        <td align="right" style="background-color: #ce3ae4;"><?php echo formatnumber($hasilpoinAR); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($d->target_AB_AS_CG5); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($realisasi_AB_AS_CG5); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($hasilpoinAB_AS_CG5); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($totalpoin); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($rewardpoin); ?></td>
        <td align="right" style="background-color: #9e9895;"><?php echo formatnumber($d->realisasi_cashin); ?></td>
        <td align="center" style="background-color: #9e9895;">0.10%</td>
        <td align="right" style="background-color: #9e9895;"><?php echo formatnumber($rewardcashin); ?></td>
        <td align="right" style="background-color: #e43a90;"><?php echo formatnumber($d->sisapiutang); ?></td>
        <td align="center" style="background-color: #e43a90;"><?php echo round($ratioljt, 2); ?></td>
        <td align="right" style="background-color: #e43a90;"><?php echo formatnumber($rewardljt); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($totalreward); ?></td>
      </tr>
    <?php
      $no++;
    }
    ?>
    <tr>
      <th>NO</th>
      <th>ID KARYAWAN</th>
      <th>NAMA KARYAWAN</th>
      <th colspan="21"></th>
      <th>QTY</th>
      <th>RATIO</th>
      <th>REWARD</th>
    </tr>
    <?php
    $nextno = $no;
    foreach ($driverhelper as $d) {
    ?>
      <tr>
        <td><?php echo $nextno; ?></td>
        <td><?php echo $d->nama_driver_helper; ?></td>
        <td><?php echo $d->kategori; ?></td>
        <td colspan="21"></td>
        <td align="center">
          <?php
          if ($d->kategori == 'DRIVER') {
            $jmlqty = $d->jml_driver;
            if (!empty($d->jml_driver)) {
              echo formatnumber($d->jml_driver);
            };
          } else if ($d->kategori == 'HELPER') {
            $jmlqty = $d->jml_helper;
            if (!empty($d->jml_helper)) {
              echo formatnumber($d->jml_helper);
            };
          }
          ?>

        </td>
        <td align="center"><?php echo $d->ratio; ?></td>
        <td align="right">
          <?php
          $rewarddriverhelper = $jmlqty * $d->ratio;
          if (!empty($rewarddriverhelper)) {
            echo formatnumber2($rewarddriverhelper);
          };
          ?>
        </td>
      </tr>
    <?php
      $nextno++;
    }
    ?>
  </tbody>
</table>
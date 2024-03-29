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
<style>
  a {
    color: black;
  }
</style>
<br>
<b style="font-size:16px; font-family:Calibri">
  LAPORAN KOMISI<br>
  PERIODE BULAN <?= $bulan[$bln]; ?> TAHUN <?= $tahun; ?><br>
  CABANG <?= $cabang; ?>
</b>
<?php
if ($bln >= 5 && $tahun >= 2022) {
  $poinBBDP = 40;
  $poinDS = 10;
  $poinSP = 15;
  $poinAR = 12.5;
  $poinASABCG5 = 10;
  $poinSC = 12.5;
} else {
  $poinBBDP = 40;
  $poinDS = 7.5;
  $poinSP = 10;
  $poinAR = 17.5;
  $poinASABCG5 = 15;
  $poinSC = 10;
}
?>
<table class="datatable3" style="width:120%">
  <thead>
    <tr>
      <th rowspan="3">NO</th>
      <th rowspan="3">ID KARYAWAN</th>
      <th rowspan="3">NAMA KARYAWAN</th>
      <th colspan="3" style="background-color: #35ce35;">TARGET & REALISASI BB & DEP</th>
      <th colspan="3" style="background-color: #ffcb00;">TARGET & REALISASI SP8 </th>
      <th colspan="3" style="background-color: #058cbe;">TARGET & REALISASI SP </th>
      <th colspan="3" style="background-color: #ce3ae4;">TARGET & REALISASI AR </th>
      <th colspan="3" style="background-color: #ff9b0d;">TARGET & REALISASI AS,AB</th>
      <th colspan="3" style="background-color: #ff9b0d;">TARGET & REALISASI SC</th>
      <th rowspan="2" colspan="2" style="background-color: #ff570d;">TOTAL POIN</th>
      <th rowspan="2" colspan="3" style="background-color: #9e9895;">CASH IN</th>
      <th rowspan="2" colspan="3" style="background-color: #e43a90;">LJT > 14 Hari</th>
      <th rowspan="3" style="background-color: #ff570d;">TOTAL REWARD</th>
      <th rowspan="3" style="background-color: #ffffff;">POTONGAN</th>
      <th rowspan="3" style="background-color: #ffffff;">KOMISI AKHIR</th>

    </tr>
    <tr style="text-align: center;">
      <th colspan="3" style="background-color: #35ce35;"><?php echo $poinBBDP; ?></th>
      <th colspan="3" style="background-color: #ffcb00;"><?php echo $poinDS; ?></th>
      <th colspan="3" style="background-color: #058cbe;"><?php echo $poinSP; ?></th>
      <th colspan="3" style="background-color: #ce3ae4;"><?php echo $poinAR; ?></th>
      <th colspan="3" style="background-color: #ff9b0d;" <?php echo $poinASABCG5; ?></th>
      <th colspan="3" style="background-color: #ff9b0d;"><?php echo $poinSC; ?></th>

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

    $totaltargetBBDP = 0;
    $totalrealisasiBBDP = 0;

    $totaltargetDS = 0;
    $totalrealisasiDS = 0;

    $totaltargetSP = 0;
    $totalrealisasiSP = 0;

    $totaltargetAR = 0;
    $totalrealisasiAR = 0;

    $totaltargetABASCG5 = 0;
    $totalrealisasiABASCG5 = 0;

    $totaltargetSC = 0;
    $totalrealisasiSC = 0;

    $totalcashin = 0;
    $totalsisapiutang = 0;

    $grandtotalrewardsales = 0;
    $grandtotalrewarddriver = 0;
    $grandtotalrewardhelper = 0;
    $grandtotalrewardgudang = 0;
    $no = 1;

    foreach ($komisi as $d) {


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
      $realisasi_SP = $SP;
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


      $SC = $d->SC / $isipcsdusSC;
      $realisasi_SC = $SC;
      if (empty($d->target_SC)) {
        $ratioSC = 0;
      } else {
        $ratioSC = $realisasi_SC / $d->target_SC;
      }

      if ($ratioSC > 1) {
        $hasilpoinSC =  $poinSC;
      } else {
        $hasilpoinSC = $ratioSC * $poinSC;
      }

      $totalpoin = $hasilpoinBBDP + $hasilpoinDS + $hasilpoinAR + $hasilpoinSP + $hasilpoinAB_AS_CG5 + $hasilpoinSC;

      if ($bulan == 2 and $tahun == 2022) {
        if ($d->kategori_salesman == "CANVASER") {
          $ratiocashin = 0.30;
        } else {
          $ratiocashin = 0.10;
        }
      } else if ($bulan >= 3 and $tahun >= 2022) {
        if ($d->kategori_salesman == "CANVASER" || $d->kategori_salesman == "RETAIL") {
          $ratiocashin = 0.30;
        } else {
          $ratiocashin = 0.10;
        }
      } else {
        $ratiocashin = 0.10;
      }

      $rewardcashin = $d->realisasi_cashin * ($ratiocashin / 100);

      if ($bulan >= 2 and $tahun >= 2022) {
        $kebijakan = 100;
      } else {
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
        } else if ($cabang == "KLT") {
          $kebijakan = 100;
        }
      }

      $ratioljt = ($d->sisapiutang / $d->realisasi_cashin * 100) * ($kebijakan / 100);
      if ($ratioljt > 0) {
        $ratioljt = $ratioljt;
      } else {
        $ratioljt = 0;
      }
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
      } else if ($totalpoin > 75 and $totalpoin <= 80) {
        $rewardpoin = 1500000;
      } else if ($totalpoin > 80 and $totalpoin <= 85) {
        $rewardpoin = 2250000;
      } else if ($totalpoin > 85 and $totalpoin <= 90) {
        $rewardpoin = 3000000;
      } else if ($totalpoin > 90 and $totalpoin <= 95) {
        $rewardpoin = 3750000;
      } else if ($totalpoin > 95 and $totalpoin <= 100) {
        $rewardpoin = 4500000;
      } else {
        $rewardpoin = "NA";
      }

      $totalreward = $rewardcashin + $rewardljt + $rewardpoin;
      $grandtotalrewardsales += $totalreward;
      $totaltargetBBDP += $d->target_BB_DP;
      $totalrealisasiBBDP += $realisasi_BB_DEP;

      $totaltargetDS += $d->target_DS;
      $totalrealisasiDS += $realisasi_DS;

      $totaltargetSP += $d->target_SP;
      $totalrealisasiSP += $realisasi_SP;

      $totaltargetAR += $d->target_AR;
      $totalrealisasiAR += $realisasi_AR;

      $totaltargetABASCG5 += $d->target_AB_AS_CG5;
      $totalrealisasiABASCG5 += $realisasi_AB_AS_CG5;

      $totaltargetSC += $d->target_SC;
      $totalrealisasiSC += $realisasi_SC;

      $totalcashin += $d->realisasi_cashin;
      $totalsisapiutang += $d->sisapiutang;
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
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($d->target_SC); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($realisasi_SC); ?></td>
        <td align="right" style="background-color: #ff9b0d;"><?php echo formatnumber($hasilpoinSC); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($totalpoin); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($rewardpoin); ?></td>
        <td align="right" style="background-color: #9e9895;"><?php echo formatnumber($d->realisasi_cashin); ?></td>
        <td align="center" style="background-color: #9e9895;"><?php echo $ratiocashin; ?>%</td>

        <td align="right" style="background-color: #9e9895;"><?php echo formatnumber($rewardcashin); ?></td>
        <td align="right" style="background-color: #e43a90;"><?php if ($d->sisapiutang > 0) {
                                                                echo formatnumber($d->sisapiutang);
                                                              } else {
                                                                echo 0;
                                                              } ?></td>
        <td align="center" style="background-color: #e43a90;"><?php echo round($ratioljt, 2); ?></td>
        <td align="right" style="background-color: #e43a90;"><?php echo formatnumber($rewardljt); ?></td>
        <td align="right" style="background-color: #ff570d;"><?php echo formatnumber($totalreward); ?></td>
        <td></td>
        <td></td>

      </tr>
    <?php
      $no++;

      if (empty($totaltargetBBDP)) {
        $totalratioBBDP = 0;
      } else {
        $totalratioBBDP = $totalrealisasiBBDP / $totaltargetBBDP;
      }

      if ($totalratioBBDP > 1) {
        $totalhasilpoinBBDP =  $poinBBDP;
      } else {
        $totalhasilpoinBBDP = $totalratioBBDP * $poinBBDP;
      }

      if (empty($totaltargetDS)) {
        $totalratioDS = 0;
      } else {
        $totalratioDS = $totalrealisasiDS / $totaltargetDS;
      }

      if ($totalratioDS > 1) {
        $totalhasilpoinDS =  $poinDS;
      } else {
        $totalhasilpoinDS = $totalratioDS * $poinDS;
      }

      if (empty($totaltargetSP)) {
        $totalratioSP = 0;
      } else {
        $totalratioSP = $totalrealisasiSP / $totaltargetSP;
      }

      if ($totalratioSP > 1) {
        $totalhasilpoinSP =  $poinSP;
      } else {
        $totalhasilpoinSP = $totalratioSP * $poinSP;
      }

      if (empty($totaltargetAR)) {
        $totalratioAR = 0;
      } else {
        $totalratioAR = $totalrealisasiAR / $totaltargetAR;
      }

      if ($totalratioAR > 1) {
        $totalhasilpoinAR =  $poinAR;
      } else {
        $totalhasilpoinAR = $totalratioAR * $poinAR;
      }

      if (empty($totaltargetABASCG5)) {
        $totalratioABASCG5 = 0;
      } else {
        $totalratioABASCG5 = $totalrealisasiABASCG5 / $totaltargetABASCG5;
      }

      if ($totalratioABASCG5 > 1) {
        $totalhasilpoinABASCG5 =  $poinASABCG5;
      } else {
        $totalhasilpoinABASCG5 = $totalratioABASCG5 * $poinASABCG5;
      }

      if (empty($totaltargetSC)) {
        $totalratioSC = 0;
      } else {
        $totalratioSC = $totalrealisasiSC / $totaltargetSC;
      }

      if ($totalratioSC > 1) {
        $totalhasilpoinSC =  $poinSC;
      } else {
        $totalhasilpoinSC = $totalratioSC * $poinSC;
      }



      $totalallpoin = $totalhasilpoinBBDP + $totalhasilpoinDS + $totalhasilpoinSP + $totalhasilpoinAR + $totalhasilpoinABASCG5 + $totalhasilpoinSC;

      if ($totalallpoin < 70) {
        $rewardallpoin = 0;
      } else if ($totalallpoin >= 70 and $totalallpoin <= 75) {
        $rewardallpoin = 1500000;
      } else if ($totalallpoin > 75 and $totalallpoin <= 80) {
        $rewardallpoin = 3000000;
      } else if ($totalallpoin > 80 and $totalallpoin <= 85) {
        $rewardallpoin = 4500000;
      } else if ($totalallpoin > 85 and $totalallpoin <= 90) {
        $rewardallpoin = 6000000;
      } else if ($totalallpoin > 90 and $totalallpoin <= 95) {
        $rewardallpoin = 7500000;
      } else if ($totalallpoin > 95 and $totalallpoin <= 100) {
        $rewardallpoin = 9000000;
      } else {
        $rewardallpoin = "NA";
      }

      $rewardcashinkp = $totalcashin * (0.05 / 100);
      $ratioljtkp = ($totalsisapiutang / $totalcashin) * 100;

      if ($ratioljtkp >= 0 and $ratioljtkp <= 0.5) {
        $rewardljtkp = 2500000;
      } else  if ($ratioljtkp > 0.5 and $ratioljtkp <= 1) {
        $rewardljtkp = 2250000;
      } else  if ($ratioljtkp > 1 and $ratioljtkp <= 1.5) {
        $rewardljtkp = 2000000;
      } else  if ($ratioljtkp > 1.5 and $ratioljtkp <= 2) {
        $rewardljtkp = 1750000;
      } else  if ($ratioljtkp > 2 and $ratioljtkp <= 2.5) {
        $rewardljtkp = 1500000;
      } else  if ($ratioljtkp > 2.5 and $ratioljtkp <= 3) {
        $rewardljtkp = 1250000;
      } else  if ($ratioljtkp > 3 and $ratioljtkp <= 3.5) {
        $rewardljtkp = 1000000;
      } else  if ($ratioljtkp > 3.5 and $ratioljtkp <= 4) {
        $rewardljtkp = 750000;
      } else  if ($ratioljtkp > 4 and $ratioljtkp <= 4.5) {
        $rewardljtkp = 500000;
      } else  if ($ratioljtkp > 4.5 and $ratioljtkp <= 5) {
        $rewardljtkp = 250000;
      } else {
        $rewardljtkp = 0;
      }

      $totalrewardkp = $rewardallpoin + $rewardcashinkp + $rewardljtkp;
    }

    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td colspan="2">KEPALA PENJUALAN</td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totaltargetBBDP); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalrealisasiBBDP); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalhasilpoinBBDP); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totaltargetDS); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalrealisasiDS); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalhasilpoinDS); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totaltargetSP); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalrealisasiSP); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalhasilpoinSP); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totaltargetAR); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalrealisasiAR); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalhasilpoinAR); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totaltargetABASCG5); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalrealisasiABASCG5); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalhasilpoinABASCG5); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totaltargetSC); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalrealisasiSC); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalhasilpoinSC); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalallpoin); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($rewardallpoin); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalcashin); ?></td>
      <td align="center" style="background-color: #35ce35;">0.05%</td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($rewardcashinkp); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalsisapiutang); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo ROUND($ratioljtkp, 2); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($rewardljtkp); ?></td>
      <td align="right" style="background-color: #35ce35;"><?php echo formatnumber($totalrewardkp); ?></td>
      <td></td>
      <td></td>

    </tr>
    <?php

    ?>
    <tr>
      <th>NO</th>
      <th>ID KARYAWAN</th>
      <th>NAMA KARYAWAN</th>
      <th colspan="21"></th>
      <th>QTY</th>
      <th>RATIO</th>
      <th>REWARD</th>
      <th>POTONGAN</th>
      <th>KOMISI AKHIR</th>
    </tr>
    <?php
    $nextno = $no + 1;
    foreach ($driver as $d) {
      $jmlqty = $d->jml_driver;
      if (empty($d->ratioaktif)) {
        if (empty($d->ratioterakhir)) {
          $ratio = $d->ratiodefault;
        } else {
          $ratio = $d->ratioterakhir;
        }
      } else {
        $ratio = $d->ratioaktif;
      }
      $rewarddriver = $jmlqty * $ratio;
      $grandtotalrewarddriver += $rewarddriver;
    ?>
      <tr>
        <td><?php echo $nextno; ?></td>
        <td><?php echo $d->nama_driver_helper; ?></td>
        <td><?php echo $d->kategori; ?></td>
        <td colspan="21"></td>
        <td align="center">
          <a href="<?php echo base_url(); ?>komisi/detaildriver/<?php echo $d->id_driver_helper; ?>/<?php echo $bln; ?>/<?php echo $tahun; ?>" target="_blank">
            <?php
            if (!empty($d->jml_driver) && $d->jml_driver > 0.00) {
              echo formatnumber($d->jml_driver);
            };
            ?>
          </a>
        </td>
        <td align="center"><?php echo $ratio; ?></td>
        <td align="right">
          <?php

          if (!empty($rewarddriver)) {
            echo formatnumber2($rewarddriver);
          };
          ?>
        </td>
        <td></td>
        <td></td>
      </tr>
    <?php
      $nextno++;
    }
    ?>

    <?php
    $nextno = $no + 1;
    foreach ($helper as $d) {
      $jmlqty = $d->jml_helper;
      // if (empty($d->ratioaktif)) {
      //   if (empty($d->ratioterakhir)) {
      //     $ratio = $d->ratiodefault;
      //   } else {
      //     $ratio = $d->ratioterakhir;
      //   }
      // } else {
      //   $ratio = $d->ratioaktif;
      // }

      if (empty($d->ratiohelperaktif) || $d->ratiohelperaktif == 0.00) {
        if (empty($d->ratiohelperterakhir) || $d->ratiohelperterakhir == 0.00) {
          if (empty($d->ratiohelperdefault) || $d->ratiohelperdefault == 0.00) {
            $ratio = $d->ratiodefault;
          } else {
            $ratio = $d->ratiohelperdefault;
          }
        } else {
          $ratio = $d->ratiohelperterakhir;
        }
      } else {
        $ratio = $d->ratiohelperaktif;
      }
      $rewardhelper = $jmlqty * $ratio;
      $grandtotalrewardhelper += $rewardhelper;
    ?>
      <tr>
        <td><?php echo $nextno; ?></td>
        <td><?php echo $d->nama_driver_helper; ?></td>
        <td>HELPER</td>
        <td colspan="21"></td>
        <td align="center">
          <a href="<?php echo base_url(); ?>komisi/detailhelper/<?php echo $d->id_driver_helper; ?>/<?php echo $bln; ?>/<?php echo $tahun; ?>" target="_blank">
            <?php

            if (!empty($d->jml_helper) && $d->jml_helper > 0.00) {
              echo formatnumber($d->jml_helper);
            };
            ?>
          </a>

        </td>
        <td align="center"><?php echo $ratio; ?></td>
        <td align="right">
          <?php

          if (!empty($rewardhelper)) {
            echo formatnumber2($rewardhelper);
          };
          ?>
        </td>
        <td></td>
        <td></td>
      </tr>
    <?php
      $nextno++;
    }
    ?>
    <?php
    $nextno = $no + 1;
    foreach ($gudang as $d) {
      $jmlqty = $tunaikredit['total'];
      if (empty($d->ratioaktif)) {
        if (empty($d->ratioterakhir)) {
          $ratio = $d->ratiodefault;
        } else {
          $ratio = $d->ratioterakhir;
        }
      } else {
        $ratio = $d->ratioaktif;
      }
      $rewardgudang = $jmlqty * $ratio;
      $grandtotalrewardgudang += $rewardgudang;
    ?>
      <tr>
        <td><?php echo $nextno; ?></td>
        <td><?php echo $d->nama_driver_helper; ?></td>
        <td>GUDANG</td>
        <td colspan="21"></td>
        <td align="center">
          <?php

          if (!empty($jmlqty)) {
            echo formatnumber($jmlqty);
          };
          ?>

        </td>
        <td align="center"><?php echo $ratio; ?></td>
        <td align="right">
          <?php

          if (!empty($rewardgudang)) {
            echo formatnumber2($rewardgudang);
          };
          ?>
        </td>
        <td></td>
        <td></td>
      </tr>
    <?php
      $nextno++;
    }
    $grandtotalreward = $grandtotalrewardsales + $totalrewardkp + $grandtotalrewarddriver + $grandtotalrewardhelper + $grandtotalrewardgudang;
    ?>
    <tr>
    <tr>
      <td colspan="24" style="font-size:24px; font-weight:bold" align="center">TOTAL</td>
      <td></td>
      <td></td>
      <td style="font-size:24px; font-weight:bold" align="right"><?php echo formatnumber2($grandtotalreward); ?></td>
    </tr>
    </tr>
  </tbody>
</table>
<br>
<br>
<br>
<table style="width:100%">
  <tr>
    <td align="center">
      Tasikmalaya, <?php echo DateToIndo2(date("Y-m-d")); ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <b>Herdy Budiawan</b><br>
      GM Marketing
    </td>
    <td align="center">
      Diperiksa Oleh
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <b>Ridwan Nugraha</b><br>
      GM Administration
    </td>
    <td align="center">
      Disetujui Oleh,
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <b>Jemmy Feldiana</b><br>
      Direktur
    </td>
  </tr>
</table>
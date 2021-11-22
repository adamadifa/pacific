<?php
function uang($nilai)
{
  return number_format($nilai, '2', ',', '.');
}

$hariini = date("Y-m-d");

foreach ($barang as $p) {
  if ($p->kode_produk == "AB") {
    $isipcs_ab = $p->isipcsdus;
  }
  if ($p->kode_produk == "AR") {
    $isipcs_ar = $p->isipcsdus;
  }
  if ($p->kode_produk == "AS") {
    $isipcs_as = $p->isipcsdus;
  }

  if ($p->kode_produk == "BB") {
    $isipcs_bb = $p->isipcsdus;
  }

  if ($p->kode_produk == "BBP") {
    $isipcs_bbp = $p->isipcsdus;
  }

  if ($p->kode_produk == "CG") {
    $isipcs_cg = $p->isipcsdus;
  }

  if ($p->kode_produk == "CGG") {
    $isipcs_cgg = $p->isipcsdus;
  }

  if ($p->kode_produk == "CG5") {
    $isipcs_cg5 = $p->isipcsdus;
  }

  if ($p->kode_produk == "DEP") {
    $isipcs_dep = $p->isipcsdus;
  }

  if ($p->kode_produk == "DS") {
    $isipcs_ds = $p->isipcsdus;
  }

  if ($p->kode_produk == "SP") {
    $isipcs_sp = $p->isipcsdus;
  }

  if ($p->kode_produk == "SPP") {
    $isipcs_spp = $p->isipcsdus;
  }

  if ($p->kode_produk == "SC") {
    $isipcs_sc = $p->isipcsdus;
  }

  if ($p->kode_produk == "SP8") {
    $isipcs_sp8 = $p->isipcsdus;
  }
}
?>
<div class="table-responsive">

  <table class="table">
    <thead class="">
      <tr>
        <th>Nama Cabang</th>
        <th>AB</th>
        <th>AR</th>
        <th>AS</th>
        <th>BB</th>
        <!-- <th>BBP</th> -->
        <!-- <th>CG</th> -->
        <!-- <th>CG5</th> -->
        <!-- <th>CGG</th> -->
        <th>DEP</th>
        <!-- <th>DK</th> -->
        <th>DS</th>
        <th>SP</th>
        <th>SPP</th>
        <th>SC</th>
        <th>SP8</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $gAB = 0;
      $gAR = 0;
      $gAS = 0;
      $gBB = 0;
      $gBBP = 0;
      $gCG = 0;
      $gCG5 = 0;
      $gCGG = 0;
      $gDEP = 0;
      $gDK = 0;
      $gDS = 0;
      $gSP = 0;
      $gSPP = 0;
      $gSC = 0;
      $gSP8 = 0;
      foreach ($rekap as $g) {

        if ($g->kode_produk == "AB") {
          $gAB = $gAB + $g->saldoakhir;
        }

        if ($g->kode_produk == "AR") {
          $gAR = $gAR + $g->saldoakhir;
        }

        if ($g->kode_produk == "AS") {
          $gAS = $gAS + $g->saldoakhir;
        }

        if ($g->kode_produk == "BB") {
          $gBB = $gBB + $g->saldoakhir;
        }

        if ($g->kode_produk == "BBP") {
          $gBBP = $gBBP + $g->saldoakhir;
        }

        // if ($g->kode_produk == "CG") {
        //   $gCG = $gCG + $g->saldoakhir;
        // }

        // if ($g->kode_produk == "CG5") {
        //   $gCG = $gCG + $g->saldoakhir;
        // }

        // if ($g->kode_produk == "CGG") {
        //   $gCGG = $gCGG + $g->saldoakhir;
        // }

        if ($g->kode_produk == "DEP") {
          $gDEP = $gDEP + $g->saldoakhir;
        }

        // if ($g->kode_produk == "DK") {
        //   $gDK = $gDK + $g->saldoakhir;
        // }

        if ($g->kode_produk == "DS") {
          $gDS = $gDS + $g->saldoakhir;
        }

        if ($g->kode_produk == "SP") {
          $gSP =  $gSP + $g->saldoakhir;
        }

        if ($g->kode_produk == "SPP") {
          $gSPP =  $gSPP + $g->saldoakhir;
        }

        if ($g->kode_produk == "SC") {
          $gSC =  $gSC + $g->saldoakhir;
        }

        if ($g->kode_produk == "SP8") {
          $gSP8 =  $gSP8 + $g->saldoakhir;
        }
      }

      if ($gAB <= 0) {
        $colorgAB = "bg-red";
      } else {
        $colorgAB = "bg-green";
      }

      if ($gAS <= 0) {
        $colorgAS = "bg-red";
      } else {
        $colorgAS = "bg-green";
      }

      if ($gAR <= 0) {
        $colorgAR = "bg-red";
      } else {
        $colorgAR = "bg-green";
      }

      if ($gAS <= 0) {
        $colorgAS = "bg-red";
      } else {
        $colorgAS = "bg-green";
      }

      if ($gBB <= 0) {
        $colorgBB = "bg-red";
      } else {
        $colorgBB = "bg-green";
      }

      if ($gBBP <= 0) {
        $colorgBBP = "bg-red";
      } else {
        $colorgBBP = "bg-green";
      }

      // if ($gCG <= 0) {
      //   $colorgCG = "bg-red";
      // } else {
      //   $colorgCG = "bg-green";
      // }

      // if ($gCG5 <= 0) {
      //   $colorgCG5 = "bg-red";
      // } else {
      //   $colorgCG5 = "bg-green";
      // }

      // if ($gCGG <= 0) {
      //   $colorgCGG = "bg-red";
      // } else {
      //   $colorgCGG = "bg-green";
      // }

      if ($gDEP <= 0) {
        $colorgDEP = "bg-red";
      } else {
        $colorgDEP = "bg-green";
      }

      // if ($gDK <= 0) {
      //   $colorgDK = "bg-red";
      // } else {
      //   $colorgDK = "bg-green";
      // }

      if ($gDS <= 0) {
        $colorgDS = "bg-red";
      } else {
        $colorgDS = "bg-green";
      }

      if ($gSP <= 0) {
        $colorgSP = "bg-red";
      } else {
        $colorgSP = "bg-green";
      }

      if ($gSPP <= 0) {
        $colorgSPP = "bg-red";
      } else {
        $colorgSPP = "bg-green";
      }


      if ($gSC <= 0) {
        $colorgSC = "bg-red";
      } else {
        $colorgSC = "bg-green";
      }

      if ($gSP8 <= 0) {
        $colorgSP8 = "bg-red";
      } else {
        $colorgSP8 = "bg-green";
      }
      ?>
      <tr>
        <td>GUDANG PUSAT</td>
        <td><span class="badge <?php echo $colorgAB; ?>"><?php echo number_format(floor($gAB), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorgAR; ?>"><?php echo number_format(floor($gAR), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorgAS; ?>"><?php echo number_format(floor($gAS), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorgBB; ?>"><?php echo number_format(floor($gBB), '0', ',', '.'); ?></span></td>

        <td><span class="badge <?php echo $colorgDEP; ?>"><?php echo number_format(floor($gDEP), '0', ',', '.'); ?></span></td>

        <td><span class="badge <?php echo $colorgDS; ?>"><?php echo number_format(floor($gDS), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorgSP; ?>"><?php echo number_format(floor($gSP), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorgSPP; ?>"><?php echo number_format(floor($gSPP), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorgSC; ?>"><?php echo number_format(floor($gSC), '0', ',', '.'); ?></span></td>
        <td><span class="badge <?php echo $colorgSP8; ?>"><?php echo number_format(floor($gSP8), '0', ',', '.'); ?></span></td>
      </tr>
      <?php
      foreach ($persediaandpb as $d) {
        $sab = $d['mg_ab'] + (ROUND($d['saldo_ab'] / 30, 2)) + (ROUND($d['mutasi_ab'] / 30, 2)) - $d['ab_ambil'] + $d['ab_kembali'];
        $sar = $d['mg_ar'] + (ROUND($d['saldo_ar'] / 240, 2)) + (ROUND($d['mutasi_ar'] / 240, 2)) - $d['ar_ambil'] + $d['ar_kembali'];
        $sas = $d['mg_as'] + (ROUND($d['saldo_as'] / 36, 2)) + (ROUND($d['mutasi_as'] / 36, 2)) - $d['as_ambil'] + $d['as_kembali'];
        $sbb = $d['mg_bb'] + (ROUND($d['saldo_bb'] / 20, 2)) + (ROUND($d['mutasi_bb'] / 20, 2)) - $d['bb_ambil'] + $d['bb_kembali'];
        $sdep = $d['mg_dep'] + (ROUND($d['saldo_dep'] / 20, 2)) + (ROUND($d['mutasi_dep'] / 20, 2)) - $d['dep_ambil'] + $d['dep_kembali'];
        $sds  = $d['mg_ds'] + (ROUND($d['saldo_ds'] / 504, 2)) + (ROUND($d['mutasi_ds'] / 504, 2)) - $d['ds_ambil'] + $d['ds_kembali'];
        $ssp  = $d['mg_sp'] + (ROUND($d['saldo_sp'] / 12, 2)) + (ROUND($d['mutasi_sp'] / 12, 2)) - $d['sp_ambil'] + $d['sp_kembali'];
        $sspp  = $d['mg_spp'] + (ROUND($d['saldo_spp'] / 1, 2)) + (ROUND($d['mutasi_spp'] / 1, 2)) - $d['spp_ambil'] + $d['spp_kembali'];
        $ssc  = $d['mg_sc'] + (ROUND($d['saldo_sc'] / 24, 2)) + (ROUND($d['mutasi_sc'] / 24, 2)) - $d['sc_ambil'] + $d['sc_kembali'];
        $ssp8  = $d['mg_sp8'] + (ROUND($d['saldo_sp8'] / 480, 2)) + (ROUND($d['mutasi_sp8'] / 480, 2)) - $d['sp8_ambil'] + $d['sp8_kembali'];

        if ($sab <= 0) {
          $colorab = "bg-red";
        } else {
          $colorab = "bg-green";
        }

        if ($sar <= 0) {
          $colorar = "bg-red";
        } else {
          $colorar = "bg-green";
        }

        if ($sas <= 0) {
          $coloras = "bg-red";
        } else {
          $coloras = "bg-green";
        }

        if ($sbb <= 0) {
          $colorbb = "bg-red";
        } else {
          $colorbb = "bg-green";
        }


        if ($sdep <= 0) {
          $colorsdep = "bg-red";
        } else {
          $colorsdep = "bg-green";
        }


        if ($sds <= 0) {
          $colorsds = "bg-red";
        } else {
          $colorsds = "bg-green";
        }

        if ($ssp <= 0) {
          $colorssp = "bg-red";
        } else {
          $colorssp = "bg-green";
        }

        if ($sspp <= 0) {
          $colorsspp = "bg-red";
        } else {
          $colorsspp = "bg-green";
        }

        if ($ssc <= 0) {
          $colorssc = "bg-red";
        } else {
          $colorssc = "bg-green";
        }

        if ($ssp8 <= 0) {
          $colorsp8 = "bg-red";
        } else {
          $colorsp8 = "bg-green";
        }

      ?>
        <tr>
          <td><?php echo strtoupper($d['nama_cabang']); ?></td>
          <td><span class="badge <?php echo $colorab; ?>"><?php echo number_format(floor($sab), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorar; ?>"><?php echo number_format(floor($sar), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $coloras; ?>"><?php echo number_format(floor($sas), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorbb; ?>"><?php echo number_format(floor($sbb), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorsdep; ?>"><?php echo number_format(floor($sdep), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorsds; ?>"><?php echo number_format(floor($sds), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorssp; ?>"><?php echo number_format(floor($ssp), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorsspp; ?>"><?php echo number_format(floor($sspp), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorssc; ?>"><?php echo number_format(floor($ssc), '0', ',', '.'); ?></span></td>
          <td><span class="badge <?php echo $colorsp8; ?>"><?php echo number_format(floor($ssp8), '0', ',', '.'); ?></span></td>
        </tr>
      <?php } ?>
    </tbody>

  </table>
</div>
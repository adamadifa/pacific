<?php
error_reporting(0);
function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}

function formatqty($nilai)
{

  return number_format($nilai, '2', ',', '.');
}

?>

<?php

if ($dari < '2018-09-01') {
?>

  <div class="alert alert-danger">
    <strong>Sorry Bro!</strong> Maaf Untuk Data Penjualan Kurang Dari Bulan September 2018 Tidak Dapat Ditampilkan.!
  </div>
<?php


} else {
?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">

  <br>
  <b style="font-size:14px; font-family:Calibri">


    <?php
    if ($cb['nama_cabang'] != "") {
      echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
    } else {
      echo "PACIFIC ALL CABANG";
    }

    ?>
    <br>
    LAPORAN PENJUALAN<br>
    PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>

    <?php
    if ($salesman['nama_karyawan'] != "") {
      echo "NAMA SALES : " . strtoupper($salesman['nama_karyawan']);
    } else {
      echo "ALL SALES";
    }

    ?>
    <br>
    <?php
    if ($pelanggan['nama_pelanggan'] != "") {
      echo "NAMA PELANGGAN : " . strtoupper($pelanggan['nama_pelanggan']);
    }
    ?>


  </b>
  <br>
  <br>
  <table class="datatable3" style="width:150%" border="1">
    <thead bgcolor="#024a75" style="color:white; font-size:12;">
      <tr bgcolor="#024a75" style="color:white; font-size:12;">
        <th rowspan="2" style="width: 1%;">No</th>
        <th rowspan="2" style="width: 3%;">No Faktur</th>
        <th rowspan="2" style="width: 3%;">Tgl Transaksi</th>
        <th rowspan="2" style="width: 3%;">Kode Pelanggan</th>
        <th rowspan="2" style="width: 5%;">Nama Pelanggan</th>
        <th rowspan="2" style="width: 4%;">Salesman</th>
        <th rowspan="2" style="width: 3%;">Pasar</th>
        <th rowspan="2" style="width: 3%;">Hari</th>
        <th colspan="15" style="background-color: #19c116;">Produk</th>
        <th rowspan="2" style="width: 3%; background-color: #ef6a0b;">Total Bruto</th>
        <th rowspan="2" style="width: 3%; background-color: #ef6a0b;">Total Retur</th>
        <th colspan="5" style="background-color: #a71033;">Potongan</th>
        <th rowspan="2" style="width: 3%; background-color: #f353c1;">Pot. Istimewa</th>
        <th rowspan="2" style="width: 3%; background-color: #024a75;">Total Netto</th>
        <th rowspan="2" style="width: 5%; background-color: #024a75;">Tunai / Kredit</th>
        <th rowspan="2" style="width: 3%; background-color: #024a75;">Total Bayar</th>
        <th rowspan="2" style="width: 3%; background-color: #024a75;">Last Payment</th>
        <th rowspan="2" style="width: 5%; background-color: #024a75;">Lunas / Belum Lunas</th>

      </tr>
      <tr style="background-color: #19c116;">
        <th style="width: 1%;">AB</th>
        <th style="width: 1%;">AR</th>
        <th style="width: 1%;">AS</th>
        <th style="width: 1%;">BB</th>
        <th style="width: 1%;">CG</th>
        <th style="width: 1%;">CGG</th>
        <th style="width: 1%;">DEP</th>
        <th style="width: 1%;">DK</th>
        <th style="width: 1%;">DS</th>
        <th style="width: 1%;">SP</th>
        <th style="width: 1%;">BBP</th>
        <th style="width: 1%;">SPP</th>
        <th style="width: 1%;">CG5</th>
        <th style="width: 1%;">SC</th>
        <th style="width: 1%;">SP8</th>
        <th style="width: 1%; background-color: #a71033;">AIDA</th>
        <th style="width: 1%; background-color: #a71033;">SWAN</th>
        <th style="width: 1%; background-color: #a71033;">STICK</th>
        <th style="width: 1%; background-color: #a71033;">SP</th>
        <th style="width: 1%; background-color: #a71033;">TOTAL POTONGAN</th>

      </tr>
    </thead>
    <tbody>
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

      echo $isipcsdusDS;
      $no = 1;
      $totalbruto = 0;
      $totalretur = 0;
      $totalpotaida = 0;
      $totalpotswan = 0;
      $totalpotstick = 0;
      $totalpotsp = 0;
      $totalpotongan = 0;
      $totalpotis = 0;
      $totalnetto = 0;

      $totalAB = 0;
      $totalAR = 0;
      $totalAS = 0;
      $totalBB = 0;
      $totalCG = 0;
      $totalCGG = 0;
      $totalDEP = 0;
      $totalDK = 0;
      $totalDS = 0;
      $totalSP = 0;
      $totalBBP = 0;
      $totalSPP = 0;
      $totalCG5 = 0;
      $totalSC = 0;
      $totalSP8 = 0;
      foreach ($penjualan as $d) {

        $totalbruto += $d->totalbruto;
        $totalretur += $d->totalretur;
        $totalpotaida += $d->potaida;
        $totalpotswan += $d->potswan;
        $totalpotstick += $d->potstick;
        $totalpotsp += $d->potsp;
        $totalpotongan += $d->potongan;
        $totalpotis += $d->potistimewa;
        $totalnetto += $d->totalnetto;

        if (!empty($d->AB)) {
          $AB = $d->AB / $isipcsdusAB;
        } else {
          $AB = 0;
        }

        if (!empty($d->AR)) {
          $AR = $d->AR / $isipcsdusAR;
        } else {
          $AR = 0;
        }


        if (!empty($d->AS)) {
          $AS = $d->AS / $isipcsdusAS;
        } else {
          $AS = 0;
        }

        if (!empty($d->BB)) {
          $BB = $d->BB / $isipcsdusBB;
        } else {
          $BB = 0;
        }

        if (!empty($d->CG)) {
          $CG = $d->CG / $isipcsdusCG;
        } else {
          $CG = 0;
        }

        if (!empty($d->CGG)) {
          $CGG = $d->CGG / $isipcsdusCGG;
        } else {
          $CGG = 0;
        }

        if (!empty($d->DEP)) {
          $DEP = $d->DEP / $isipcsdusDEP;
        } else {
          $DEP = 0;
        }

        if (!empty($d->DK)) {
          $DK = $d->DK / $isipcsdusDK;
        } else {
          $DK = 0;
        }

        if (!empty($d->DS)) {
          $DS = $d->DS / $isipcsdusDS;
        } else {
          $DS = 0;
        }

        if (!empty($d->SP)) {
          $SP = $d->SP / $isipcsdusSP;
        } else {
          $SP = 0;
        }

        if (!empty($d->BBP)) {
          $BBP = $d->BBP / $isipcsdusBBP;
        } else {
          $BBP = 0;
        }

        if (!empty($d->SPP)) {
          $SPP = $d->SPP / $isipcsdusSPP;
        } else {
          $SPP = 0;
        }

        if (!empty($d->CG5)) {
          $CG5 = $d->CG5 / $isipcsdusCG5;
        } else {
          $CG5 = 0;
        }

        if (!empty($d->SC)) {
          $SC = $d->SC / $isipcsdusSC;
        } else {
          $SC = 0;
        }

        if (!empty($d->SP8)) {
          $SP8 = $d->SP8 / $isipcsdusSP8;
        } else {
          $SP8 = 0;
        }
        $totalAB += $AB;
        $totalAR += $AR;
        $totalAS += $AS;
        $totalBB += $BB;
        $totalCG += $CG;
        $totalCGG += $CGG;
        $totalDEP += $DEP;
        $totalDK += $DK;
        $totalDS += $DS;
        $totalSP += $SP;
        $totalBBP += $BBP;
        $totalSPP += $SPP;
        $totalCG5 += $CG5;
        $totalSC += $SC;
        $totalSP8 += $SP8;


        if ($d->status_lunas == 1) {
          $ket = "LUNAS";
          $colortext = "green";
          $color = "";
        } else {
          $ket = "BELUM LUNAS";
          $colortext =  "red";
          $color = "#f70a4b61";
        }
      ?>
        <tr style="font-size: 12px; background-color: <?php echo $color; ?>">
          <td align="center"><?php echo $no; ?></td>
          <td align="center"><?php echo $d->no_fak_penj; ?></td>
          <td align="center"><?php echo DateToIndo2($d->tgltransaksi); ?></td>
          <td align="center"><?php echo $d->kode_pelanggan; ?></td>
          <td align="left"><?php echo strtoupper($d->nama_pelanggan); ?></td>
          <td align="left"><?php echo strtoupper($d->nama_karyawan); ?></td>
          <td align="left"><?php echo strtoupper($d->pasar); ?></td>
          <td align="left"><?php echo strtoupper($d->hari); ?></td>
          <td align="center">
            <?php
            if (!empty($AB)) {
              echo formatqty($AB);
            }
            ?>
          </td>
          <td align="center">
            <?php
            if (!empty($AR)) {
              echo formatqty($AR);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($AS)) {
              echo formatqty($AS);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($BB)) {
              echo formatqty($BB);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($CG)) {
              echo formatqty($CG);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($CGG)) {
              echo formatqty($CGG);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($DEP)) {
              echo formatqty($DEP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($DK)) {
              echo formatqty($DK);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($DS)) {
              echo formatqty($DS);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($SP)) {
              echo formatqty($SP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($BBP)) {
              echo formatqty($BBP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($SPP)) {
              echo formatqty($SPP);
            }
            ?>

          </td>
          <td align="center">
            <?php
            if (!empty($CG5)) {
              echo formatqty($CG5);
            }
            ?>

          </td>

          <td align="center">
            <?php
            if (!empty($SC)) {
              echo formatqty($SC);
            }
            ?>

          </td>

          <td align="center">
            <?php
            if (!empty($SP8)) {
              echo formatqty($SP8);
            }
            ?>

          </td>
          <td align="right"><b><?php echo uang($d->totalbruto); ?></b></td>
          <td align="right"><b><?php if (!empty($d->totalretur)) {
                                  echo uang($d->totalretur);
                                } ?></b></td>
          <td align="right"><b><?php if (!empty($d->potaida)) {
                                  echo uang($d->potaida);
                                } ?></b></td>

          <td align="right"><b><?php if (!empty($d->potswan)) {
                                  echo uang($d->potswan);
                                } ?></b></td>
          <td align="right"><b><?php if (!empty($d->potstick)) {
                                  echo uang($d->potstick);
                                } ?></b></td>
          <td align="right"><b><?php if (!empty($d->potsp)) {
                                  echo uang($d->potsp);
                                } ?></b></td>
          <td align="right"><b><?php if (!empty($d->potongan)) {
                                  echo uang($d->potongan);
                                } ?></b></td>
          <td align="right"><b><?php if (!empty($d->potistimewa)) {
                                  echo uang($d->potistimewa);
                                } ?></b></td>
          <td align="right"><b><?php if (!empty($d->totalnetto)) {
                                  echo uang($d->totalnetto);
                                } ?></b></td>

          <td align="center"><?php echo strtoupper($d->jenistransaksi); ?></td>
          <td align="right"><b><?php if (!empty($d->totalbayar)) {
                                  echo uang($d->totalbayar);
                                } ?></b></td>
          <td align="center"><?php echo DateToIndo2($d->lastpayment); ?></td>
          <td align="center" style="color: <?php echo $colortext; ?>;">
            <b>
              <?php echo $ket; ?>
            </b>

          </td>
        </tr>
      <?php
        $no++;
      }
      ?>
      <tr style="background-color: #024a75; color:white">
        <th colspan="8">TOTAL</th>
        <th align="right"><b><?php echo formatqty($totalAB); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalAR); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalAS); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalBB); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalCG); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalCGG); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalDEP); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalDK); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalDS); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalSP); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalBBP); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalSPP); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalCG5); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalSC); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalSP8); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalbruto); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalretur); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalpotaida); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalpotswan); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalpotstick); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalpotsp); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalpotongan); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalpotis); ?></b></th>
        <th align="right"><b><?php echo formatqty($totalnetto); ?></b></th>
      </tr>
    </tbody>
  </table>
<?php  } ?>
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
      <th colspan="3">TARGET & REALISASI KATEGORI A (BB & DEP)(50)</th>
      <th colspan="3">TARGET & REALISASI KATEGORI B (ALL AIDA)(30)</th>
      <th colspan="3">TARGET & REALISASI KATEGORI PF (DS,SP,DK)(20)</th>
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


    $totaltargetA = 0;
    $totaltargetB = 0;
    $totaltargetPF = 0;

    $totalrealisasiA =  0;
    $totalrealisasiB = 0;
    $totalrealisasiPF = 0;

    $totaltargetcashin = 0;
    $totalrealisasicashin = 0;

    $totalsisapiutang = 0;
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

      $totaltargetA = $totaltargetA + $k->targetkategoriA;
      $totaltargetB = $totaltargetB + $k->targetkategoriB;
      $totaltargetPF = $totaltargetPF + $k->targetproductfocus;

      $totalrealisasiA += $k->realisasitargetA;
      $totalrealisasiB += $k->realisasitargetB;
      $totalrealisasiPF += $k->realisasitargetproductfocus;

      if (!empty($totaltargetA)) {
        $totalhasilkategoriA = ($totalrealisasiA / $totaltargetA) * $poinkategoriA;
      } else {
        $totalhasilkategoriA = 0;
      }

      if (!empty($totaltargetB)) {
        $totalhasilkategoriB = ($totalrealisasiB / $totaltargetB) * $poinkategoriB;
      } else {
        $totalhasilkategoriB = 0;
      }

      if (!empty($totaltargetPF)) {
        $totalhasilkategoriPF = ($totalrealisasiPF / $totaltargetPF) * $poinkategoriPF;
      } else {
        $totalhasilkategoriPF = 0;
      }

      $totalallpoint = ($totalhasilkategoriA + $totalhasilkategoriB + $totalhasilkategoriPF);

      $totaltargetcashin += $k->jumlah_target_cashin;
      $totalrealisasicashin += $k->jml_cashin;

      if (!empty($totaltargetcashin)) {
        $totalhasilcashin = ($totalrealisasicashin / $totaltargetcashin) * 100;
      } else {
        $totalhasilcashin = 0;
      }


      $totalsisapiutang += $k->sisapiutang;

      if (!empty($totalrealisasicashin)) {
        $bftotaljt = ($totalsisapiutang / $totalrealisasicashin) * 100;
      } else {
        $bftotaljt = 0;
      }
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
                            $bfcashin = 100 - $hasilcashin;
                            if ($bfcashin < 0) {
                              $bfcash = 0;
                            } else {
                              $bfcash = $bfcashin;
                            }
                            echo formatnumber($bfcash);
                          } ?>
        </td>
        <td align="right"><?php echo formatnumber($k->sisapiutang); ?></td>
        <td align="right"><?php if (!empty($totalpoin)) {
                            echo formatnumber($bfjt);
                          } ?></td>
        <td align="right"><?php if (!empty($totalpoin)) {
                            echo formatnumber($bfjt + ($bfcash));
                          } ?></td>
      </tr>
    <?php $no++;
    } ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td></td>
      <td>Kepala Penjualan</td>
      <td align="right"><?php echo formatnumber($totaltargetA); ?></td>
      <td align="right"><?php echo formatnumber($totalrealisasiA); ?></td>
      <td align="right"><?php echo formatnumber($totalhasilkategoriA); ?></td>
      <td align="right"><?php echo formatnumber($totaltargetB); ?></td>
      <td align="right"><?php echo formatnumber($totalrealisasiB); ?></td>
      <td align="right"><?php echo formatnumber($totalhasilkategoriB); ?></td>
      <td align="right"><?php echo formatnumber($totaltargetPF); ?></td>
      <td align="right"><?php echo formatnumber($totalrealisasiPF); ?></td>
      <td align="right"><?php echo formatnumber($totalhasilkategoriPF); ?></td>
      <td align="right"><?php echo formatnumber($totalallpoint); ?></td>
      <td align="right"><?php echo formatnumber($totaltargetcashin); ?></td>
      <td align="right"><?php echo formatnumber($totalrealisasicashin); ?></td>
      <td align="right"><?php echo formatnumber($totalhasilcashin); ?></td>

      <td align="right">
        <?php if (!empty($totalallpoint)) {
          $bftotalcashin = 100 - $totalhasilcashin;
          if ($bftotalcashin < 0) {
            $bftotalcash = 0;
          } else {
            $bftotalcash = $bftotalcashin;
          }
          echo formatnumber($bftotalcash);
        } ?>
      </td>
      <td align="right"><?php echo formatnumber($totalsisapiutang); ?></td>
      <td align="right">
        <?php if (!empty($totalallpoint)) {
          echo formatnumber($bftotaljt);
        } ?>
      </td>
      <td align="right"><?php if (!empty($totalallpoint)) {
                          echo formatnumber($bftotaljt + ($bftotalcash));
                        } ?></td>
    </tr>
  </tbody>
</table>
<?php

function uang($nilai)
{

  return number_format($nilai, 2, ',', '.');
}
// error_reporting(0);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:20px; font-family:Calibri">
  MAKMUR PERMATA<br>
  REKAPITULASI PERSEDIAAN GUDANG
  <?php if ($kategori == 'B001') {
    echo "BAHAN";
  } else {
    echo "KEMASAN";
  } ?><br>
  BULAN <?php echo $bulan; ?><br>
  TAHUN <?php echo $tahun; ?><br>
</b>
<br>
<style>
tr:nth-child(even) {
  background-color: #d6d6d6c2;
}
</style>
<table class="datatable3" style="width:250%;zoom:85%" border="1">
  <thead>
    <tr bgcolor="#024a75">
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">NO</th>
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">KODE BARANG</th>
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">NAMA BARANG</th>
      <th rowspan="4" bgcolor="#024a75" style="color:white; font-size:14;">SATUAN</th>
    </tr>
    <tr bgcolor="#28a745">
      <th colspan="3" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">SALDO AWAL</th>
      <th colspan="9" bgcolor="#28a745" style="color:white; font-size:14;">PEMASUKAN</th>
      <th colspan="18" bgcolor="#28a745" style="color:white; font-size:14;">PENGELUARAN</th>
      <th colspan="6" bgcolor="#28a745" style="color:white; font-size:14;">SALDO AKHIR</th>
    </tr>
    <tr bgcolor="red">
      <th style="color:white; font-size:14;" colspan="3">PEMBELIAN</th>
      <th style="color:white; font-size:14;" colspan="3">LAINNYA</th>
      <th style="color:white; font-size:14;" colspan="3">RETUR PENGGANTI</th>
      <th style="color:white; font-size:14;" colspan="3">PRODUKSI</th>
      <th style="color:white; font-size:14;" colspan="3">SEASONING</th>
      <th style="color:white; font-size:14;" colspan="3">PDQC</th>
      <th style="color:white; font-size:14;" colspan="3">SUSUT</th>
      <th style="color:white; font-size:14;" colspan="3">CABANG</th>
      <th style="color:white; font-size:14;" colspan="3">LAINNYA</th>
      <th style="color:white; font-size:14;" colspan="3">UNIT</th>
      <th style="color:white; font-size:14;" colspan="3">BERAT</th>
    </tr>
    <tr bgcolor="red">
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">HARGA</th>
      <th bgcolor="#024a75"  style="color:white; font-size:14;">JUMLAH</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no               = 1;
    $totalproduksi    = 0;
    $totalcabangpeng  = 0;
    $totalseasoning   = 0;
    $totalpdqc        = 0;
    $totalsusut       = 0;
    $totalpembelian   = 0;
    $totallainnya     = 0;
    $totalqtyunitsa   = 0;
    $totalqtyberatsa  = 0;
    $saldoakhirunit2  = 0;
    $totallainnyapeng = 0;
    $saldoakhirberat2 = 0;
    $totalretur       = 0;
    foreach ($data as $key => $d) {
      $saldoakhirberat     = $d->qtyberatsa + $d->qtypemb2 + $d->qtylainnya2 + $d->qtypengganti2 - $d->qtyprod4 - $d->qtyseas4 - $d->qtypdqc4 - $d->qtylain4 - $d->qtysus4 - $d->qtycabang4;
      $saldoakhirunit      = $d->qtyunitsa + $d->qtypemb1 + $d->qtylainnya1 + $d->qtypengganti1 - $d->qtyprod3 - $d->qtyseas3 - $d->qtypdqc3 - $d->qtylain3 - $d->qtysus3 - $d->qtycabang3;

      if ($d->satuan != 'KG') {
        $totalpembelian     += $d->qtypemb1;
      } else {
        $totalpembelian     += $d->qtypemb2;
      }

      if ($d->satuan != 'KG') {
        $totallainnya       += $d->qtylainnya1;
      } else {
        $totallainnya       += $d->qtylainnya2;
      }

      if ($d->satuan != 'KG') {
        $totalproduksi      += $d->qtyprod3;
      } else {
        $totalproduksi      += $d->qtyprod4;
      }

      if ($d->satuan != 'KG') {
        $totalseasoning     += $d->qtyseas3;
      } else {
        $totalseasoning     += $d->qtyseas4;
      }

      if ($d->satuan != 'KG') {
        $totalpdqc          += $d->qtypdqc3;
      } else {
        $totalpdqc          += $d->qtypdqc4;
      }

      if ($d->satuan != 'KG') {
        $totallainnyapeng   += $d->qtylain3;
      } else {
        $totallainnyapeng   += $d->qtylain4;
      }

      if ($d->satuan != 'KG') {
        $totalcabangpeng   += $d->qtycabang3;
      } else {
        $totalcabangpeng   += $d->qtycabang4;
      }

      if ($d->satuan != 'KG') {
        $totalsusut         += $d->qtysus3;
        $totalretur       = $totalretur + $d->qtypengganti1;
      } else {
        $totalsusut         += $d->qtysus4;
        $totalretur       = $totalretur + $d->qtypengganti2;
      }

      $totalqtyunitsa   = $totalqtyunitsa + $d->qtyunitsa;
      $totalqtyberatsa  = $totalqtyberatsa + $d->qtyberatsa;

      $saldoakhirunit2  = $saldoakhirunit2 + $saldoakhirunit;
      $saldoakhirberat2 = $saldoakhirberat2 + $saldoakhirberat;
      


    ?>
      <tr style="font-size: 14;">
        <td><?php echo $no++; ?></td>
        <td><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <?php if ($d->satuan != 'KG') { ?>
          
        <?php } else { ?>
          <td align="center">
            <?php if ($d->qtyberatsa != 0) {
              $qtysaldoawal = $d->qtyberatsa*1000;
              echo uang($d->qtyberatsa*1000, 2);
            } else {
              $qtysaldoawal = $d->qtyberatsa*1000;
              echo "0";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyberatsa)) {
              $hargasa = $d->harga/$d->qtyberatsa*1000;
              echo uang($hargasa, 2);
            }else{
              $hargasa = $d->harga/$d->qtyberatsa*1000;
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtysaldoawal)) {
              $jmlhsaldoawalberat = $qtysaldoawal * $hargasa;
              echo uang($jmlhsaldoawalberat , 2);
            }else{
              $jmlhsaldoawalberat = $qtysaldoawal * $hargasa;
              echo "";
            }
            ?>
          </td>
        <?php }  ?>
        
        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtypemb1)) {
              echo uang($d->qtypemb1, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypemb2)) {
            $qtypemb2 = $d->qtypemb2*1000;
            echo uang($qtypemb2, 2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->totalharga)) {
              echo uang($d->totalharga / ($d->qtypemb2 * 1000), 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->totalharga)) {
              $jmlhpemb2 = ($d->qtypemb2*1000) * ($d->totalharga / ($d->qtypemb2 * 1000));
              echo uang($jmlhpemb2 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtylainnya1)) {
              echo uang($d->qtylainnya1, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtylainnya2)) {
            $qtylainnya2 = $d->qtylainnya2*1000;
            echo uang($qtylainnya2, 2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylainnya2)) {
              echo uang($d->totalharga / ($d->qtypemb2 * 1000), 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylainnya2)) {
              $jmlhlainnya2 = ($d->qtylainnya2*1000) * ($d->totalharga / ($d->qtypemb2 * 1000));
              echo uang($jmlhlainnya2 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtypengganti1)) {
              echo uang($d->qtypengganti1, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypengganti2)) {
            $qtypengganti2 = $d->qtypengganti2*1000;
            echo uang($qtypengganti2*1000, 2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypengganti2)) {
              echo uang($d->totalharga / ($d->qtypemb2 * 1000), 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypengganti2)) {
              $jmlhretur2 = ($d->qtypengganti2*1000) * ($d->totalharga / ($d->qtypemb2 * 1000));
              echo uang($jmlhretur2 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>


        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtyprod3)) {
              echo uang($d->qtyprod3, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
            $qtyprod4 = $d->qtyprod4*1000;
            echo uang($qtyprod4, 2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
              $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaldoawalberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
              echo uang($hargakeluarberat, 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
              $jmlhproduksi4 = ($qtyprod4 * $hargakeluarberat);
              echo uang($jmlhproduksi4 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtyseas3)) {
              echo uang($d->qtyseas3, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              $qtyseas4 = $d->qtyseas4*1000;
              echo uang($qtyseas4, 2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaldoawalberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
              echo uang($hargakeluarberat, 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              $jmlhproduksi4 = ($qtyseas4 * $hargakeluarberat);
              echo uang($jmlhproduksi4 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtypdqc3)) {
              echo uang($d->qtypdqc3, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              $qtypdqc4 = $d->qtypdqc4*1000;
              echo uang($qtypdqc4, 2);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaldoawalberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
              echo uang($hargakeluarberat, 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              $jmlhproduksi4 = ($qtypdqc4 * $hargakeluarberat);
              echo uang($jmlhproduksi4 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtysus3)) {
              echo uang($d->qtysus3*1000, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              $qtysus4 = $d->qtysus4*1000;
              echo uang($qtysus4, 2);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaldoawalberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
              echo uang($hargakeluarberat, 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              $jmlhproduksi4 = ($qtysus4 * $hargakeluarberat);
              echo uang($jmlhproduksi4 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>

          <td align="center">
            <?php if (!empty($d->qtycabang3)) {
              echo uang($d->qtycabang3*1000, 2);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              $qtycabang4 = $d->qtycabang4*1000;
              echo uang($qtycabang4, 2);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaldoawalberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
              echo uang($hargakeluarberat, 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              $jmlhproduksi4 = ($qtycabang4 * $hargakeluarberat);
              echo uang($jmlhproduksi4 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>

          <td align="center">
            <?php if (!empty($d->qtylain3)) {
              echo uang($d->qtylain3*1000, 2);
            }
            ?>
          </td>
         
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              $qtylain4 = $d->qtylain4*1000;
              echo uang($qtylain4, 2);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaldoawalberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
              echo uang($hargakeluarberat, 2);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              $jmlhproduksi4 = ($qtylain4 * $hargakeluarberat);
              echo uang($jmlhproduksi4 , 2);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <td align="center">
          <?php if (!empty($saldoakhirunit)) {
            echo uang($saldoakhirunit);
          }
          ?>
        </td>
        <td align="center">
          <?php if (!empty($saldoakhirberat)) {
            $saldoakhirberat = $saldoakhirberat*1000; 
            echo uang($saldoakhirberat, 2);
          }
          ?>
        </td>
        <td align="center">
          <?php if (!empty($saldoakhirberat)) {
            $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaldoawalberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
            echo uang($hargakeluarberat, 2);
          }else{
            echo "";
          }
          ?>
        </td>
        <td align="center">
          <?php if (!empty($saldoakhirberat)) {
            $jmlhsaldoakhirberat = ($saldoakhirberat * $hargakeluarberat);
            echo uang($jmlhsaldoakhirberat , 2);
          }else{
            echo "";
          }
          ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
  <tfoot>
    <tr bgcolor="#024a75">
      <th colspan="4" style="color:white; font-size:14;">TOTAL</th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalqtyunitsa)) {
          echo uang($totalqtyunitsa*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>


      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalqtyberatsa)) {
          echo uang($totalqtyberatsa*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalpembelian)) {
          echo uang($totalpembelian*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totallainnya)) {
          echo uang($totallainnya*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalretur)) {
          echo uang($totalretur*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalproduksi)) {
          echo uang($totalproduksi*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalseasoning)) {
          echo uang($totalseasoning*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalpdqc)) {
          echo uang($totalpdqc*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>


      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalsusut)) {
          echo uang($totalsusut*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalcabangpeng)) {
          echo uang($totalcabangpeng*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totallainnyapeng)) {
          echo uang($totallainnyapeng*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($saldoakhirunit2)) {
          echo uang($saldoakhirunit2*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($saldoakhirberat2)) {
          echo uang($saldoakhirberat2*1000, 2);
        } else {
          echo "0";
        }
        ?>
      </th>

    </tr>
  </tfoot>
</table>
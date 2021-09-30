<?php

function uang($nilai)
{

  return number_format($nilai, 2, ',', '.');
}

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<style>
 
  tr:nth-child(even) {
    background-color: #d6d6d6c2;
  }
</style>
<br>
<b style="font-size:16px; font-family:Calibri">
  MAKMUR PERMATA<br>
  REKAPITULASI PERSEDIAAN BARANG LOGISTIK<br>
  BULAN <?php echo $bulan; ?><br>
  TAHUN <?php echo $tahun; ?><br>
</b>
<br>
<table class="datatable3" style="width:150%" id="table-1" <?php if ($kategori == "K001") {
                                echo "style='width: 100%'";
                              } else {
                                echo "style='width: 100%'";
                              } ?> border="1">
  <thead>
    <tr bgcolor="#024a75">
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;width:15px">NO</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;width:100px">KODE</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;width:300px">NAMA BARANG</th>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;width:100px">SATUAN</th>
      <th <?php if ($kategori == "K001") {
            echo "colspan='3'";
          } else {
            echo "rowspan='2'";
          } ?> style="color:white; font-size:14;width:180px">SALDO AWAL</th>
      <th <?php if ($kategori == "K001") {
            echo "colspan='3'";
          } else {
            echo "rowspan='2'";
          } ?> style="color:white; font-size:14;width:180px">MASUK</th>
      <th <?php if ($kategori == "K001") {
            echo "colspan='3'";
          } else {
            echo "rowspan='2'";
          } ?> style="color:white; font-size:14;width:180px">KELUAR</th>
      <th <?php if ($kategori == "K001") {
            echo "colspan='3'";
          } else {
            echo "rowspan='2'";
          } ?> style="color:white; font-size:14;width:180px">STOK AKHIR KARTU GUDANG</th>
      <th rowspan="2" style="color:white; font-size:14;width:70px">OPNAME</th>
      <th rowspan="2" style="color:white; font-size:14;width:70px">SELISIH</th>
    </tr>
    <tr bgcolor="#28a745">
      <?php if ($kategori == "K001") { ?>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:70px">STOK</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:90px">HARGA</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:120px">JUMLAH</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:70px">QTY</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:90px">HARGA</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:120px">JUMLAH</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:70px">QTY</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:90px">HARGA</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:120px">JUMLAH</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:70px">QTY</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:90px">HARGA</th>
        <th bgcolor="#28a745" style="color:white; font-size:14;width:120px">JUMLAH</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no                     = 1;
    $totqtystokakhir        = 0;
    $tothargasaldo          = 0;
    $totalsaldoawal         = 0;
    $totqtysaldoawal        = 0;
    $totqtymasuk            = 0;
    $totalpemasukan         = 0;
    $totstokakhir           = 0;
    $totalopname            = 0;
    $totalselisih           = 0;
    $totqtykeluar           = 0;
    $totalpengeluaran       = 0;
    foreach ($data as $key => $d) {
      $kode_kategori    = $d->kode_kategori;

      $qtyrata          = $d->qtysaldoawal + $d->qtypemasukan;
      if ($qtyrata != "") {
        $qtyrata        = $d->qtysaldoawal + $d->qtypemasukan;
      } else {
        $qtyrata        = 1;
      }

      $stokakhir      = $d->qtysaldoawal + $d->qtypemasukan - $d->qtypengeluaran;

      if ($d->hargasaldoawal == "" and $d->hargasaldoawal == "0") {
        $hargakeluar      = $d->hargapemasukan  + $d->penyesuaian;
      } elseif ($d->hargapemasukan == "" and $d->hargapemasukan == "0") {
        $hargakeluar      = $d->hargasaldoawal;
      } else {
        $hargakeluar      = (($d->totalsa * 1) + ($d->totalpemasukan * 1) + ($d->penyesuaian * 1)) / $qtyrata;
      }

      if ($d->hargapemasukan == "" and $d->hargapemasukan == "0") {
        $hargamasuk = $d->hargapemasukan + $d->penyesuaian;
      } else if ($d->hargapemasukan != "") {
        $hargamasuk = ($d->totalpemasukan * 1) / $d->qtypemasukan + ($d->penyesuaian * 1);
      } else {
        $hargamasuk = 0;
      }

      $jmlhpengeluaran  = $hargakeluar * $d->qtypengeluaran;

      $jmlstokakhir     = $stokakhir * $hargakeluar;
      $selsish          = $stokakhir - $d->qtyopname;

      $totqtystokakhir  += $stokakhir;
      $tothargasaldo    += $d->hargasaldoawal;
      $totalsaldoawal   += $d->totalsa;
      $totqtysaldoawal  += $d->qtysaldoawal;
      $totqtymasuk      += $d->qtypemasukan;
      $totalpemasukan   += $d->totalpemasukan + $d->penyesuaian;

      $totqtykeluar     += $d->qtypengeluaran;
      $totalpengeluaran += $jmlhpengeluaran;

      $totstokakhir     += $jmlstokakhir;
      $totalopname      += $d->qtyopname;
      $totalselisih     += $selsish;


    ?>
      <tr style="font-size: 12">
        <td width="15px"><?php echo $no++; ?></td>
        <td width="100px"><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <!-- Saldo Awal -->
        <td width="70px" align="center">
          <?php
          echo uang($d->qtysaldoawal);
          ?>
        </td>
        <?php if ($kategori == "K001") { ?>
          <td width="90px" align="right">
            <?php
            echo uang($d->hargasaldoawal);
            ?>
          </td>

          <td width="115px" align="right">
            <?php
            echo uang($d->totalsa);
            ?>
          </td>
        <?php } ?>
        <!-- Pemasukan -->
        <td width="70px" align="center">
          <?php if (!empty($d->qtypemasukan) and $d->qtypemasukan != "0") {
            echo uang($d->qtypemasukan);
          }
          ?>
        </td>
        <?php if ($kategori == "K001") { ?>
          <td width="90px" align="right">
            <?php if (!empty($hargamasuk) and $hargamasuk != "0") {
              echo uang($hargamasuk);
            }
            ?>
          </td>
          <td width="120px" align="right">
            <?php if (!empty($d->totalpemasukan + $d->penyesuaian) and $d->totalpemasukan + $d->penyesuaian != "0") {
              echo uang($d->totalpemasukan + $d->penyesuaian);
            }
            ?>
          </td>
        <?php } ?>
        <!-- Pengeluaran -->
        <td width="70px" align="center">
          <?php if (!empty($d->qtypengeluaran) and $d->qtypengeluaran != "0") {
            echo uang($d->qtypengeluaran);
          }
          ?>
        </td>
        <?php if ($kategori == "K001") { ?>
          <td width="90px" align="right">
            <?php if (!empty($hargakeluar) and $hargakeluar != "0" and !empty($d->qtypengeluaran)) {
              echo uang($hargakeluar);
            }
            ?>
          </td>
          <td width="120px" align="right">
            <?php if (!empty($jmlhpengeluaran) and $jmlhpengeluaran != "0") {
              echo uang($jmlhpengeluaran);
            }
            ?>
          </td>
        <?php } ?>
        <!-- Stok Akhir -->
        <td width="70px" align="center">
          <?php
          echo uang($stokakhir);
          ?>
        </td>
        <?php if ($kategori == "K001") { ?>
          <td width="90px" align="right">
            <?php
            echo uang($hargakeluar);
            ?>
          </td>
          <td width="120px" align="right">
            <?php
            echo uang($jmlstokakhir);
            ?>
          </td>
        <?php } ?>
        <!-- Opname -->
        <td width="70px" align="center">
          <?php if (!empty($d->qtyopname) and $d->qtyopname != "0") {
            echo uang($d->qtyopname);
          }
          ?>
        </td>
        <td width="70px" align="center">
          <?php if (!empty($selsish) and $selsish != "0") {
            echo uang($selsish);
          }
          ?>
        </td>

      </tr>
    <?php
    }
    ?>
  </tbody>
  <tfoot bgcolor="#024a75" style="color:white; font-size:14;">
    <tr>
      <th style="color:white; font-size:14;" colspan="4">TOTAL</th>
      <th align="center">
        <?php
        echo uang($totqtysaldoawal);
        ?>
      </th>
      <?php if ($kategori == "K001") { ?>
        <th align="center">
        </th>
        <th align="center">
          <?php if (!empty($totalsaldoawal) and $totalsaldoawal != "0"  and $kode_kategori == "K001") {
            echo uang($totalsaldoawal);
          }
          ?>
        </th>
      <?php } ?>
      <th align="center">
        <?php if (!empty($totqtymasuk) and $totqtymasuk != "0") {
          echo uang($totqtymasuk);
        }
        ?>
      </th>
      <?php if ($kategori == "K001") { ?>
        <th></th>
        <th align="center">
          <?php if (!empty($totalpemasukan) and $totalpemasukan != "0" and $kode_kategori == "K001") {
            echo uang($totalpemasukan);
          }
          ?>
        </th>
      <?php } ?>
      <th align="center">
        <?php if (!empty($totqtykeluar) and $totqtykeluar != "0") {
          echo uang($totqtykeluar);
        }
        ?>
      </th>
      <?php if ($kategori == "K001") { ?>
        <th></th>
        <th align="center">
          <?php if (!empty($totalpengeluaran) and $totalpengeluaran != "0" and $kode_kategori == "K001") {
            echo uang($totalpengeluaran);
          }
          ?>
        </th>
      <?php } ?>
      <th bgcolor="green" align="center">
        <?php if (!empty($totqtystokakhir) and $totqtystokakhir != "0") {
          echo uang($totqtystokakhir);
        }
        ?>
      </th>
      <?php if ($kategori == "K001") { ?>
        <th></th>
        <th bgcolor="green" align="center">
          <?php if (!empty($totstokakhir) and $totstokakhir != "0" and $kode_kategori == "K001") {
            echo uang($totstokakhir);
          }
          ?>
        </th>
      <?php } ?>
      <th align="center">
        <?php if (!empty($totalopname) and $totalopname != "0") {
          echo uang($totalopname);
        }
        ?>
      </th>
      <th align="center">
        <?php if (!empty($totalselisih) and $totalselisih != "0") {
          echo uang($totalselisih);
        }
        ?>
      </th>
    </tr>
  </tfoot>
</table>

<script>
  
</script>
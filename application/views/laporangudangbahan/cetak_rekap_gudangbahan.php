<?php

function uang($nilai)
{

  return number_format($nilai, 2, ',', '.');
}
// error_reporting(0);
?>
<style>
  .besar {
    text-transform: uppercase;
  }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:20px; font-family:Calibri" class="besar">
  MAKMUR PERMATA<br>
  REKAPITULASI PERSEDIAAN <?php echo $barang['nama_barang']; ?><br>
  PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>
<style>
tr:nth-child(even) {
  background-color: #d6d6d6c2;
}
</style>
<table class="datatable3" style="width:100%" border="1">
  <thead>
    <tr>
      <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">TANGGAL</th>
      <!-- <th rowspan="2" bgcolor="#024a75" style="color:white; font-size:14;">BTB</th> -->
      <th rowspan="1" colspan="2" bgcolor="#024a75" style="color:white; font-size:14;">UNIT</th>
      <th rowspan="1" bgcolor="#024a75" style="color:white; font-size:14;">SALDO</th>
      <th rowspan="3" bgcolor="#024a75" style="color:white; font-size:14;">KETERANGAN</th>
      <th rowspan="1" colspan="3" bgcolor="#024a75" style="color:white; font-size:14;">MASUK</th>
      <th rowspan="1" colspan="6" bgcolor="#024a75" style="color:white; font-size:14;">KELUAR</th>
      <th rowspan="1" bgcolor="#024a75" style="color:white; font-size:14;">SALDO AKHIR</th>
    </tr>
    <tr >
      <th bgcolor="#024a75" style="color:white; font-size:14;">IN</th>
      <th bgcolor="#024a75" style="color:white; font-size:14;">OUT</th>
      <th bgcolor="red" style="color:white; font-size:14;">
        <?php 
        if($barang['satuan'] != 'KG'){
          if (!empty($saldoawal['qtyunitsa'])) {
            echo uang($saldoawal['qtyunitsa']);
          }
        }else{
          if (!empty($saldoawal['qtyberatsa'])) {
            echo uang($saldoawal['qtyberatsa']);
          } 
        } ?>
      </th>
      <th bgcolor="green" style="color:white; font-size:14;">PEMBELIAN</th>
      <th bgcolor="green" style="color:white; font-size:14;">LAINNYA</th>
      <th bgcolor="green" style="color:white; font-size:14;">RETUR PENGGANTI</th>
      <th bgcolor="green" style="color:white; font-size:14;">PRODUKSI</th>
      <th bgcolor="green" style="color:white; font-size:14;">SEASONING</th>
      <th bgcolor="green" style="color:white; font-size:14;">PDQC</th>
      <th bgcolor="green" style="color:white; font-size:14;">SUSUT</th>
      <th bgcolor="green" style="color:white; font-size:14;">CABANG</th>
      <th bgcolor="green" style="color:white; font-size:14;">LAINNYA</th>
      <th bgcolor="red" style="color:white; font-size:14;">
        <?php 
        if($barang['satuan'] != 'KG'){
          if (!empty($saldoawal['qtyunitsa'])) {
            echo uang($saldoawal['qtyunitsa']);
          }
        }else{
          if (!empty($saldoawal['qtyberatsa'])) {
            echo uang($saldoawal['qtyberatsa']);
          } 
        } ?>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($barang['satuan'] == 'KG'){
      $saldoakhir        = $saldoawal['qtyberatsa'];
    }else{
      $saldoakhir        = $saldoawal['qtyunitsa'];
    }
    $totqtypemb         = 0;
    $totqtylainnya      = 0;
    $totqtylain         = 0;
    $totqtyretur        = 0;
    $totqtypro          = 0;
    $totqtyseas         = 0;
    $totqtypdqc         = 0;
    $totqtycabang       = 0;
    $totqtysus          = 0;
    $totqtyunitmasuk    = 0;
    $totqtyunitkeluar   = 0;
    while (strtotime($dari) <= strtotime($sampai)) {

      $qmasuk           = "SELECT SUM(qty_unit) as qty_unit, SUM(qty_berat) as qty_berat, 
      SUM( IF( departemen = 'Pembelian' , qty_berat ,0 )) AS qtypemb1,
      SUM( IF( departemen = 'Lainnya' , qty_berat ,0 )) AS qtylainnya1,
      SUM( IF( departemen = 'Retur Pengganti' , qty_berat ,0 )) AS qtyretur1,
      
      SUM( IF( departemen = 'Pembelian' , qty_unit ,0 )) AS qtypemb2,
      SUM( IF( departemen = 'Lainnya' , qty_unit ,0 )) AS qtylainnya2,
      SUM( IF( departemen = 'Retur Pengganti' , qty_unit ,0 )) AS qtyretur2
      FROM pemasukan_gb 
      INNER JOIN detail_pemasukan_gb 
      ON detail_pemasukan_gb.nobukti_pemasukan=pemasukan_gb.nobukti_pemasukan 
      WHERE tgl_pemasukan ='$dari' AND detail_pemasukan_gb.kode_barang = '$kode_barang'
      GROUP BY tgl_pemasukan";
      $masuk            = $this->db->query($qmasuk)->row_array();

      $qkeluar           = "SELECT 
      SUM(qty_unit) as qty_unit, SUM(qty_berat) as qty_berat, 
      SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_berat ,0 )) AS qtyprod1,
      SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_berat ,0 )) AS qtyseas1,
      SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_berat ,0 )) AS qtypdqc1,
      SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_berat ,0 )) AS qtysus1,
      SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_berat ,0 )) AS qtylain1,
      SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_berat ,0 )) AS qtycabang1,

      SUM( IF( pengeluaran_gb.kode_dept = 'Produksi' , qty_unit ,0 )) AS qtyprod2,
      SUM( IF( pengeluaran_gb.kode_dept = 'Seasoning' , qty_unit ,0 )) AS qtyseas2,
      SUM( IF( pengeluaran_gb.kode_dept = 'PDQC' , qty_unit ,0 )) AS qtypdqc2,
      SUM( IF( pengeluaran_gb.kode_dept = 'Susut' , qty_unit ,0 )) AS qtysus2,
      SUM( IF( pengeluaran_gb.kode_dept = 'Lainnya' , qty_unit ,0 )) AS qtylain2,
      SUM( IF( pengeluaran_gb.kode_dept = 'Cabang' , qty_unit ,0 )) AS qtycabang2
      FROM pengeluaran_gb 
      INNER JOIN detail_pengeluaran_gb 
      ON detail_pengeluaran_gb.nobukti_pengeluaran=pengeluaran_gb.nobukti_pengeluaran 
      WHERE tgl_pengeluaran ='$dari' AND detail_pengeluaran_gb.kode_barang = '$kode_barang'
      GROUP BY tgl_pengeluaran";
      $keluar            = $this->db->query($qkeluar)->row_array();

    

      if($barang['satuan'] == 'KG'){
        $qtymasuk         = $masuk['qty_berat'];
        $qtykeluar        = $keluar['qty_berat'];
        $qtypemb          = $masuk['qtypemb1'];
        $qtylainnya       = $masuk['qtylainnya1'];
        $qtyretur         = $masuk['qtyretur1'];
        $qtyprod          = $keluar['qtyprod1'];
        $qtyseas          = $keluar['qtyseas1'];
        $qtypdqc          = $keluar['qtypdqc1'];
        $qtylain          = $keluar['qtylain1'];
        $qtysus           = $keluar['qtysus1'];
        $qtycabang        = $keluar['qtycabang1'];

        $totqtypemb       += $masuk['qtypemb1'];
        $totqtylainnya    += $masuk['qtylainnya1'];
        $totqtyretur      += $masuk['qtyretur1'];
        $totqtypro        += $keluar['qtyprod1'];
        $totqtyseas       += $keluar['qtyseas1'];
        $totqtypdqc       += $keluar['qtypdqc1'];
        $totqtylain       += $keluar['qtylain1'];
        $totqtysus        += $keluar['qtysus1'];
        $totqtycabang     += $keluar['qtycabang1'];
        $totqtyunitmasuk  += $masuk['qty_berat'];
        $totqtyunitkeluar += $keluar['qty_berat'];

        // $qtymasukberat    = $masuk['qtypemb1'] + $masuk['qtylainnya1'] + $masuk['qtyretur1'];
        // $qtykeluarberat   = $keluar['qtyprod1']  + $keluar['qtyseas1']  + $keluar['qtypdqc1']  + $keluar['qtylain1']  + $keluar['qtysus1']  + $keluar['qtycabang1'];
        // $hasilqtyberat    = $qtymasukberat - $qtykeluarberat;
        // $saldoakhir2      = $saldoakhirberat + $hasilqtyberat;
        // $saldoakhir1      = $saldoawal + $masuk['qty_berat'] - $keluar['qty_berat'];
      }else{
        $qtymasuk         = $masuk['qty_unit'];
        $qtykeluar        = $keluar['qty_unit'];
        $qtypemb          = $masuk['qtypemb2'];
        $qtylainnya       = $masuk['qtylainnya2'];
        $qtyretur         = $masuk['qtyretur2'];
        $qtyprod          = $keluar['qtyprod2'];
        $qtyseas          = $keluar['qtyseas2'];
        $qtypdqc          = $keluar['qtypdqc2'];
        $qtylain          = $keluar['qtylain2'];
        $qtysus           = $keluar['qtysus2'];
        $qtycabang        = $keluar['qtycabang2'];
        $totqtypemb       += $masuk['qtypemb2'];
        $totqtylainnya    += $masuk['qtylainnya2'];
        $totqtyretur      += $masuk['qtyretur2'];
        $totqtypro        += $keluar['qtyprod2'];
        $totqtyseas       += $keluar['qtyseas2'];
        $totqtypdqc       += $keluar['qtypdqc2'];
        $totqtylain       += $keluar['qtylain2'];
        $totqtysus        += $keluar['qtysus2'];
        $totqtycabang     += $keluar['qtycabang2'];
        $totqtyunitmasuk  += $masuk['qty_unit'];
        $totqtyunitkeluar += $keluar['qty_unit'];
      }

      $saldoakhir         = $saldoakhir + $qtymasuk - $qtykeluar;

    ?>
      <tr style="color:black; font-size:14;">
        <td><?php echo $dari; ?></td>
        <td align="right">
          <?php
          if (isset($masuk['qty_unit']) and $masuk['qty_unit'] != "0") {
            echo uang($qtymasuk);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($keluar['qty_unit']) and $keluar['qty_unit'] != "0") {
            echo uang($qtykeluar);
          }
          ?>
        </td>
        <td align="right"><?php echo uang($saldoakhir); ?></td>
        <td align="right"></td>
        <td align="right">
          <?php
          if (isset($qtypemb) and $qtypemb != "0") {
            echo uang($qtypemb);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtylainnya) and $qtylainnya != "0") {
            echo uang($qtylainnya);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtyretur) and $qtyretur != "0") {
            echo uang($qtyretur);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtyprod) and $qtyprod != "0") {
            echo uang($qtyprod);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtyseas) and $qtyseas != "0") {
            echo uang($qtyseas);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtypdqc) and $qtypdqc != "0") {
            echo uang($qtypdqc);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtysus) and $qtysus != "0") {
            echo uang($qtysus);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtycabang) and $qtycabang != '0') {
            echo uang($qtycabang);
          }
          ?>
        </td>
        <td align="right">
          <?php
          if (isset($qtylain) and $qtylain != "0") {
            echo uang($qtylain);
          }
          ?>
        </td>
        <td><?php echo uang($saldoakhir); ?></td>
      </tr>
    <?php
      $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari))); //looping tambah 1 date
    } ?>
  </tbody>
  <tfoot>
    <tr bgcolor="#31869b">
      <th colspan="5" style="color:white; font-size:14;">TOTAL</th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtypemb); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtylainnya); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtyretur); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtypro); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtyseas); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtypdqc); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtysus); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtycabang); ?></th>
      <th style="color:white; font-size:14;"><?php echo uang($totqtylain); ?></th>
      <th style="color:white; font-size:14;"></th>
    </tr>
  </tfoot>
</table>
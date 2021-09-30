<?php

function uang($nilai)
{

  return number_format($nilai, '2',',', '.');
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
      <th colspan="3" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">SALDO AKHIR</th>
      <th colspan="3" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">OPNAME STOK</th>
      <th colspan="2" rowspan="2" bgcolor="#28a745" style="color:white; font-size:14;">SELISIH</th>
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
      <th bgcolor="#024a75"  style="color:white; font-size:14;">QTY</th>
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
    $totalqtysa       = 0;
    $saldoakhirunit2  = 0;
    $totallainnyapeng = 0;
    $totjmlhlainnya   = 0;
    $saldoakhirberat2 = 0;
    $totaljmlhsa      = 0;
    $totalretur       = 0;
    $totjmlhcabang    = 0;
    $totjmlhpdqc      = 0;
    $totjmlhpemb      = 0;
    $totjmlhsusut     = 0;
    $totjmlhproduksi  = 0;
    $totsaldoakhir   = 0;
    $totjmlhqtypdqc   = 0;
    $totalretur   = 0;
    $totjmlhseasoning = 0;
    $totjmlpengganti = 0;
    $totjmlhlainnyapeng = 0;
    $totjmlhsaldoakhir  = 0;
    $subtotalqtysa  = 0;
    $subtotalpembelian  = 0;
    $subtotallainnya  = 0;
    $subtotalproduksi  = 0;
    $subtotalseasoning  = 0;
    $subtotalpdqc  = 0;
    $subtotallainnyapeng  = 0;
    $subtotalcabangpeng  = 0;
    $subtotalsusut  = 0;
    $subtotalretur  = 0;
    $subtotaljmlhsa  = 0;
    $subtotjmlhpemb  = 0;
    $subtotjmlhlainnya  = 0;
    $subtotjmlhproduksi  = 0;
    $subtotjmlhseasoning  = 0;
    $subtotjmlhpdqc  = 0;
    $totjmlhretur  = 0;
    $subtotjmlhretur  = 0;
    $subjmlhretur  = 0;
    $subtotjmlhlainnyapeng = 0;
    $subtotjmlhcabang      = 0;
    $subtotjmlhopname       = 0;
    $totalopname       = 0;
    $totjmlhopname       = 0;
    $subtotjmlhsusut       = 0;
    $subtotalopname      = 0;
    $subtotsaldoakhir      = 0;
    $subtotjmlhsaldoakhir  = 0;
    
    foreach ($data as $key => $d) {
      $saldoakhirberat     = $d->qtyberatsa + $d->qtypemb2 + $d->qtylainnya2 + $d->qtypengganti2 - $d->qtyprod4 - $d->qtyseas4 - $d->qtypdqc4 - $d->qtylain4 - $d->qtysus4 - $d->qtycabang4;
      $saldoakhirunit      = $d->qtyunitsa + $d->qtypemb1 + $d->qtylainnya1 + $d->qtypengganti1 - $d->qtyprod3 - $d->qtyseas3 - $d->qtypdqc3 - $d->qtylain3 - $d->qtysus3 - $d->qtycabang3;

      if ($d->satuan != 'KG') {
        $hargasa          = $d->harga / ($d->qtyunitsa + 0.00000000000000000000000000000000000000000000000000001);
        $hargapemb        = $d->totalharga / ($d->qtypemb1 + 0.00000000000000000000000000000000000000000000000000001);
        

        $qtysaldoawal         = $d->qtyunitsa;

        $subtotalqtysa       += $d->qtyunitsa;
        $subtotalpembelian   += $d->qtypemb1;
        $subtotallainnya     += $d->qtylainnya1;
        $subtotalproduksi    += $d->qtyprod3;
        $subtotalseasoning   += $d->qtyseas3;
        $subtotalpdqc        += $d->qtypdqc3;
        $subtotallainnyapeng += $d->qtylain3;
        $subtotalcabangpeng  += $d->qtycabang3;
        $subtotalsusut       += $d->qtysus3;
        $subtotalretur       += $d->qtypengganti1;
        
        $totalqtysa         += $d->qtyunitsa;
        $totalpembelian     += $d->qtypemb1;
        $totallainnya       += $d->qtylainnya1;
        $totalproduksi      += $d->qtyprod3;
        $totalseasoning     += $d->qtyseas3;
        $totalpdqc          += $d->qtypdqc3;
        $totallainnyapeng   += $d->qtylain3;
        $totalcabangpeng    += $d->qtycabang3;
        $totalsusut         += $d->qtysus3;
        $totalretur         += $d->qtypengganti1;

        $totaljmlhsa      += $d->qtyunitsa * $hargasa;
        $totjmlhpemb      += $d->qtypemb1 * $hargapemb;
       
        
        $jmlhsaldoawal    = $d->qtyunitsa * $hargasa;
        $jmlhpemb         = $d->qtypemb1 * $hargapemb;
        $jmlhretur        = $d->qtypengganti1 * $hargapemb;
        $jmlhlainnya      = $d->qtylainnya1 * $hargapemb;

        if ($d->qtypemb1 != '' && $d->qtypemb1 != 0 && !empty($d->qtypemb1) ) {
          $hargakeluarunit    = ($jmlhpemb + $jmlhlainnya + $jmlhretur + $jmlhsaldoawal) / (($d->qtypemb1 + $d->qtyunitsa + $d->qtypengganti1 + $d->qtylainnya1)+0.0000000001);
          $totjmlhlainnya     += $d->qtylainnya1 * $hargapemb;
          $totjmlhretur       += $d->qtypengganti1 * $hargapemb;
          $jmlhlainnya        = $d->qtylainnya1 * $hargapemb;
          $jmlhretur          = $d->qtypengganti1 * $hargapemb;
        }else{
          $hargakeluarunit    = $hargasa;
          $totjmlhlainnya     += $d->qtylainnya1 * $hargasa;
          $totjmlhretur       += $d->qtypengganti1 * $hargasa;
          $jmlhlainnya        = $d->qtylainnya1 * $hargasa;
          $jmlhretur          = $d->qtypengganti1 * $hargasa;
        }

        $subtotjmlhproduksi    += $d->qtyprod3 * $hargakeluarunit;
        $subtotjmlhseasoning   += $d->qtyseas3 * $hargakeluarunit;
        $subtotjmlhpdqc        += $d->qtypdqc3 * $hargakeluarunit;
        $subtotjmlhlainnyapeng += $d->qtylain3 * $hargakeluarunit;
        $subtotjmlhcabang      += $d->qtycabang3 * $hargakeluarunit;
        $subtotjmlhsusut       += $d->qtysus3 * $hargakeluarunit;
        $subtotsaldoakhir      += $saldoakhirunit;
        $subtotjmlhsaldoakhir  += $saldoakhirunit * $hargakeluarunit;

        $totjmlhproduksi    += $d->qtyprod3 * $hargakeluarunit;
        $totjmlhseasoning   += $d->qtyseas3 * $hargakeluarunit;
        $totjmlhpdqc        += $d->qtypdqc3 * $hargakeluarunit;
        $totjmlhlainnyapeng += $d->qtylain3 * $hargakeluarunit;
        $totjmlhcabang      += $d->qtycabang3 * $hargakeluarunit;
        $totjmlhsusut       += $d->qtysus3 * $hargakeluarunit;
        $totsaldoakhir      += $saldoakhirunit;
        $totjmlhsaldoakhir  += $saldoakhirunit * $hargakeluarunit;

      }else{

        $hargasa            = $d->harga / ($d->qtyberatsa * 1000 + 0.00000000000000000000000000000000000000000000000000001);
        $hargapemb          = $d->totalharga / ($d->qtypemb2 * 1000 + 0.00000000000000000000000000000000000000000000000000001);

        $subtotalopname      += $d->qtyberatop * 1000;
        $subtotalqtysa       += $d->qtyberatsa * 1000;
        $subtotalpembelian   += $d->qtypemb2 * 1000;
        $subtotallainnya     += $d->qtylainnya2 * 1000;
        $subtotalproduksi    += $d->qtyprod4 * 1000;
        $subtotalseasoning   += $d->qtyseas4 * 1000;
        $subtotalpdqc        += $d->qtypdqc4 * 1000;
        $subtotallainnyapeng += $d->qtylain4 * 1000;
        $subtotalcabangpeng  += $d->qtycabang4 * 1000;
        $subtotalsusut       += $d->qtysus4 * 1000;
        $subtotalretur       += $d->qtypengganti2 * 1000;

        $totalqtysa         += $d->qtyberatsa * 1000;
        $totalpembelian     += $d->qtypemb2 * 1000;
        $totallainnya       += $d->qtylainnya2 * 1000;
        $totalproduksi      += $d->qtyprod4 * 1000;
        $totalseasoning     += $d->qtyseas4 * 1000;
        $totalpdqc          += $d->qtypdqc4 * 1000;
        $totallainnyapeng   += $d->qtylain4 * 1000;
        $totalcabangpeng    += $d->qtycabang4 * 1000;
        $totalsusut         += $d->qtysus4 * 1000;
        $totalretur         += $d->qtypengganti2 * 1000;

        
        $qtypemb2         = $d->qtypemb2 * 1000;
        $qtysaldoawal     = $d->qtyberatsa * 1000;
        $qtypengganti2    = $d->qtypengganti2 * 1000;
        $qtylainnya2      = $d->qtylainnya2 * 1000;
        $qtyprod4         = $d->qtyprod4 * 1000;
        $qtyseas4         = $d->qtyseas4 * 1000;
        $qtypdqc4         = $d->qtypdqc4 * 1000;
        $qtylain4         = $d->qtylain4 * 1000;
        $qtycabang4       = $d->qtycabang4 * 1000;
        $qtysus4          = $d->qtysus4 * 1000;
        $saldoakhirberat  = $saldoakhirberat * 1000; 

        $jmlhpemb         = $qtypemb2 * $hargapemb;
        $jmlhlainnya      = $qtylainnya2 * $hargapemb;
        $jmlhsaberat      = $qtysaldoawal * $hargapemb;
        $jmlhretur        = $qtypengganti2 * $hargapemb;
        $totjmlhretur     += $qtypengganti2 * $hargapemb;

        $jmlhsaldo              = $qtysaldoawal * $hargasa;
        
        $subtotaljmlhsa         += $jmlhsaldo;
        $subtotjmlhpemb         += $jmlhpemb;

        $totaljmlhsa            += $jmlhsaldo;
        $totjmlhpemb            += $jmlhpemb;
        $totsaldoakhir          += $saldoakhirberat;


      }
      $jenis_barang     = @$data[$key + 1]->jenis_barang;
    ?>
      <tr style="font-size: 14;">
        <td><?php echo $no++; ?></td>
        <td><?php echo $d->kode_barang; ?></td>
        <td><?php echo $d->nama_barang; ?></td>
        <td><?php echo $d->satuan; ?></td>
        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if ($d->qtyunitsa != 0) {
              echo uang($d->qtyunitsa);
            } else {
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyunitsa)) {
              echo uang($hargasa);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyunitsa)) {
              $jmlhsaldounit = $d->qtyunitsa * $hargasa;
              echo uang($jmlhsaldounit);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if ($d->qtyberatsa != 0) {
              echo uang($d->qtyberatsa*1000);
            } else {
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyberatsa)) {
              $hargasa = ($hargasa);
              echo uang($hargasa);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyberatsa)) {
              $jmlhsaberat = $qtysaldoawal * $hargasa;
              echo uang($jmlhsaberat );
            }else{
              echo "";
            }
            ?>
          </td>
        <?php }  ?>
        
        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtypemb1)) {
            echo uang($d->qtypemb1);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypemb1)) {
              echo uang($hargapemb);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypemb1)) {
              $jmlhpemb = $d->qtypemb1 * ($hargapemb);
              echo uang($d->qtypemb1 * $hargapemb);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypemb2)) {
            $qtypemb2 = $d->qtypemb2*1000;
            echo uang($qtypemb2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->totalharga)) {
              echo uang($d->totalharga / ($d->qtypemb2 * 1000));
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->totalharga)) {
              echo uang($jmlhpemb );
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtylainnya1)) {
              echo uang($d->qtylainnya1);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylainnya1)) {
              if ($d->qtypemb1 != '' OR $d->qtypemb1 != 0 OR !empty($d->qtypemb1) ) {
                echo uang($hargapemb);
              }else{
                echo uang($hargasa);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylainnya1)) {
              if ($d->qtypemb1 != '' OR $d->qtypemb1 != 0 OR !empty($d->qtypemb1) ) {
                echo uang($d->qtylainnya1 * $hargapemb);
              }else{
                echo uang($d->qtylainnya1 * $hargasa);
              }
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtylainnya2)) {
            echo uang($qtylainnya2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylainnya2)) {
              echo uang($d->totalharga / ($d->qtypemb2 * 1000));
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylainnya2)) {
              $jmlhlainya             = $qtylainnya2 * $hargapemb;
              $subtotjmlhlainnya      += $jmlhlainya;
              $totjmlhlainnya         += $jmlhlainya;
              echo uang($jmlhlainya);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtypengganti1)) {
              echo uang($d->qtypengganti1);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypengganti1)) {
              if ($d->qtypemb1 != '' OR $d->qtypemb1 != 0 OR !empty($d->qtypemb1) ) {
                echo uang($hargapemb);
              }else{
                echo uang($hargasa);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypengganti1)) {
              if ($d->qtypemb1 != '' OR $d->qtypemb1 != 0 OR !empty($d->qtypemb1) ) {
                $jmlhretur = $d->qtypengganti1 * $hargapemb;
                echo uang($d->qtypengganti1 * $hargapemb);
              }else{
                $jmlhretur = $d->qtypengganti1 * $hargasa;
                echo uang($d->qtypengganti1 * $hargasa);
              }
              
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypengganti2)) {
            $qtypengganti2 = $d->qtypengganti2*1000;
            echo uang($qtypengganti2);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypengganti2)) {
              echo uang($d->totalharga / ($d->qtypemb2 * 1000));
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypengganti2)) {
              $jmlhretur = ($d->qtypengganti2*1000) * ($d->totalharga / ($d->qtypemb2 * 1000));
              echo uang($jmlhretur);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtyprod3)) {
              echo uang($d->qtyprod3);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod3)) {
                echo uang($hargakeluarunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod3)) {
              echo uang($d->qtyprod3 * $hargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
            echo uang($qtyprod4);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
              if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {      
              $jmlhproduksi4          = $qtyprod4 * $hargakeluarberat;
              $subtotjmlhproduksi     += $jmlhproduksi4;
              $totjmlhproduksi        += $jmlhproduksi4;
              echo uang($jmlhproduksi4);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtyseas3)) {
              echo uang($d->qtyseas3);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas3)) {
              echo uang($hargakeluarunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas3)) {
              echo uang($d->qtyseas3*$hargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              echo uang($qtyseas4);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              $jmlseasoning4          = $qtyseas4 * $hargakeluarberat;
              $subtotjmlhseasoning    += $jmlseasoning4;
              $totjmlhseasoning       += $jmlseasoning4;
              echo uang($jmlseasoning4);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtypdqc3)) {
              echo uang($d->qtypdqc3);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypdqc3)) {
              echo uang($hargakeluarunit);

            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypdqc3)) {
              echo uang($d->qtypdqc3*$hargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              echo uang($qtypdqc4);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              $jmlhpdqc4              = $qtypdqc4 * $hargakeluarberat;
              $subtotjmlhpdqc         += $jmlhpdqc4;
              $totjmlhpdqc            += $jmlhpdqc4;
              echo uang($jmlhpdqc4);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($d->qtysus3)) {
              echo uang($d->qtysus3*1000);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtysus3)) {
              echo uang($hargakeluarunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtysus3)) {
              echo uang($d->qtysus3*$hargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              echo uang($qtysus4);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              $jmlhsusut              = $qtysus4 * $hargakeluarberat;
              $totjmlhsusut           += $jmlhsusut;
              $subtotjmlhsusut        += $jmlhsusut;
              echo uang($jmlhsusut );
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>

          <td align="center">
            <?php if (!empty($d->qtycabang3)) {
              echo uang($d->qtycabang3);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang3)) {
              echo uang($hargakeluarunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang3)) {
              echo uang($d->qtycabang3*$hargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              echo uang($qtycabang4);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              $jmlhcabang             = $qtycabang4 * $hargakeluarberat;
              $subtotjmlhcabang       += $jmlhcabang;
              $totjmlhcabang          += $jmlhcabang;
              echo uang($jmlhcabang );
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>

          <td align="center">
            <?php if (!empty($d->qtylain3)) {
              echo uang($d->qtylain3);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylain3)) {
                echo uang($hargakeluarunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylain3)) {
              echo uang($d->qtylain3*$hargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              echo uang($qtylain4);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              $jmllainnyapeng         = $qtylain4 * $hargakeluarberat;
              $subtotjmlhlainnyapeng  += $jmllainnyapeng;
              $totjmlhlainnyapeng     += $jmllainnyapeng;
              echo uang($jmllainnyapeng );
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>

        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($saldoakhirunit)) {
              echo uang($saldoakhirunit);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirunit)) {
                echo uang($hargakeluarunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirunit)) {
              $jmlhsaldoakhir         = $saldoakhirunit * $hargakeluarunit;
              echo uang($jmlhsaldoakhir);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($saldoakhirberat)) {
              echo uang($saldoakhirberat);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirberat)) {
              if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirberat)) {
              $jmlhsaldoakhir         = $saldoakhirberat * $hargakeluarberat;
              $subtotsaldoakhir       += $saldoakhirberat;
              $subtotjmlhsaldoakhir   += $jmlhsaldoakhir;
              $totjmlhsaldoakhir      += $jmlhsaldoakhir;
              echo uang($jmlhsaldoakhir);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>
        
        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if ($d->qtyunitop != 0) {
              echo uang($d->qtyunitop);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirunit)) {
                echo uang($hargakeluarunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirunit)) {
              $jmlhopname             = $d->qtyunitop * $hargakeluarunit;
              $totalopname            += $d->qtyunitop;
              $totjmlhopname          += $d->qtyunitop * $hargakeluarunit;
              echo uang($jmlhopname);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if ($d->qtyberatop != 0) {
              echo uang($d->qtyberatop * 1000);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirberat)) {
             if ($d->qtypemb2 == '' || $d->qtypemb2 == '0' || $d->qtypemb2 == NULL) {
                $hargakeluarberat = $hargasa;
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = ($jmlhpemb+$jmlhlainnya+$jmlhretur+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($saldoakhirberat)) {
              $jmlhopname             = ($d->qtyberatop * 1000) * $hargakeluarberat;
              $totalopname            += $d->qtyberatop * 1000;
              $subtotjmlhopname       += $jmlhopname;
              $totjmlhopname          += ($d->qtyberatop * 1000) * $hargakeluarberat;
              echo uang($jmlhopname);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>
        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($saldoakhirunit)) {
              echo uang( $d->qtyunitop - $saldoakhirunit);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($saldoakhirberat)) {
              echo uang(($d->qtyberatop * 1000) - ($saldoakhirberat));
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>
        
        <?php if ($d->satuan != 'KG') { ?>
          <td align="center">
            <?php if (!empty($saldoakhirunit)) {
              echo uang($jmlhsaldoakhir - $jmlhopname);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($saldoakhirberat)) {
              echo uang($jmlhsaldoakhir - $jmlhopname);
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } ?>
      </tr>
      <?php if ($jenis_barang != $d->jenis_barang && $d->satuan == "KG") { ?>
      <tr bgcolor="#024a75">
        <th colspan="4"  bgcolor="#024a75" style="color:white; font-size:14;">Subtotal <?php echo $d->jenis_barang;?></th>

        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalqtysa)) {
            echo uang($subtotalqtysa);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotaljmlhsa)) {
            echo uang($subtotaljmlhsa);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalpembelian)) {
            echo uang($subtotalpembelian);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhpemb)) {
            echo uang($subtotjmlhpemb);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotallainnya)) {
            echo uang($subtotallainnya);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhlainnya)) {
            echo uang($subtotjmlhlainnya);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalretur)) {
            echo uang($subtotalretur);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhretur)) {
            echo uang($subtotjmlhretur);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalproduksi)) {
            echo uang($subtotalproduksi);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhproduksi)) {
            echo uang($subtotjmlhproduksi);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalseasoning)) {
            echo uang($subtotalseasoning);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhseasoning)) {
            echo uang($subtotjmlhseasoning);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalpdqc)) {
            echo uang($subtotalpdqc);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhpdqc)) {
            echo uang($subtotjmlhpdqc);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalsusut)) {
            echo uang($subtotalsusut);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhsusut)) {
            echo uang($subtotjmlhsusut);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalcabangpeng)) {
            echo uang($subtotalcabangpeng);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhcabang)) {
            echo uang($subtotjmlhcabang);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotallainnyapeng)) {
            echo uang($subtotallainnyapeng);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhlainnyapeng)) {
            echo uang($subtotjmlhlainnyapeng);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotsaldoakhir)) {
            echo uang($subtotsaldoakhir);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhsaldoakhir)) {
            echo uang($subtotjmlhsaldoakhir);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotalopname)) {
            echo uang($subtotalopname);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75" align="center" style="color:white; font-size:14;">
          <?php if (!empty($subtotjmlhopname)) {
            echo uang($subtotjmlhopname);
          } else {
            echo "0";
          }
          ?>
        </th>
        <th bgcolor="#024a75"></th>
        <th bgcolor="#024a75"></th>
      </tr>
    <?php 
      $subtotalopname  = 0;
      $subtotaljmlhsa  = 0;
      $subtotalqtysa  = 0;
      $subtotalpembelian  = 0;
      $subtotjmlhopname  = 0;
      $subtotallainnya  = 0;
      $subtotjmlhlainnya  = 0;
      $subtotalproduksi  = 0;
      $subtotalseasoning  = 0;
      $subtotalpdqc  = 0;
      $subtotallainnyapeng  = 0;
      $subtotalcabangpeng  = 0;
      $subtotalsusut  = 0;
      $subtotalretur  = 0;
      $subtotjmlhpemb  = 0;
      $subtotjmlhretur  = 0;
      $subtotjmlhproduksi  = 0;
      $subtotjmlhseasoning  = 0;
      $subtotjmlhpdqc  = 0;
      $subtotjmlhlainnyapeng = 0;
      $subtotjmlhcabang      = 0;
      $subtotjmlhsusut       = 0;
      $subtotsaldoakhir      = 0;
      $subtotjmlhsaldoakhir  = 0;
    } ?>
    <?php } ?>
    <tr>
      <th colspan="4" style="background:red; color:white; font-size:14;">TOTAL</th>

      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalqtysa)) {
          echo uang($totalqtysa);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totaljmlhsa)) {
          echo uang($totaljmlhsa);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalpembelian)) {
          echo uang($totalpembelian);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhpemb)) {
          echo uang($totjmlhpemb);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totallainnya)) {
          echo uang($totallainnya);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhlainnya)) {
          echo uang($totjmlhlainnya);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red;color:white; font-size:14;">
        <?php if (!empty($totalretur)) {
          echo uang($totalretur);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red;color:white; font-size:14;"></th>
      <th align="center" style="background:red;color:white; font-size:14;">
        <?php if (!empty($totjmlhretur)) {
          echo uang($totjmlhretur);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalproduksi)) {
          echo uang($totalproduksi);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhproduksi)) {
          echo uang($totjmlhproduksi);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalseasoning)) {
          echo uang($totalseasoning);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhseasoning)) {
          echo uang($totjmlhseasoning);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalpdqc)) {
          echo uang($totalpdqc);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhpdqc)) {
          echo uang($totjmlhpdqc);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalsusut)) {
          echo uang($totalsusut);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhsusut)) {
          echo uang($totjmlhsusut);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalcabangpeng)) {
          echo uang($totalcabangpeng);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhcabang)) {
          echo uang($totjmlhcabang);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totallainnyapeng)) {
          echo uang($totallainnyapeng);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhlainnyapeng)) {
          echo uang($totjmlhlainnyapeng);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totsaldoakhir)) {
          echo uang($totsaldoakhir);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhsaldoakhir)) {
          echo uang($totjmlhsaldoakhir);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totalopname)) {
          echo uang($totalopname);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th align="center" style="background:red; color:white; font-size:14;">
        <?php if (!empty($totjmlhopname)) {
          echo uang($totjmlhopname);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th style="background:red;"></th>
      <th style="background:red;"></th>
    </tr>
  </tbody>
</table>
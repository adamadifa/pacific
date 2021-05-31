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
    $totalpengganti   = 0;
    $totjmlhseasoning = 0;
    $totjmlpengganti = 0;
    $totjmlhlainnyapeng = 0;
    $totjmlhsaldoakhir = 0;
    foreach ($data as $key => $d) {
      $saldoakhirberat     = $d->qtyberatsa + $d->qtypemb2 + $d->qtylainnya2 + $d->qtypengganti2 - $d->qtyprod4 - $d->qtyseas4 - $d->qtypdqc4 - $d->qtylain4 - $d->qtysus4 - $d->qtycabang4;
      $saldoakhirunit      = $d->qtyunitsa + $d->qtypemb1 + $d->qtylainnya1 + $d->qtypengganti1 - $d->qtyprod3 - $d->qtyseas3 - $d->qtypdqc3 - $d->qtylain3 - $d->qtysus3 - $d->qtycabang3;

      if ($d->satuan != 'KG') {
        $hargasaunit      = $d->harga / ($d->qtyunitsa+0.000000000000000000000001);
        $hargapemb        = $d->totalharga / ($d->qtypemb1+0.00000000000000000000001);

        $totalqtysa       += $d->qtyunitsa;
        $totalpembelian   += $d->qtypemb1;
        $totallainnya     += $d->qtylainnya1;
        $totalproduksi    += $d->qtyprod3;
        $totalseasoning   += $d->qtyseas3;
        $totalpdqc        += $d->qtypdqc3;
        $totallainnyapeng += $d->qtylain3;
        $totalcabangpeng  += $d->qtycabang3;
        $totalsusut       += $d->qtysus3;
        $totalpengganti   += $d->qtypengganti1;

        $totaljmlhsa      += $d->qtyunitsa * $hargasaunit;
        $totjmlhpemb      += $d->qtypemb1 * $hargapemb;
        $totjmlhlainnya   += $d->qtylainnya1 * $hargapemb;
        
        $qtysaldoawal     = $d->qtyunitsa;
        $jmlhpemb1        = $d->qtypemb1 * $hargapemb;
        $jmlhlainnya1     = $d->qtylainnya1 * $hargapemb;
        $jmlhretur1       = $d->qtypengganti1 * $hargapemb;

        if ($d->qtypemb1 == '') {
          $jmlhhargakeluarunit  = $hargasaunit;
        }else{
          $jmlhhargakeluarunit  = ($jmlhpemb1 + $jmlhlainnya1 + $jmlhretur1 + ($d->qtyunitsa * $hargasaunit)) / (($d->qtypemb1 + $d->qtyunitsa + $d->qtypengganti1 + $d->qtylainnya1)+0.0000000001);
        }

        $totjmlhproduksi    += $d->qtyprod3 * $jmlhhargakeluarunit;
        $totjmlhseasoning   += $d->qtyseas3 * $jmlhhargakeluarunit;
        $totjmlhpdqc        += $d->qtypdqc3 * $jmlhhargakeluarunit;
        $totjmlhlainnyapeng += $d->qtylain3 * $jmlhhargakeluarunit;
        $totjmlhcabang      += $d->qtycabang3 * $jmlhhargakeluarunit;
        $totjmlhsusut       += $d->qtysus3 * $jmlhhargakeluarunit;
        $totsaldoakhir      += $saldoakhirunit;
        $totjmlhsaldoakhir  += $saldoakhirunit * $jmlhhargakeluarunit;

      }else{

        $hargasa          = $d->harga / ($d->qtyberatsa * 1000 + 0.0000000000000000000000000000000000000001);
        $hargapemb        = $d->totalharga / ($d->qtypemb2 * 1000 + 0.00000000000000000000000000000000001);

        $totalqtysa       += $d->qtyberatsa * 1000;
        $totalpembelian   += $d->qtypemb2 * 1000;
        $totallainnya     += $d->qtylainnya2 * 1000;
        $totalproduksi    += $d->qtyprod4 * 1000;
        $totalseasoning   += $d->qtyseas4 * 1000;
        $totalpdqc        += $d->qtypdqc4 * 1000;
        $totallainnyapeng += $d->qtylain4 * 1000;
        $totalcabangpeng  += $d->qtycabang4 * 1000;
        $totalsusut       += $d->qtysus4 * 1000;
        $totalpengganti   += $d->qtypengganti2 * 1000;

        $totaljmlhsa      += ($d->qtyberatsa * 1000) * ($hargasa);
        $totjmlhpemb      += ($d->qtypemb2 * 1000) * ($hargapemb);
        $totjmlhlainnya   += ($d->qtylainnya2 * 1000) * ($hargapemb);
        
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

        $jmlhsaberat      = ($d->qtyberatsa * 1000) * $hargapemb;
        $jmlhpemb2        = ($d->qtypemb2 * 1000) * $hargapemb;
        $jmlhretur2       = ($d->qtypengganti2 * 1000) * $hargapemb;
        $jmlhlainnya2     = ($d->qtylainnya2 * 1000) * $hargapemb;
      }


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
              echo uang($hargasaunit);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->hargasaunit)) {
              $jmlhsaldounit = $d->qtyunitsa * $hargasaunit;
              echo uang($jmlhsaldounit );
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
              $jmlhpemb1 = $d->qtypemb1 * ($hargapemb);
              echo uang($d->qtypemb1 * ($hargapemb));
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
              $jmlhpemb2 = ($d->qtypemb2*1000) * ($d->totalharga / ($d->qtypemb2 * 1000));
              echo uang($jmlhpemb2 );
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
              echo uang($hargapemb);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylainnya1)) {
              echo uang($d->qtylainnya1 * ($hargapemb));
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
              echo uang($jmlhlainnya2 );
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
              echo uang($hargapemb);
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypengganti1)) {
              $jmlhretur1 = $d->qtypengganti1 * ($hargapemb);
              echo uang($d->qtypengganti1 * ($hargapemb));
            }else{
              echo "";
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypengganti2)) {
            $qtypengganti2 = $d->qtypengganti2*1000;
            echo uang($qtypengganti2*1000);
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
              $jmlhretur2 = ($d->qtypengganti2*1000) * ($d->totalharga / ($d->qtypemb2 * 1000));
              echo uang($jmlhretur2 );
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
              if ($d->qtypemb1 == '') {
              $jmlhhargakeluarunit = ($d->harga/$qtysaldoawal);
              echo uang($jmlhhargakeluarunit);
            }else{
              $jmlhhargakeluarunit =  ($jmlhpemb1+$jmlhlainnya1+$jmlhretur1+($d->qtyunitsa * $hargasa)) / ($d->qtypemb1+$d->qtyunitsa+$d->qtypengganti1+$d->qtylainnya1);
              echo uang($jmlhhargakeluarunit);
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod3)) {
              echo uang($d->qtyprod3*$jmlhhargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
            $qtyprod4 = $d->qtyprod4*1000;
            echo uang($qtyprod4);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
            if ($d->qtypemb2 == '') {
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($hargasa);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }else{
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyprod4)) {
              $jmlhproduksi4 = ($qtyprod4 * $hargakeluarberat);
              $totjmlhproduksi    += $jmlhproduksi4;
              echo uang($jmlhproduksi4 );
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
              if ($d->qtypemb1 == '') {
              $jmlhhargakeluarunit = ($d->harga/$qtysaldoawal);
              echo uang($jmlhhargakeluarunit);
            }else{
              $jmlhhargakeluarunit =  ($jmlhpemb1+$jmlhlainnya1+$jmlhretur1+($d->qtyunitsa * $hargasa)) / ($d->qtypemb1+$d->qtyunitsa+$d->qtypengganti1+$d->qtylainnya1);
              echo uang($jmlhhargakeluarunit);
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas3)) {
              echo uang($d->qtyseas3*$jmlhhargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              $qtyseas4 = $d->qtyseas4*1000;
              echo uang($qtyseas4);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
            if ($d->qtypemb2 == '') {
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($hargasa);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }else{
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtyseas4)) {
              $jmlseasoning4 = (($d->qtyseas4*1000) * $hargakeluarberat);
              $totjmlhseasoning   += $jmlseasoning4;
              echo uang($jmlseasoning4 );
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
              if ($d->qtypemb1 == '') {
              $jmlhhargakeluarunit = ($d->harga/$qtysaldoawal);
              echo uang($jmlhhargakeluarunit);
            }else{
              $jmlhhargakeluarunit =  ($jmlhpemb1+$jmlhlainnya1+$jmlhretur1+($d->qtyunitsa * $hargasa)) / ($d->qtypemb1+$d->qtyunitsa+$d->qtypengganti1+$d->qtylainnya1);
              echo uang($jmlhhargakeluarunit);
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypdqc3)) {
              echo uang($d->qtypdqc3*$jmlhhargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              $qtypdqc4 = $d->qtypdqc4*1000;
              echo uang($qtypdqc4);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
            if ($d->qtypemb2 == '') {
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($hargasa);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }else{
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtypdqc4)) {
              $jmlhpdqc4       = ($qtypdqc4 * $hargakeluarberat);
              $totjmlhpdqc     += $jmlhpdqc4;
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
              if ($d->qtypemb1 == '') {
              $jmlhhargakeluarunit = ($d->harga/$qtysaldoawal);
              echo uang($jmlhhargakeluarunit);
            }else{
              $jmlhhargakeluarunit =  ($jmlhpemb1+$jmlhlainnya1+$jmlhretur1+($d->qtyunitsa * $hargasa)) / ($d->qtypemb1+$d->qtyunitsa+$d->qtypengganti1+$d->qtylainnya1);
              echo uang($jmlhhargakeluarunit);
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtysus3)) {
              echo uang($d->qtysus3*$jmlhhargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              $qtysus4 = $d->qtysus4*1000;
              echo uang($qtysus4);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
            if ($d->qtypemb2 == '') {
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($hargasa);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }else{
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtysus4)) {
              $jmlhsusut = ($qtysus4 * $hargakeluarberat);
              $totjmlhsusut       += $jmlhsusut;
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
              echo uang($d->qtycabang3*1000);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang3)) {
              if ($d->qtypemb1 == '') {
              $jmlhhargakeluarunit = ($d->harga/$qtysaldoawal);
              echo uang($jmlhhargakeluarunit);
            }else{
              $jmlhhargakeluarunit =  ($jmlhpemb1+$jmlhlainnya1+$jmlhretur1+($d->qtyunitsa * $hargasa)) / ($d->qtypemb1+$d->qtyunitsa+$d->qtypengganti1+$d->qtylainnya1);
              echo uang($jmlhhargakeluarunit);
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang3)) {
              echo uang($d->qtycabang3*$jmlhhargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              $qtycabang4 = $d->qtycabang4*1000;
              echo uang($qtycabang4);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
            if ($d->qtypemb2 == '') {
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($hargasa);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }else{
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtycabang4)) {
              $jmlhcabang = ($qtycabang4 * $hargakeluarberat);
              $totjmlhcabang      += $jmlhcabang;
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
              echo uang($d->qtylain3*1000);
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylain3)) {
              if ($d->qtypemb1 == '') {
                $jmlhhargakeluarunit = ($d->harga/$qtysaldoawal);
                echo uang($jmlhhargakeluarunit);
              }else{
                $jmlhhargakeluarunit =  ($jmlhpemb1+$jmlhlainnya1+$jmlhretur1+($d->qtyunitsa * $hargasa)) / ($d->qtypemb1+$d->qtyunitsa+$d->qtypengganti1+$d->qtylainnya1);
                echo uang($jmlhhargakeluarunit);
              }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylain3)) {
              echo uang($d->qtylain3*$jmlhhargakeluarunit);
            }
            ?>
          </td>
        <?php } else { ?>
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              $qtylain4 = $d->qtylain4*1000;
              echo uang($qtylain4);
            }
            ?>
          </td>
          
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
            if ($d->qtypemb2 == '') {
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($hargasa);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }else{
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }
            }else{
              echo "";
            }
            ?>
          </td>
          <td align="center">
            <?php if (!empty($d->qtylain4)) {
              $jmllainnyapeng = ($qtylain4 * $hargakeluarberat);
              $totjmlhlainnyapeng      += $jmllainnyapeng;
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
            if ($d->qtypemb1 == '') {
              $jmlhhargakeluarunit = ($d->harga/$qtysaldoawal);
              echo uang($jmlhhargakeluarunit);
            }else{
              $jmlhhargakeluarunit =  ($jmlhpemb1+$jmlhlainnya1+$jmlhretur1+($d->qtyunitsa * $hargasa)) / ($d->qtypemb1+$d->qtyunitsa+$d->qtypengganti1+$d->qtylainnya1);
              echo uang($jmlhhargakeluarunit);
            }
          }else{
            echo "";
          }
          ?>
        </td>
        <td align="center">
          <?php if (!empty($saldoakhirunit)) {
            echo uang($saldoakhirunit*$jmlhhargakeluarunit);
          }
          ?>
        </td>
      <?php } else { ?>

        <td align="center">
          <?php if (!empty($saldoakhirberat)) {
            $totsaldoakhir += $saldoakhirberat;
            echo uang($saldoakhirberat);
          }
          ?>
        </td>
        <td align="center">
          <?php if (!empty($saldoakhirberat)) {
          if ($d->qtypemb2 == '') {
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($hargasa);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }else{
              if($d->qtyberatsa != '' && !empty($d->qtyberatsa) && $d->qtyberatsa != '0'){
                $hargakeluarberat = ($jmlhpemb2+$jmlhlainnya2+$jmlhretur2+$jmlhsaberat) / ($qtypemb2+$qtysaldoawal+$qtypengganti2+$qtylainnya2);
                echo uang($hargakeluarberat);
              }else{
                $hargakeluarberat = $hargapemb;
                echo uang($hargakeluarberat);
              }
            }
          }else{
            echo "";
          }
          ?>
        </td>
        <td align="center">
          <?php if (!empty($saldoakhirberat)) {
            $totjmlhsaldoakhir      += $saldoakhirberat * $hargakeluarberat;
            echo uang($saldoakhirberat * $hargakeluarberat );
          }else{
            echo "";
          }
          ?>
        </td>
      <?php } ?>
      </tr>
    <?php
    }
    ?>
  </tbody>
  <tfoot>
    <tr bgcolor="#024a75">
      <th colspan="4" style="color:white; font-size:14;">TOTAL</th>

      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalqtysa)) {
          echo uang($totalqtysa);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totaljmlhsa)) {
          echo uang($totaljmlhsa);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalpembelian)) {
          echo uang($totalpembelian);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhpemb)) {
          echo uang($totjmlhpemb);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totallainnya)) {
          echo uang($totallainnya);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhlainnya)) {
          echo uang($totjmlhlainnya);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th></th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalproduksi)) {
          echo uang($totalproduksi);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhproduksi)) {
          echo uang($totjmlhproduksi);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalseasoning)) {
          echo uang($totalseasoning);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhseasoning)) {
          echo uang($totjmlhseasoning);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalpdqc)) {
          echo uang($totalpdqc);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhpdqc)) {
          echo uang($totjmlhpdqc);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalsusut)) {
          echo uang($totalsusut);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhsusut)) {
          echo uang($totjmlhsusut);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totalcabangpeng)) {
          echo uang($totalcabangpeng);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhcabang)) {
          echo uang($totjmlhcabang);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totallainnyapeng)) {
          echo uang($totallainnyapeng);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhlainnyapeng)) {
          echo uang($totjmlhlainnyapeng);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totsaldoakhir)) {
          echo uang($totsaldoakhir);
        } else {
          echo "0";
        }
        ?>
      </th>
      <th></th>
      <th align="center" style="color:white; font-size:14;">
        <?php if (!empty($totjmlhsaldoakhir)) {
          echo uang($totjmlhsaldoakhir);
        } else {
          echo "0";
        }
        ?>
      </th>
    </tr>
  </tfoot>
</table>
<?php if ($kode_akun == "2-1200") { ?>

  <?php
  // $subtotal 			= 0;
  $totaldk        = 0;
  $totalppn       = 0;
  $no             = 1;
  $grandtotall     = 0;
  $totaldebet     = 0;
  $totalkredit    = 0;
  foreach ($pembelian as $key => $d) {
    $totalharga =  ($d->qty * $d->harga) + $d->penyesuaian;
    $subtotalharga = $d->qty * $d->harga;

    if ($d->kode_dept != "GDB") {
      $akun     = "2-1300";
      $namaakun  = "Hutang Lainnya";
    } else {
      $akun     = "2-1200";
      $namaakun = "Hutang Dagang";
    }

    if ($d->status == 'PNJ') {
      $totharga   = -$totalharga;
      $debet       = "0";
      $kredit     = $totalharga;
      $namabarang = $d->ket_penjualan;
    } else {
      $totharga   = $totalharga;
      $debet       = $totalharga;
      $kredit     = "0";
      $namabarang = $d->nama_barang;
    }

    $grandtotall   = $grandtotall + $totalharga;
    $grandtotal   = $totharga;
    $totaldebet   = $totaldebet + $debet;
    $totalkredit  = $totalkredit + $kredit;
    $totaldk       = $totaldk + $grandtotal;
    // $totalppn 		= $totalppn + $ppn;
    if (empty($l->ceknobukti)) {
      $color = "white";
    } else {
      $color = "#5eba00";
    }
  ?>
    <tr style="background-color:<?php echo $color; ?>">
      <td><?php echo $no++; ?></td>
      <td><?php echo $d->tgl_pembelian; ?></td>
      <td><?php echo $d->nobukti_pembelian; ?></td>
      <td><?php echo $d->nama_akun; ?></td>
      <td align="center" class="str"><?php echo $d->kode_akun; ?></td>
      <td align="right"><?php echo number_format($debet); ?></td>
      <td align="right"><?php echo number_format($kredit); ?></td>
    </tr>

  <?php } ?>
  <tr style="font-size:30;">
    <th colspan="5" style="text-align: center;">Total</th>
    <th style="text-align: right;"><?php echo number_format($totaldebet, 2); ?></th>
    <th style="text-align: right;"><?php echo number_format($totalkredit, 2); ?></th>
  </tr>

<?php } else if ($kode_akun == "") { ?>

  <?php
  // $subtotal 			= 0;
  $totaldk        = 0;
  $totalppn       = 0;
  $no             = 1;
  $grandtotall     = 0;
  $totaldebet     = 0;
  $totalkredit    = 0;
  foreach ($pembelian as $key => $d) {
    $totalharga =  ($d->qty * $d->harga) + $d->penyesuaian;
    $subtotalharga = $d->qty * $d->harga;

    if ($d->kode_dept != "GDB") {
      $akun     = "2-1300";
      $namaakun  = "Hutang Lainnya";
    } else {
      $akun     = "2-1200";
      $namaakun = "Hutang Dagang";
    }

    $totalkredit  = $totalkredit + $totalkredit;
    // $totalppn 		= $totalppn + $ppn;
    if (empty($l->ceknobukti)) {
      $color = "white";
    } else {
      $color = "#5eba00";
    }
  ?>
    <tr style="background-color:<?php echo $color; ?>">
      <td><?php echo $no++; ?></td>
      <td><?php echo $d->tgl_pembelian; ?></td>
      <td><?php echo $d->nobukti_pembelian; ?></td>
      <td><?php echo $namaakun; ?></td>
      <td align="center" class="str"><?php echo $akun; ?></td>
      <td align="right"></td>
      <td align="right"><?php echo number_format($kredit); ?></td>
    </tr>

  <?php } ?>
  <tr style="font-size:30;">
    <th colspan="5" style="text-align: center;">Total</th>
    <th style="text-align: right;"></th>
    <th style="text-align: right;"><?php echo number_format($totalkredit, 2); ?></th>
  </tr>

<?php } else { ?>

  <?php
  // $subtotal 			= 0;
  $totaldk        = 0;
  $totalppn       = 0;
  $no             = 1;
  $grandtotall     = 0;
  $totaldebet     = 0;
  $totalkredit    = 0;
  foreach ($pembelian as $key => $d) {
    $totalharga =  ($d->qty * $d->harga) + $d->penyesuaian;
    $subtotalharga = $d->qty * $d->harga;

    if ($d->kode_dept != "GDB") {
      $akun     = "2-1300";
      $namaakun  = "Hutang Lainnya";
    } else {
      $akun     = "2-1200";
      $namaakun = "Hutang Dagang";
    }

    if ($d->status == 'PNJ') {
      $totharga   = -$totalharga;
      $debet       = "0";
      $kredit     = $totalharga;
      $namabarang = $d->ket_penjualan;
    } else {
      $totharga   = $totalharga;
      $debet       = $totalharga;
      $kredit     = "0";
      $namabarang = $d->nama_barang;
    }

    $grandtotall   = $grandtotall + $totalharga;
    $grandtotal   = $totharga;
    $totaldebet   = $totaldebet + $debet;
    $totalkredit  = $totalkredit + $kredit;
    $totaldk       = $totaldk + $grandtotal;
    // $totalppn 		= $totalppn + $ppn;
    if (empty($l->ceknobukti)) {
      $color = "white";
    } else {
      $color = "#5eba00";
    }
  ?>
    <tr style="background-color:<?php echo $color; ?>">
      <td><?php echo $no++; ?></td>
      <td><?php echo $d->tgl_pembelian; ?></td>
      <td><?php echo $d->nobukti_pembelian; ?></td>
      <td><?php echo $d->nama_akun; ?></td>
      <td align="center" class="str"><?php echo $d->kode_akun; ?></td>
      <td align="right"><?php echo number_format($debet); ?></td>
      <td align="right"><?php echo number_format($kredit); ?></td>
    </tr>

  <?php } ?>
  <tr style="font-size:30;">
    <th colspan="5" style="text-align: center;">Total</th>
    <th style="text-align: right;"><?php echo number_format($totaldebet, 2); ?></th>
    <th style="text-align: right;"><?php echo number_format($totalkredit, 2); ?></th>
  </tr>

<?php } ?>
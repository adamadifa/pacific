<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">

<br>
<b style="font-size:14px; font-family:Calibri">
	<?php
	if ($cb['nama_cabang'] != "") {
		if ($cb['nama_cabang'] == "PCF PUSAT") {
			echo "PACIFIC PUSAT";
		}else{
			echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
		}
	} else {
		echo "PACIFIC ALL CABANG";
	}
	?>
	<br>
	KAS BESAR<br>
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
<table class="datatable3" style="width:120% !important">
	<thead bgcolor="#024a75" style="color:white; font-size:12;">
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th rowspan="2">Tgl Pembayaran</th>
			<th rowspan="2">No Faktur</th>
			<th rowspan="2">Jenis Transaksi</th>
			<th rowspan="2">Tgl Faktur</th>
			<th rowspan="2">Salesman</th>
			<th rowspan="2">Sales (Penagih)</th>
			<th rowspan="2">Kode Pel.</th>
			<th rowspan="2">Nama Pelanggan</th>
			<th rowspan="2">TUNAI</th>
			<th rowspan="2">TITIP BAYAR</th>
			<th rowspan="2">TAGIHAN</th>
			<th colspan="5">Pembayaran Giro</th>
			<th rowspan="2">Total</th>
			<th rowspan="2">Saldo Akhir</th>
			<th rowspan="2">Keterangan</th>
			<th rowspan="2">Tanggal Input</th>
			<th rowspan="2">Tanggal Update</th>
		</tr>
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th>Materai</th>
			<th>Cek/BG</th>
			<th>Nama Bank</th>
			<th>Tgl Cair</th>
			<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$saldo 					= 0;
		$totaltunai 		= 0;
		$totaltitip 		= 0;
		$totalother 		= 0;
		$totalpelunasan = 0;
		$totalbayar 		= 0;
		foreach ($kasbesar as $k) {
			if (empty($k->status_bayar)) {
				if ($k->jenisbayar == "tunai") {
					$tunai 			= $k->bayar;
					$pelunasan	= 0;
					$titipan		=	0;
					$other 			=	0;
					$bayar 			= $tunai;
					$cekbg 			= "";
					$bank 			= "";
					$tglcair 		= "";
				} elseif ($k->jenisbayar == "titipan") {
					$tbayar = $k->totalbayar - $k->bayarterakhir;
					$p 			= $k->bayar + $tbayar;
					if ($p >= $k->totalpenjualan) {
						$tunai 		= 0;
						$pelunasan = $k->bayar;
						$titipan	=	0;
						$other 		=	0;
						$bayar 		= $pelunasan;
						$cekbg 		= "";
						$bank 		= "";
						$tglcair 	= "";
					} else {
						$tunai 		= 0;
						$pelunasan = 0;
						$titipan	=	$k->bayar;
						$other 		=	0;
						$bayar 		= $titipan;
						$cekbg 		= "";
						$bank 		= "";
						$tglcair 	= "";
					}
					//echo $k->totalbayar ." = ".$k->totalpenjualan."<br>";
				} else {
					$tunai 		= 	0;
					$pelunasan	= 	0;
					$titipan	=	0;
					$other 		=	$k->bayar;
					$bayar 		=   $other;
					if ($k->no_giro != "") {
						$bank 		= $k->bankgiro;
						$cekbg 		= $k->no_giro;
						$tglcair 	= DateToIndo2($k->tglbayar);
					} else {
						$cekbg 		= "TRANSFER";
						$bank 		= $k->banktransfer;
						$tglcair 	= DateToIndo2($k->tglbayar);
					}
				}

				$saldo 			= $saldo + $bayar;
				$totaltunai		= $totaltunai + $tunai;
				$totaltitip 	= $totaltitip + $titipan;
				$totalother 	= $totalother + $other;
				$totalpelunasan = $totalpelunasan + $pelunasan;
				$totalbayar 	= $totalbayar + $bayar;

				if ($k->status == "1") {
					$bgcolor = "orange";
				} else {
					$bgcolor = "";
				}
		?>
				<tr bgcolor="<?php echo $bgcolor; ?>">

					<td><?php echo DateToIndo2($k->tglbayar); ?></td>
					<td><?php echo $k->no_fak_penj; ?></td>
					<td><?php echo strtoupper($k->jenistransaksi); ?></td>
					<td><?php echo DateToIndo2($k->tgltransaksi); ?></td>
					<td><?php echo $k->nama_karyawan; ?></td>
					<td><?php echo $k->penagih; ?></td>
					<td><?php echo $k->kode_pelanggan; ?></td>
					<td><?php echo $k->nama_pelanggan; ?></td>
					<td style="text-align:right"><?php if (!empty($tunai)) {
																					echo number_format($tunai, '0', '', '.');
																				} ?></td>
					<td style="text-align:right"><?php if (!empty($titipan)) {
																					echo number_format($titipan, '0', '', '.');
																				} ?></td>
					<td style="text-align:right"><?php if (!empty($pelunasan)) {
																					echo number_format($pelunasan, '0', '', '.');
																				} ?></td>

					<td><?php echo $k->materai; ?></td>
					<td><?php echo $cekbg; ?></td>
					<td><?php echo $bank; ?></td>
					<td><?php echo $tglcair; ?></td>
					<td style="text-align:right"><?php if (!empty($other)) {
																					echo number_format($other, '0', '', '.');
																				} ?></td>
					<td style="text-align:right"><?php echo number_format($bayar, '0', '', '.'); ?></td>
					<td style="text-align:right"><?php echo number_format($saldo, '0', '', '.'); ?></td>
					<td>
						<?php
						if ($k->girotocash == "1") {

							echo "Penggantian Giro Ke Cash";
						}
						?>

					</td>
					<td><?php echo $k->date_created; ?></td>
					<td><?php echo $k->date_updated; ?></td>
				</tr>
				</tr>
		<?php
			}
		}
		?>
	</tbody>
	<tr bgcolor="#024a75" style="color:white; font-size:12;">
		<td colspan="8">TOTAL</td>
		<td style="text-align: right"><?php echo number_format($totaltunai, '0', '', '.');  ?></td>
		<td style="text-align: right"><?php echo number_format($totaltitip, '0', '', '.');  ?></td>
		<td style="text-align: right"><?php echo number_format($totalpelunasan, '0', '', '.');  ?></td>
		<td colspan="4"></td>
		<td style="text-align: right"><?php echo number_format($totalother, '0', '', '.');  ?></td>
		<td style="text-align: right"><?php echo number_format($totalbayar, '0', '', '.');  ?></td>
		<td style="text-align: right"><?php echo number_format($totalbayar, '0', '', '.');  ?></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>

<br>
<br>
<br>
<b style="font-size:14px; font-family:Calibri">
	PEMBAYARAN VOUCHER<br>
	PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
</b>
<br>
<br>
<table class="datatable3">
	<thead bgcolor="#024a75" style="color:white; font-size:12;">
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th>Tanggal</th>
			<th>No Faktur</th>
			<th>Kode Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Keterangan</th>
			<th>Jumlah</th>
		</tr>
		<thead>
		<tbody>
			<?php
			$totalvoucher = 0;
			foreach ($sb as $v) {
				$totalvoucher = $totalvoucher + $v->bayar;
				if ($v->ket_voucher == "1") {
					$voucher = "Voucher Penghapusan Piutang";
				} else if ($v->ket_voucher == "2") {
					$voucher = "Voucher Diskon Program";
				} else if ($v->ket_voucher == "3") {
					$voucher = "Voucher Penyelesaian Piutang Oleh Salesman";
				} else if ($v->ket_voucher == "4") {
					$voucher = "Voucher Pengalihan Piutang Dgng Jd Piutang Kary";
				} else {
					$voucher = "Lainnya";
				}
			?>
				<tr>
					<td><?php echo DateToIndo2($v->tglbayar); ?></td>
					<td><?php echo $v->no_fak_penj; ?></td>
					<td><?php echo $v->kode_pelanggan; ?></td>
					<td><?php echo $v->nama_pelanggan; ?></td>
					<td><?php echo $voucher; ?></td>
					<td align="right"><?php echo number_format($v->bayar, '0', '', '.'); ?></td>
				</tr>
			<?php
			}
			?>
			<tr bgcolor="#024a75" style="color:white; font-size:12;">
				<td colspan="5">TOTAL</td>
				<td align="right"><?php echo number_format($totalvoucher, '0', '', '.'); ?></td>
			</tr>
		</tbody>
</table>
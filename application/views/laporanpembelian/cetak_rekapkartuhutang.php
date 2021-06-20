<?php
error_reporting(0);
function uang($nilai)
{
	return number_format($nilai, '2', ',', '.');
}

function angka($nilai)
{
	return number_format($nilai, '2', ',', '.');
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:14px; font-family:Calibri">
	REKAP KARTU HUTANG <br>
	PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br>
	<?php
	if ($supplier != "") {
		echo "SUPPLIER : " . strtoupper($supp['nama_supplier']);
	} else {
		echo "ALL SUPPLIER";
	}
	?>
</b>
<br>
<br>
<table class="datatable3" style="width:100%" border="1">
	<thead bgcolor="#024a75" style="color:white; font-size:12;">
		<tr bgcolor="#024a75" style="color:white; font-size:12; text-align:center">
			<td>NO</td>
			<td>SUPPLIER</td>
			<td>AKUN</td>
			<!-- <td>TOTAL HUTANG</td>
			<td>BAYAR BULAN LALU</td>
			<td>PENY BULAN LALU</td> -->
			<td>SALDO AWAL</td>
			<td>PEMBELIAN</td>
			<td>PENYESUAIAN</td>
			<td>PEMBAYARAN</td>
			<td>SALDO AKHIR</td>
		</tr>
	</thead>
	<tbody>
		<?php
		$totalsaldoawal = 0;
		$totalsaldoakhir = 0;
		$totalpembelian = 0;
		$totalpenyesuaian = 0;
		$totalpembayaran = 0;

		$totalsaldoawals = 0;
		$totalsaldoakhirs = 0;
		$totalpembelians = 0;
		$totalpenyesuaians = 0;
		$totalpembayarans = 0;
		$no = 1;
    	foreach ($pmb as $key => $d) {
			if ($d->tgl_pembelian < $dari) {
				$saldoawal = $d->sisapiutang;
			} else {
				$saldoawal = 0;
			}
			$saldoakhir = $d->totalhutang - $d->jmlbayarbulanlalu - $d->jmlbayarbulanini;
			$totalsaldoawal += $saldoawal;
			$totalsaldoakhir += $saldoakhir;
			$totalpembelian += $d->pmbbulanini;
			$totalpenyesuaian += $d->penyesuaianbulanini;
			$totalpembayaran += $d->jmlbayarbulanini;
			
			$totalsaldoawals += $saldoawal;
			$totalsaldoakhirs += $saldoakhir;
			$totalpembelians += $d->pmbbulanini;
			$totalpenyesuaians += $d->penyesuaianbulanini;
			$totalpembayarans += $d->jmlbayarbulanini;
			$kode_supplier     = @$pmb[$key + 1]->kode_supplier;
		?>
			<?php if ($kode_supplier != $d->kode_supplier) { ?>
			<tr style="color:black; font-size:12; font-weight:bold">
				<td><?php echo $no++; ?></td>
				<td><?php echo $d->nama_supplier; ?></td>
				<td><?php echo $d->nama_akun; ?></td>
				<td align="right"><?php if (!empty($totalsaldoawal)) {
														echo uang($totalsaldoawal);
													} ?></td>
				<td align="right"><?php if (!empty($totalpembelian)) {
														echo uang($totalpembelian);
													} ?></td>
				<td align="right"><?php if (!empty($totalpenyesuaian)) {
														echo uang($totalpenyesuaian);
													} ?></td>
				<td align="right"><?php if (!empty($totalpembayaran)) {
														echo uang($totalpembayaran);
													} ?></td>
				<td align="right"><?php if (!empty($totalsaldoakhir)) {
														echo uang($totalsaldoakhir);
													} ?></td>
			</tr>
			<?php 
				$totalsaldoawal = 0;
				$totalsaldoakhir = 0;
				$totalpembelian = 0;
				$totalpenyesuaian = 0;
				$totalpembayaran = 0;
			} }?>
			<tr bgcolor="#024a75" style="color:white; font-size:12; font-weight:bold">
				<td colspan="3"><b>GRAND TOTAL</b></td>
				<td align="right"><?php if (!empty($totalsaldoawals)) {
														echo uang($totalsaldoawals);
													} ?></td>
				<td align="right"><?php if (!empty($totalpembelians)) {
														echo uang($totalpembelians);
													} ?></td>
				<td align="right"><?php if (!empty($totalpenyesuaians)) {
														echo uang($totalpenyesuaians);
													} ?></td>
				<td align="right"><?php if (!empty($totalpembayarans)) {
														echo uang($totalpembayarans);
													} ?></td>
				<td align="right"><?php if (!empty($totalsaldoakhirs)) {
														echo uang($totalsaldoakhirs);
													} ?></td>
			</tr>
	</tbody>

</table>

<br>
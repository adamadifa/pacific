<?php
function uang($nilai)
{
	return number_format($nilai, '2', ',', '.');
}
$namabulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:16px; font-family:Calibri">
	PACIFIC CABANG <?php echo strtoupper($cb['nama_cabang']); ?><br>
	REKAPITULASI GOOD STOCK<br>
	PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br><br>
</b>
<br>
<table class="datatable3" style="width:100%;  margin-bottom: 30px" border="1">
	<thead bgcolor="#024a75" style="color:white;">
		<tr>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">NO</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">PRODUK</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">SALDO AWAL</th>
			<th colspan="6" bgcolor="#22a538" style="font-size:10px !important">PENERIMAAN</th>
			<th colspan="8" bgcolor="#c7473a" style="font-size:10px !important">PENGELUARAN</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">SALDO AKHIR</th>
			<th colspan="3" bgcolor="#024a75" style="font-size:10px !important">SALDO AKHIR</th>
		</tr>
		<tr>
			<th bgcolor="#22a538" style="font-size:10px !important">PUSAT</th>
			<th bgcolor="#2e73c6" style="font-size:10px !important">TRANSIT IN</th>
			<th bgcolor="#22a538" style="font-size:10px !important">RETUR</th>
			<th bgcolor="#22a538" style="font-size:10px !important">LAIN LAIN</th>
			<th bgcolor="#22a538" style="font-size:10px !important">REPACK</th>
			<th bgcolor="#22a538" style="font-size:10px !important">PENYESUAIAN</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">PENJUALAN</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">PROMOSI</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">REJECT PASAR</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">REJECT MOBIL</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">REJECT GUDANG</th>
			<th bgcolor="#2e73c6" style="font-size:10px !important">TRANSIT OUT</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">LAIN LAIN</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">PENYESUAIAN</th>
			<th bgcolor="#024a75" style="font-size:10px !important">DUS</th>
			<th bgcolor="#024a75" style="font-size:10px !important">PACK</th>
			<th bgcolor="#024a75" style="font-size:10px !important">PCS</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($rekap as $d) {
			$pusat 			= $d->pusat / $d->isipcsdus;
			$transit_in = $d->transit_in / $d->isipcsdus;
			$retur 			= $d->retur / $d->isipcsdus;
			$lainlain_in = $d->lainlain_in / $d->isipcsdus;
			$repack 		= $d->repack / $d->isipcsdus;
			$peny_in 		= ($d->penyesuaian_in) / $d->isipcsdus;
			$sags 			= ($d->saldoawalgs + $d->sisamutasi) / $d->isipcsdus;

			$penjualan 	= $d->penjualan / $d->isipcsdus;
			$promosi    = $d->promosi / $d->isipcsdus;
			$rejectpasar = $d->reject_pasar / $d->isipcsdus;
			$rejectmobil = $d->reject_mobil / $d->isipcsdus;
			$rejectgd   = $d->reject_gudang / $d->isipcsdus;
			$transit_out = $d->transit_out / $d->isipcsdus;
			$lainlain_out = $d->lainlain_out / $d->isipcsdus;
			$peny_out 	= $d->penyesuaian_out / $d->isipcsdus;

			$sisamutasi = ($sags + $pusat + $transit_in + $retur + $lainlain_in + $repack + $peny_in) -
				($penjualan + $promosi + $rejectpasar + $rejectmobil + $rejectgd + $transit_out + $lainlain_out + $peny_out);


			$realsaldoakhir = ($d->saldoawalgs + $d->sisamutasi + $d->pusat + $d->transit_in + $d->retur + $d->lainlain_in + $d->repack + $d->penyesuaian_in) -
				($d->penjualan + $d->promosi + $d->reject_pasar + $d->reject_mobil + $d->reject_gudang + $d->transit_out + $d->lainlain_out + $d->penyesuaian_out);


			if ($realsaldoakhir != 0) {
				$jmldus    = floor($realsaldoakhir / $d->isipcsdus);
				$sisadus   = $realsaldoakhir % $d->isipcsdus;
				if ($d->isipack == 0) {
					$jmlpack    = 0;
					$sisapack   = $sisadus;
				} else {
					$jmlpack   = floor($sisadus / $d->isipcs);
					$sisapack   = $sisadus % $d->isipcs;
				}
				$jmlpcs = $sisapack;
				if ($d->satuan == 'PCS') {
					$jmldus = 0;
					$jmlpack = 0;
					$jmlpcs = $realsaldoakhir;
				}
			} else {
				$jmldus 	= 0;
				$jmlpack	= 0;
				$jmlpcs 	= 0;
			}


		?>
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $d->nama_barang; ?></td>
				<td align="right"><?php if (!empty($sags)) {
										echo uang($sags);
									} ?></td>
				<td align="right"><?php if (!empty($pusat)) {
										echo uang($pusat);
									} ?></td>
				<td align="right"><?php if (!empty($transit_in)) {
										echo uang($transit_in);
									} ?></td>
				<td align="right"><?php if (!empty($retur)) {
										echo uang($retur);
									} ?></td>
				<td align="right"><?php if (!empty($lainlain_in)) {
										echo uang($lainlain_in);
									} ?></td>
				<td align="right"><?php if (!empty($repack)) {
										echo uang($repack);
									} ?></td>
				<td align="right"><?php if (!empty($peny_in)) {
										echo uang($peny_in);
									} ?></td>
				<td align="right"><?php if (!empty($penjualan)) {
										echo uang($penjualan);
									} ?></td>
				<td align="right"><?php if (!empty($promosi)) {
										echo uang($promosi);
									} ?></td>
				<td align="right"><?php if (!empty($rejectpasar)) {
										echo uang($rejectpasar);
									} ?></td>
				<td align="right"><?php if (!empty($rejectmobil)) {
										echo uang($rejectmobil);
									} ?></td>
				<td align="right"><?php if (!empty($rejectgd)) {
										echo uang($rejectgd);
									} ?></td>
				<td align="right"><?php if (!empty($transit_out)) {
										echo uang($transit_out);
									} ?></td>
				<td align="right"><?php if (!empty($lainlain_out)) {
										echo uang($lainlain_out);
									} ?></td>
				<td align="right"><?php if (!empty($peny_out)) {
										echo uang($peny_out);
									} ?></td>
				<td align="right"><?php if (!empty($sisamutasi)) {
										echo uang($sisamutasi);
									} ?></td>
				<td align="right"><?php echo $jmldus; ?></td>
				<td align="right"><?php echo $jmlpack; ?></td>
				<td align="right"><?php echo $jmlpcs; ?></td>
			</tr>
		<?php
			$no++;
		}
		?>
	</tbody>
</table>
<br>
<b style="font-size:16px; font-family:Calibri">
	PACIFIC CABANG <?php echo strtoupper($cb['nama_cabang']); ?><br>
	REKAPITULASI BAD STOCK<br>
	PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br><br>
</b>
<br>
<table class="datatable3" style="width:100%;  margin-bottom: 30px" border="1">
	<thead bgcolor="#024a75" style="color:white;">
		<tr>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">NO</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">PRODUK</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">SALDO AWAL</th>
			<th colspan="4" bgcolor="#22a538" style="font-size:10px !important">PENERIMAAN</th>
			<th colspan="3" bgcolor="#c7473a" style="font-size:10px !important">PENGELUARAN</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">SALDO AKHIR</th>
			<th colspan="3" bgcolor="#024a75" style="font-size:10px !important">SALDO AKHIR</th>
		</tr>
		<tr>
			<th bgcolor="#22a538" style="font-size:10px !important">REJECT PASAR</th>
			<th bgcolor="#22a538" style="font-size:10px !important">REJECT MOBIL</th>
			<th bgcolor="#22a538" style="font-size:10px !important">REJECT GUDANG</th>
			<th bgcolor="#22a538" style="font-size:10px !important">PENYESUAIAN</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">KIRIM PUSAT</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">REPACK</th>
			<th bgcolor="#c7473a" style="font-size:10px !important">PENYESUAIAN</th>
			<th bgcolor="#024a75" style="font-size:10px !important">DUS</th>
			<th bgcolor="#024a75" style="font-size:10px !important">PACK</th>
			<th bgcolor="#024a75" style="font-size:10px !important">PCS</th>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($rekap as $d) {

			$sabs 			= ($d->saldoawalbs + $d->sisamutasibad) / $d->isipcsdus;
			$repack 		= $d->repack / $d->isipcsdus;
			$rejectpasar = $d->reject_pasar / $d->isipcsdus;
			$rejectmobil = $d->reject_mobil / $d->isipcsdus;
			$rejectgd   = $d->reject_gudang / $d->isipcsdus;
			$penybad_in = $d->penyesuaianbad_in / $d->isipcsdus;

			$kirimpusat 	= $d->kirimpusat / $d->isipcsdus;
			$repack 			= $d->repack / $d->isipcsdus;
			$penybad_out 	= $d->penyesuaianbad_out / $d->isipcsdus;

			$sisamutasibad = ($sabs + $rejectpasar + $rejectmobil + $rejectgd + $penybad_in) - ($kirimpusat + $repack + $penybad_out);
			$realsaldobad = ($d->saldoawalbs + $d->sisamutasibad + $d->reject_pasar + $d->reject_mobil + $d->reject_gudang + $d->penyesuaianbad_in) -
				($d->kirimpusat + $d->repack + $d->penyesuaianbad_out);

			if ($realsaldobad != 0) {
				$jmldus    = floor($realsaldobad / $d->isipcsdus);
				$sisadus   = $realsaldobad % $d->isipcsdus;
				if ($d->isipack == 0) {
					$jmlpack    = 0;
					$sisapack   = $sisadus;
				} else {
					$jmlpack   = floor($sisadus / $d->isipcs);
					$sisapack   = $sisadus % $d->isipcs;
				}
				$jmlpcs = $sisapack;
				if ($d->satuan == 'PCS') {
					$jmldus = 0;
					$jmlpack = 0;
					$jmlpcs = $realsaldobad;
				}
			} else {
				$jmldus 	= 0;
				$jmlpack	= 0;
				$jmlpcs 	= 0;
			}

		?>
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $d->nama_barang; ?></td>
				<td align="right"><?php if (!empty($sabs)) {
										echo uang($sabs);
									} ?></td>
				<td align="right"><?php if (!empty($rejectpasar)) {
										echo uang($rejectpasar);
									} ?></td>
				<td align="right"><?php if (!empty($rejectmobil)) {
										echo uang($rejectmobil);
									} ?></td>
				<td align="right"><?php if (!empty($rejectgd)) {
										echo uang($rejectgd);
									} ?></td>
				<td align="right"><?php if (!empty($penybad_in)) {
										echo uang($penybad_in);
									} ?></td>
				<td align="right"><?php if (!empty($kirimpusat)) {
										echo uang($kirimpusat);
									} ?></td>
				<td align="right"><?php if (!empty($repack)) {
										echo uang($repack);
									} ?></td>
				<td align="right"><?php if (!empty($penybad_out)) {
										echo uang($penybad_out);
									} ?></td>
				<td align="right"><?php if (!empty($sisamutasibad)) {
										echo uang($sisamutasibad);
									} ?></td>
				<td align="right"><?php echo $jmldus; ?></td>
				<td align="right"><?php echo $jmlpack; ?></td>
				<td align="right"><?php echo $jmlpcs; ?></td>
			</tr>
		<?php
			$no++;
		}
		?>
	</tbody>
</table>
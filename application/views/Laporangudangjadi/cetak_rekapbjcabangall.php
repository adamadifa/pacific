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
	PACIFIC ALL CBANG<br>
	REKAPITULASI GOOD STOCK<br>
	PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br><br>
</b>
<br>
<table class="datatable3" style="width:100%;  margin-bottom: 30px" border="1">
	<thead bgcolor="#024a75" style="color:white;">
		<tr>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">KODE PRODUK</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">PRODUK</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">SALDO AWAL</th>
			<th colspan="6" bgcolor="#22a538" style="font-size:10px !important">PENERIMAAN</th>
			<th colspan="8" bgcolor="#c7473a" style="font-size:10px !important">PENGELUARAN</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:10px !important">SALDO AKHIR</th>
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
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($rekap as $key => $d) {
			$kode_cabang = @$rekap[$key + 1]->kode_cabang;
			$saldoawal = $d->saldo_awal / $d->isipcsdus;
			$pusat = $d->pusat / $d->isipcsdus;
			$transit_in = $d->transit_in / $d->isipcsdus;
			$retur = $d->retur / $d->isipcsdus;
			$lainlain_in = $d->lainlain_in / $d->isipcsdus;
			$repack = $d->repack / $d->isipcsdus;
			$penyesuaian_in = $d->penyesuaian_in / $d->isipcsdus;
			$penjualan = $d->penjualan / $d->isipcsdus;
			$promosi = $d->promosi / $d->isipcsdus;
			$reject_pasar = $d->reject_pasar / $d->isipcsdus;
			$reject_mobil = $d->reject_mobil / $d->isipcsdus;
			$reject_gudang = $d->reject_gudang / $d->isipcsdus;
			$transit_out = $d->transit_out / $d->isipcsdus;
			$lainlain_out = $d->lainlain_out / $d->isipcsdus;
			$penyesuaian_out = $d->penyesuaian_out / $d->isipcsdus;

			$sisamutasi = ($saldoawal + $pusat + $transit_in + $retur + $lainlain_in + $repack + $penyesuaian_in) - ($penjualan + $promosi + $reject_pasar + $reject_mobil + $reject_gudang + $transit_out + $lainlain_out + $penyesuaian_out);
		?>
			<tr>
				<td><?php echo $d->kode_produk ?></td>
				<td><?php echo $d->nama_barang ?></td>
				<td align="right"><?php echo uang($saldoawal) ?></td>
				<td align="right"><?php echo uang($pusat) ?></td>
				<td align="right">
					<?php
					if (!empty($transit_in)) {
						echo uang($transit_in);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($retur)) {
						echo uang($retur);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($lainlain_in)) {
						echo uang($lainlain_in);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($repack)) {
						echo uang($repack);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($penyesuaian_in)) {
						echo uang($penyesuaian_in);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($penjualan)) {
						echo uang($penjualan);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($promosi)) {
						echo uang($promosi);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($reject_pasar)) {
						echo uang($reject_pasar);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($reject_mobil)) {
						echo uang($reject_mobil);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($reject_gudang)) {
						echo uang($reject_gudang);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($transit_out)) {
						echo uang($transit_out);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($lainlain_out)) {
						echo uang($lainlain_out);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($penyesuaian_out)) {
						echo uang($penyesuaian_out);
					}
					?>
				</td>
				<td align="right">
					<?php
					if (!empty($sisamutasi)) {
						echo uang($sisamutasi);
					}
					?>
				</td>
			</tr>
		<?php
			if ($kode_cabang != $d->kode_cabang) {
				echo '
			<tr bgcolor="#31869b" style="color:white; font-weight:bold">
				<td>' . $d->kode_cabang . '</td>
				<td colspan="17" ></td>
			</tr>';
			}
			$kode_cabang = $d->kode_cabang;
		}
		?>
	</tbody>
</table>
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
	PACIFIC CABANG <?php echo $cabang; ?><br>
	REKAPITULASI REKONSILIASI BJ <?php echo $jeniskonsolidasi; ?><br>
	PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br><br>
</b>
<br>
<table class="datatable3" style="width:50%;  margin-bottom: 30px" border="1">
	<thead bgcolor="#024a75" style="color:white;">
		<tr>
			<th rowspan="2" bgcolor="#024a75" style="font-size:14px !important">NO</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:14px !important">PRODUK</th>
			<th colspan="3" bgcolor="#024a75" style="font-size:14px !important">TUNAI KREDIT</th>
			<th colspan="3" bgcolor="#0cb30c" style="font-size:14px !important">PERSEDIAAN</th>
			<th colspan="3" bgcolor="#b30c26" style="font-size:14px !important">SELISIH</th>
		</tr>
		<tr>
			<th>Dus</th>
			<th>Pack</th>
			<th>Pcs</th>
			<th style="background-color: #0cb30c;">Dus</th>
			<th style="background-color: #0cb30c;">Pack</th>
			<th style="background-color: #0cb30c;">Pcs</th>
			<th style="background-color: #b30c26;">Dus</th>
			<th style="background-color: #b30c26;">Pack</th>
			<th style="background-color: #b30c26;">Pcs</th>
		</tr>
	</thead>
	<tbody style="font-size: 12px;">
		<?php
		$no = 1;
		foreach ($konsolidasi as $t) {
			if ($t->totalpenjualan != 0) {
				$jmldust    = floor($t->totalpenjualan / $t->isipcsdus);
				$sisadus   = $t->totalpenjualan % $t->isipcsdus;
				if ($t->isipack == 0) {
					$jmlpackt    = 0;
					$sisapack   = $sisadus;
				} else {

					$jmlpackt    = floor($sisadus / $t->isipcs);
					$sisapack   = $sisadus % $t->isipcs;
				}
				$jmlpcst = $sisapack;
				if ($t->satuan == 'PCS') {

					$jmldust = 0;
					$jmlpackt = 0;
					$jmlpcst = $t->totalpenjualan;
				}
			} else {

				$jmldust 	= 0;
				$jmlpackt	= 0;
				$jmlpcst 	= 0;
				$subtotalt  = 0;
			}


			if ($t->totalpersediaan != 0) {
				$jmldusk    = floor($t->totalpersediaan  / $t->isipcsdus);
				$sisadus   = $t->totalpersediaan % $t->isipcsdus;
				if ($t->isipack == 0) {
					$jmlpackk   = 0;
					$sisapack   = $sisadus;
				} else {

					$jmlpackk   = floor($sisadus / $t->isipcs);
					$sisapack   = $sisadus % $t->isipcs;
				}
				$jmlpcsk = $sisapack;


				if ($t->satuan == 'PCS') {

					$jmldusk = 0;
					$jmlpackk = 0;
					$jmlpcsk = $t->totalpersediaan;
				}
			} else {

				$jmldusk 	= 0;
				$jmlpackk	= 0;
				$jmlpcsk 	= 0;
				$subtotalk  = 0;
			}

			if ($t->selisih != 0) {
				$cekdus = $t->selisih / $t->isipcsdus;
				if ($cekdus < 0) {
					$jmldusall = ceil($t->selisih / $t->isipcsdus);
				} else {
					$jmldusall    = floor($t->selisih / $t->isipcsdus);
				}
				$sisadus   	  = $t->selisih % $t->isipcsdus;
				if ($t->isipack == 0) {
					$jmlpackall    = 0;
					$sisapack      = $sisadus;
				} else {

					$jmlpackall    = floor($sisadus / $t->isipcs);
					$sisapack   	= $sisadus % $t->isipcs;
				}
				$jmlpcsall 	= $sisapack;


				if ($t->satuan == 'PCS') {
					$jmldusall = 0;
					$jmlpackall = 0;
					$jmlpcsall = $t->selisih;
				}
			} else {

				$jmldusall 	= 0;
				$jmlpackall	= 0;
				$jmlpcsall 	= 0;
				$subtotalall  = 0;
			}
		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $t->nama_barang; ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmldust) ? number_format($jmldust, '0', '', '.') : ""); ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmlpackt) ? number_format($jmlpackt, '0', '', '.') : ""); ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmlpcst) ? number_format($jmlpcst, '0', '', '.') : ""); ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmldusk) ? number_format($jmldusk, '0', '', '.') : ""); ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmlpackk) ? number_format($jmlpackk, '0', '', '.') : ""); ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmlpcsk) ? number_format($jmlpcsk, '0', '', '.') : ""); ?></td>



				<td style="text-align: center;"><?php echo (!empty($jmldusall) ? number_format($jmldusall, '0', '', '.') : ""); ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmlpackall) ? number_format($jmlpackall, '0', '', '.') : ""); ?></td>
				<td style="text-align: center;"><?php echo (!empty($jmlpcsall) ? number_format($jmlpcsall, '0', '', '.') : ""); ?></td>
			</tr>
		<?php $no++;
		} ?>
	</tbody>

</table>
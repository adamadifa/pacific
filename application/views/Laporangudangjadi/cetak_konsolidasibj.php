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
	PACIFIC CABANG <br>
	REKAPITULASI KONSOLIDASI BJ<br>
	PERIODE <?php echo DateToIndo2($dari) . " s/d " . DateToIndo2($sampai); ?><br><br>
</b>
<br>
<table class="datatable3" style="width:100%;  margin-bottom: 30px" border="1">
	<thead bgcolor="#024a75" style="color:white;">
		<tr>
			<th rowspan="2" bgcolor="#024a75" style="font-size:14px !important">NO</th>
			<th rowspan="2" bgcolor="#024a75" style="font-size:14px !important">PRODUK</th>
			<th colspan="3" bgcolor="#024a75" style="font-size:14px !important">TUNAI KREDIT</th>
			<th colspan="3" bgcolor="#024a75" style="font-size:14px !important">PERSEDIAAN</th>
		</tr>
		<tr>
			<th>Dus</th>
			<th>Pack</th>
			<th>Pcs</th>
			<th>Dus</th>
			<th>Pack</th>
			<th>Pcs</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no=1;
			foreach($konsolidasi as $d){
		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->nama_barang; ?></td>
			</tr>
			<?php $no++; } ?>
	</tbody>
	
</table>
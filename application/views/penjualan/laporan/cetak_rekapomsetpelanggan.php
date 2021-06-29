<?php
error_reporting(0);
function uang($nilai)
{

  return number_format($nilai, '0', '', '.');
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<b style="font-size:18px; font-family:Calibri">
  REKAP OMSET PELANGGAN <br>
  CABANG <?php echo $cabang; ?><br>
  PERIODE <?php echo $bln1; ?> s/d <?php echo $bln2; ?>
</b>

<br>
<br>
<table class="datatable3" border="1">
	<thead bgcolor="#024a75" style="color:white; font-size:12;">
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th rowspan="2">NO</th>
			<th rowspan="2">KODE PELANGGAN</th>
			<th rowspan="2">NAMA PELANGGAN</th>
			<th rowspan="2">NAMA KARYAWAN</th>
			<th rowspan="2">PASAR</th>
			<th rowspan="2">TOTAL OMSET</th>
			<th rowspan="2">RATA RATA OMSET</th>
			<th colspan="2">RATA RATA OMSET KATEGORI PRODUK</th>
			
		</tr>
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th>AIDA</th>
			<th>SWAN</th>
		</tr>
	</thead>
	<tbody style="font-size:14px">
		<?php 
		$totalomset =  0;
		$totalratarataomset = 0;
		$totalratarataswan = 0;
		$totalratarataaida =0;
		$no =1; foreach($rekapomsetpelanggan as $r){ 
			$totalomset += $r->netpenjualan;
			$totalratarataomset += ($r->netpenjualan / $periode);
			$totalratarataswan += ($r->netswan / $periode);
			$totalratarataaida += ($r->netaida / $periode);
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $r->kode_pelanggan; ?></td>
			<td><?php echo $r->nama_pelanggan; ?></td>
			<td><?php echo $r->nama_karyawan; ?></td>
			<td><?php echo $r->pasar; ?></td>
			<td align="right"><?php echo uang($r->netpenjualan); ?></td>
			<td align="right"><?php echo uang($r->netpenjualan / $periode); ?></td>
			<td align="right"><?php echo uang($r->netaida / $periode); ?></td>
			<td align="right"><?php echo uang($r->netswan / $periode); ?></td>
		</tr>
		<?php $no++;} ?>
		<tr> 
			<th colspan="5" align="right">TOTAL</th>
			<th style="text-align:right"><?php echo uang($totalomset); ?></th>
			<th style="text-align:right"><?php echo uang($totalratarataomset); ?></th>
			<th style="text-align:right"><?php echo uang($totalratarataaida); ?></th>
			<th style="text-align:right"><?php echo uang($totalratarataswan); ?></th>
			
		</tr>
	</tbody>
</table>
<?php
	error_reporting(0);
	function uang($nilai){
		return number_format($nilai,'2',',','.');
	}

  function angka($nilai){
		return number_format($nilai,'2',',','.');
	}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">
<br>
<b style="font-size:14px; font-family:Calibri; text-transform: uppercase;">
  RETUR KELUAR <br>
  <?php echo $supp['nama_barang'];?><br>
  PERIODE <?php echo DateToIndo2($dari)." s/d ".DateToIndo2($sampai); ?><br>
</b>
<br>
<br>

<table class="datatable3" style="width:100%;" border="1">
	<thead bgcolor="#024a75" style="color:white; font-size:14;">
		<tr bgcolor="#024a75" style="color:white; font-size:14; text-align:center">
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Satuan</th>
			<th>Keterangan</th>
			<?php if($supp['kode_supplier'] == "SP0185"  || $supp['kode_supplier'] == "SP0140"){ ?>
				<th class="rumus">Bruto</th>
				<th class="rumus">Berat Roll</th>
				<th class="rumus">Netto</th>
				<th class="rumus">Berat PCS</th>
				<th class="rumus">Tinggi</th>
				<th class="rumus">Panjang</th>
				<th>Jumlah</th>
			<?php }else{ ?>
				<th>Jumlah</th>
			<?php } ?>
		</tr>
  	</thead>
  	<tbody>
		<?php
			$total  = 0;
			$no 		= 1;
			foreach ($pmb as $key => $d) {
				$total = $total + $d->jumlah;
  				$netto = $d->bruto-$d->berat_roll;
				if($netto != ""){ 
					$colspan = "11";
				}else{
					$colspan = "5";
				}
					?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->kode_barang; ?></td>
				<td><?php echo $d->nama_barang; ?></td>
				<td><?php echo $d->satuan; ?></td>
				<td><?php echo $d->keterangan; ?></td>
				<?php if($netto != ""){ ?>
					<td align="right"><?php echo number_format($d->bruto, 2); ?></td>
					<td><?php echo number_format($d->berat_roll, 2); ?></td>
					<td><?php echo number_format($netto, 2); ?></td>
					<td><?php echo number_format($d->berat_pcs, 2); ?></td>
					<td><?php echo number_format($d->tinggi, 2); ?></td>
					<td><?php echo number_format($d->panjang, 2); ?></td>
					<td><?php echo number_format($d->jumlah, 2); ?></td>
				<?php }else{ ?>
				<td><?php echo number_format($d->jumlah, 2); ?></td>
				<?php } ?>
			</tr>
		<?php
			$no++;
		}
		?>
		<tr bgcolor="#024a75" style="color:white; font-size:14;">
			<td colspan="<?php echo $colspan;?>"><b>TOTAL</b></td>
			<td align="left"><b><?php echo uang($total); ?></b></td>
		</tr>
	</tbody>

</table>

<?php

		
?>
<style>
body {
	letter-spacing: 0px;
	font-family: Tahoma;
	font-size:14px;
}

table {
	font-family: Tahoma;
	font-size:14px;
}

.garis5, .garis5 td, .garis5 tr, .garis5 th
{
	border: 2px solid black;
	border-collapse:collapse;
}

.table {border:solid 1px #000000; width:100%; font-size:12px; margin:auto;}
.table th {border:1px #000000;  font-size:12px; 

font-family:Arial;}
.table td {border: solid 1px #000000; 
}

</style>
	
<table border="0" width="100%" style="margin-top: 10px">
<tr>
	<td style="width:150px">
		<table class="garis5">
			<tr>
				<td>SURAT JALAN RETUR</td>
			</tr>
			<tr>
				<td>NOMOR <?php echo $faktur['kode_retur'] ?></td>
			
			</tr>
		</table>
	</td>
	<td colspan="6" align="left">
		<b>CV MAKMUR PERMATA<br>
			Jln. Perintis Kemerdekaan No. 160 Tasikmalaya Telp. (0265) 337694 / (0265) 336794
		</b>
		
	</td>
</tr>
<tr>
	<td colspan="7" align="center"><hr></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td width="15%">Tgl Retur</td>
	<td width="1%">:</td>
	<td width="40%"><?php echo DatetoIndo2($faktur['tanggal']); ?></td>
	<td>Nama Supplier</td>
	<td>:</td>
	<td><?php echo $faktur['nama_supplier']; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>No. Kendaraan</td>
	<td>:</td>
	<td></td>
	<td>Alamat Supplier</td>
	<td>:</td>
	<td><?php echo $faktur['alamat_supplier']; ?></td>
</tr>

<tr style="height:40px">
	<td colspan="7"></td>
</tr>
<tr style="height:10px;font-size:14px">
	<td colspan="7" align="center">Rekapitulasi Barang Yang Diretur</td>
</tr>
<tr>
	<td colspan="7">
		<table class="garis5" width="100%" style="margin-top: 10px;">
			<thead class="thead-dark">
			<tr>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Keterangan</th>
					<?php if($faktur['kode_supplier'] == "SP0185" || $faktur['kode_supplier'] == "SP0140"){ ?>
						<th>Bruto</th>
						<th>Berat Roll</th>
						<th>Netto</th>
						<th>Berat PCS</th>
						<th>Tinggi</th>
						<th>Panjang</th>
					<?php } ?>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				foreach ($barang as $key => $d) { 
				$netto = $d->bruto-$d->berat_roll;
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $d->kode_barang; ?></td>
					<td><?php echo $d->nama_barang; ?></td>
					<td><?php echo $d->keterangan; ?></td>
					<?php if($faktur['kode_supplier'] == "SP0185" || $faktur['kode_supplier'] == "SP0140"){ ?>
						<td align="right"><?php echo number_format($d->bruto, 2); ?></td>
						<td><?php echo number_format($d->berat_roll, 2); ?></td>
						<td><?php echo number_format($netto, 2); ?></td>
						<td><?php echo number_format($d->berat_pcs, 2); ?></td>
						<td><?php echo number_format($d->tinggi, 2); ?></td>
						<td><?php echo number_format($d->panjang, 2); ?></td>
					<?php } ?>
					<td><?php echo number_format($d->jumlah, 2); ?></td>
				</tr>
			<?php  } ?>
			</tbody>

		</table>
		
	</td>
</tr>
<tr>
	<table class="garis5" width="100%"  style="margin-top: 50px;">
		<tr style="font-weight:bold; text-align:center">
			<td>Dibuat</td>
			<td>Diserahkan</td>
			<td>Diterima</td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="height: 50px;"></td>
			<td></td>
			<td></td>
		</tr>
		<tr style="font-weight:bold; text-align:center">
			<td>Pembelian</td>
			<td>Pengemudi</td>
			<td>Supplier</td>
		</tr>
	</table>
</tr>
</table>
<br>

<p style="font-size: 18px"><i>Catatan : Setelah barang dan surat jalan diterima mohon untuk di tanda tangan dan di email melalui <b>pembelianmakmurpermata@gmail.com</b></i></p>
<?php

function uang($nilai)
{

	return number_format($nilai, '0', '', '.');
}
error_reporting(0);

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">

<br>
<b style="font-size:14px; font-family:Calibri">


	<?php
	if ($cb['nama_cabang'] != "") {
		echo "PACIFIC CABANG " . strtoupper($cb['nama_cabang']);
	} else {
		echo "PACIFIC ALL CABANG";
	}

	if ($lama == "duaminggu") {
		$lama = "2 MINGGU";
	} else if ($lama == "satubulan") {
		$lama = "1 BULAN";
	} else if ($lama == "satubulan15") {
		$lama = "> 1 BULAN s/d 46 HARI";
	} else if ($lama == "duabulan") {
		$lama = "> 46 HARI s/d 2 BULAN";
	} else if ($lama == "tigabulan") {
		$lama = "> 2 BULAN s/d 3 BULAN";
	} else if ($lama == "enambulan") {
		$lama = "> 3 BULAN s/d 6 BULAN";
	} else if ($lama == "duabelasbulan") {
		$lama = "> 6 BULAN s/d 1 TAHUN";
	} else if ($lama == "duatahun") {
		$lama = "> 1 TAHUN s/d 2 TAHUN";
	} else if ($lama == "lebihduatahun") {
		$lama = "> 2 TAHUN";
	} else {
		$lama = "";
	}
	?>
	<br>
	ANALISA UMUR PIUTANG <?php echo $lama; ?><br>


	<?php
	if ($salesman['nama_karyawan'] != "") {
		echo "NAMA SALES : " . strtoupper($salesman['nama_karyawan']);
	} else {
		echo "ALL SALES";
	}

	?>
	<br>
	<?php

	echo "TANGGAL : " . DateToIndo2($tanggal);

	?>

</b>
<br>
<br>

<!---- Inisialisasi ---->

<?php

if ($cb['kode_cabang'] != "") {

	$cbg = $cb['kode_cabang'];
} else {
	$cbg = "all";
}

if ($salesman['id_karyawan'] != "") {

	$sales = $salesman['id_karyawan'];
} else {
	$sales = "all";
}


if ($pelanggan['kode_pelanggan'] != "") {

	$plg = $pelanggan['kode_pelanggan'];
} else {
	$plg = "all";
}
?>

<table class="datatable3">

	<thead bgcolor="#024a75" style="color:white; font-size:12;">
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<th rowspan="2">No Faktur</th>
			<th rowspan="2">Tanggal Transaksi</th>
			<th rowspan="2">Jatuh Tempo</th>
			<th rowspan="2">Kode Pelanggan</th>
			<th rowspan="2">Nama Pelanggan</th>
			<th rowspan="2">Nama Salesman</th>
			<th rowspan="2">Pasar/Daerah</th>
			<th rowspan="2">HARI</th>
			<th rowspan="2">TOTAL</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0;
		foreach ($detail_aup as $r) {


			$total = $total + $r->jumlah;
			$jatuhtempo = date('Y-m-d', strtotime('+' . $r->jt . 'day', strtotime($r->tgltransaksi)));
			$hariini = date('Y-m-d');
			if ($hariini >= $jatuhtempo or empty($r->jt)) {
				$color = "white";
				$bg = "#c72c2c";
			} else {
				$color = "";
				$bg = "";
			}
		?>
			<tr style="color:<?php echo $color; ?>; background-color:<?php echo $bg; ?>">
				<td><?php echo $r->no_fak_penj; ?></td>
				<td><?php echo DateToIndo2($r->tgltransaksi); ?></td>
				<td>
					<?php
					if (!empty($r->jt)) {
						echo DateToIndo2($jatuhtempo);
					} else {
						echo '<span style="color:white; background-color:#f1881c; font-weight:bold">Belum Di Ajukan</span>';
					}
					?></td>
				<td><?php echo $r->kode_pelanggan; ?></td>
				<td><?php echo $r->nama_pelanggan; ?></td>
				<td><?php echo $r->nama_karyawan; ?></td>
				<td><?php echo $r->pasar; ?></td>
				<td><?php echo $r->hari; ?></td>
				<td style="text-align: right"><?php echo number_format($r->jumlah, '0', '', '.'); ?></td>
			</tr>
		<?php

		}
		?>
		<tr bgcolor="#024a75" style="color:white; font-size:12;">
			<td colspan="8">TOTAL</td>
			<td style="text-align: right"><?php echo number_format($total, '0', '', '.'); ?></td>

		</tr>
	</tbody>
</table>
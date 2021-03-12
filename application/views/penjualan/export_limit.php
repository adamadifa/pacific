<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table.css">

<br>
<b style="font-size:14px; font-family:Calibri">
	DATA LIMIT PELANGGAN
</b>
<br>
<br>
<table class="">
	<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>No Pengajuan</th>
			<th>Tanggal</th>
			<th>Kode Pelanggan</th>
			<th>Pelanggan</th>
			<th>Salesman</th>
			<th>Jumlah</th>
			<th>Jatuh Tempo</th>
			<!-- <th>Status</th>
			<th>Ket</th> -->
			<th>Kacab</th>
			<th>MM</th>
			<th>GM</th>
			<th>Dirut</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sno   =  1;
	foreach ($result as $d) {
	?>
		<tr>
		<td><?php echo $sno; ?></td>
		<td><?php echo $d['no_pengajuan']; ?></td>
		<td><?php echo $d['tgl_pengajuan']; ?></td>
		<td><?php echo $d['kode_pelanggan']; ?></td>
		<td><?php echo $d['nama_pelanggan']; ?></td>
		<td><?php echo $d['nama_karyawan']; ?></td>
		<td align="right"><?php echo number_format($d['jumlah'], '0', '', '.'); ?></td>
		<td>
			<?php
			if ($d['jatuhtempo'] == 14) {
			$lama = "14 Hari";
			} else if ($d['jatuhtempo'] == 30) {
			$lama = "30 Hari";
			} else if ($d['jatuhtempo'] == 45) {
			$lama = "45 Hari";
			} else if ($d['jatuhtempo'] == 60) {
			$lama = "2 Bulan";
			} else if ($d['jatuhtempo'] == 90) {
			$lama = "3 Bulan";
			} else if ($d['jatuhtempo'] == 180) {
			$lama = "6 Bulan";
			} else if ($d['jatuhtempo'] == 360) {
			$lama = "1 Tahun";
			} else {
			$lama = "";
			}

			echo $lama;
			?>
		</td>

		<?php
		if (empty($d['kacab'])) {
		?>
			<td bgcolor="orangered" align="center"><span>&#x2117;</span></td>
		<?php
		} else if (
		!empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 2
		or !empty($d['kacab']) && empty($d['mm']) && $d['status'] == 0
		or !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 0
		or !empty($d['kacab']) && !empty($d['mm']) && $d['status'] == 1
		) {
		?>
			<td bgcolor="green" align="center"><span>&#10003;</span></td>
		<?php
		} else {
		?>
			<td bgcolor="red" align="center"><span>&#169;</span></td>
		<?php
		}
		?>

		<?php
		if (empty($d['mm'])) {
		?>
			<td bgcolor="orangered" align="center"><span>&#x2117;</span></td>
		<?php
		} else if (
		!empty($d['mm']) && !empty($d['gm']) && $d['status'] == 2
		or !empty($d['mm']) && empty($d['gm']) && $d['status'] == 0
		or !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 0
		or !empty($d['mm']) && !empty($d['gm']) && $d['status'] == 1
		) {
		?>
			<td bgcolor="green" align="center"><span>&#10003;</span></td>
		<?php
		} else {
		?>
			<td bgcolor="red" align="center"><span>&#169;</span></td>
		<?php
		}
		?>

		<?php
		if (empty($d['gm'])) {
		?>
			<td bgcolor="orangered" align="center"><span>&#x2117;</span></td>
		<?php
		} else if (
		!empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 2
		or !empty($d['gm']) && empty($d['dirut']) && $d['status'] == 0
		or !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 0
		or !empty($d['gm']) && !empty($d['dirut']) && $d['status'] == 1
		) {
		?>
			<td bgcolor="green" align="center"><span>&#10003;</span></td>
		<?php
		} else {
		?>
			<td bgcolor="red" align="center"><span>&#169;</span></td>
		<?php
		}
		?>
		
		<?php
		if (empty($d['dirut'])) {
		?>
			<td bgcolor="orangered" align="center"><span>&#x2117;</span></td>
		<?php
		} else if (!empty($d['dirut']) && $d['status'] != 2) {
		?>
			<td bgcolor="green" align="center"><span>&#10003;</span></td>
		<?php
		} else {
		?>
			<td bgcolor="red" align="center"><span>&#169;</span></td>
		<?php
		}
		?>
		</tr>
	<?php
		$sno++;
	}
	?>

	</tbody>
	</table>
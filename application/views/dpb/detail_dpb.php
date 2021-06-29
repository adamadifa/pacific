<table class="table  table-hover table-striped">
	<tr>
		<td><b>No DPB</b></td>
		<td><b>Nama Salesman</b></td>
		<td><b>Tujuan</b></td>
		<td><b>No Kendaraan</b></td>
	</tr>
	<tr>
		<td><?php echo $dpb['no_dpb']; ?></td>
		<td><?php echo $dpb['nama_karyawan']; ?></td>
		<td><?php echo $dpb['tujuan']; ?></td>
		<td><?php echo $dpb['no_kendaraan']; ?></td>
	</tr>
</table>
<hr>
<table class="table table-bordered table-hover table-striped">
	<thead class="thead-dark">
		<tr>
			<th rowspan="4" align="">No</th>
			<th rowspan="4" style="text-align:center;">Nama Barang</th>
			<th colspan="2" style="text-align:center">Pengambilan</th>
			<th colspan="2" style="text-align:center">Pengembalian</th>
			<th rowspan="4" style="text-align:center">Barang Keluar</th>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center">
				<?php echo $dpb['tgl_pengambilan']; ?>
			</th>
			<th colspan="2" style="text-align:center">
				<?php echo $dpb['tgl_pengembalian']; ?>
			</th>
		</tr>
		<tr>
			<th colspan="2" style="text-align:center">Kuantitas</th>
			<th colspan="2" style="text-align:center">Kuantitas</th>
		</tr>
		<tr>
			<th style="text-align:center">Jumlah</th>
			<th style="text-align:center">Satuan</th>
			<th style="text-align:center">Jumlah</th>
			<th style="text-align:center">Satuan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach ($detaildpb as $d) {
			$jmlambil = number_format($d->jml_pengambilan, '3', ',', '.');
			$jmlpengambilan = explode(",", $jmlambil);

			$jmlkembali = number_format($d->jml_pengembalian, '3', ',', '.');
			$jmlpengembalian = explode(",", $jmlkembali);
			// if (empty(floatval($d->jml_pengembalian))) {
			// 	echo "Kosong";
			// } else {
			// 	echo "ada";
			// }
		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->nama_barang; ?></td>
				<td align="right">
					<?php if (!empty(floatval($jmlambil))) { ?>
						<b>
							<font color="black"><?php echo $jmlpengambilan[0]; ?></font>
						</b>
						<?php if (!empty($jmlpengambilan[1])) { ?>
							,<font color="red"><?php echo $jmlpengambilan[1]; ?></font>
						<?php } ?>
					<?php } ?>
				</td>
				<td align="center"><?php echo $d->satuan; ?></td>
				<td align="right">
					<?php if (!empty(floatval($jmlkembali))) { ?>
						<b>
							<font color="black"><?php echo $jmlpengembalian[0]; ?></font>
						</b>
						<?php if (!empty($jmlpengembalian[1])) { ?>
							,<font color="red"><?php echo $jmlpengembalian[1]; ?></font>
						<?php } ?>
					<?php } ?>
				</td>
				<td align="center"><?php echo $d->satuan; ?></td>
				<td align="right"><?php echo number_format($d->jml_penjualan, '3', ',', '.'); ?></td>
			</tr>
		<?php
			$no++;
		}
		?>
	</tbody>
</table>
<table class="table table-bordered table-striped">
	<thead class="thead-dark">
		<tr>
			<th colspan="9">Detail DPB</th>
		</tr>
		<tr>
			<th rowspan="3">Nama Produk</th>
			<th class="text-center" colspan="9">Mutasi</th>
		</tr>
		<tr>
			<th class="text-center" colspan="3">IN</th>
			<th class="text-center" colspan="6">OUT</th>
		</tr>
		<tr>
			<th>RETUR</th>
			<th>PL TTR</th>
			<th>HK</th>
			<th>PENJUALAN</th>
			<th>PL HK</th>
			<th>PROMO</th>
			<th>TTR</th>
			<th>GB</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($mutasidpb as $m) {
			$retur = $m->retur / $m->isipcsdus;
			$plttr = $m->pelunasanttr / $m->isipcsdus;
			$pnj 	 = $m->penjualan / $m->isipcsdus;
			$hk 	 = $m->hutangkirim / $m->isipcsdus;
			$plhk  = $m->plhutangkirim / $m->isipcsdus;
			$promo = $m->promosi / $m->isipcsdus;
			$ttr   = $m->ttr / $m->isipcsdus;
			$gb  	 = $m->gantibarang / $m->isipcsdus;
		?>
			<tr>
				<td><?php echo $m->nama_barang; ?></td>
				<td align="right"><span class="badge bg-green"><?php echo number_format($retur, '3', ',', '.'); ?></span></td>
				<td align="right"><span class="badge bg-green"><?php echo number_format($plttr, '3', ',', '.'); ?></span></td>
				<td align="right"><span class="badge bg-green"><?php echo number_format($hk, '3', ',', '.'); ?></span></td>
				<td align="right"><span class="badge bg-red"><?php echo number_format($pnj, '3', ',', '.'); ?></span></td>
				<td align="right"><span class="badge bg-red"><?php echo number_format($plhk, '3', ',', '.'); ?></span></td>
				<td align="right"><span class="badge bg-red"><?php echo number_format($promo, '3', ',', '.'); ?></span></td>
				<td align="right"><span class="badge bg-red"><?php echo number_format($ttr, '3', ',', '.'); ?></span></td>
				<td align="right"><span class="badge bg-red"><?php echo number_format($gb, '3', ',', '.'); ?></span></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
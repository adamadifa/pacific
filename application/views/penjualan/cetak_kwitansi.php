<?php


?>
<style>
	body {
		letter-spacing: 0px;
		font-family: Calibri;
		font-size: 14px;
	}

	table {
		font-family: Tahoma;
		font-size: 14px;
	}

	.garis5,
	.garis5 td,
	.garis5 tr,
	.garis5 th {
		border: 2px solid black;
		border-collapse: collapse;
	}

	.table {
		border: solid 1px #000000;
		width: 100%;
		font-size: 12px;
		margin: auto;
	}

	.table th {
		border: 1px #000000;
		font-size: 12px;

		font-family: Arial;
	}

	.table td {
		border: solid 1px #000000;
	}
</style>

<table border="0" width="100%">
	<tr>
		<td style="width:150px">
			<table class="garis5">
				<tr>
					<td>FAKTUR</td>
				</tr>
				<tr>
					<td>NOMOR <?php echo $faktur['no_fak_penj'] ?></td>

				</tr>
			</table>
		</td>

		<td colspan="6" align="left">
			<b>

				<?php
				$query = "SELECT * FROM cabang WHERE kode_cabang ='$faktur[kode_cabang]'";
				$cabang = $this->db->query($query)->row_array();
				?>
				<b>
					<?php
					$query = "SELECT * FROM cabang WHERE kode_cabang ='$faktur[kode_cabang]'";
					$cabang = $this->db->query($query)->row_array();
					?>
					<b>CV PACIFIC CABANG <?php echo strtoupper($cabang['nama_cabang']); ?></b><br>
					<b><?php echo $cabang['alamat_cabang']; ?></b>

				</b>
		</td>
	</tr>
	<tr>
		<td colspan="7" align="center">
			<hr>
		</td>
	</tr>

	<tr>
		<td width="15%">Tgl Faktur</td>
		<td width="1%">:</td>
		<td width="40%"><?php echo DatetoIndo2($faktur['tgltransaksi']); ?></td>
		<td>Nama Customer</td>
		<td>:</td>
		<td><?php echo $faktur['nama_pelanggan']; ?></td>
	</tr>
	<tr>
		<td>Jenis Transaksi</td>
		<td>:</td>
		<td><?php echo strtoupper($faktur['jenistransaksi']); ?></td>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<?php if (!empty($faktur['alamat_toko'])) {
				echo $faktur['alamat_toko'];
			} else {
				echo $faktur['alamat_pelanggan'];
			} ?></td>
	</tr>

	<tr>
		<td colspan="7">

			<table class="garis5" width="100%">
				<thead>
					<tr style="padding: 10px">
						<th rowspan="2">NO</th>
						<th rowspan="2">KODE BARANG</th>
						<th rowspan="2">NAMA BARANG</th>
						<th rowspan="2">HARGA</th>
						<th colspan="3">JUMLAH</th>
						<th rowspan="2">TOTAL</th>
					</tr>
					<tr>
						<th>DUS</th>
						<th>PACK</th>
						<th>PCS</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($barang as $b) {
						$jmldus     = floor($b->jumlah / $b->isipcsdus);
						$sisadus    = $b->jumlah % $b->isipcsdus;

						if ($b->isipack == 0) {
							$jmlpack    = 0;
							$sisapack   = $sisadus;
						} else {

							$jmlpack    = floor($sisadus / $b->isipcs);
							$sisapack   = $sisadus % $b->isipcs;
						}

						$jmlpcs = $sisapack;


					?>
						<tr style="padding:  10px">
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $b->kode_barang; ?></td>
							<td><?php echo $b->nama_barang; ?></td>
							<td align="right"><?php echo number_format($b->harga_dus, '0', '', '.'); ?></td>
							<td align="center"><?php echo $jmldus; ?></td>
							<td align="center"><?php echo $jmlpack; ?></td>
							<td align="center"><?php echo $jmlpcs; ?></td>
							<td align="right"><?php echo number_format($b->subtotal, '0', '', '.'); ?>
						</tr>
					<?php $no++;
					} ?>
					<tr>
						<td colspan="4"></td>
						<td colspan="3" align="center">Jumlah</td>
						<td align="right"><?php echo number_format($faktur['subtotal'], '0', '', '.'); ?>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td colspan="3" align="center">Diskon</td>
						<td align="right"><?php echo number_format($faktur['potongan'], '0', '', '.'); ?>
					</tr>
					<?php if ($faktur['potistimewa'] != 0) { ?>
						<tr>
							<td colspan="4"></td>
							<td colspan="3" align="center">Potongan Istimewa</td>
							<td align="right"><?php echo number_format($faktur['potistimewa'], '0', '', '.'); ?>
						</tr>
					<?php } ?>
					<tr>
						<td colspan="4"></td>
						<td colspan="3" align="center">Penyesuaian</td>
						<td align="right"><?php echo number_format($faktur['penyharga'], '0', '', '.'); ?>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td colspan="3" align="center">Retur</td>
						<td align="right"><?php echo number_format($faktur['totalretur'], '0', '', '.'); ?>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td colspan="3" align="center">Total Pembayaran</td>
						<td align="right"><?php echo number_format($faktur['totalpiutang'], '0', '', '.'); ?>
					</tr>
				</tbody>

			</table>

		</td>
	</tr>

</table>

<div style="page-break-before:always;">

	<table border="0" width="100%">
		<tr>
			<td style="width:150px">
				<table class="garis5">
					<tr>
						<td>FAKTUR</td>
					</tr>
					<tr>
						<td>NOMOR <?php echo $faktur['no_fak_penj']; ?></td>

					</tr>
				</table>
			</td>
			<td colspan="6" align="left">

				<b>CV PACIFIC CABANG <?php echo strtoupper($cabang['nama_cabang']); ?></b><br>
				<b><?php echo $cabang['alamat_cabang']; ?></b>


			</td>
		</tr>
		<tr>
			<td colspan="7" align="center">
				<hr>
			</td>
		</tr>

		<tr>

			<td width="15%">Tgl Faktur</td>
			<td width="1%">:</td>
			<td width="40%"><?php echo DatetoIndo2($faktur['tgltransaksi']); ?></td>
			<td>Nama Customer</td>
			<td>:</td>
			<td><?php echo $faktur['nama_pelanggan']; ?></td>
		</tr>
		<tr>

			<td>Jenis Transaksi</td>
			<td>:</td>
			<td><?php echo strtoupper($faktur['jenistransaksi']); ?></td>
			<td>Alamat</td>
			<td>:</td>
			<td>
				<?php if (!empty($faktur['alamat_toko'])) {
					echo $faktur['alamat_toko'];
				} else {
					echo $faktur['alamat_pelanggan'];
				} ?></td>
		</tr>

		<tr>
			<td colspan="7">

				<table class="garis5" width="100%">
					<thead>
						<tr>
							<th rowspan="2">NO</th>
							<th rowspan="2">KODE BARANG</th>
							<th rowspan="2">NAMA BARANG</th>
							<th rowspan="2">HARGA</th>
							<th colspan="3">JUMLAH</th>
							<th rowspan="2">TOTAL</th>
						</tr>
						<tr>
							<th>DUS</th>
							<th>PACK</th>
							<th>PCS</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($barang as $b) {
							$jmldus     = floor($b->jumlah / $b->isipcsdus);
							$sisadus    = $b->jumlah % $b->isipcsdus;

							if ($b->isipack == 0) {
								$jmlpack    = 0;
								$sisapack   = $sisadus;
							} else {

								$jmlpack    = floor($sisadus / $b->isipcs);
								$sisapack   = $sisadus % $b->isipcs;
							}

							$jmlpcs = $sisapack;


						?>
							<tr>
								<td align="center"><?php echo $no; ?></td>
								<td><?php echo $b->kode_barang; ?></td>
								<td><?php echo $b->nama_barang; ?></td>
								<td align="right"><?php echo number_format($b->harga_dus, '0', '', '.'); ?></td>
								<td align="center"><?php echo $jmldus; ?></td>
								<td align="center"><?php echo $jmlpack; ?></td>
								<td align="center"><?php echo $jmlpcs; ?></td>
								<td align="right"><?php echo number_format($b->subtotal, '0', '', '.'); ?>
							</tr>
						<?php $no++;
						} ?>
						<tr>
							<td colspan="4"></td>
							<td colspan="3" align="center">Jumlah</td>
							<td align="right"><?php echo number_format($faktur['subtotal'], '0', '', '.'); ?>
						</tr>
						<tr>
							<td colspan="4"></td>
							<td colspan="3" align="center">Diskon</td>
							<td align="right"><?php echo number_format($faktur['potongan'], '0', '', '.'); ?>
						</tr>

						<tr>
							<td colspan="4"></td>
							<td colspan="3" align="center">Total Pembayaran</td>
							<td align="right"><?php echo number_format($faktur['totalpiutang'] + $faktur['totalretur'], '0', '', '.'); ?>
						</tr>
					</tbody>

				</table>

			</td>
		</tr>

	</table>
	<div style="page-break-before:always;">
		<table border="0" width="100%">
			<tr>
				<td style="width:150px">
					<table class="garis5">
						<tr>
							<td>FAKTUR</td>
						</tr>
						<tr>
							<td>NOMOR <?php echo $faktur['no_fak_penj'] ?></td>

						</tr>
					</table>
				</td>

				<td colspan="6" align="left">
					<b>CV MAKMUR PERMATA </b><br>
					<b>Jln. Perintis Kemerdekaan RT 001 / RW 003 Kelurahan Karsamenak Kecamatan Kawalu Kota Tasikmalaya 46182 <br>
						NPWP : 863860342425000</b>
				</td>
			</tr>
			<tr>
				<td colspan="7" align="center">
					<hr>
				</td>
			</tr>

			<tr>
				<td width="15%">Tgl Faktur</td>
				<td width="1%">:</td>
				<td width="40%"><?php echo DatetoIndo2($faktur['tgltransaksi']); ?></td>
				<td>Nama Customer</td>
				<td>:</td>
				<td><?php echo $faktur['nama_pelanggan']; ?></td>
			</tr>
			<tr>
				<td>Jenis Transaksi</td>
				<td>:</td>
				<td><?php echo strtoupper($faktur['jenistransaksi']); ?></td>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<?php if (!empty($faktur['alamat_toko'])) {
						echo $faktur['alamat_toko'];
					} else {
						echo $faktur['alamat_pelanggan'];
					} ?></td>
			</tr>

			<tr>
				<td colspan="7">

					<table class="garis5" width="100%">
						<thead>
							<tr style="padding: 10px">
								<th rowspan="2">NO</th>
								<th rowspan="2">KODE BARANG</th>
								<th rowspan="2">NAMA BARANG</th>
								<th rowspan="2">HARGA</th>
								<th colspan="3">JUMLAH</th>
								<th rowspan="2">TOTAL</th>
							</tr>
							<tr>
								<th>DUS</th>
								<th>PACK</th>
								<th>PCS</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($barang as $b) {
								$jmldus     = floor($b->jumlah / $b->isipcsdus);
								$sisadus    = $b->jumlah % $b->isipcsdus;

								if ($b->isipack == 0) {
									$jmlpack    = 0;
									$sisapack   = $sisadus;
								} else {

									$jmlpack    = floor($sisadus / $b->isipcs);
									$sisapack   = $sisadus % $b->isipcs;
								}

								$jmlpcs = $sisapack;


							?>
								<tr style="padding:  10px">
									<td align="center"><?php echo $no; ?></td>
									<td><?php echo $b->kode_barang; ?></td>
									<td><?php echo $b->nama_barang; ?></td>
									<td align="right"><?php echo number_format($b->harga_dus, '0', '', '.'); ?></td>
									<td align="center"><?php echo $jmldus; ?></td>
									<td align="center"><?php echo $jmlpack; ?></td>
									<td align="center"><?php echo $jmlpcs; ?></td>
									<td align="right"><?php echo number_format($b->subtotal, '0', '', '.'); ?>
								</tr>
							<?php $no++;
							} ?>
							<tr>
								<td colspan="4"></td>
								<td colspan="3" align="center">Jumlah</td>
								<td align="right"><?php echo number_format($faktur['subtotal'], '0', '', '.'); ?>
							</tr>
							<tr>
								<td colspan="4"></td>
								<td colspan="3" align="center">Diskon</td>
								<td align="right"><?php echo number_format($faktur['potongan'], '0', '', '.'); ?>
							</tr>
							<?php if ($faktur['potistimewa'] != 0) { ?>
								<tr>
									<td colspan="4"></td>
									<td colspan="3" align="center">Potongan Istimewa</td>
									<td align="right"><?php echo number_format($faktur['potistimewa'], '0', '', '.'); ?>
								</tr>
							<?php } ?>
							<tr>
								<td colspan="4"></td>
								<td colspan="3" align="center">Penyesuaian</td>
								<td align="right"><?php echo number_format($faktur['penyharga'], '0', '', '.'); ?>
							</tr>
							<tr>
								<td colspan="4"></td>
								<td colspan="3" align="center">Retur</td>
								<td align="right"><?php echo number_format($faktur['totalretur'], '0', '', '.'); ?>
							</tr>
							<tr>
								<td colspan="4"></td>
								<td colspan="3" align="center">Total Pembayaran</td>
								<td align="right"><?php echo number_format($faktur['totalpiutang'], '0', '', '.'); ?>
							</tr>
						</tbody>

					</table>

				</td>
			</tr>

		</table>
		<br>
		Untuk Pembayaran Bisa Melalui <br>
		<b>Rekening BCA CV Makmur Permata No. 0543772221 | </b>
		<b>Rekening BNI CV Makmur Permata No. 0773092265</b><br>
		<div style="page-break-before:always;">
			<table border="0" width="100%">
				<tr>
					<td style="width:150px">
						<table class="garis5">
							<tr>
								<td>FAKTUR</td>
							</tr>
							<tr>
								<td>NOMOR <?php echo $faktur['no_fak_penj']; ?></td>

							</tr>
						</table>
					</td>
					<td colspan="6" align="left">

						<b>CV MAKMUR PERMATA </b><br>
						<b>Jln. Perintis Kemerdekaan RT 001 / RW 003 Kelurahan Karsamenak Kecamatan Kawalu Kota Tasikmalaya 46182 <br>
							NPWP : 863860342425000</b>


					</td>
				</tr>
				<tr>
					<td colspan="7" align="center">
						<hr>
					</td>
				</tr>

				<tr>

					<td width="15%">Tgl Faktur</td>
					<td width="1%">:</td>
					<td width="40%"><?php echo DatetoIndo2($faktur['tgltransaksi']); ?></td>
					<td>Nama Customer</td>
					<td>:</td>
					<td><?php echo $faktur['nama_pelanggan']; ?></td>
				</tr>
				<tr>

					<td>Jenis Transaksi</td>
					<td>:</td>
					<td><?php echo strtoupper($faktur['jenistransaksi']); ?></td>
					<td>Alamat</td>
					<td>:</td>
					<td>
						<?php if (!empty($faktur['alamat_toko'])) {
							echo $faktur['alamat_toko'];
						} else {
							echo $faktur['alamat_pelanggan'];
						} ?></td>
				</tr>

				<tr>
					<td colspan="7">

						<table class="garis5" width="100%">
							<thead>
								<tr>
									<th rowspan="2">NO</th>
									<th rowspan="2">KODE BARANG</th>
									<th rowspan="2">NAMA BARANG</th>
									<th rowspan="2">HARGA</th>
									<th colspan="3">JUMLAH</th>
									<th rowspan="2">TOTAL</th>
								</tr>
								<tr>
									<th>DUS</th>
									<th>PACK</th>
									<th>PCS</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($barang as $b) {
									$jmldus     = floor($b->jumlah / $b->isipcsdus);
									$sisadus    = $b->jumlah % $b->isipcsdus;

									if ($b->isipack == 0) {
										$jmlpack    = 0;
										$sisapack   = $sisadus;
									} else {

										$jmlpack    = floor($sisadus / $b->isipcs);
										$sisapack   = $sisadus % $b->isipcs;
									}

									$jmlpcs = $sisapack;


								?>
									<tr>
										<td align="center"><?php echo $no; ?></td>
										<td><?php echo $b->kode_barang; ?></td>
										<td><?php echo $b->nama_barang; ?></td>
										<td align="right"><?php echo number_format($b->harga_dus, '0', '', '.'); ?></td>
										<td align="center"><?php echo $jmldus; ?></td>
										<td align="center"><?php echo $jmlpack; ?></td>
										<td align="center"><?php echo $jmlpcs; ?></td>
										<td align="right"><?php echo number_format($b->subtotal, '0', '', '.'); ?>
									</tr>
								<?php $no++;
								} ?>
								<tr>
									<td colspan="4"></td>
									<td colspan="3" align="center">Jumlah</td>
									<td align="right"><?php echo number_format($faktur['subtotal'], '0', '', '.'); ?>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td colspan="3" align="center">Diskon</td>
									<td align="right"><?php echo number_format($faktur['potongan'], '0', '', '.'); ?>
								</tr>

								<tr>
									<td colspan="4"></td>
									<td colspan="3" align="center">Total Pembayaran</td>
									<td align="right"><?php echo number_format($faktur['totalpiutang'] + $faktur['totalretur'], '0', '', '.'); ?>
								</tr>
							</tbody>

						</table>

					</td>
				</tr>

			</table>
			<br>
			Untuk Pembayaran Bisa Melalui <br>
			<b>Rekening BCA CV Makmur Permata No. 0543772221 | </b>
			<b>Rekening BNI CV Makmur Permata No. 0773092265</b><br>
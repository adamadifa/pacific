<div class="container-fluid">
	<!-- Page title -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col-auto">
				<h2 class="page-title">
					Klaim
				</h2>
			</div>
		</div>
	</div>
	<!-- Content here -->
	<div class="row">
		<div class="col-md-10 col-xs-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Klaim Kas Kecil</h4>
				</div>
				<div class="card-body">
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>kaskecil/klaim" autocomplete="off">
						<div class="mb-3">
							<div class="row">
								<div class="col-md-6">
									<div class="input-icon">
										<input id="dari" type="date" value="<?php echo $dari; ?>" placeholder="Dari" class="form-control" name="dari" />
										<span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" />
												<rect x="4" y="5" width="16" height="16" rx="2" />
												<line x1="16" y1="3" x2="16" y2="7" />
												<line x1="8" y1="3" x2="8" y2="7" />
												<line x1="4" y1="11" x2="20" y2="11" />
												<line x1="11" y1="15" x2="12" y2="15" />
												<line x1="12" y1="15" x2="12" y2="18" /></svg>
										</span>
									</div>
								</div>

								<div class="col-md-6">
									<div class="input-icon">
										<input id="sampai" type="date" value="<?php echo $sampai; ?>" placeholder="Sampai" class="form-control" name="sampai" />
										<span class="input-icon-addon"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" />
												<rect x="4" y="5" width="16" height="16" rx="2" />
												<line x1="16" y1="3" x2="16" y2="7" />
												<line x1="8" y1="3" x2="8" y2="7" />
												<line x1="4" y1="11" x2="20" y2="11" />
												<line x1="11" y1="15" x2="12" y2="15" />
												<line x1="12" y1="15" x2="12" y2="18" /></svg>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3 d-flex justify-content-end">
							<button type="submit" name="submit" class="btn btn-primary btn-block mr-2" value="1"><i class="fa fa-search mr-2"></i>CARI</button>
						</div>
					</form>
					<a href="<?php echo base_url(); ?>kaskecil/buatklaim" class="btn btn-danger">
						<div class="fa fa-plus mr-2"></div> Buat Klaim
					</a>
					<hr>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th>No</th>
									<th>Kode Klaim</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (empty($result)) {
								?>
									<tr>
										<td colspan="6">
											<div class="alert alert-warning" role="alert">
												Data Tidak Ditemukan / Silahkan Pilih Periode Terlebih Dahulu !
											</div>
										</td>
									</tr>
									<?php
								} else {
									$sno   = 1;
									foreach ($result as $d) {
										if ($d['status'] == '0') {
											$keterangan = "Belum Di Proses";
											$color 			= "bg-red";
										} else {
											$keterangan = "Sudah di Proses";
											$color 			= "bg-green";
										}
									?>
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $d['kode_klaim']; ?></td>
											<td><?php echo DateToIndo2($d['tgl_klaim']); ?></td>
											<td><?php echo $d['keterangan']; ?></td>
											<td><span class="badge <?php echo $color; ?>"><?php echo $keterangan; ?></span></td>
											<td>

												<form action="<?php echo base_url(); ?>kaskecil/cetakklaim" method="POST" target="_blank">
													<input type="hidden" name="kode_klaim" value="<?php echo $d['kode_klaim']; ?>">
													<input type="hidden" name="tgl_klaim" value="<?php echo $d['tgl_klaim']; ?>">
													<input type="hidden" name="cabang" value="<?php echo $d['kode_cabang']; ?>">
													<button type="submit" name="submit" class="btn btn-info btn-sm"><i class="fa fa-print"></i></button>
													<button type="submit" name="export" class="btn btn-success btn-sm"><i class="fa fa-download"></i></button>
													<a href="#" data-id="<?php echo $d['kode_klaim'] ?>" data-tglklaim="<?php echo $d['tgl_klaim'] ?>" data-cabang="<?php echo $d['kode_cabang'] ?>" class="btn btn-primary btn-sm detail"><i class="fa fa-list"></i></a>
													<?php if ($d['status'] == '0') { ?>
														<a href="<?php echo base_url(); ?>kaskecil/hapus_klaim/<?php echo $d['kode_klaim']; ?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash-o"></i></a>
													<?php } ?>
												</form>
											</td>
										</tr>
								<?php
										$sno++;
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<?php $this->load->view('menu/menu_keuangan_administrator'); ?>
		</div>
	</div>
</div>
<div class="modal modal-blur fade" id="detail" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title">Detail Klaim</h5>
			</div>
			<div class="modal-body">
				<div id="loaddetail"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		flatpickr(document.getElementById('dari'), {});
		flatpickr(document.getElementById('sampai'), {});
	});
</script>

<script type="text/javascript">
	$(function() {
		$('.hapus').on('click', function() {
			var getLink = $(this).attr('href');
			swal({
				title: 'Alert',
				text: 'Hapus Data?',
				html: true,
				confirmButtonColor: '#d9534f',
				showCancelButton: true,
			}, function() {
				window.location.href = getLink
			});
			return false;
		});
		$(".detail").click(function(e) {
			e.preventDefault();
			var kode_klaim = $(this).attr('data-id');
			var tgl_klaim = $(this).attr('data-tglklaim');
			var cabang = $(this).attr('data-cabang');
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>kaskecil/detailklaim',
				data: {
					kode_klaim: kode_klaim,
					tgl_klaim: tgl_klaim,
					cabang: cabang
				},
				cache: false,
				success: function(respond) {
					$("#detail").modal({
						backdrop: "static", //remove ability to close modal with click
						keyboard: false, //remove option to close with keyboard
						show: true //Display loader!
					});
					$("#loaddetail").html(respond);
				}
			});
		});

	});
</script>
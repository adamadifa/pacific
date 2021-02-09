<?php
function number($nilai)
{
	return number_format($nilai, '0', '', '.');
}
foreach ($detail as $b) {
?>
	<tr>
		<td><?php echo $b->kode_produk; ?></td>
		<td><?php echo $b->nama_barang; ?></td>
		<td style="text-align: right"><?php echo number($b->jumlah); ?></td>
		<td>
			<a href="#" data-id="<?php echo $b->kode_produk; ?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash-o"></i></a>
		</td>
	</tr>

<?php
}
?>

<script type="text/javascript">
	$(function() {
		function loadReject() {

			$("#loaddetailreject").load('<?php echo base_url(); ?>repackreject/view_detail_reject_temp/');
		}

		function cekdetailrejecttemp() {

			$.ajax({

				type: 'POST',
				url: '<?php echo base_url(); ?>repackreject/cekdetailrejecttemp',
				cache: false,
				success: function(respond) {

					$("#cekdetailrejecttemp").val(respond);
				}

			});
		}

		$(".hapus").click(function(e) {
			var id = $(this).attr("data-id");
			e.preventDefault();
			$.ajax({

				type: 'POST',
				url: '<?php echo base_url(); ?>repackreject/hapus_detail_reject_temp',
				data: {
					kode_produk: id
				},
				cache: false,
				success: function(respond) {

					loadReject();
					cekdetailrejecttemp();


				}
			});

		});



	});
</script>
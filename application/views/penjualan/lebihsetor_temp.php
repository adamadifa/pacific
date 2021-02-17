<?php
$no = 1;
foreach ($lebihsetortemp as $d) {
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $d->tanggal_disetorkan; ?></td>
    <td><?php echo $d->kode_bank; ?></td>
    <td><?php echo number_format($d->jumlah, '0', '', '.'); ?></td>
    <td>
      <a href="#" class="btn btn-danger btn-sm hapus" data-id="<?php echo $d->id; ?>"><i class="fa fa-trash-o"></i></a>
    </td>
  </tr>
<?php
  $no++;
}
?>

<script>
  $(function() {

    function loadlebihsetortemp() {
      var bulan = $("#bulan2").val();
      var cabang = $("#cabanginput").val();
      var tahun = $("#tahun2").val();

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjualan/getlebihsetortemp',
        data: {
          bulan: bulan,
          tahun: tahun,
          cabang: cabang
        },
        cache: false,
        success: function(respond) {
          $("#loadlebihsetortemp").html(respond);
        }
      });
    }
    $('.hapus').click(function(e) {
      e.preventDefault();
      var id = $(this).attr("data-id");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjualan/hapuslebihsetortemp',
        data: {
          id: id
        },
        cache: false,
        success: function(respond) {
          loadlebihsetortemp();
        }
      });
    })

  });
</script>

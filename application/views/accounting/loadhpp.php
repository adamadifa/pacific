<?php
foreach ($hpp as $h) {
?>
  <tr>
    <td><?php echo $h->kode_produk; ?></td>
    <td><?php echo $h->nama_barang; ?></td>
    <td><?php echo number_format($h->harga_hpp, "0", "", "."); ?></td>
    <td>
      <a href="#" class="btn btn-danger hapus" data-kodeproduk="<?php echo $h->kode_produk; ?>" data-bulan="<?php echo $h->bulan; ?>" data-tahun="<?php echo $h->tahun; ?>"><i class="fa fa-trash-o"></i></a>
    </td>
  </tr>
<?php } ?>

<script>
  $(function() {
    function loadhpp() {
      var bulan = $("#bulan").val();
      var tahun = $("#tahun").val();
      $.ajax({
        type: 'post',
        url: '<?php echo base_url(); ?>accounting/loadhpp',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          $("#loadhpp").html(respond);
        }
      });
    }

    $(".hapus").click(function(e) {
      e.preventDefault();
      var kodeproduk = $(this).attr("data-kodeproduk");
      var tahun = $(this).attr("data-tahun");
      var bulan = $(this).attr("data-bulan");
      $.ajax({
        type: 'post',
        url: '<?php echo base_url(); ?>accounting/hapushpp',
        data: {
          bulan: bulan,
          tahun: tahun,
          kodeproduk: kodeproduk
        },
        cache: false,
        success: function(respond) {
          loadhpp();
        }
      });
    });
  });
</script>
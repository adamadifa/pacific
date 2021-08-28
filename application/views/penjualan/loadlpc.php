<?php
foreach ($lpc as $d) {
?>
  <tr>
    <td><?php echo $d->kode_cabang; ?></td>
    <td><?php echo $bln[$d->bulan]; ?></td>
    <td><?php echo $d->tahun; ?></td>
    <td><?php echo $d->tgl_lpc; ?></td>
    <td>
      <a href="#" data-kodelpc="<?php echo $d->kode_lpc; ?>" class="btn btn-primary btn-sm editlpc">
        <i class="fa fa-pencil"></i>
      </a>
      <a href="#" data-kodelpc="<?php echo $d->kode_lpc; ?>" class="btn btn-danger btn-sm hapuslpc">
        <i class="fa fa-trash-o"></i>
      </a>
      <a href="" data-kodelpc="<?php echo $d->kode_lpc; ?>" class="btn btn-success btn-sm approvelpc"><i class="fa fa-check"></i></a>
    </td>
  </tr>
<?php
}
?>

<script>
  $(function() {
    function loadlpc() {
      var tahun = $("#tahun").val();
      var bulan = $("#bulan").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>/penjualan/loadlpc',
        data: {
          bulan: bulan,
          tahun: tahun
        },
        cache: false,
        success: function(respond) {
          $("#loadlpc").html(respond);
        }
      });
    }
    $(".editlpc").click(function(e) {
      e.preventDefault();
      var kode_lpc = $(this).attr("data-kodelpc");
      $("#modaleditlpc").modal("show");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>/penjualan/editlpc',
        data: {
          kode_lpc: kode_lpc
        },
        cache: false,
        success: function(respond) {
          $("#loadeditlpc").html(respond);
        }

      });

    });

    $(".hapuslpc").click(function(e) {
      e.preventDefault();
      var kode_lpc = $(this).attr("data-kodelpc");
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>/penjualan/hapuslpc',
        data: {
          kode_lpc: kode_lpc
        },
        cache: false,
        success: function(respond) {
          if (respond == 1) {
            swal("Berhasil", "Data Berhasil Di Hapus", "success");
          } else {
            swal("Oops", "Data Gagal Di Hapus", "danger");
          }
          loadlpc();
        }

      });

    });
  });
</script>
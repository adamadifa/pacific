<?php
foreach ($hpp as $h) {
?>
  <tr>
    <td><?php echo $h->kode_produk; ?></td>
    <td><?php echo $h->nama_barang; ?></td>
    <td>
      <div class="form-group">
        <input type="text" value="<?php echo round($h->harga_hpp) ?>" data-kodeproduk="<?php echo $h->kode_produk; ?>" class="form-control harga_hpp" style="text-align:right">
      </div>
    </td>
  </tr>
<?php } ?>

<script>
  $(function() {


    $(".harga_hpp").on("change", function(e) {
      var bulan = $("#bulan").val();
      var tahun = $("#tahun").val();
      var kodeproduk = $(this).attr("data-kodeproduk");
      var hargahpp = $(this).val();
      if (bulan == "" || tahun == "") {
        swal("Oops", "Periode Harus Diisi !", "warning");
        $(this).val(0);
      } else {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>accounting/inserthpp',
          data: {
            bulan: bulan,
            tahun: tahun,
            kodeproduk: kodeproduk,
            hargahpp: hargahpp
          },
          cache: false,
          success: function(respond) {
            loadhpp();
          }
        });
      }
    })

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
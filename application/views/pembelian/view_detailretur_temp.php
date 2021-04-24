<?php
$no = 1;
$grandtotal = 0;
foreach ($data->result() as $d) {
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $d->kode_barang; ?></td>
    <td><?php echo $d->nama_barang; ?></td>
    <td><?php echo $d->keterangan; ?></td>
    <td align="right"><?php echo number_format($d->bruto, 2); ?></td>
    <td><?php echo number_format($d->berat_roll, 2); ?></td>
    <td><?php echo number_format($d->berat_pcs, 2); ?></td>
    <td><?php echo number_format($d->tinggi, 2); ?></td>
    <td><?php echo number_format($d->panjang, 2); ?></td>
    <td align="left">
      <a href="#" data-kode="<?php echo $d->kode_barang; ?>" class="btn btn-danger btn-sm hapus">Hapus</a> 
    </td>
  </tr>
<?php $no++;
} ?>
<script type="text/javascript">
  $(function() {

    function loadgrandtotal() {

      var grandtot = $("#grandtot").val();
      $("#grandtotal").text(grandtot);
      $("#cekdata").val(grandtot);

    }

    loadgrandtotal();

    function tampiltemp() {

      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pembelian/view_detailretur_temp',
        data: '',
        cache: false,
        success: function(html) {

          $("#loadreturbarang").html(html);

          $('#barang').val("");
          $('#kodeakun').val("");
          $('#kodebarang').val("");
          $('#namaakun').val("");
          $('#bruto').val("");
          $('#berat_roll').val("");
          $('#berat_pcs').val("");
          $('#tinggi').val("");
          $('#panjang').val("");
          $('#keterangan').val("");
          $('#jenisbarang').val("");
          $('#kode_edit').val("");
          $('#barang').focus();

        }

      });
    }

    $(".hapus").click(function(e) {
      var kode_barang = $(this).attr("data-kode");
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pembelian/hapus_detailretur_temp',
        data: {
          kode_barang: kode_barang
        },
        cache: false,
        success: function(respond) {

          tampiltemp();

        }
      });
    });

    $(".edit").click(function(e) {
      e.preventDefault();
      var kodebarang = $(this).attr("data-kodebarang");
      var qty = $(this).attr("data-qty");
      var nama = $(this).attr("data-nama");
      var jenis = $(this).attr("data-jenis");
      var ket = $(this).attr("data-ket");
      $('#kodebarang').val(kodebarang);
      $('#qty').val(qty);
      $('#keterangan').val(ket);
      $('#jenisbarang').val(jenis);
      $('#barang').val(nama);
      $('#kode_edit').val(1);
    });

  });
</script>
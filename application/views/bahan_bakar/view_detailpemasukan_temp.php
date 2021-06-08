<?php
$no=1;
$grandtotal = 0;
foreach($data->result() as $d){
  $total        = $d->qty;
  $grandtotal   = $grandtotal + $total;
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $d->kode_barang; ?></td>
    <td><?php echo $d->nama_barang; ?></td>
    <td><?php echo $d->keterangan; ?></td>
    <td><?php echo number_format($d->qty); ?></td>
    <td align="center"><a href="#"  data-kodebarang="<?php echo $d->kode_barang; ?>" data-idadmin="<?php echo $d->id_admin; ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash-o"></i></a></td>
  </tr>
  <?php $no++;} ?>
  <tr>
    <td colspan="4"><b>TOTAL</b></td>
    <td align="left">
      <b><?php echo number_format($grandtotal,'0',',','.'); ?></b>
      <input type="hidden" id="grandtot" name="grandtot" value="<?php echo number_format($grandtotal,'2',',','.'); ?>">
    </td>
    <td></td>
  </tr>
  <script type="text/javascript">

    $(function(){

      function loadgrandtotal(){

        var grandtot = $("#grandtot").val();
        $("#grandtotal").text(grandtot);
        $("#cekdata").val(grandtot);

      }

      loadgrandtotal();

      function tampiltemp(){

        $.ajax({
          type    : 'POST',
          url     : '<?php echo base_url();?>bahan_bakar/view_detailpemasukan_temp',
          data    : '',
          cache   : false,
          success : function(html){

            $("#loadpemasukanbarang").html(html);

            $('#barang').val("");
            $('#kodeakun').val("");
            $('#kodebarang').val("");
            $('#namaakun').val("");
            $('#jumlah').val("");
            $('#keterangan').val("");
            $('#jenisbarang').val("");

          }

        });
      }

      $(".hapus").click(function(e){
        var kodebarang  = $(this).attr("data-kodebarang");
        var id_admin  	= $(this).attr("data-idadmin");
        e.preventDefault();
        $.ajax({
          type		: 'POST',
          url 		: '<?php echo base_url(); ?>bahan_bakar/hapus_detailpemasukan_temp',
          data 		: {
            kodebarang  : kodebarang,
            idadmin     : id_admin
          },
          cache		: false,
          success 	: function(respond){

            tampiltemp();

          }
        });
      });

    });
  </script>

<?php
$no=1;
foreach($data->result() as $d){
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $d->kode_barang; ?></td>
    <td><?php echo $d->nama_barang; ?></td>
    <td><?php echo $d->keterangan; ?></td>
    <td><?php echo number_format($d->qty); ?></td>
    <td align="left"><a href="#"  data-kodebarang="<?php echo $d->kode_barang; ?>" data-ket="<?php echo $d->keterangan; ?>" data-idadmin="<?php echo $d->id_admin; ?>" class="btn btn-danger btn-sm hapus">Hapus</a></td>
  </tr>
  <?php $no++;} ?>
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
          url     : '<?php echo base_url();?>bahan_bakar/view_detailpengeluaran_temp',
          data    : '',
          cache   : false,
          success : function(html){

            $("#loadpengeluaranbarang").html(html);

            $('#barang').val("");
            $('#kodebarang').val("");
            $('#jumlah').val("");
            $('#keterangan').val("");
            $('#jenisbarang').val("");

          }

        });
      }

      $(".hapus").click(function(e){
        var kodebarang  = $(this).attr("data-kodebarang");
        var ket         = $(this).attr("data-ket");
        var id_admin  	= $(this).attr("data-idadmin");
        e.preventDefault();
        $.ajax({
          type		: 'POST',
          url 		: '<?php echo base_url(); ?>bahan_bakar/hapus_detailpengeluaran_temp',
          data 		: {
            kodebarang  : kodebarang,
            ket         : ket,
            idadmin     : id_admin
          },
          cache		: false,
          success 	: function(respond){

            tampiltemp();

          }
        });
      });
      
      $(".edit").click(function(e){
        e.preventDefault();
        var kodebarang  = $(this).attr("data-kodebarang");
        var unit        = $(this).attr("data-unit");
        var berat       = $(this).attr("data-berat");
        var lebih       = $(this).attr("data-lebih");
        var nama        = $(this).attr("data-nama");
        var jenis       = $(this).attr("data-jenis");
        var ket         = $(this).attr("data-ket");
        $('#kodebarang').val(kodebarang);
        $('#qty_unit').val(unit);
        $('#qty_berat').val(berat);
        $('#qty_lebih').val(lebih);
        $('#keterangan').val(ket);
        $('#jenisbarang').val(jenis);
        $('#barang').val(nama);
        $('#kode_edit').val(1);
      });


    });
  </script>

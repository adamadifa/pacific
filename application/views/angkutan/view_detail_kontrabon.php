<?php 
foreach ($detail as $key => $d) { ?>

  <tr>
    <td><?php echo $d->no_surat_jalan;?></td>
    <td><?php echo $d->tgl_mutasi_gudang;?></td>
    <td align="right"><?php echo number_format($d->tarif);?></td>
    <td align="right"><?php echo number_format($d->bs);?></td>
    <td align="right"><?php echo number_format($d->tepung);?></td>
    <td align="right"><?php echo number_format($d->tarif+$d->bs+$d->tepung);?></td>
    <td align="right">
      <a href="#" data-kode="<?php echo $d->no_surat_jalan;?>" class="btn btn-sm btn-danger hapus">Hapus</a>
    </td>
  </tr>

<?php } ?>

  <script type="text/javascript">

    $(function(){

      function tampiltemp() {
       var no_kontrabon = $('#no_kontrabon').val();
       $.ajax({
         type: 'POST',
         url: '<?php echo base_url(); ?>angkutan/getDetailAngkutan',
         data: {
           no_kontrabon : no_kontrabon
         },
         cache: false,
         success: function(html) {
 
           $("#loaddetailangkutan").html(html);
 
           $('#no_sj').val("");
           $('#tgl_surat_jalan').val("");
           $('#tarif').val("");
           $('#bs').val("");
           $('#tepung').val("");
 
         }
 
       });
     }
 
 

      $(".hapus").click(function(e){
        var no_surat_jalan  = $(this).attr("data-kode");
        e.preventDefault();
        $.ajax({
          type    : 'POST',
          url     : '<?php echo base_url(); ?>angkutan/hapus_detailkontrabon',
          data    : {
            no_surat_jalan  : no_surat_jalan,
          },
          cache   : false,
          success   : function(respond){

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

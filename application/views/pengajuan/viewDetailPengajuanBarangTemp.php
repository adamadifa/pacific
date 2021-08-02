<?php
$no=1;
foreach($data->result() as $d){
  ?>
  <tr>
    <td><?php echo $d->approval; ?></td>
    <td align="center"><a href="#"  data-id="<?php echo $d->id; ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash-o"></i></a></td>
  </tr>
  <?php $no++;} ?>
  <script type="text/javascript">

    $(function(){
      function tampiltemp() {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>pengajuan/viewDetailPengajuanBarangTemp',
          data: '',
          cache: false,
          success: function(html) {

            $("#loadpengajuan").html(html);
            $('#barang').focus();

          }
        });
      }

      $(".hapus").click(function(e){
        var id  = $(this).attr("data-id");
        e.preventDefault();
        $.ajax({
          type		: 'POST',
          url 		: '<?php echo base_url(); ?>pengajuan/hapusDetailPengajuanBarangTemp',
          data 		: {
            id  : id
          },
          cache		: false,
          success 	: function(respond){

            tampiltemp();

          }
        });
      });

    });
  </script>

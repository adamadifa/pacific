<table class="table table-stripeed">
    <tr>
        <td>Kode Target</td>
        <td></td>
        <td><?php echo $targetproduk['kode_target']; ?></td>
    </tr>
    <tr>
        <td>Salesman</td>
        <td></td>
        <td><?php echo $targetproduk['id_karyawan'] . " - " . $targetproduk['nama_karyawan']; ?></td>
    </tr>
    <tr>
        <td>Kode Produk</td>
        <td></td>
        <td><?php echo $targetproduk['kode_produk']; ?></td>
    </tr>
</table>
<div class="form-group mb-3">
    <div class="input-icon">
        <span class="input-icon-addon">
            <i class="fa fa-file"></i>
        </span>
        <input type="text" style="text-align:right" id="jmltarget" name="jmltarget" class="form-control" placeholder="Jumlah Target" value="<?php echo $targetproduk['jumlah_target']; ?>">
    </div>
</div>
<div class="form-group">
    <button id="updatetarget" class="btn btn-primary btn-block">Update Target</button>
</div>

<script>
    $(function() {
        function loaddetailtarget() {
            var kodetarget = "<?php echo $kodetarget; ?>";
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>komisi/detailtarget',
                data: {
                    kodetarget: kodetarget
                },
                cache: false,
                success: function(respond) {
                    $("#loaddetailtarget").html(respond);
                }
            });
        }
        $("#updatetarget").click(function(e) {
            e.preventDefault();
            var kodetarget = "<?php echo $kodetarget; ?>";
            var kodeproduk = "<?php echo $kodeproduk; ?>";
            var id_karyawan = "<?php echo $id_karyawan; ?>";
            var jmltarget = $("#jmltarget").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>komisi/updatetarget',
                data: {
                    kodetarget: kodetarget,
                    kodeproduk: kodeproduk,
                    id_karyawan: id_karyawan,
                    jmltarget: jmltarget
                },
                cache: false,
                success: function(respond) {
                    console.log(respond);
                    if (respond == 1) {
                        swal("Success", "Berhasil Di Update", "success");
                    } else {
                        swal("Oops", "Gagal Di Update", "warning");
                    }
                    loaddetailtarget();
                    $("#modalkoreksitarget").modal("hide");
                }
            });
        });
    });
</script>
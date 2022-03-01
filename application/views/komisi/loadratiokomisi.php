<?php
foreach ($ratiokomisi as $d) {
?>
    <tr>
        <td><?php echo $d->id_driver_helper; ?></td>
        <td><?php echo $d->nama_driver_helper; ?></td>
        <td><?php echo $d->kategori; ?></td>
        <td>
            <?php
            if (empty($d->ratioaktif)) {
                if (empty($d->ratioterakhir)) {
                    $ratio = $d->ratio_default;
                } else {
                    $ratio = $d->ratioterakhir;
                }
            } else {
                $ratio = $d->ratioaktif;
            }
            ?>
            <input type="text" data-id="<?php echo $d->id_driver_helper ?>" class="form-control ratio" style="text-align: right;" value="<?php echo $ratio; ?>">
        </td>
    </tr>
<?php } ?>

<script>
    $(function() {
        function disabledratio() {
            var tgl_berlaku = $("#tgl_berlaku").val();
            if (tgl_berlaku == "") {
                $(".ratio").prop("disabled", true);
            } else {
                $(".ratio").prop("disabled", false);
            }
        }

        disabledratio();
        $("#tgl_berlaku").change(function() {
            disabledratio();
        });

        $(".ratio").keyup(function() {
            var tgl_berlaku = $("#tgl_berlaku").val();
            var ratio = $(this).val();
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            var id = $(this).attr("data-id");
            //alert(id);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>komisi/insert_setratio_komisi',
                data: {
                    id: id,
                    tgl_berlaku: tgl_berlaku,
                    ratio: ratio,
                    bulan: bulan,
                    tahun: tahun
                },
                cache: false,
                success: function(respond) {

                }
            });
        });
    });
</script>
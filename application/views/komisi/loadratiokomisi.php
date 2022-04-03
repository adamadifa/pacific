<?php
foreach ($ratiokomisi as $d) {
?>
    <tr>
        <td><?php echo $d->id_driver_helper; ?></td>
        <td><?php echo $d->nama_driver_helper; ?></td>
        <td><?php echo $d->kategori; ?></td>
        <td>
            <?php
            if (empty($d->ratioaktif) || $d->ratioaktif == 0.00) {
                if (empty($d->ratioterakhir) || $d->ratioterakhir == 0.00) {
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
        <td>
            <?php
            if (empty($d->ratiohelperaktif) || $d->ratiohelperaktif == 0.00) {
                if (empty($d->ratiohelperterakhir) || $d->ratiohelperterakhir == 0.00) {
                    $ratiohelper = $d->ratiohelper_default;
                } else {
                    $ratiohelper = $d->ratiohelper_default;
                }
            } else {
                $ratiohelper = $d->ratiohelperaktif;
            }
            ?>
            <input type="text" data-id="<?php echo $d->id_driver_helper ?>" class="form-control ratiohelper" style="text-align: right;" value="<?php echo $ratiohelper; ?>">
        </td>
    </tr>
<?php } ?>

<script>
    $(function() {
        function disabledratio() {
            var tgl_berlaku = $("#tgl_berlaku").val();
            if (tgl_berlaku == "") {
                $(".ratio").prop("disabled", true);
                $(".ratiohelper").prop("disabled", true);
            } else {
                $(".ratio").prop("disabled", false);
                $(".ratiohelper").prop("disabled", false);
            }
        }

        disabledratio();
        $("#tgl_berlaku").change(function() {
            disabledratio();
        });

        $(".ratio").keyup(function() {
            var tgl_berlaku = $("#tgl_berlaku").val();
            var ratio = $(this).val();
            var ratiohelper = 'false';
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
                    ratiohelper: ratiohelper,
                    bulan: bulan,
                    tahun: tahun
                },
                cache: false,
                success: function(respond) {

                }
            });
        });

        $(".ratiohelper").keyup(function() {
            var tgl_berlaku = $("#tgl_berlaku").val();
            var ratiohelper = $(this).val();
            var ratio = 'false';
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
                    ratiohelper: ratiohelper,
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
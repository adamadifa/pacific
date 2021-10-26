<?php
foreach ($hargaawal as $h) {
?>
    <tr>
        <td><?php echo $h->kode_produk; ?></td>
        <td><?php echo $h->nama_barang; ?></td>
        <td>
            <div class="form-group">
                <input type="text" value="<?php echo round($h->harga_awal) ?>" data-kodeproduk="<?php echo $h->kode_produk; ?>" class="form-control harga_awal" style="text-align:right">
            </div>
        </td>

    </tr>
<?php } ?>

<script>
    $(function() {


        $(".harga_awal").on("change", function(e) {
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            var lokasi = $("#lokasi").val();
            var kodeproduk = $(this).attr("data-kodeproduk");
            var hargaawal = $(this).val();
            if (bulan == "" || tahun == "" || lokasi == "") {
                swal("Oops", "Periode & Lokasi Harus Diisi !", "warning");
                $(this).val(0);
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>accounting/inserthargaawal',
                    data: {
                        bulan: bulan,
                        tahun: tahun,
                        kodeproduk: kodeproduk,
                        hargaawal: hargaawal,
                        lokasi: lokasi
                    },
                    cache: false,
                    success: function(respond) {
                        loadhpp();
                    }
                });
            }
        })

        function loadhargaawal() {
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            var lokasi = $("#lokasi").val();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>accounting/loadhargaawal',
                data: {
                    bulan: bulan,
                    tahun: tahun,
                    lokasi: lokasi
                },
                cache: false,
                success: function(respond) {
                    $("#loadhargaawal").html(respond);
                }
            });
        }
        // $(".hapus").click(function(e) {
        //     e.preventDefault();
        //     var kodeproduk = $(this).attr("data-kodeproduk");
        //     var tahun = $(this).attr("data-tahun");
        //     var bulan = $(this).attr("data-bulan");
        //     $.ajax({
        //         type: 'post',
        //         url: '<?php echo base_url(); ?>accounting/hapushpp',
        //         data: {
        //             bulan: bulan,
        //             tahun: tahun,
        //             kodeproduk: kodeproduk
        //         },
        //         cache: false,
        //         success: function(respond) {
        //             loadhpp();
        //         }
        //     });
        // });
    });
</script>
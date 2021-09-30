<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    INPUT Saldo Awal Harga
                </h2>
            </div>
        </div>
    </div>
    <!-- Content here -->
    <div class="row">
        <div class="col-md-10 col-xs-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">INPUT Saldo Awal Harga</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="#" autocomplete="off">
                                <div class="form-group mb-3">
                                    <select class="form-select" id="bulan" name="bulan">
                                        <option value="">Bulan</option>
                                        <?php for ($a = 1; $a <= 12; $a++) { ?>
                                            <option value="<?php echo $a;  ?>"><?php echo $bulan[$a]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-select" id="tahun" name="tahun">
                                        <option value="">Tahun</option>
                                        <?php for ($t = 2019; $t <= $tahun; $t++) { ?>
                                            <option value="<?php echo $t;  ?>"><?php echo $t; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-select" id="lokasi" name="lokasi">
                                        <option value="">Pilih Lokasi</option>
                                        <option value="PRD">Produksi</option>
                                        <option value="GDG">Gudang</option>
                                        <?php foreach ($cabang as $d) { ?>
                                            <option value="<?php echo $d->kode_cabang;  ?>"><?php echo $d->nama_cabang; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </form>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped table-hover" style="width:100%" id="mytable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Kode Produk</th>
                                            <th>Nama Barang</th>
                                            <th>Saldo Awal Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody id="loadhargaawal">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <?php $this->load->view('menu/menu_accounting_administrator'); ?>
        </div>
    </div>
</div>

<script>
    $(function() {
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

        loadhargaawal();
        $("#bulan").change(function(e) {
            e.preventDefault();
            loadhargaawal();
        });

        $("#tahun").change(function(e) {
            e.preventDefault();
            loadhargaawal();
        });

        $("#lokasi").change(function(e) {
            e.preventDefault();
            loadhargaawal();
        });




    });
</script>
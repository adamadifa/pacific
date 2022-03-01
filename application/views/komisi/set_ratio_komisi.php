<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                </h2>
            </div>
        </div>
    </div>
    <!-- Content here -->
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Ratio Komisi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </span>
                                    <input type="text" value="" id="tgl_berlaku" name="tgl_berlaku" class="datepicker form-control date" placeholder="Tanggal Berlaku" data-error=".errorTxt19" />
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select" id="cabang" name="cabang">
                                    <option value="">Pilih Cabang</option>
                                    <?php foreach ($cabang as $c) { ?>
                                        <option value="<?php echo $c->kode_cabang; ?>"><?php echo strtoupper($c->nama_cabang); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select" id="bulan" name="bulan" data-error=".errorTxt9">

                                    <option value="">-- Pilih Bulan -- </option>
                                    <?php
                                    $bulansekarang = date('m');
                                    $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Novemer", "Desember");

                                    for ($i = 1; $i <= 12; $i++) {
                                    ?>
                                        <option <?php if ($i == $bulansekarang) {
                                                    echo "selected";
                                                } ?> value="<?php echo $i; ?>"><?php echo $bulan[$i]; ?></option>
                                    <?php
                                    }


                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select" id="tahun" name="tahun" data-error=".errorTxt9">

                                    <option value="">-- Pilih Tahun -- </option>
                                    <?php
                                    if (date("m") == 12) {
                                        $tahunsekarang     = date("Y") + 1;
                                    } else {
                                        $tahunsekarang     = date("Y");
                                    }
                                    $tahunmulai        = 2018;

                                    for ($tahun = $tahunmulai; $tahun <= $tahunsekarang; $tahun++) {
                                    ?>
                                        <option <?php if ($tahun == $tahunsekarang) {
                                                    echo "selected";
                                                } ?> value="<?php echo $tahun; ?>"><?php echo $tahun ?></option>
                                    <?php
                                    }


                                    ?>
                                </select>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Ratio</th>
                                            </tr>
                                        </thead>
                                        <tbody id="loadratiokomisi">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <?php $this->load->view('menu/menu_marketing_administrator'); ?>
        </div>
    </div>
</div>
<script>
    flatpickr(document.getElementById('tgl_berlaku'), {});
</script>
<script>
    $(function() {
        function loadperson() {
            var cabang = $("#cabang").val();
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>komisi/loadratiokomisi',
                data: {
                    cabang: cabang,
                    bulan: bulan,
                    tahun: tahun
                },
                cache: false,
                success: function(respond) {
                    $("#loadratiokomisi").html(respond);
                }
            });
        }

        $("#cabang").change(function() {
            loadperson();
        });

        $("#bulan").change(function() {
            loadperson();
        });

        $("#tahun").change(function() {
            loadperson();
        });


    });
</script>
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
                            <h4 class="card-title">Data Approval Target</h4>
                        </div>
                        <div class="card-body">

                            <form action="<?php echo base_url(); ?>komisi/approvetargetkomisi" method="POST">
                                <!-- <div class="form-group mb-3">
                                    <select name="bulan" id="bulan" class="form-select">
                                        <option value="">Bulan</option>
                                        <?php

                                        for ($i = 1; $i < count($bln); $i++) {
                                        ?>
                                            <option <?php if ($bl == $i) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $i; ?>"><?php echo $bln[$i]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div> -->
                                <div class="form-group mb-3">

                                    <select name="tahun" class="form-select" id="tahun" name="tahun">
                                        <option value="">Tahun</option>
                                        <?php
                                        $tahunmulai = 2020;
                                        for ($thn = $tahunmulai; $thn <= date('Y'); $thn++) {
                                        ?>
                                            <option <?php if ($tahun == $thn) {
                                                        echo "selected";
                                                    } ?> value="<?php echo $thn; ?>"><?php echo $thn; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button class="btn btn-primary" name="submit" type="submit">Search</button>
                                <br>
                                <br>
                            </form>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                            <tr>

                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>KP</th>
                                                <th>MM</th>
                                                <th>EM</th>
                                                <th>Direktur</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($komisicabang as $k) { ?>
                                                <tr>

                                                    <td><?php echo $bln[$k->bulan]; ?></td>
                                                    <td><?php echo $k->tahun; ?></td>
                                                    <td>
                                                        <?php if ($k->kp == 1) { ?>
                                                            <span class="badge bg-green"><i class="fa fa-check"></i></span>
                                                        <?php } else if ($k->kp == 2) { ?>
                                                            <span class="badge bg-red"><i class="fa fa-check"></i></span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-yellow"><i class="fa fa-history"></i></span>
                                                        <?php } ?>

                                                    </td>
                                                    <td>
                                                        <?php if ($k->mm == 1) { ?>
                                                            <span class="badge bg-green"><i class="fa fa-check"></i></span>
                                                        <?php } else if ($k->mm == 2) { ?>
                                                            <span class="badge bg-red"><i class="fa fa-check"></i></span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-yellow"><i class="fa fa-history"></i></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($k->em == 1) { ?>
                                                            <span class="badge bg-green"><i class="fa fa-check"></i></span>
                                                        <?php } else if ($k->em == 2) { ?>
                                                            <span class="badge bg-red"><i class="fa fa-check"></i></span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-yellow"><i class="fa fa-history"></i></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($k->direktur == 1) { ?>
                                                            <span class="badge bg-green"><i class="fa fa-check"></i></span>
                                                        <?php } else if ($k->direktur == 2) { ?>
                                                            <span class="badge bg-red"><i class="fa fa-check"></i></span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-yellow"><i class="fa fa-history"></i></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php

                                                        $leveluser = $this->session->userdata('level_user');
                                                        if ($leveluser == "kepala cabang" && empty($k->mm)) {
                                                            if (empty($k->kp)) {
                                                                echo '<a href="' . base_url() . 'komisi/approvetargetpusat/' . $k->kode_target . '" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                                                            } else {
                                                                echo '<a href="' . base_url() . 'komisi/canceltargetpusat/' . $k->kode_target . '" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>';
                                                            }
                                                        } else if ($leveluser == "manager marketing" && empty($k->em) && !empty($k->kp)) {
                                                            if (empty($k->mm)) {
                                                                echo '<a href="' . base_url() . 'komisi/approvetargetpusat/' . $k->kode_target . '" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                                                            } else {
                                                                echo '<a href="' . base_url() . 'komisi/canceltargetpusat/' . $k->kode_target . '" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>';
                                                            }
                                                        } else if ($leveluser == "general manager" && empty($k->direktur) && !empty($k->mm)) {
                                                            if (empty($k->em)) {
                                                                echo '<a href="' . base_url() . 'komisi/approvetargetpusat/' . $k->kode_target . '" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                                                            } else {
                                                                echo '<a href="' . base_url() . 'komisi/canceltargetpusat/' . $k->kode_target . '" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>';
                                                            }
                                                        } else if ($leveluser == "Administrator" && !empty($k->em)) {
                                                            if (empty($k->direktur)) {
                                                                echo '<a href="' . base_url() . 'komisi/approvetargetpusat/' . $k->kode_target . '" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>';
                                                            } else {
                                                                echo '<a href="' . base_url() . 'komisi/canceltargetpusat/' . $k->kode_target . '" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>';
                                                            }
                                                        }
                                                        ?>
                                                        <a href="#" data-kodetarget="<?php echo $k->kode_target; ?>" class="btn btn-primary btn-sm detail"><i class="fa fa-list"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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
<div class="modal modal-blur fade" id="modalsettarget" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="max-width:1300px !important" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Input Target Quantity</h5>
            </div>
            <div class="modal-body">
                <div id="loadformsettarget"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalsettargetcashin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Input Target Cash IN</h5>
            </div>
            <div class="modal-body">
                <div id="loadformsettargetcashin"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalsettargetcollection" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Input Target Collection</h5>
            </div>
            <div class="modal-body">
                <div id="loadformsettargetcollection"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modaldetailtarget" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Detail Target</h5>
            </div>
            <div class="modal-body">
                <div id="loaddetailtarget"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".detail").click(function(e) {
            var kodetarget = $(this).attr("data-kodetarget");
            var cabang = $(this).attr("data-cabang");
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>komisi/detailtarget',
                data: {
                    kodetarget: kodetarget,
                    cabang: cabang
                },
                cache: false,
                success: function(respond) {
                    $("#modaldetailtarget").modal("show");
                    $("#loaddetailtarget").html(respond);
                }
            });
        });



    });
</script>
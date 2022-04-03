<div class="container-fluid">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    E Manual Regulation Center
                </h2>
            </div>
        </div>
    </div>
    <!-- Content here -->
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">E Manual Regulation Center</h4>
                </div>
                <div class="card-body">
                    <?php if (in_array($level, $roleadd) || in_array($id_user, $roleuser)) { ?>
                        <div class="mb-3 d-flex justify-content-start">
                            <a href="<?php echo base_url(); ?>memo/inputmemo" class="btn btn-primary">TAMBAH DATA</a>
                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table style="zoom:90%" class="table table-bordered table-striped table-hover" id="mytable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No.Dokumen</th>
                                    <th>Judul</th>
                                    <th>Dep</th>
                                    <th>Kategori</th>
                                    <th>Uploaded By</th>
                                    <th>File</th>
                                    <th>Download</th>
                                    <th>Read</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($result as $d) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d->tanggal; ?></td>
                                        <td><?php echo $d->no_memo; ?></td>
                                        <td><?php echo $d->judul_memo; ?></td>
                                        <td><?php echo $d->kode_dept; ?></td>
                                        <td><?php echo $d->kategori; ?></td>
                                        <td><?php echo $d->nama_lengkap; ?></td>
                                        <td>
                                            <a href="<?php echo $d->link; ?>" target="_blank" data-id="<?php echo $d->id; ?>" class="downloadcount"><i class="fa fa-download mr-2"></i> Download Memo</a>
                                        </td>
                                        <td>
                                            <a href="#" data-id="<?php echo $d->id ?>" class="detaildownload"><?php echo $d->totaldownload ?></a>
                                        </td>
                                        <td>
                                            <?php
                                            if (empty($d->status_read)) {
                                                echo "<span class='badge bg-red'>Belum Dibaca</span>";
                                            } else {
                                                echo "<span class='badge bg-green'>Sudah Dibaca</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($d->id_user == $this->session->userdata('id_user')) { ?>
                                                <a href="<?php echo base_url(); ?>memo/edit/<?php echo $d->id; ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url(); ?>memo/hapus/<?php echo $d->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                            <?php } ?>
                                            <?php if (in_array($level, $roleadd)) { ?>
                                                <a href="#" data-id="<?php echo $d->id; ?>" class="btn btn-primary btn-sm useraccess"><i class="fa fa-users mr-2"></i>User Access</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="mdluser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Data User</h5>
            </div>
            <div class="modal-body">
                <div id="loaduser"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="mdldetaildownload" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Data Download</h5>
            </div>
            <div class="modal-body">
                <div id="loaddetaildownload"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#mytable").DataTable();
        $('#mytable').on('click', '.useraccess', function() {
            var id = $(this).attr("data-id");
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>memo/getuser',
                data: {
                    id: id
                },
                cache: false,
                success: function(respond) {
                    $("#loaduser").html(respond);
                }
            });
            $('#mdluser').modal({
                backdrop: 'static',
                keyboard: false
            });
        });

        $('#mytable').on('click', '.downloadcount', function() {
            var id = $(this).attr("data-id");
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>memo/downloadcount',
                data: {
                    id: id
                },
                cache: false,
                success: function(respond) {
                    console.log(respond);
                }
            });
        });


        $('#mytable').on('click', '.detaildownload', function() {
            var id = $(this).attr("data-id");
            $('#mdldetaildownload').modal({
                backdrop: 'static',
                keyboard: false
            });
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>memo/listdownload',
                data: {
                    id: id
                },
                cache: false,
                success: function(respond) {
                    console.log(respond);
                    $("#loaddetaildownload").html(respond);
                }
            });
        });

    });
</script>
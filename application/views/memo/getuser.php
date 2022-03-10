<table class="table table-bordered table-striped" id="usertable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Level</th>
            <th>Cabang</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($user as $d) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $d->nama_lengkap ?></td>
                <td><?php echo strtoupper($d->level) ?></td>
                <td><?php echo strtoupper($d->cabang) ?></td>
                <td align="center">
                    <?php
                    if (empty($d->cekuser)) {
                    ?>
                        <a href="#" class="btn btn-primary btn-sm access" data-id="<?php echo $id; ?>" iduser="<?php echo $d->id_user; ?>"><i class="fa fa-check"></i></a>
                    <?php
                    } else {
                    ?>
                        <span class="badge bg-success">Access</span> <a href="#" class="btn btn-sm btn-danger access" data-id="<?php echo $id; ?>" iduser="<?php echo $d->id_user; ?>"><i class="fa fa-close"></i></a>
                    <?php } ?>
                </td>
            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>
<script>
    $(function() {
        $("#usertable").DataTable();

        function loaduser(id) {
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
        }
        $('#usertable tbody').on('click', 'a', function() {
            var id = $(this).attr("data-id");
            var iduser = $(this).attr("iduser");
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>memo/updateaccess',
                data: {
                    id: id,
                    iduser: iduser
                },
                cache: false,
                success: function(respond) {
                    loaduser(id);
                    console.log(respond);
                }
            });
        });
    });
</script>
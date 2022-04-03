<table class="table table-bordered" id="datadownload">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($download as $d) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $d->nama_lengkap; ?></td>
            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>

<script>
    $(function() {
        $("#datadownload").DataTable();
    });
</script>
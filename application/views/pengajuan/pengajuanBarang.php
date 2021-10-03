<br>
<br>
<div class="table-responsive">
  <table style="zoom:100%" class="table table-bordered table-striped table-hover" id="mytable">
    <thead class="thead-dark">
      <tr>
        <th style="width: 1%;">No</th>
        <th style="width: 10%;">No Bukti</th>
        <th>Nama Pemohon</th>
        <th style="width: 10%;">Tanggal</th>
        <th style="width: 10%;">Cabang</th>
        <th style="width: 10%;">Pengajuan</th>
        <th style="width: 10%;">Gambar Scan</th>
        <th style="width: 5%;">GA</th>
        <th style="width: 5%;">MA</th>
        <th style="width: 5%;">EM</th>
        <th style="width: 5%;">DIRUT</th>
        <th style="width: 10%;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sno  = 1;
      foreach ($data->result_array() as $d) {
        $nobukti       = $d['nobukti'];
        $id_user       = $this->session->userdata('id_user');
        ?>
        <tr>
          <td><?php echo $sno; ?></td>
          <td><?php echo $d['nobukti']; ?></td>
          <td><?php echo $d['nama_lengkap']; ?></td>
          <td><?php echo dateToIndo2($d['tanggal']) ?></td>
          <td><?php echo $d['kode_cabang']; ?></td>
          <td><?php echo $d['keterangan']; ?></td>
          <td><a target="_blank" href="<?php echo $d['foto']; ?>">Lihat Gambar Scan</a></td>

          <?php if($d['ga'] == 1){ ?>
            <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
          <?php }else if($d['ga'] == 2){ ?>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
          <?php }else if($d['ga'] != ''){ ?>
            <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
          <?php }else{ ?>
            <td></td>
          <?php } ?>

          <?php if($d['ma'] == 1){ ?>
            <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
          <?php }else if($d['ma'] == 2){ ?>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
          <?php }else if($d['ma'] != ''){ ?>
            <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
          <?php }else{ ?>
            <td></td>
          <?php } ?>

          <?php if($d['em'] == 1){ ?>
            <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
          <?php }else if($d['em'] == 2){ ?>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
          <?php }else if($d['em'] != ''){ ?>
            <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
          <?php }else{ ?>
            <td></td>
          <?php } ?>

          <?php if($d['dirut'] == 1){ ?>
            <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
          <?php }else if($d['dirut'] == 2){ ?>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
          <?php }else if($d['dirut'] != ''){ ?>
            <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
          <?php }else{ ?>
            <td></td>
          <?php } ?>

          <td>
            <?php if($id_user == '244'){ ?>
              <?php if($d['ga'] == 1 && $d['ma'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['ga'] == 2 && $d['ma'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['ga'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php } ?>
            <?php }else if($id_user == '6'){ ?>
              <?php if($d['ma'] == 1 && $d['em'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['ma'] == 2 && $d['em'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['ga'] == 1 && $d['ma'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php } ?>
            <?php }else if($id_user == '10'){ ?>
              <?php if($d['em'] == 1 && $d['dirut'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['em'] == 2 && $d['dirut'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['ma'] == 1 && $d['em'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php } ?>    
            <?php }else if($id_user == '11'){ ?>
              <?php if($d['dirut'] == 1){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['dirut'] == 2){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php }else if($d['em'] == 1 && $d['dirut'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
                <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
              <?php } ?>   
            <?php }else{ ?>
              <?php if($d['ga'] == 0){ ?>
                <a href="#" data-href="<?php echo base_url();?>pengajuan/hapusPengajuanBarang/<?php echo $nobukti;?>" class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></a>
                <a href="<?php echo base_url();?>pengajuan/editPengajuanBarang/<?php echo $nobukti;?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
              <?php } ?>
              <a href="<?php echo base_url();?>pengajuan/view_komentar/<?php echo $nobukti; ?>" class="btn-sm btn btn-primary"><i class="fa fa-comment"></i></a>
            <?php } ?>
          </td>
        </tr>
      <?php
        $sno++;
      }
      ?>
    </tbody>
  </table>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('dari'), {});
    flatpickr(document.getElementById('sampai'), {});
  });
</script>
<script>
  $(document).ready(function() {
    $('#mytable').DataTable({
            responsive: true
    });

    $('.approve').click(function(e) {
      e.preventDefault();
      var nobukti = $(this).attr('data-kode');
      var status = $(this).attr('data-status');
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>pengajuan/approvalpengajuan/' + nobukti + '/' + status,
        data: {
          status: status,
          nobukti: nobukti
        },
        cache: false,
        success: function(respond) {
         
          var jenis_pengajuan = 'Barang';
          $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>pengajuan/jenisPengajuan',
            data: {
              jenis_pengajuan: jenis_pengajuan
            },
            cache: false,
            success: function(respond) {
              $("#loadpengajuan").html(respond);
            }
          });
        }
      });
    });

    
    $(".hapus").click(function(e) {
      e.preventDefault();
      var getLink = $(this).attr('data-href');
      swal({
        title: 'Alert',
        text: 'Hapus Data ?',
        html: true,
        confirmButtonColor: '#d43737',
        showCancelButton: true,
      }, function() {
        window.location.href = getLink
      });
    });



  });
</script>
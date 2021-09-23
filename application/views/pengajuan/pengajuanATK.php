<br>
<br>
<div class="table-responsive">
  <table style="zoom:100%" class="table table-bordered table-striped table-hover" id="mytable">
    <thead class="thead-dark">
      <tr>
        <th style="width: 1%;">No</th>
        <th style="width: 7%;">No Bukti</th>
        <th>Nama Pemohon</th>
        <th style="width: 10%;">Tanggal</th>
        <th style="width: 10%;">Cabang</th>
        <th style="width: 10%;">Pengajuan</th>
        <th style="width: 10%;">Gambar Scan</th>
        <th style="width: 10%;">M. Accounting</th>
        <th style="width: 10%;">M. Gudang</th>
        <th style="width: 7%;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sno  = 1;
      foreach ($data->result_array() as $d) {
        $nobukti       = str_replace("/",".",$d['nobukti']);
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

          <?php if($d['ma'] == 1){ ?>
            <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
          <?php }else if($d['ma'] == 2){ ?>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
          <?php }else if($d['ma'] != ''){ ?>
            <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
          <?php }else{ ?>
            <td></td>
          <?php } ?>

          <?php if($d['mg'] == 1){ ?>
            <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a></td>
          <?php }else if($d['mg'] == 2){ ?>
            <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
          <?php }else if($d['mg'] != ''){ ?>
            <td><a href="#" class="btn btn-sm btn-warning"><i class="fa fa-history"></i></a></td>
          <?php }else{ ?>
            <td></td>
          <?php } ?>

          <td>
            <?php if($id_user == '6'){ ?>
              <?php if($d['ma'] == 1 && $d['mg'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
              <?php }else if($d['ma'] == 2 && $d['mg'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
              <?php }else if($d['ma'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
              <?php } ?>
            <?php }else if($id_user == '73'){ ?>
              <?php if($d['mg'] == 1){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
              <?php }else if($d['mg'] == 2){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
              <?php }else if($d['ma'] == 1 && $d['mg'] == 0){ ?>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="1" class="btn btn-sm btn-primary approve"><i class="fa fa-check"></i></a>
                <a href="#" data-kode="<?php echo $nobukti;?>" data-status="2" class="btn btn-sm btn-danger approve"><i class="fa fa-times"></i></a>
              <?php } ?>  
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
         
          var jenis_pengajuan = 'ATK';
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

  });
</script>
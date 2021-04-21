<?php foreach ($data as $key => $d) { 
  if($d->id_user == $this->session->userdata('id_user')){
    $color = "sent_msg";
  }else{
    $color = "received_msg";
  }
  ?>
<div class="incoming_msg">
  <div class="incoming_msg_img"> <?php echo $d->nama_lengkap;?> </div>
  <div class="<?php echo $color;?>">
    <div class="received_withd_msg">
      <p><?php echo $d->komentar;?></p>
      <span class="time_date"> <?php echo $d->tanggal;?></span></div>
  </div>
</div>
<?php } ?>

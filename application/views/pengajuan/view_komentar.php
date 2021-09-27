<style>

.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 100%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 100%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 100%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 100%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 10%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 43px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 400px;
  overflow-y: auto;
}
</style>
<div class="container-fluid">
  <!-- Page title -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col-auto">
        <h2 class="page-title">
          Data Maintenance
        </h2>
      </div>
    </div>
  </div>
  <!-- Content here -->
  <div class="row">
    <div class="col-md-4 col-xs-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">CHANTTING</h4>
        </div>
        <div class="card-body">
          <h4 class="card-title"><?php echo $detail['nama_lengkap'];?> (<?php echo $detail['kode_cabang'];?>)</h4>
        </div>
        <div class="card-body">
          <div class="messaging">
            <div class="inbox_msg">
              <div class="mesgs">
                <div class="msg_history" id="laodkomentar">
                  
                </div>
                <div class="type_msg">
                  <div class="input_msg_write">
                    <input type="text" id="komentar" class="write_msg" placeholder="Type a message" />
                    <input type="hidden" id="kode_maintenance" value="<?php echo $this->uri->segment(3); ?>" class="write_msg" placeholder="Type a message" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    viewChat();
    function viewChat(){
      
      var kode_maintenance  = $('#kode_maintenance').val();
      $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>pengajuan/viewChat',
          data: {
            kode_maintenance: kode_maintenance
          },
          cache: false,
          success: function(respond) {

            $('#laodkomentar').html(respond);

          }

        });
    }

    $(document).on('keyup', 'body', function(e){
      var charCode = ( e.which ) ? e.which : event.keyCode;

      if(charCode == 13) 
      {
        var komentar          = $('#komentar').val();
      var kode_maintenance    = $('#kode_maintenance').val();

      if (komentar == 0) {

        swal("Oops!", "Harus Diisi ! Tidak Boleh Kosong", "warning");

      } else {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>pengajuan/input_komentar',
          data: {
            komentar: komentar,
            kode_maintenance: kode_maintenance
          },
          cache: false,
          success: function(respond) {

            $('#komentar').val("");
            $('#komentar').focus();
            viewChat();

          }

        });

      }
      }

    }); 


  });
</script>
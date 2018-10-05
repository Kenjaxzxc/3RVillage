<?php 

include('connection.php');

?>
<?php  include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>3RVillage</title>
  <?php include('link.php');?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  <style type="text/css">
    
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
  width: 60%; padding:
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
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
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
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
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
  float: right;
  width: 46%;
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
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
  </style> 
  </head>
  
<body class="bg-light">
  
  
   
<div class="row m-t-100 mb-5">
<div class="container">
<h3 class=" text-center"><?php echo $seller['firstname'].' '.$seller['lastname'] ?> </h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            
          </div>
          <div class="inbox_chat">
            
            
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
           
          </div>
          <div class="type_msg">
            <div class="input_msg_write">

              <form id="uploadPhotoForm" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="to" value="<?php echo $seller['accountid'] ?>" />
              <input type="hidden" name="from" value="<?php echo $user_id ?>" />
              <input type="hidden" id="message_img" name="message_img" value="" />
              <div class="row">
                <div class="col-sm-1">
                  <div class="pull-right">
                     <i id="upload-img" class="fa fa-camera" style="margin-top: 20px;"></i>
                    <input type="file" id="image1" name="upimage[]" style="display: none;" multiple="" />
                  </div>
                </div> 
                <div class="col-sm-9 message-box">
                    <input id="input-message" type="text" name="message" class="write_msg" placeholder="Type a message" />
                    <div class="preview-img" style="padding: 2px 2px 10px 2px;">
                      
                    </div>
                </div>
                <div class="col-sm-2">
                  <button id="msg_send_btn" class="msg_send_btn" type="button" name="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
              </div>
              
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

<!-- Button trigger modal-->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalYT">Launch modal</button> -->
    <div class="shared-content">
      <h1>SHARED CONTENT</h1>
      <div class="row">
        
      </div>
    </div>
  </div>
</div>  
    </body>
    </html>
  
  
    <?php
   include('footer.php');
?>
<script type="text/javascript">
  $("#upload-img").click(function () {
      $("#image1").trigger('click');
  });

function readURL2(input) {
  var img = "";
 if (input.files) {
    for(var i=0; i<input.files.length; i++){
      var reader = new FileReader();
      reader.onload = function(e) {
         $('.preview-img').append('<img src="'+e.target.result+'" width="100" style="margin-bottom: 3px;" /> ');
      }
      reader.readAsDataURL(input.files[i]);
      img += ","+input.files[i].name;
      //console.log(input.files[i].name);
    }
  }
  $('#message_img').val(img);
 //  link = $(input).val();
 // $('.preview-img').append(link);
}

$(function(){
  $("input[id=image1]").change(function(){
    $('#message_img').val('');
    $(".message-box .preview-img").html('');
    readURL2(this);
  });
});
</script>
 </body>
</html>  

<!--===============================================================================================-->  
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>

  <script src="../js/main.js"></script>
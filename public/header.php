<?php 
include('connection.php');
  session_start();
  $user_id=''; $seller_id=''; $seller='';
   if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

   }
   if(isset($_GET['id'])){
    $seller_id = $_GET['id'];

    $sql = "SELECT * FROM account WHERE accountid='$seller_id'"; 

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {  
      $seller = $row;
    }
    else{
     echo 'Not Found!';
    }
   }
?>
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
<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">

				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						
					</div>
					<input type="hidden" name="from" value="<?php echo $user_id ?>" />
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							<span class="fa fa-info-circle">&nbsp;</span> Help & FAQs
						</a>
						
						<div class="dropdown show">

						  <a class="dropdown-toggle flex-c-m trans-04 p-lr-25" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="fa fa-comments">&nbsp;</span><i id="count_notif"> Notification</i>

              	
              
						  </a>

						  <div id="post-notification" class="dropdown-menu " style="z-index:5000; position: relative; width: 600px; margin-left: -430px;  overflow: auto; max-height: 450px" aria-labelledby="dropdownMenuLink">
						   <!--  <a class="dropdown-item" href="#">ACTION</a>
						    <a class="dropdown-item" href="#">Another guiere</a>
						    <a class="dropdown-item" href="#">Something else here</a> -->
						  </div>
						</div>						

              
						<div class="dropdown show">

						  <a class="dropdown-toggle flex-c-m trans-04 p-lr-25" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="fa fa-comments">&nbsp;</span><i id="count_message"> Messages</i>

              	
              
						  </a>

						  <div id="message-notification" class="dropdown-menu " style="z-index:5000; position: relative; width: 500px; margin-left: -360px; overflow: auto; max-height: 450px" aria-labelledby="dropdownMenuLink">
						   <!--  <a class="dropdown-item" href="#">ACTION</a>
						    <a class="dropdown-item" href="#">Another guiere</a>
						    <a class="dropdown-item" href="#">Something else here</a> -->
						  </div>
						</div>

						<div class="dropdown show">
						  <a class="dropdown-toggle flex-c-m trans-04 p-lr-25" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <?php 
                $id = $_SESSION['user_id'];
                  $res = mysqli_query($conn, "SELECT * FROM account WHERE accountid = '$id'");
                  $row = mysqli_fetch_assoc($res);
                
               ?>
               <div>
               <img src="../images/<?php echo $row['userpic']  ?>" class="rounded-circle" width="25 " height="25">
               </div>
               <div class="ml-1">
               <p><?php echo $row['username'];  
               ?></p>
               </div>
						  </a>

						  <div class="dropdown-menu bg-dark " style="z-index:5000; position: relative;" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="profile.php?id=<?php echo $user_id; ?>"><span class="fa fa-user"></span> My Profile</a>
						   	<a class="dropdown-item" href="editprofile.php"><span class="fa fa-user"></span> Edit Profile</a>

					        <a class="dropdown-item" href="mypost.php"><span class="fa fa-plus-circle"></span> My Ads</a>
					        <a class="dropdown-item" href="mywishlist.php"><span class="fa fa-heart"></span> My Wishlist</a>
                  <a class="dropdown-item" href="subscriptionrecords.php"><span class="fa fa-heart"></span> Subscription Records</a>
					        <!--
					        <a class="dropdown-item" href="cart.php"><span class="zmdi zmdi-shopping-cart"></span> My Cart</a> -->
					        <div class="dropdown-divider"></div>
					        <a class="dropdown-item" href="logout.php"><span class="fa fa-sign-out"></span> Logout</a>
						  </div>
						</div>	

					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="home.php" class="logo">
						<img src="../images/icons/logo-33.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="home.php">Home</a>
							</li>

							<li>
								<a href="#products">Shop</a>
							</li>
    					<li>
								<a href="wishlist.php">Wishlist</a>
							</li>
              
						</ul>
					</div>	
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="menu-desktop">
              <ul class="main-menu">
                <li>
                  <a href="donate.php">Donate</a>
               
                </li>
                <li>
                   <a href="sell.php">Post Item</a>
                </li>
              </ul>
            </div>
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>
				</nav>
			</div>	
		</div>
	</header>


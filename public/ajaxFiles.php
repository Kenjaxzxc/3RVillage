<?php 
include "connection.php";
// $user_id='';
//   if(isset($_SESSION['user_id'])){
//    $user_id = $_SESSION['user_id'];
//   }


$stime = strtotime('now');
$date_now = date('F j, Y', $stime);
if(isset($_POST['ItemID'])){
	$itemID = $_POST['ItemID'];
	
	$sql = "SELECT * FROM `itemsell` a, `account` b where a.`accountid` = b.`accountid` and a.`ItemSellID` = '$itemID'";
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	if($res['UpdatedDate'] != NULL){
		$strtime = strtotime($res['UpdatedDate']);
		$startDate = date('F j, Y', $strtime);
		$endDate = date('F j, Y', $strtime + (86400 * 7));

		$up_stime = strtotime($endDate);
		if($stime > $up_stime){
			$res['notify'] = true;
			$user_id = $res['accountid'];
			$title = $res['SItemTitle'];
			$category = $res['SItemCat'];
			$details = 'Your post title '.$title.' on category '.$category.' has been inactive ! ';
			$sql22 = "INSERT INTO notification(notif_details, table_name, table_id, user_id, status) VALUES('$details','itemsell', '$itemID', '$user_id', 0)"; 
			mysqli_query($conn, $sql22);
		}
		else{
			$res['notify'] = false;
		}
	}
	else{
		$strtime = strtotime($res['SItemPosted']);
		$startDate = date('F j, Y', $strtime);
		$endDate = date('F j, Y', $strtime + (86400 * 7));

		$post_stime = strtotime($endDate);
		if($stime > $post_stime){
			$res['notify'] = true;
			$user_id = $res['accountid'];
			$title = $res['SItemTitle'];
			$category = $res['SItemCat'];
			$details = 'Your post title '.$title.' on category '.$category.' has been inactive ! ';
			$sql22 = "INSERT INTO notification(notif_details, table_name, table_id, user_id, status) VALUES('$details','itemsell', '$itemID', '$user_id', 0)"; 
			mysqli_query($conn, $sql22);
		}
		else{
			$res['notify'] = false;
		}
	}

	$photo = ($res['SItemImages1']);
	$res['SItemImages1'] = $photo;
	$res['startDate'] = $startDate;
	$res['endDate'] = $endDate;
	$res['itemPrice'] = number_format($res['SItemPrice'], 2, '.', ',');
	$res['expPrice'] = number_format($res['ExpectedPrice'], 2, '.', ',');
	header('Content-type: Application/json');
	echo json_encode($res);

}

// syrel

if(isset($_POST['searchProd'])){
	$builder = $dom = null;
  	$search = $_POST['search'];
  	$sql = mysqli_query($conn,"select * from `itemsell` where `SItemTitle` like '%$search%'");
  	while ($res = mysqli_fetch_assoc($sql)) {
  		$builder = 
  		'
  		<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
			<!-- Block2 -->
			<div class="block2">
				<div class="block2-pic hov-img0">
				<img src="../upload/'.$res['SItemImages1'].'" height="334" width="270"/>
					<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 prevITEM">
						Preview Item
					</a>
					<input type="hidden" name="itemsellID" value="'.$res['ItemSellID'].'">
				</div>

				<div class="block2-txt flex-w flex-t p-t-14">
					<div class="block2-txt-child1 flex-col-l ">
						<a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							'.$res['SItemTitle'].'
						</a>

						<span class="stext-105 cl3">
							₱ '.number_format($res['SItemPrice'], 2, '.', ',').'
						</span>
					</div>

			
				</div>
			</div>
		</div>
  		';
  		$dom.=$builder;
  	}
  	echo json_encode(array("data"=>$dom));
}

if(isset($_POST['searchProdFilter'])){
	$builder = $dom = $filter = null;
  	$search = $_POST['search'];
  	$filter = $_POST['filter'];
  	$sql = mysqli_query($conn,"select * from `itemsell` where `SItemTitle` like '%$search%' AND `SItemCat` ='filter'");
  	while ($res = mysqli_fetch_assoc($sql)) {
  		$builder = 
  		'
  		<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
			<!-- Block2 -->
			<div class="block2">
				<div class="block2-pic hov-img0">
				<img src="../upload/'.$res['SItemImages1'].'" height="334" width="270"/>
					<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 prevITEM">
						Preview Item
					</a>
					<input type="hidden" name="itemsellID" value="'.$res['ItemSellID'].'">
				</div>

				<div class="block2-txt flex-w flex-t p-t-14">
					<div class="block2-txt-child1 flex-col-l ">
						<a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
							'.$res['SItemTitle'].'
						</a>

						<span class="stext-105 cl3">
							₱ '.number_format($res['SItemPrice'], 2, '.', ',').'
						</span>
					</div>

			
				</div>
			</div>
		</div>
  		';
  		$dom.=$builder;
  	}
  	echo json_encode(array("data"=>$dom));
  	}


  	if(isset($_POST['searchNGO'])){
	$builder = $dom = null;
  	$search = $_POST['search'];
  	$sql = mysqli_query($conn,"select * from `wishlistngo` where `WLWant` like '%$search%'");
  	while ($value = mysqli_fetch_assoc($sql)) {
  		$builder = 
  		'
	    <div class="shadow-lg col-sm-4 p-2 bg-white rounded mb-5 isotope-item">
	        <div class="row stext-105 cl3 p-b-5">
	        <div class="col-sm-3">
	          <strong><label>Name:</label></strong>
	        </div>
	        <div class="col-sm-8 ">
	          <label><strong>'.$value['WLName'].'</strong></label>
	        </div>
	      </div>

	      <div class="row stext-105 cl3 p-b-5">
	        <div class="col-sm-3">
	          <strong><label>Wanted:</label></strong>
	        </div>
	        <div class="col-sm-8">
	          <label>'.$value['WLWant'].'</label>
	        </div>
	      </div>

	      <div class="row stext-105 cl3 p-b-5">
	        <div class="col-sm-3">
	         <strong><label>Description:</label></strong>
	        </div>
	        <div class="col-sm-8">
	          <label>'.$value['WLMessage'].'</label>
	        </div>
	      </div>

	      <div class="row justify-content-center">
	        <div>
	          <a href="message.php?id='.$value['NGOID'].'"><button class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
	           <p>Communicate</p> 
	           </button></a>
	        </div>
	      </div>
	     </div>
  		';
  		$dom.=$builder;
  	}
  	echo json_encode(array("data"=>$dom));
}

if(isset($_POST['searchNGOFilter'])){
	$builder = $dom = $filter = null;
  	$search = $_POST['search'];
  	$filter = $_POST['filter'];
  	$sql = mysqli_query($conn,"select * from `wishlistngo` where `WLWant` like '%$search%' AND `WLCategory` ='$filter'");
  	while ($value = mysqli_fetch_assoc($sql)) {
  		$builder = 
  		'
    <div class="shadow-lg col-sm-4 p-2 bg-white rounded mb-5 isotope-item">
        <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Name:</label></strong>
        </div>
        <div class="col-sm-8 ">
          <label><strong>'.$value['WLName'].'</strong></label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Wanted:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$value['WLWant'].'</label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
         <strong><label>Description:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$value['WLMessage'].'</label>
        </div>
      </div>

      <div class="row justify-content-center">
        <div>
          <a href="message.php?id='.$value['NGOID'].'"><button class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
           <p>Communicate</p> 
           </button></a>
        </div>
      </div>
     </div>
  		';
  		$dom.=$builder;
  	}
  	echo json_encode(array("data"=>$dom));
  	}


  	if(isset($_POST['wishlist'])){
	$builder = $dom = null;
  	$search = $_POST['search'];
  	$sql = mysqli_query($conn,"select * from `wishlist` where `WLWant` like '%$search%'");
  	while ($value = mysqli_fetch_assoc($sql)) {
  		$builder = 
  		'
	    <div class="shadow-lg col-sm-4 p-2 bg-white rounded mb-5 isotope-item">
	        <div class="row stext-105 cl3 p-b-5">
	        <div class="col-sm-3">
	          <strong><label>Name:</label></strong>
	        </div>
	        <div class="col-sm-8 ">
	          <label><strong>'.$value['WLName'].'</strong></label>
	        </div>
	      </div>

	      <div class="row stext-105 cl3 p-b-5">
	        <div class="col-sm-3">
	          <strong><label>Wanted:</label></strong>
	        </div>
	        <div class="col-sm-8">
	          <label>'.$value['WLWant'].'</label>
	        </div>
	      </div>

	      <div class="row stext-105 cl3 p-b-5">
	        <div class="col-sm-3">
	         <strong><label>Description:</label></strong>
	        </div>
	        <div class="col-sm-8">
	          <label>'.$value['WLMessage'].'</label>
	        </div>
	      </div>

	      <div class="row justify-content-center">
	        <div>
	          <a href="message.php?id='.$value['accountid'].'"><button class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
	           <p>Communicate</p> 
	           </button></a>
	        </div>
	      </div>
	     </div>
  		';
  		$dom.=$builder;
  	}
  	echo json_encode(array("data"=>$dom));
}

if(isset($_POST['wishlistFilter'])){
	$builder = $dom = $filter = null;
  	$search = $_POST['search'];
  	$filter = $_POST['filter'];
  	$sql = mysqli_query($conn,"select * from `wishlist` where `WLWant` like '%$search%' AND `WLCategory` ='$filter'");
  	while ($value = mysqli_fetch_assoc($sql)) {
  		$builder = 
  		'
    <div class="shadow-lg col-sm-4 p-2 bg-white rounded mb-5 isotope-item">
        <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Name:</label></strong>
        </div>
        <div class="col-sm-8 ">
          <label><strong>'.$value['WLName'].'</strong></label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Wanted:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$value['WLWant'].'</label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
         <strong><label>Description:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$value['WLMessage'].'</label>
        </div>
      </div>

      <div class="row justify-content-center">
        <div>
          <a href="message.php?id='.$value['accountid'].'"><button class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
           <p>Communicate</p> 
           </button></a>
        </div>
      </div>
     </div>
  		';
  		$dom.=$builder;
  	}
  	echo json_encode(array("data"=>$dom));
  	}

?>

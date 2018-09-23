<?php
	include('connection.php'); 

	$thread = array();
	$user_id = $_POST['user_id'];
	$count = 0;
		$sql = "SELECT * FROM interested WHERE user_id = '$user_id'"; 

	    $result = mysqli_query($conn, $sql);
	   while( $row = mysqli_fetch_assoc($result)){
	   	$item_id = $row['item_id'];
	   			$sql2 = "SELECT * FROM `itemsell` a, `account` b where a.`accountid` = b.`accountid` and a.`ItemSellID` ='$item_id'";
				$result2 = mysqli_query($conn, $sql2);
				$row2 = mysqli_fetch_assoc($result2);
				//if($row2){
					$arr = array(
			    		'img'=>$row2['SItemImages1'],
			    		'title'=>$row2['SItemTitle'],
			    		'category'=>$row2['SItemCat'],
			    		'price'=>$row2['SItemPrice'],
			    		'acc_id'=>$row2['accountid']
			    		);
			    array_push($thread, $arr);
				
			    
	    }
		$response = array('status'=>true, 'thread'=>$thread);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
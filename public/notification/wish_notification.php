<?php
	include('../connection.php'); 

	$thread = array();
	$from = $_POST['from'];
	$last_id = 0;$unread = 0;$unread_all = 0;
	$name='';
		//UNREAD ALL
				// $sql_unread_all = "SELECT count(int_id) as unread_all FROM interested WHERE user_id = '$from' AND status = 1 ";
			 //    $result_unread_all = mysqli_query($conn, $sql_unread_all);
			 //    $row_unread_all = mysqli_fetch_assoc($result_unread_all);
			 //    if($row_unread_all){ $unread_all = $row_unread_all['unread_all']; }
			    //END
		$sql = "SELECT * FROM itemsell b, account c WHERE b.accountid = c.accountid AND b.accountid='$from' AND b.SItemStatus = 1"; 

	   	$result = mysqli_query($conn, $sql);
	   	$row = mysqli_fetch_assoc($result);
	   	if($row){
	   		$w_sql = "SELECT * FROM wishlist a, account b WHERE a.accountid = b.accountid AND a.WLStatus = 1 ORDER BY a._date DESC"; 
		    $wl_result = mysqli_query($conn, $w_sql);
		    while($wl_row = mysqli_fetch_assoc($wl_result)){
		    	$buyer_id = $wl_row['accountid'];
		    	$want = $wl_row['WLWant'];
		    	$category = $wl_row['WLCategory'];

		    	$arr = array(
				    		
				    		'buyer_id'=>$buyer_id,
				    		'image'=>$wl_row['userpic'],
				    		'buyer_name'=>$wl_row['firstname'],
				    		'date'=>date('F j, Y g:i:A', strtotime($wl_row['_date'])),
				    		'details'=>'Wish '.$want.' category '.$category
				    		);
				    array_push($thread, $arr);
		   	}
	   	}
		
	   
		$response = array('status'=>true, 'thread'=>$thread);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
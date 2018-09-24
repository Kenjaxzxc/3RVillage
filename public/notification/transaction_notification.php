<?php
	include('../connection.php'); 

	$thread = array();
	$from = $_POST['from'];
	$last_id = 0;$unread = 0;$unread_all = 0;
	$name='';
		//UNREAD ALL
				$sql_unread_all = "SELECT count(int_id) as unread_all FROM interested WHERE user_id = '$from' AND status = 1 ";
			    $result_unread_all = mysqli_query($conn, $sql_unread_all);
			    $row_unread_all = mysqli_fetch_assoc($result_unread_all);
			    if($row_unread_all){ $unread_all = $row_unread_all['unread_all']; }
			    //END

		$sql = "SELECT * FROM interested a, itemsell b, account c WHERE a.item_id = b.ItemSellID and b.accountid = c.accountid AND a.user_id = '$from' AND a.status = 1 ORDER BY _date desc"; 

	    $result = mysqli_query($conn, $sql);
	    //$row = mysqli_fetch_assoc($result);
	    while($row2 = mysqli_fetch_assoc($result)){
	   
	   		$arr = array(
			    		'n_status'=>$row2['status'],
			    		'seller_id'=>$row2['accountid'],
			    		'seller_name'=>$row2['firstname'],
			    		'date'=>date('F j, Y g:i:A', strtotime($row2['_date'])),
			    		'details'=>'Thank you for the smooth transaction. Please rate me. Thanks!'
			    		);
			    array_push($thread, $arr);
	   	}
	   
		$response = array('status'=>true,'unread_all'=>($unread_all > 0 ? 'Notification('.$unread_all.')' : 'Notification' ), 'thread'=>$thread);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
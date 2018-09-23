<?php
	include('../connection.php'); 

	$thread = array();
	$from = $_POST['from'];
	$last_id = 0;$unread = 0;$unread_all = 0;
	$name='';
		//UNREAD ALL
				$sql_unread_all = "SELECT count(notif_id) as unread_all FROM notification WHERE user_id = '$from' AND is_read = 0 ";
			    $result_unread_all = mysqli_query($conn, $sql_unread_all);
			    $row_unread_all = mysqli_fetch_assoc($result_unread_all);
			    if($row_unread_all){ $unread_all = $row_unread_all['unread_all']; }
			    //END

		$sql = "SELECT * FROM notification WHERE user_id = '$from' ORDER BY notif_time desc"; 

	    $result = mysqli_query($conn, $sql);
	    //$row = mysqli_fetch_assoc($result);
	   while($row2 = mysqli_fetch_assoc($result)){
	   
	   		$arr = array(
			    		'n_status'=>$row2['status'],
			    		'time'=>date('F j, Y g:i:A', strtotime($row2['notif_time'])),
			    		'details'=>$row2['notif_details'],
			    		'info'=>'3rvillage'
			    		);
			    array_push($thread, $arr);
	   	}
	   
		$response = array('status'=>true,'unread_all'=>($unread_all > 0 ? 'Notification('.$unread_all.')' : 'Notification' ), 'thread'=>$thread);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
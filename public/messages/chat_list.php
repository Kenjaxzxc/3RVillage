<?php
	include('../connection.php'); 

	$thread = array();
	$from = $_POST['from'];
	$last_id = 0;$unread = 0;$unread_all = 0;
	$name='';
		//UNREAD ALL
				$sql_unread_all = "SELECT count(id) as unread_all FROM messages WHERE _to = '$from' AND is_read = 0 ";
			    $result_unread_all = mysqli_query($conn, $sql_unread_all);
			    $row_unread_all = mysqli_fetch_assoc($result_unread_all);
			    if($row_unread_all){ $unread_all = $row_unread_all['unread_all']; }
			    //END

		$sql = "SELECT distinct(_to), _from, _to FROM messages WHERE _to = '$from' "; 

	    $result = mysqli_query($conn, $sql);
	    //$row = mysqli_fetch_assoc($result);
	   while($row = mysqli_fetch_assoc($result)){
	   	$_from = $row['_from'];
	   	$_to = $row['_to'];
	   	
	   	$sql_exist = "SELECT * FROM messages WHERE (_from='$_from' AND _to='$_to') OR (_from='$_to' AND _to='$_from') GROUP BY id ORDER BY _time desc "; 

	    $result_exist = mysqli_query($conn, $sql_exist);
	    $row2 = mysqli_fetch_assoc($result_exist);
	   	
	   	if($row2){
	   		$id_from = ($row2['_from'] == $from ? $row2['_from'] : $row2['_to']);
	   		   //UNREAD
				$sql_unread = "SELECT count(id) as unread FROM messages WHERE _to = '$id_from' AND is_read = 0 ";
			    $result_unread = mysqli_query($conn, $sql_unread);
			    $row_unread = mysqli_fetch_assoc($result_unread);
			    if($row_unread){ $unread = $row_unread['unread']; }
			    //END
			 //$id = $row2['_to'];
	   		$id = ($row2['_from'] == $from ? $row2['_to'] : $row2['_from']);
			    $sql2 = "SELECT * FROM account WHERE accountid='$id' "; 
			    $result2 = mysqli_query($conn, $sql2);
			    $info = mysqli_fetch_assoc($result2);
			   
			    $message = ($row2['_from'] == $from ? 'You: '.$row2['message'] : $row2['message']);

	   		$arr = array(
			    		'msg_id'=>$row2['id'],
			    		'to'=>$row2['_to'],
			    		'from'=>$row2['_from'],
			    		'id'=>$id,
			    		'time'=>date('F j, Y g:i:A', strtotime($row2['_time'])),
			    		'message'=>($unread > 0 && $id == $row2['_from'] ? '<strong>'.$message.'</strong>' : $message),
			    		'info'=>($unread > 0 && $id == $row2['_from'] ? $info['firstname'].' '.$info['lastname'].'('.$unread.')' : $info['firstname'].' '.$info['lastname'] )
			    		);
			    array_push($thread, $arr);
	   	}
	   }
		$response = array('status'=>true,'unread_all'=>($unread_all > 0 ? 'Message('.$unread_all.')' : 'Message' ), 'thread'=>$thread);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
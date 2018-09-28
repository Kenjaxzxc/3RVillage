<?php
	include('../connection.php'); 

	$thread = array();
	$from = $_POST['from'];
	$to = $_POST['to'];
	$count = 0;
		$sql = "SELECT * FROM messages WHERE (_from='$from' AND _to='$to') OR (_from='$to' AND _to='$from') AND is_read = 1  "; 

	    $result = mysqli_query($conn, $sql);
	   while( $row = mysqli_fetch_assoc($result)){

			    $sql2 = "SELECT * FROM account WHERE accountid='$to' "; 
			    $result2 = mysqli_query($conn, $sql2);
			    $row2 = mysqli_fetch_assoc($result2);
			    $arr = array(
			    		'from'=> $row['_from'],
			    		'to'=> $row['_to'],
			    		'messages'=> ($row['_from'] == $from ? 
			    					'<div class="outgoing_msg">
						              <div class="sent_msg">
						                <p>'.$row['message'].'</p>
						                <span class="time_date">'.date('F j, Y g:i:A', strtotime($row['_time'])).'</span> </div>
						            </div>'
			    					
						            : 

						            '<div class="incoming_msg">
						              <div class="incoming_msg_img"> <img src="../images/'.$info['userpic'].'"> </div>
						              <div class="received_msg">
						                <p>'.$row2['firstname'].' '.$row2['lastname'].'</p>
						                <div class="received_withd_msg">
						                  <p>'.$row['message'].'</p>
						                  <span class="time_date">'.date('F j, Y g:i:A', strtotime($row['_time'])).'</span></div>
						              </div>
						            </div>' )
			    		);
			    array_push($thread, $arr);
		 
	   		
	    }
		$response = array('status'=>true, 'thread'=>$thread);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
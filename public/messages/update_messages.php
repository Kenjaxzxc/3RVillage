<?php
	include('../connection.php'); 
	$shared_photos = array();
	$thread = array();
	$from = $_POST['from'];
	$to = $_POST['to'];
	$last_read = 0;
		$sql = "SELECT * FROM messages WHERE _to = '$from' AND is_read = 1 ORDER BY _time desc"; 

	    $result = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_assoc($result);
	   	if($row){ $last_read = $row['id'];}

	   	$sql_exist = "SELECT * FROM messages WHERE _to = '$from' AND id > $last_read ORDER BY _time asc"; 

	    $result_exist = mysqli_query($conn, $sql_exist);
	    //$row2 = mysqli_fetch_assoc($result_exist);
	   	while($row2 = mysqli_fetch_assoc($result_exist)){
	   		$photos = "";$message="";
	   			$mes = unserialize($row2['message']);
	   			$photo = $mes['photo'];
	   			if($mes['message'] != ""){
	   				$message = '<p>'.$mes['message'].'</p>';
	   			}
	   			for ($i=0; $i < count($photo) ; $i++) { 
	   				$a = explode('.', $photo[$i]);
	   				$photos .= '<a href="#upmodal-photos-'.$a[0].'" data-toggle="modal"><img src="../upload/messages/'.$photo[$i].'" style="width:100%;height:300px; border-radius:  0px 0px 20px 5px;margin-bottom:5px" /></a>';
	   				array_push($shared_photos, $photo[$i]);
	   			}

			    $sql2 = "SELECT * FROM account WHERE accountid='$to' "; 
			    $result2 = mysqli_query($conn, $sql2);
			    $info = mysqli_fetch_assoc($result2);
	   		$arr = array(
			    		'msg_id'=>$row2['id'],
			    		'from'=> $row2['_from'],
			    		'to'=> $row2['_to'],
			    		'messages'=> ($row2['_from'] == $from ? 
			    					'<div class="outgoing_msg">
						              <div class="sent_msg">
						              	'.$message.'
						                <span>'.$photos.'</span>
						                <span class="time_date">'.date('F j, Y g:i:A', strtotime($row2['_time'])).'</span> </div>
						            </div>'
			    					
						            : 

						            '<div class="incoming_msg">
						              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						              <div class="received_msg">
						                <p>'.$info['firstname'].' '.$info['lastname'].'</p>
						                <div class="received_withd_msg">
						              	'.$message.'
						                <span>'.$photos.'</span>
						                  <span class="time_date">'.date('F j, Y g:i:A', strtotime($row2['_time'])).'</span></div>
						              </div>
						            </div>' )
			    		);
			    array_push($thread, $arr);
	   	}

		$response = array('status'=>true, 'thread'=>$thread, 'shared_photos'=>$shared_photos);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
<?php
	include('../connection.php'); 

	$thread = array();

	$shared_photos = array();
	//$photos = array();
	$from = $_POST['from'];
	$to = $_POST['to'];
	$count = 0;
		$sql = "SELECT * FROM messages WHERE (_from='$from' AND _to='$to') OR (_from='$to' AND _to='$from') AND is_read = 1  "; 

	    $result = mysqli_query($conn, $sql);
	   while( $row = mysqli_fetch_assoc($result)){
	   	$photos = array(); $message="";
	   			$mes = unserialize($row['message']);
	   			$photo = $mes['photo'];
	   			if($mes['message'] != ""){
	   				$message = '<p>'.$mes['message'].'</p>';
	   			}
	   			for ($i=0; $i < count($photo) ; $i++) { 
	   				// $photos .= $i.'<img src="../images/'.$photo[$i].'" style="width:100%;height:300px; border-radius: 0px 0px 20px 5px;margin-bottom:5px" />';
	   				array_push($photos, $photo[$i]);
	   				array_push($shared_photos, $photo[$i]);
	   			}
			    $sql2 = "SELECT * FROM account WHERE accountid='$to' "; 
			    $result2 = mysqli_query($conn, $sql2);
			    $row2 = mysqli_fetch_assoc($result2);
			    $arr = array(
			    		'from'=> $row['_from'],
			    		'to'=> $row['_to'],
			    		'photos'=> $photos,
			    		'message'=>$message,
			    		'time'=> date('F j, Y g:i:A', strtotime($row['_time'])),
			    		'name'=> $row2['firstname'].' '.$row2['lastname']
			    		
			    		);
			    array_push($thread, $arr);
		 
	   		
	    }
		$response = array('status'=>true, 'thread'=>$thread, 'shared_photos'=>$shared_photos);
		header('Content-type: Application/json');
		echo json_encode( $response );

	
	
?>
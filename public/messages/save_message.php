<?php
	include('../connection.php'); 
		date_default_timezone_set('Asia/Manila');
		$photo_list = array();
		$from = $_POST['from'];
		$to = $_POST['to'];
		$message = $_POST['message'];
		$photo = $_POST['photo'];
		$time = date('F j, Y g:i:a');

		$len = count($photo);
		
		if($len > 0){
			for ($i=0; $i < $len; $i++) { 
				array_push($photo_list, $photo[$i]);
			}	
		}

		
		$mes = array('photo'=>$photo_list, 'message'=>$message);
		$serialize = serialize($mes);
		$sql = "INSERT INTO messages(_from, _to, message) VALUES('$from','$to','$serialize')"; 
		mysqli_query($conn, $sql);
		
			$response = array('from'=>$from, 'to'=>$to, 'message'=>$mes, 'time'=>$time);
		
		header('Content-type: Application/json');
		echo json_encode( $response );

?>
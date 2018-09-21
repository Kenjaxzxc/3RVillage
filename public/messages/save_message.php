<?php
	include('../connection.php'); 
		date_default_timezone_set('Asia/Manila');

		$from = $_POST['from'];
		$to = $_POST['to'];
		$message = $_POST['message'];
		$time = date('F j, Y g:i:a  ');


		$sql = "INSERT INTO messages(_from, _to, message) VALUES('$from','$to','$message')"; 
		mysqli_query($conn, $sql);

		$response = array('from'=>$from, 'to'=>$to, 'message'=>$message, 'time'=>$time);

		header('Content-type: Application/json');
		echo json_encode( $response );
	
?>
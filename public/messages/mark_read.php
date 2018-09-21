<?php
	include('../connection.php'); 
	$msg_id = $_POST['msg_id'];

	$sql =	"UPDATE messages SET is_read=1 WHERE id='$msg_id'";
	mysqli_query($conn, $sql);
 ?>
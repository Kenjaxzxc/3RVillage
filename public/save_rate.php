<?php
	include 'connection.php';
	if (isset($_POST['saveRate'])){
      $rate = $_POST['rating'];
      $buyer_id = $_POST['buyer_id'];
      $seller_id = $_POST['seller_id'];
      $feedback = $_POST['feedback'];
      mysqli_query($conn, "INSERT INTO review(seller_id, buyer_id, rate, feedback) VALUES('$seller_id','$buyer_id','$rate','$feedback') ");
        header('location: profile.php?id='.$seller_id);
      }
 ?>
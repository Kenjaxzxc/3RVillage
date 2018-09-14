<?php 
include "connection.php";

if(isset($_POST['itemSellData'])){
	$itemID = $_POST['ItemID'];
	$sql = "SELECT * FROM `itemsell` a, `account` b where a.`accountid` = b.`accountid` and a.`ItemSellID` ='$itemID'";
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($result);
	$photo = ($res['SItemImages']);
	$res['SItemImages'] = $photo;
	echo json_encode(array($res));
}

?>
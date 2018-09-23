 <?php
  include('connection.php'); 
  // $user_id='';
  // if(isset($_SESSION['user_id'])){
  //  $user_id = $_SESSION['user_id'];
  // }
  ?>
<?php
      if (isset($_GET['del'])){
      $id = $_GET['del'];
      $res = mysqli_query($conn, "UPDATE itemsell SET SItemStatus='0' WHERE ItemSellID = '$id'");
         
               echo "<script>alert('Successfully Deleted!');</script>";
               echo "<script>window.location='mypost.php'</script>";
      
      }
      if (isset($_REQUEST['inactive'])){
      $id = $_REQUEST['inactive'];
      $res = mysqli_query($conn, "UPDATE itemsell SET SItemStatus='0' WHERE ItemSellID = '$id'");
      header('location: mypost.php');
      }
      if (isset($_GET['renew'])){
      $id = $_GET['renew'];
      $strtime = strtotime('now');
	  $date = date('y-m-d h:i:sa', $strtime);
      $res = mysqli_query($conn, "UPDATE itemsell SET SItemStatus='1', UpdatedDate = '$date' WHERE ItemSellID = '$id'");

      $ress = mysqli_query($conn, "SELECT * FROM itemsell WHERE ItemSellID = '$id'");
      $row = mysqli_fetch_assoc($ress);
      if($row){
         $user_id = $row['accountid'];
         $details = 'Your post title '.$row['SItemTitle'].' on category '.$row['SItemCat'].' has been actived now ! ';

         $sql22 = "INSERT INTO notification(notif_details, table_name, table_id, user_id, status) VALUES('$details','itemsell', '$id', '$user_id', 1)"; 
         mysqli_query($conn, $sql22);
      }
         

         echo "<script>alert('Successfully Renew!');</script>";
               echo "<script>window.location='mypost.php'</script>";
      
      }
      
      ?> 
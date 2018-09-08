 <?php
  include('connection.php'); 
  ?>
<?php
      if (isset($_GET['del'])){
      $id = $_GET['del'];
      $res = mysqli_query($conn, "UPDATE itemsell SET SItemStatus='0' WHERE ItemSellID = '$id'");
         
               echo "<script>alert('Successfully Deleted!');</script>";
               echo "<script>window.location='mypost.php'</script>";
      
              }

      ?> 
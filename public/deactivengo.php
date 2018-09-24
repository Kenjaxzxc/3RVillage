 <?php
  include('connection.php'); 
  ?>
<?php
      if (isset($_GET['del'])){
      $id = $_GET['del'];
      $res = mysqli_query($conn, "UPDATE wishlistngo SET WLStatus='0' WHERE WishListID = '$id'");
         
               echo "<script>alert('Successfully Deleted!');</script>";
               echo "<script>window.location='ngohome.php'</script>";
      
              }

      ?> 
<?php 
  include('connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>3RVillage</title>
  <?php include('link.php');?>
  </head>
  
<body class="bg-light">
  <?php 
      include('header2.php');
   ?>
   
   <?php
    $id = $_GET['id'];
    if(isset($_POST['btnUpdate'])){
    $category = $_POST['category'];
    $want = $_POST['want'];
    $message = $_POST['message'];
    $sql = "UPDATE wishlistngo SET WLCategory='$category', WLWant='$want', WLMessage ='$message' WHERE WishListID = '$id'";
              $result = mysqli_query ($conn, $sql);
             
              echo "<script>alert('Successfully Updated!');</script>";
              echo "<script>window.location='ngohome.php'</script>";
      }
      ?> 
  
  <section class="col-sm-12 bg-light"> 
    <?php 
          $id = $_GET['id'];
          $res = mysqli_query($conn, "SELECT * FROM wishlistngo WHERE WishListID = '$id'");
          while ($row = mysqli_fetch_array($res)){  
        
     ?> 
     
  <form action="" method="POST">
  <div class="row justify-content-center">
    
    <div class="shadow-lg col-sm-5 m-b-100 m-t-100 p-4 bg-white rounded">
      <h4 class="ltext-102 cl5 mb-4 mt-2 text-center">Update Your Wishlist</h4>
     
      <div class="form-group">    
        <label>Name:</label>
        <input class="form-control" type="text" name="name" value="<?php echo $row['WLName'] ?>" disabled>
      </div>
      <?php 
      include('category.php');
      ?>
      <div class="form-group">
        <label>Want:</label>
        <input class="form-control" type="text" name="want" value="<?php echo $row['WLWant'] ?>" >
      </div>

      <div class="form-group">
        <label>Message:</label>
        <textarea class="form-control" name="message" rows="3"><?php echo $row['WLMessage'] ?></textarea>
      </div>
      

      <div class="mt-4">
        <a href="mywishlist.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnUpdate">Update</button>
      </div>
    </div>
    <?php
      }
      ?>
    </div> 
    </form>
  </section>
  
  
    <?php
   include('footer.php');
?>

 </body>
</html>  

  
<!--===============================================================================================-->  
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>

  <script src="../js/main.js"></script>
  

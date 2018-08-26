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
      include('header.php');
   ?>

   <?php
    if(isset($_POST['btnSave'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $want = $_POST['want'];
    $message = $_POST['message'];
    $sql = "INSERT INTO wishlist (WLName, WLWant, WLMessage, WLCategory) VALUES ('$name','$want','$message','$category')";
              $result = mysqli_query ($conn, $sql);
              echo "<script>window.location='wishlist.php'</script>";
      }
      ?> 
  
  <section class="col-sm-12 bg-light">  
  <div class="row">
   <h4 class="ltext-102 cl5 m-t-100 m-l-100 m-b-30">Add Your Wishlist</h4>
      
  </div>
  <form action="" method="POST">
  <div class="row justify-content-center">
    
    <div class="col-sm-5">
     
      <div class="form-group">    
        <label>Name</label>
        <input class="form-control" type="text" name="name" required autofocus>
      </div>
      <?php 
      include('category.php');
      ?>
      <div class="form-group">
        <label>Want</label>
        <input class="form-control" type="text" name="want" required>
      </div>

      <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" name="message" rows="3" required></textarea>
      </div>
      

      <div class="mt-4 m-b-100">
        <button type="submit" class="btn btn-outline-secondary float-right" id="btnCancel">Cancel</button>
        <button type="submit" class="btn btn-success float-right mr-2" id="btnSave" name="btnSave">Save</button>
      </div>
    </div>

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
  <script src="../js/main.js"></script>
<!--===============================================================================================-->
  

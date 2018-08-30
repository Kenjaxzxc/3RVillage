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
  
  <section class="col-sm-12 bg-light">  
  
  <div class="row">
   <h4 class="ltext-102 cl5 m-t-100 m-l-100 m-b-30">Profile</h4>
      
  </div>
  <form action="" method="POST">
  <div class="row justify-content-center">
    
    <div class="col-sm-5">
     
      <div class="form-group">    
        <label>Title </label>
        <input class="form-control" type="text" name="title" required autofocus>
      </div>
      <?php 
      include('category.php');
      ?>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
      </div>
      <?php 
      include('location.php');
      ?>
      <div class="form-group">
        <label>Price</label>
        <input class="form-control" type="number" name="price" required>
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
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>

  <script src="../js/main.js"></script>
  

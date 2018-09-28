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
           $sessionID = $_SESSION['accountid'];
           $id = mysqli_query($conn, "SELECT accountid FROM `account` WHERE username = '$sessionID'")->fetch_object()->accountid;
           $res = mysqli_query($conn, "SELECT * FROM account where accountid = '$id'");
              while($row=$res->fetch_array()){
     ?> 
   

   <?php
    if(isset($_POST['btnSave'])){
    $name = $row['firstname']." ".$row['lastname'];
    $category = $_POST['category'];
    $want = $_POST['want'];
    $message = $_POST['message'];
    $sql = "INSERT INTO wishlist (WLName, WLWant, WLMessage, WLCategory, accountid) VALUES ('$name','$want','$message','$category','$id')";
              $result = mysqli_query ($conn, $sql);
             
          
              echo "<script>window.location='wishlist.php'</script>";
      }
      ?> 
  
  <section class="col-sm-12 bg-light">  
    
     

    
  <form action="" method="POST">
  <div class="row justify-content-center">
    
    <div class="shadow-lg col-sm-5 m-b-100 m-t-100 p-4 bg-white rounded">
      <h4 class="ltext-102 cl5 mb-4 mt-2 text-center">Add Your Wishlist</h4>
     
      <div class="form-group">    
        <label>Name:</label>
        <input class="form-control" type="text" name="name" value="<?php echo $row['firstname']," ",$row ['lastname'] ?>" disabled>
      </div>
      <?php 
      include('category.php');
      ?>
      <div class="form-group">
        <label>Desired Item:</label>
        <input class="form-control" type="text" name="want" required>
      </div>

      <div class="form-group">
        <label>Description:</label>
        <textarea class="form-control" name="message" rows="3" required></textarea>
      </div>
      

      <div class="mt-4">
        <a href="wishlist.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnSave">Post</button>
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
  

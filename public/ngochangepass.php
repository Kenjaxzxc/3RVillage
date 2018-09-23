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
      if(isset($_POST['btnUpdate'])){
      $old = $_POST['oldpass'];
      $new = $_POST['newpass'];
      $cpass = $_POST['cnewpass'];
      $id=$_SESSION['NGOID'];
      $sql1 = mysqli_query($conn, "SELECT password FROM ngo WHERE NGOName = '$id'");
       while($row=$sql1->fetch_array()){
      $oldpass = $row['password'];
      if ($old != $oldpass) {
        echo "<script>alert('Incorrect Old Password!');</script>";
      }
      elseif ($new != $cpass) {
        echo "<script>alert('Password does not match!');</script>";
      }
       
      else{
      $sql = "UPDATE ngo SET password='$new' WHERE NGOName = '$id'";
             mysqli_query ($conn, $sql);
            echo "<script>alert('Successfully Change Password!');</script>";
            echo '<script>window.location="editngo.php"</script>'; 
          }
        }
      } 
   ?>
  
  <section class="col-sm-12 bg-light">  
  <form action="" method="POST">
  <div class="row justify-content-center">
    
    <div class="shadow-lg col-sm-5 m-b-100 m-t-100 p-4 bg-white rounded">
      <h4 class="ltext-102 cl5 mb-4 mt-2 text-center">Change Your Password</h4>
     
      <div class="form-group">    
        <label>Old Password:</label>
        <input class="form-control" type="password" name="oldpass" required autofocus>
      </div>
      
      <div class="form-group">
        <label>New Password:</label>
        <input class="form-control" type="password" name="newpass" required>
      </div>

      <div class="form-group">
        <label>Confirm New Password:</label>
        <input class="form-control" type="password" name="cnewpass" required>
      </div>
      

      <div class="mt-4">
        <a href="editprofile.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnUpdate">Change</button>
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
  

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
      $description = $_POST['description'];
      $address = $_POST['address'];  
      $region = $_POST['region'];  
      $province = $_POST['province'];  
      $website = $_POST['website'];  
      $email = $_POST['email'];  
      $number = $_POST['number'];   
      $id=$_SESSION['NGOID'];
      $sql = "UPDATE ngo SET NGODesc='$description', NGOAddr='$address', NGORegion='$region',NGOWebsite='$website',NGOEmail='$email',NGOContactNo='$number',NGOProvince='$province' WHERE NGOName = '$id'";
      $update = mysqli_query ($conn, $sql);
      if($update){
        echo "<script>alert('Successfully Updated!');</script>";
        echo '<script>window.location="editngo.php"</script>'; 
      }
  }
    ?>
    
  
  <section class="col-sm-12 bg-light">  
  <?php $id=$_SESSION['NGOID']?>

     <?php
          $res = mysqli_query($conn, "SELECT * FROM ngo where NGOName='$id'");
          $row = mysqli_fetch_assoc($res);
          
     ?> 
  <form action="" method="POST">
  <div class="row justify-content-center">
    
    <div class="shadow-lg col-sm-5 m-b-100 m-t-100 p-4 bg-white rounded">
     <h4 class="ltext-102 cl5 mb-4 mt-2 text-center">Update NGO Profile</h4>
      <div class="form-group">    
        <label>NGO Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo $row['NGOName'] ?>" disabled>
      </div>

       <div class="form-group">    
        <label>Description</label>
        <input class="form-control" type="text" name="description" value="<?php echo $row['NGODesc'] ?>">
      </div>
      

      <div class="form-group">    
        <label>Address</label>
        <input class="form-control" type="text" name="address" value="<?php echo $row['NGOAddr'] ?>" >
      </div>

      <div class="form-group">    
        <label>Region</label>
        <input class="form-control" type="text" name="region" value="<?php echo $row['NGORegion'] ?>">
      </div>

      <div class="form-group">    
        <label>Province</label>
        <input class="form-control" type="text" name="province" value="<?php echo $row['NGOProvince'] ?>">
      </div>

      <div class="form-group">    
        <label>Website</label>
        <input class="form-control" type="text" name="website" value="<?php echo $row['NGOWebsite'] ?>">
      </div>

      <div class="form-group">
        <label>Password</label>
        <div class="input-group">
        <input class="form-control" type="password" name="password" value="<?php echo $row['password'] ?>" readonly>
         <div class="input-group-append">
            <a class="text-secondary hover-white" href="ngochangepass.php">
            <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" style="border-color: #ccc;" type="button">Change</button>
          </a>
          </div>
        </div>
      </div>


      <div class="form-group">    
        <label>Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo $row['NGOEmail'] ?>">
      </div>

      <div class="form-group">    
        <label>Contact Number</label>
        <input class="form-control" type="number" name="number" value="<?php echo $row['NGOContactNo'] ?>">
      </div>

      

      <div class="form-group">    
        <label>BIR Certificate Number</label>
        <input class="form-control" type="text" name="bir" value="<?php echo $row['BIRCerNo'] ?>" readonly>
      </div>

     

      <div class="mt-4 m-b-100">
        <a href="ngohome.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnUpdate">Update</button>
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
  

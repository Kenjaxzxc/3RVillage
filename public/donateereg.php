<?php 
  session_start();
?>

<?php 
  include('connection.php'); 
?>

<?php 
  
  if(isset($_POST['btnReg'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $website = $_POST['website'];
    $bir = $_POST['bir'];
    $datecer = $_POST['datecer'];
    $dateexp = $_POST['dateexp'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $target = "../proof/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    if ($password != $cpassword) {
     echo "<script>alert('Password did not match.');</script>";
    }
    else{
    $sql = "INSERT INTO ngo (NGOName, NGODesc, NGOAddr, NGORegion, NGOProvince, NGOEmail, NGOContactNo, NGOWebsite, BIRCerNo, DateCert, Expiration, NGOProof, password) VALUES ('$name', '$description', '$address', '$region', '$province', '$email', '$contactno', '$website', '$bir', '$datecer', '$dateexp', '$image', '$password')";
        mysqli_query($conn, $sql);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "<script>alert('Thank you for registering. Please wait to be confirm!');</script>";
        echo "<script>window.location='ngolog.php'</script>";
        }
    }
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>3RVillage</title>
  <?php include('link.php');?>
  </head>
  <style>
  #textred {
    color:red;
  }
    
  </style>
<body class="bg-light">

    <header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <!-- Topbar -->
      <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
          <div class="left-top-bar">
            
          </div>

          <div class="right-top-bar flex-w h-full">
            <a href="#" class="flex-c-m trans-04 p-lr-25">
              Help & FAQs
            </a>

            <a href="register.php" class="flex-c-m trans-04 p-lr-25">
              Register
            </a>

            <a href="login.php" class="flex-c-m trans-04 p-lr-25">
              Login
            </a>
            <a href="#" class="dropdown-toggle flex-c-m trans-04 p-lr-25" data-toggle="dropdown">
              NGO
            </a>
            <div class="dropdown-menu bg-dark " style="z-index:5000; position: relative;">
                  <a class="dropdown-item" href="ngolog.php">Login</a>
                  <a class="dropdown-item" href="donateereg.php">Register</a>
                  <!--
                  <a class="dropdown-item" href="cart.php"><span class="zmdi zmdi-shopping-cart"></span> My Cart</a> -->
               </div>
          </div>
        </div>
      </div>
      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">
          
          <!-- Logo desktop -->   
          <a href="index.php" class="logo">
            <img src="../images/icons/logo-33.png" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="active-menu">
                <a href="login.php">Home</a>
              </li>

              <li>
                <a href="login.php">Shop</a>
              </li>

              <li>
                <a href="login.php">Sell</a>
              </li>

              <li>
                <a href="login.php">Donate</a>
              </li>

              <li>
                <a href="login.php">Wishlist</a>
              </li>
            </ul>
          </div>        
        </nav>
      </div>  
    </div>
  </header> 


<section class="col-sm-12 bg-light">  
  
  <div class="row">
   <h4 class="ltext-102 cl5 m-t-100 mx-auto m-b-30 ">NGO Register</h4>
      
  </div>
  <form id="uploadimage" action="" method="POST" enctype="multipart/form-data">
  <div class="row justify-content-center">
    
    <div class="col-sm-5">
     
      <div class="form-group">
      <label>NGO Name</label>    
        <input class="form-control" type="text" name="name" placeholder="NGO Name" required autofocus>
      </div>

      <div class="form-group">
      <label>Address</label>    
        <input class="form-control" type="text" name="address" placeholder="Address" required>
      </div>

       <div class="form-group">
       <label>Region</label>    
        <input class="form-control" type="text" name="region" placeholder="Region" required>
      </div>

       <div class="form-group">
       <label>Province</label>    
        <input class="form-control" type="text" name="province" placeholder="Province" required>
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="3" placeholder="Description" required></textarea>
      </div>

      <div class="form-group">
      <label>Password</label>    
        <input class="form-control" type="password" name="password" placeholder="Password" required>
      </div>

      <div class="form-group">
      <label>Confirm Password</label>    
        <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" required>
      </div>

       <div class="form-group">
       <label>Email</label>    
        <input class="form-control" type="email" name="email" placeholder="Email" required>
      </div>

       <div class="form-group">
       <label>Contact Number</label>    
        <input class="form-control" type="number" name="contactno" placeholder="Contact Number" required>
      </div>

       <div class="form-group">
       <label>Website</label>    
        <input class="form-control" type="text" name="website" placeholder="Website" required>
      </div>

       <div class="form-group">
       <label>BIR Certificate Number</label>    
        <input class="form-control" type="number" name="bir" placeholder="BIR Certificate Number" required>
      </div>

       <div class="form-group">   
       <label>Date Certified</label> 
        <input class="form-control" type="date" name="datecer" placeholder="Date Certified" required>
      </div>

      <div class="form-group"> 
      <label>Date Expire</label>  
        <input class="form-control" type="date" name="dateexp" placeholder="Date Expire" required>
      </div>
    
      


      <div class="mt-4 m-b-100">
        <a href="index.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnReg">Register</button>
      </div>
    </div>

    <div class="col-sm-5 ml-5">
             
            <div id="selectImage">
            <img src="../images/default2.jpg" class="img border border-info rounded" id="previewing1" style="cursor:pointer" width="160" height="200" />
            <input type="file" id="image" name="image" style="display:none" multiple/>
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
  
 <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
  </script>

  <script type="text/javascript">
$("#previewing1").click(function () {
    $("#image").trigger('click');
});


function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewing1').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(function(){
  $("input[name=image]").change(function(){
    readURL1(this);
  });
});
</script>

<script type="text/javascript">
 $(document).ready(function(){  
      $('#btnSave').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Upload Credentials");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
</script>
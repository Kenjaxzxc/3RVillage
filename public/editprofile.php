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
      if(isset($_POST['btnUpdate'])){
      $email = $_POST['email'];
      $contact = $_POST['contact'];  
      $id=$_SESSION['accountid'];
      $verify = $_POST['verify']; 
      $sql = "UPDATE account SET email='$email', contactno ='$contact' WHERE username = '$id'";
      mysqli_query ($conn, $sql);
      echo "<script>alert('Successfully Updated!');</script>";
      echo '<script>window.location="editprofile.php"</script>'; 

      if(isset($_SESSION['verificationCode'])){
          $code = $_SESSION['verificationCode'];
          if($verify == $code){
          unset($_SESSION['verificationCode']);
      $sql = "UPDATE account SET email='$email', contactno ='$contact' WHERE username = '$id'";
            mysqli_query ($conn, $sql);
            echo "<script>alert('Successfully Updated!');</script>";
            echo '<script>window.location="editprofile.php"</script>'; 
          }
          else{
            echo "<script>alert('Incorrect Verification Code');</script>";
          }
       }
       }

       if(isset($_POST['sendupdateNumber'])){
        $rand = rand(111111,999999);
        $message = "Your verification code is: ".$rand;

        require 'autoload.php';


        $array_fields['phone_number'] = $_POST['contactupdate'];
        $array_fields['message'] = $message;
        $array_fields['device_id'] = 102126;

        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTUzNzI0NzUxMiwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjU3ODI0LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.YvuWk34SW-nwZxnKyI7dUUoI1NU57ofA6IJIgmFbsqI";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
            CURLOPT_HTTPHEADER => array(
                "authorization: $token",
                "cache-control: no-cache"
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }else{
          $_SESSION['verificationCode'] = $rand;
        }
      }  

   ?>
  
  <section class="col-sm-12 bg-light">  
  <?php $id=$_SESSION['accountid']?>

     <?php
          $res = mysqli_query($conn, "SELECT * FROM account where username='$id'");
          while($row=$res->fetch_array()){
          
     ?> 
  <form action="" method="POST">
  <div class="row justify-content-center">
    
    <div class="shadow-lg col-sm-5 m-b-100 m-t-100 p-4 bg-white rounded">
     <h4 class="ltext-102 cl5 mb-4 mt-2 text-center">Update Profile</h4>
      <div class="form-group">    
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="<?php echo $row['firstname']." ".$row ['lastname'] ?>" disabled>
      </div>

       <div class="form-group">    
        <label>Email Address</label>
        <input class="form-control" type="email" name="email" value="<?php echo $row['email'] ?>">
      </div>
    
      <div class="form-group">
        <label>Password</label>
        <div class="input-group">
        <input class="form-control" type="password" name="password" value="<?php echo $row['password'] ?>" disabled>
         <div class="input-group-append">
            <a class="text-secondary hover-white" href="changepassword.php">
            <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" style="border-color: #ccc;" type="button">Change</button>
          </a>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Phone Number</label>
        <div class="input-group">
        <input class="form-control" type="text" name="contact" value="<?php echo $row['contactno'] ?>">
         <div class="input-group-append">
            <button id="updateNumber" class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" style="border-color: #ccc;" type="button">Send</button>
          </div>
        </div>
      </div>

      <div class="form-group">    
        <label>Verification Code</label>
        <input class="form-control" type="text" name="verify" value="" readonly>
      </div>

      <div class="mt-4 m-b-100">
        <a href="home.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnUpdate">Update</button>
      </div>
      <?php
        }
      ?>
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
  

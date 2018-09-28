

<?php 
  include('connection.php'); 
  include 'admin_header.php';
  if(isset($_GET['accept'])){
    $id = $_GET['accept'];
    $sql = mysqli_query($conn,"UPDATE ngo SET status = 1 WHERE NGOID = '$id'");
    if($sql){
      $rand = rand(111111,999999);
    $message = "Your verification code is: ".$rand;

    require 'autoload.php';


    $array_fields['phone_number'] = $_GET['number'];
    $array_fields['message'] ="Your application to be verified has been approved. Thanks!";
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
  }
  if(isset($_GET['decline'])){
    $id = $_GET['decline'];
    $sql = mysqli_query($conn,"UPDATE ngo SET status = 3 WHERE NGOID = '$id'");
    if($sql){
      $rand = rand(111111,999999);
    $message = "Your verification code is: ".$rand;

    require 'autoload.php';


    $array_fields['phone_number'] = $_GET['number'];
    $array_fields['message'] ="Sorry we found that your application is not valid. AGIK!";
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
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>3RVillage</title>
  <?php include('link.php');?>
  </head>
  
<body class="bg-light">
  
  <div class="row px-5 py-3 border m-t-100">
      <div class="col-sm-12"  >
        <?php 
        $dom = null;
        $sql = mysqli_query($conn,"SELECT * FROM ngo WHERE status = 0");
        while ($res = mysqli_fetch_assoc($sql)) {
          $builder = 
          '
          <div class="col-sm-2">
            <div class="row justify-content-center" >
            </div>
          </div>
          <div class="col-sm-10">
            <div class="row">
              <h5>'.$res['NGOName'].'</h5>
            </div>
            <div class="row">
              <label>Description: '.$res['NGODesc'].'</label>
            </div>
            <div class="row">
              <label>Address: '.$res['NGOAddr'].'</label>
            </div>
            <div class="row">
              <img style="width:100px; height:100px;" src="../images/'.$res['NGOProof'].'">
            </div>
          </div>
        </div>
        <div class="row justify-content-center py-3">
          <a class="btn btn-success" href="?accept='.$res['NGOID'].'&number='.$res['NGOContactNo'].'">Accept</a>
          <a class="btn btn-danger" href="?decline='.$res['NGOID'].'&number='.$res['NGOContactNo'].'">Decline</a>
        </div>
      </div>
          ';
        $dom .=$builder;
        }

        echo $dom;
        ?>

  
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
  

<?php 
  include('connection.php'); 
      include('header.php');
  $trueID = $user_id;$subID='';
  if(!empty($_GET['category'])){
    $subID = $_GET['category'];
    $post = 0; $amount=0;
    if($subID == 1){
      $post = 50;
      $amount = $post * 2;

    }
    else if($subID == 2){
      $post = 100;
      $amount = $post * 2;
    }
  }
  if(!empty($_GET['cnum']) && !empty($_GET['cvc']) && !empty($_GET['subid'])){
    $cnum = $_GET['cnum']; $cvc = $_GET['cvc']; $subID = $_GET['subid'];
    $sql = mysqli_query($conn,"SELECT * FROM `subscriptiontype` WHERE `subscriptionID` = '$subID'");
    $res = mysqli_fetch_assoc($sql);
    $postLimit = $res['postLimit'];
    unset($sql);
    $sql = "SELECT `remaining` from `subscribed` WHERE `userid` = '$trueID'";
    $result = mysqli_query($conn, $sql);
    $getRemainingPost = mysqli_fetch_assoc($result)["remaining"];
    $new = $getRemainingPost + $postLimit;
    $history = "INSERT INTO `subscriptionhistory`(userid,subscriptiontype,oldRemain,newRemain, card_num, amount) VALUES('$trueID','$subID','$getRemainingPost','$new', '$cnum','$cvc')";
    mysqli_query($conn,$history);
    
    // $history = "INSERT INTO `subscriptionhistory`(userid,subscriptiontype,oldRemain,newRemain, card_num, amount) VALUES('$trueID','$subID','$getRemainingPost','$new', '$cnum','$cvc')";
    // mysqli_query($conn,$history);

    $sql = "UPDATE subscribed SET remaining='$new' WHERE userid = '$trueID'";
    mysqli_query ($conn, $sql);
    echo "<script>window.location='sell.php';</script>";

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>3RVillage</title>
  <?php
   include('link.php');

  ?>
  </head>
  <style>
  #textred {
    color:red;
  }
    
  </style>
<body class="bg-light">

    <div class="container pt-5 mt-3 ">
      <div class="row">
          <!-- You can make it whatever width you want. I'm making it full width
               on <= small devices and 4/12 page width on >= medium devices -->
          <div class="col-md-12 p-5">
              <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box col-md-4">
                <div class="panel-heading display-table" >
                    <div class="row">
                      <h3 class="panel-title display-td" >Amount: <?php echo $amount; ?></h3>
                      &nbsp;&nbsp;&nbsp;
                      <h3 class="panel-title display-td" > Post: <?php echo $post; ?></h3>
                    </div>  
                    <div class="row" >                            
                      <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                    </div>                  
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input type="hidden" name="subid" value="<?php echo $subID ?>">
                                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button onclick="pay('input[name=cardNumber]', 'input[name=amount]','input[name=subid]' )"  class="subscribe btn btn-success btn-lg btn-block" type="button">Start Subscription</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>  
                    </form>
                </div>
                <div class="panel-footer">
                    <div>
                      
                    </div>
                </div>
            </div>  
          </div>  
      </div>   
    </div>     


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
  

<script type="text/javascript">
  function pay(cnum, cvc, subid){
    var cnum = $(cnum).val();
    var cvc = $(cvc).val();
    var subid = $(subid).val();
    //alert(subid);
      let accept = confirm("Are you sure you want to proceed to this subscription?");
    if(accept == true){
      window.location="?cnum="+cnum+"&cvc="+cvc+"&subid="+subid;
    }
  }


</script>


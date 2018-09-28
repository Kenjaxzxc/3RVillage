<?php 
$getRemainingPost = $disableButton = null;
  include('connection.php'); 
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

    <?php 
     include('header.php');
    ?>

    <?php
    $trueSession = $_SESSION['user_id'];
     $sql = "SELECT `remaining` from `subscribed` WHERE `userid` = '$trueSession'";
      $result = mysqli_query($conn, $sql);
      $getRemainingPost = mysqli_fetch_assoc($result);
      $disableButton = ($getRemainingPost['remaining'] <= 0 ? "disabled":"");
     $sessionID = $_SESSION['accountid']; 
     $id = mysqli_query($conn,"SELECT accountid FROM `account` WHERE username = '$sessionID'")->fetch_object()->accountid;
     if(isset($_POST['btnSave'])){

      if($getRemainingPost['remaining'] > 0){

    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price']; 
    $expprice = $_POST['expprice']; 
    $brand = $_POST['brand']; 
    $style = $_POST['style']; 
    $color = $_POST['color'];  
    $target1 = "../upload/".basename($_FILES['image1']['name']);
    $image1 = $_FILES['image1']['name'];
      unset($sql);
      $sql = "INSERT INTO itemsell(SItemTitle, SItemCat, SItemDesc, SItemLocation, SItemPrice, ExpectedPrice, SItemBrand, SItemStyle, SItemColor, SItemImages1, accountid) VALUES('$title','$category','$description','$location','$price','$expprice','$brand','$style','$color','$image1','$id')";
              $insert = mysqli_query($conn, $sql);
      move_uploaded_file($_FILES['image1']['tmp_name'], $target1);
              if($insert){
                $newCount = ($getRemainingPost['remaining'] > 0? $getRemainingPost['remaining']-1:0);
                $sql = "UPDATE subscribed SET remaining='$newCount' WHERE userid = '$trueSession'";
                mysqli_query ($conn, $sql);
              }
              
              
                echo "<script>window.location='sell.php'</script>";

      unset($sql);     
      }
      else{
        echo "you need subscription";
      }
}
      ?> 


<section class="col-sm-12 bg-light">  
  
  <div class="row">
   <h4 class="ltext-102 cl5 m-t-100 m-l-100 m-b-30">Sell Item</h4>
      
  </div>
  <form id="uploadimage" action="" method="POST" enctype="multipart/form-data">
  <div class="row justify-content-center">
    
    <div class="col-sm-5">
     
      <div class="form-group">    
        <label>Item Name </label>
        <input class="form-control" type="text" name="title" required autofocus <?=$disableButton;?>>
      </div>

      <?php 
      include('category.php');
      ?>
       <div class="row"> 
      <div class="col-md-3 mb-3">
        <label>Brand</label>
        <input type="text" class="form-control" name="brand" required <?=$disableButton;?>>
      </div>
      <div class="col-md-3 mb-3">
        <label>Style</label>
        <input type="text" class="form-control" name="style" <?=$disableButton;?> >
      </div>
      <div class="col-md-3 mb-3">
        <label>Color</label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="color" <?=$disableButton;?> >
          <option>Red</option>
          <option>Pink</option>
          <option>Orange</option>
          <option>Yellow</option>
          <option>Purple</option>
          <option>Green</option>
          <option>Blue</option> 
          <option>Brown</option>
          <option>White</option>
          <option>Grey</option>
          <option>Black</option>
        </select>
      </div>
      </div>
      <div class="form-group">
        <label>Item Description</label>
        <textarea class="form-control" name="description" rows="3" required <?=$disableButton;?>></textarea>
      </div>

        <!-- <div class="form-group">    
        <label>Item Name </label>
        <input class="form-control" type="text" name="title" required autofocus <?=$disableButton;?>>
      </div> -->

<label>Price</label>
        <div class="input-group form-group">

        
        
        <span class="input-group-addon">₱</span>
        <input class="form-control" type="text" name="price" placeholder="Price" required <?=$disableButton;?>>
      </div>

      <label>Original Price</label>
      <div class="input-group">
        
        <span class="input-group-addon">₱</span>
        <input class="form-control" type="text" name="expprice" placeholder="Original Price" <?=$disableButton;?>>
      </div>

      <?php 
      include('location.php');
      ?>

      <div class="mt-4 m-b-100">
        <a href="home.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" <?=$disableButton;?> id="btnSave" name="btnSave">Post</button>
      </div>
    </div>

    <div class="col-sm-5 mr-5">
      <?php $remaining = $getRemainingPost['remaining']; ?>
      <div class="container h4"><?=($getRemainingPost['remaining'] > 0 ?"You have $remaining remaining post left." : 'You need to subscribe to continue posting' )?> <a href="subscribe.php" class="btn btn-danger">Click Here to Subscribe</a></div>
      <h5 class=" ltext-101 mt-3">Upload Image</h5>
      <span><b>Note:</b> Only <b><a id="textred">jpeg</a></b>, <b><a id="textred">jpg</a></b> and <b><a id="textred">png</a></b> Images file format are allowed and approximately <b><a id="textred">100kb</a></b> files can be uploaded.</span> 

             
            <div class="m-b-150">
            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing1" style="cursor:pointer" width="170" height="200" />
            <input type="file" id="image1" name="image1" style="display:none"/>
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


<!-- 1st -->
  <script type="text/javascript">
$("#previewing1").click(function () {
    $("#image1").trigger('click');
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
  $("input[name=image1]").change(function(){
    readURL1(this);
  });
});
</script>

<script type="text/javascript">
 $(document).ready(function(){  
      $('#btnSave').click(function(){  
           var image_name = $('#image1').val();  
           if(image_name == '')  
           {  
                alert("Please Upload Photos");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image1').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image1').val('');  
                     return false;  
                }  
           }  
      });  
 });  
</script>

<!-- 2nd -->
 <script type="text/javascript">
$("#previewing2").click(function () {
    $("#image2").trigger('click');
});


function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewing2').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(function(){
  $("input[name=image2]").change(function(){
    readURL2(this);
  });
});
</script>

<!-- 3rd -->
 <script type="text/javascript">
$("#previewing3").click(function () {
    $("#image3").trigger('click');
});


function readURL3(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewing3').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(function(){
  $("input[name=image3]").change(function(){
    readURL3(this);
  });
});
</script>

<!-- 4th -->

 <script type="text/javascript">
$("#previewing4").click(function () {
    $("#image4").trigger('click');
});


function readURL4(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewing4').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(function(){
  $("input[name=image4]").change(function(){
    readURL4(this);
  });
});
</script>

<!-- 5th -->

 <script type="text/javascript">
$("#previewing5").click(function () {
    $("#image5").trigger('click');
});


function readURL5(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewing5').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(function(){
  $("input[name=image5]").change(function(){
    readURL5(this);
  });
});
</script>

<!-- 6th -->

 <script type="text/javascript">
$("#previewing6").click(function () {
    $("#image6").trigger('click');
});


function readURL6(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewing6').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(function(){
  $("input[name=image6]").change(function(){
    readURL6(this);
  });
});
</script>
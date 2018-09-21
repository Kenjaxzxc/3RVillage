<?php 
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
     $sessionID = $_SESSION['accountid']; 
     $id = mysqli_query($conn,"SELECT accountid FROM `account` WHERE username = '$sessionID'")->fetch_object()->accountid;
     if(isset($_POST['btnSave'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price']; 
    $target = "../upload/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $sql = "INSERT INTO itemdonate (DItemTitle, DItemCat, DItemDesc, DItemLocation, DItemPrice, DItemImages, accountid) VALUES ('$title','$category','$description','$location','$price','$image','$id')";
              mysqli_query ($conn, $sql);
              if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                echo "<script>window.location='home.php'</script>";
              }
              
      }
      ?> 


<section class="col-sm-12 bg-light">  
  
  <div class="row">
   <h4 class="ltext-102 cl5 m-t-100 m-l-100 m-b-30">Donate Item</h4>
      
  </div>
  <form id="uploadimage" action="" method="POST" enctype="multipart/form-data">
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
        <label>Item Description</label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
      </div>
      
       <label>Item Specification</label>
    <div class="row">
      <div class="col-md-3 mb-3">
        <label for="validationCustom03">Brand</label>
        <input type="text" class="form-control" placeholder="Brand" required>
      </div>
    
      <div class="col-md-3 mb-3">
        <label for="validationCustom03">Style</label>
        <input type="text" class="form-control" placeholder="Style" required>
      </div>
    
      <div class="col-md-3 mb-3">
        <label for="validationCustom03">Color</label>
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelectPref">
          <option selected>---</option>
          <option value="1">RED</option>
          <option value="2">PINK</option>
          <option value="3">ORANGE</option>
          <option value="4">YELLOW</option>
          <option value="5">PURPLE</option>
          <option value="6">GREEN</option>
          <option value="7">BLUE</option>
          <option value="8">BROWN</option>
          <option value="9">WHITE</option>
          <option value="10">GREY</option>
        </select>
      </div>
      <div class="col-md-3 mb-3">
          <label for="validationCustom03"> Quantity </label>
          <input type="text" class="form-control" placeholder="quantity" required>
        </div>
      </div>

      <?php 
      include('location.php');
      ?>
      <div class="mt-4 m-b-100">
        <a href="home.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnSave">Post</button>
      </div>
    </div>

    <div class="col-sm-5 mr-5">
      <h5 class=" ltext-101 mt-3">Upload Images</h5>
      <span><b>Note:</b> Only <b><a id="textred">jpeg</a></b>, <b><a id="textred">jpg</a></b> and <b><a id="textred">png</a></b> Images file format are allowed and approximately <b><a id="textred">100kb</a></b> files can be uploaded.</span> 

             
            <div class="m-b-150">
            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing1" style="cursor:pointer" width="170" height="200" />
            <input type="file" id="image1" name="image1" style="display:none"/>

            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing2" style="cursor:pointer" width="170" height="200" />
            <input type="file" id="image2" name="image2" style="display:none"/>

            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing3" style="cursor:pointer" width="170" height="200" />
            <input type="file" id="image3" name="image3" style="display:none"/>

            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing4" style="cursor:pointer" width="170" height="200" />
            <input type="file" id="image4" name="image4" style="display:none"/>

            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing5" style="cursor:pointer" width="170" height="200" />
            <input type="file" id="image5" name="image5" style="display:none"/>

            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing6" style="cursor:pointer" width="170" height="200" />
            <input type="file" id="image6" name="image6" style="display:none"/>
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
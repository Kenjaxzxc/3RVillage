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
    $id = $_GET['id'];
    if(isset($_POST['btnUpdate'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $sql = "UPDATE itemsell SET SItemTitle='$title', SItemCat='$category', SItemDesc ='$description',  SItemLocation ='$location',
     SItemPrice ='$price' WHERE ItemSellID = '$id'";
              $result = mysqli_query ($conn, $sql);
             
              echo "<script>alert('Successfully Updated!');</script>";
              echo "<script>window.location='mypost.php'</script>";
      }
      ?> 

<section class="col-sm-12 bg-light">  
  <?php 
          $id = $_GET['id'];
          $res = mysqli_query($conn, "SELECT * FROM itemsell WHERE ItemSellID = '$id'");
          while ($row = mysqli_fetch_array($res)){  
        
     ?> 
     
  <div class="row">
   <h4 class="ltext-102 cl5 m-t-100 m-l-100 m-b-30">Sell Item</h4>
      
  </div>
  <form id="uploadimage" action="" method="POST" enctype="multipart/form-data">
  <div class="row justify-content-center">
    
    <div class="col-sm-5">
     
      <div class="form-group">    
        <label>Title </label>
        <input class="form-control" type="text" name="title" value=" <?php echo $row['SItemTitle'] ?>">
      </div>
      <?php 
      include('category.php');
      ?>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="3"><?php echo $row['SItemDesc'] ?></textarea>
      </div>
      <?php 
      include('location.php');
      ?>
      <div class="form-group">
        <label>Price</label>
        <input class="form-control" type="text" name="price" value=" <?php echo $row['SItemPrice'] ?>">
      </div>

      <div class="mt-4 m-b-100">
         <a href="mypost.php"><button type="button" class="stext-106 btn btn-outline-secondary float-right" id="btnCancel">Cancel</button></a>
        <button type="submit" class="stext-106 btn btn-success float-right mr-2" id="btnSave" name="btnUpdate">Update</button>
      </div>
    </div>

    <div class="col-sm-5">
      <h5 class=" ltext-101 mt-3">Upload Images</h5>
      <span><b>Note:</b> Only <b><a id="textred">jpeg</a></b>, <b><a id="textred">jpg</a></b> and <b><a id="textred">png</a></b> Images file format are allowed and approximately <b><a id="textred">100kb</a></b> files can be uploaded.</span> 

             
            <div id="selectImage">
            <img src="../images/default.jpg" class="img border border-info rounded mt-4" id="previewing1" style="cursor:pointer" width="160" height="200" />
            <input type="file" id="image" name="image" style="display:none" multiple/>
            </div>
     </div>
     <?php } ?>
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

<!-- <script type="text/javascript">
 $(document).ready(function(){  
      $('#btnSave').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
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
</script> -->
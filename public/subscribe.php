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
$rating = $new = null;
  include('connection.php');
  
?>


<section class="col-sm-12 m-t-100 bg-light">  
  
  <div class="container mb-5">
      <form>
        <div class="mx-auto">
          <img src="../images/50.png" onclick="sub1()" class="ml-5 cursor" width="500" height="500">
          <img src="../images/100.png" onclick="sub2()" class="ml-5 cursor" width="500" height="500">
      </div>
      </form>
    </div>
</section>

<?php
   include('footer.php');
?>

<script type="text/javascript">
  function sub1(){
    let accept = confirm("Are you sure you want to proceed to this 50 post subscription?");
    if(accept == true){
      window.location="payments.php?category=1";
    }
  }

  function sub2(){
    let accept = confirm("Are you sure you want to proceed to this 100 post subscription?");
    if(accept == true){
      window.location="payments.php?category=2";
    }
  }

</script>
  
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
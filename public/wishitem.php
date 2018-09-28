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
      $name="";$id='';$wishlist='';
      if(isset($_GET['id']) ){
      	$id = $_GET['id'];
      	//USER INFO
      	$sql = "SELECT * FROM account WHERE accountid = '$id'"; 
	    $result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if($row){
			$name = $row['firstname'].' '.$row['lastname'];
		}

		$sql3 = "SELECT * FROM wishlist WHERE accountid='$id' ORDER BY _date desc";
		$res3 = mysqli_query($conn, $sql3);
  		
  		while($value = mysqli_fetch_assoc($res3)){ 
  			$wishlist .= '
    <div class="shadow-lg col-sm-4 p-2 bg-white rounded mb-5 isotope-item *">
        <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Name:</label></strong>
        </div>
        <div class="col-sm-8 ">
          <label><strong>'.$value['WLName'].'</strong></label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Wanted:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$value['WLWant'].'</label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
         <strong><label>Message:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$value['WLMessage'].'</label>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="row justify-content-center py-3">
          <a href="Message.php?id='.$value['accountid'].'"><button type="button" class="btn btn-success mr-2">Message</button></a>
          
        </div>
      </div>
     </div>
    </div>
    ';
  		}

	
      }
      	
		
   ?>
   <div class="container" style="margin-top: 110px;">
   	
  	<div class="row">
  		<div class="col-md-12 ">
  			<div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 mb-5">
		        <h3 class="ltext-103 cl5">
		          <?php echo $name ?>
		        </h3>
	       

	        </div>

  		</div>
  		<div class="col-md-12">

        <h3 class="mb-4">Wishlist:</h3>
  			<ul>
          	<?php echo $wishlist; ?>
          </ul>
  		</div>
  	</div>
   </div>

        
    <div style="margin-top: 80px"></div>
    <?php
      include('sub_products.php');
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
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
  </script>
<!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/slick/slick.min.js"></script>
  <script src="../js/slick-custom.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/parallax100/parallax100.js"></script>
  <script>
        $('.parallax100').parallax100();
  </script>
<!--===============================================================================================-->
  <script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
  <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
  </script>
<!--===============================================================================================-->
  <script src="../vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/sweetalert/sweetalert.min.js"></script>
  
  <script>
    $('.js-addwish-b2').on('click', function(e){
      e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
      var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
      });
    });

    $('.js-addwish-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
      });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to cart !", "success");
      });
    });
  	
  </script>
  <script type="text/javascript">
  	
 $(document).ready(function () {
  
  function setRating(rating) {
  	if(rating > 0){
  		 $('#rating-input').val(rating);
	    $('#rating-span').html('Rate: '+rating);
	    // fill all the stars assigning the '.selected' class
	    $('.rating-star').removeClass('fa-star-o').addClass('selected');
	    // empty all the stars to the right of the mouse
	    $('.rating-star#rating-' + rating + ' ~ .rating-star').removeClass('selected').addClass('fa-star-o');
  	}
  	else{
  		alert('Please rate atleast 1');
  	}
   
  }
  
  $('.rating-star')
  .on('mouseover', function(e) {
    rating = $(e.target).data('rating');
    // fill all the stars
    $('.rating-star').removeClass('fa-star-o').addClass('fa-star');
    // empty all the stars to the right of the mouse
    $('.rating-star#rating-' + rating + ' ~ .rating-star').removeClass('fa-star').addClass('fa-star-o');
  })
  .on('mouseleave', function (e) {
    // empty all the stars except those with class .selected
    $('.rating-star').removeClass('fa-star').addClass('fa-star-o');
  })
  .on('click', function(e) {
     rating = $(e.target).data('rating');
    setRating(rating);
  })
  .on('keyup', function(e){
    // if spacebar is pressed while selecting a star
    if (e.keyCode === 32) {
      // set rating (same as clicking on the star)
       rating = $(e.target).data('rating');
      setRating(rating);
    }
  });
});
  </script>
<!--===============================================================================================-->
  <script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function(){
      $(this).css('position','relative');
      $(this).css('overflow','hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function(){
        ps.update();
      })
    });

  </script>
<!--===============================================================================================-->
  <script src="../js/main.js"></script>

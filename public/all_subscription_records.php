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
      include('admin_header.php');
    
      	$subscription = '';$remaining='';$sub_table=''; $id='';
		$sql3 = "SELECT DISTINCT(a.userid) , d.firstname, d.lastname, a.transactionStamp FROM subscriptionhistory a, subscriptiontype b, subscribed c, account d WHERE a.subscriptiontype = b.subscriptionID and a.userid=d.accountid GROUP BY a.userid Order by a.transactionStamp desc";
		$res3 = mysqli_query($conn, $sql3);
		
		while($row3 = mysqli_fetch_assoc($res3)){ 
			//$remaining = $row3['remaining'];
      $id = $row3['userid'];
			$subscription .= '<div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <a class="btn btn-link collapsed" data-toggle="collapse" href="#collapseTwo'.$id.'" aria-expanded="false" aria-controls="collapseTwo">
						          '.$row3['firstname'].' '.$row3['lastname'].'
						          
						        </a>
						        <span class="pull-right"> '.date('F j, Y', strtotime($row3['transactionStamp'])).'</span>
						      </h5>
						    </div>';
		       

      }  
		 	

		$sql5 = "SELECT * FROM account";
		$res5 = mysqli_query($conn, $sql5);
		
		while($row4 = mysqli_fetch_assoc($res5)){ 
		  $id=$row4['accountid'];

         //   $remaining = $row3['remaining'];
          $sub_table .= '
          <div id="collapseTwo'.$id.'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
            <table class="table table-stripped">
            <th>Name</th><th>Category</th> <th>Post Limit</th><th>Card Number</th><th>Amount</th><th>Date</th>';  
            $sql4 = "SELECT * FROM subscriptionhistory a, subscriptiontype b, subscribed c, account d WHERE a.subscriptiontype = b.subscriptionID and  a.userid='$id'  Order by a.transactionStamp desc";
          $res4 = mysqli_query($conn, $sql4);

          
          while($row4 = mysqli_fetch_assoc($res4)){ 

          $sub_table .='
            
              <tr>
                    <td>'.$row4['subscriptionName'].'</td>
                    <td>'.$row4['postLimit'].'</td>
                    <td>'.$row4['card_num'].'</td>
                    <td>'.$row4['amount'].'</td>
                    <td>'.date('F j, Y', strtotime($row4['transactionStamp'])).'</td>
                </tr>
              ';
          }
          $sub_table .= ' </table>
            </div>
          </div>';
		 
		}
   ?>
   <div class="container" style="margin-top: 110px;">
   	
  	<div class="row">
  		<div class="col-md-12 ">
  			<h3>Subscription List</h3><br>
  			<div class="accordion" id="accordionExample">
  
			  <div class="card">
			    <?php echo $subscription ?>
			    <?php echo $sub_table ?>

			  </div>
			  
			</div>

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
  <!-- <script src="../js/customJS.js"></script> -->

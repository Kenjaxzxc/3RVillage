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
      $name="";$id='';$rate=''; $all_rate=0;$seller_rate=0;$ave_rate=0;$feedback='';
      if(isset($_GET['id']) ){
        $id = $_GET['id'];
        //USER INFO
        $sql = "SELECT * FROM account WHERE accountid = '$id'"; 
      $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row){
      $name = $row['firstname'].' '.$row['lastname'];
    }

    //All Rate
    $sql1 = "SELECT SUM(rate) as ratings, COUNT(buyer_id) as count_user FROM review WHERE seller_id = '$id' ";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    if($row1){ 
      $all_rate = $row1['ratings'];
      $count_user = $row1['count_user'];  
    }
    //Rate by seller
    $sql2 = "SELECT SUM(rate) as seller_rate FROM review WHERE seller_id = '$id'";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    if($row2){ 
      $seller_rate = $row2['seller_rate'];  
    }
    if($seller_rate > 0 && $count_user > 0 ){
      $ave_rate = $seller_rate / $count_user;
    }
    

    $sql3 = "SELECT * FROM review a, account b WHERE a.buyer_id=b.accountid and a.seller_id = '$id'";
    $res3 = mysqli_query($conn, $sql3);
    
    while($row3 = mysqli_fetch_assoc($res3)){ 
      $feedback .= '<div class="col-md-12 mb-3" ><img src="../images/'.$row3['userpic'].'" class="rounded-circle" width="25" height="25"> '.$row3['firstname'].' : '.$row3['feedback'].'</div>';
    }
    //BUYER RATE
        $sql = "SELECT * FROM review  WHERE buyer_id = '$user_id' AND seller_id = '$id'";
    $res = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($res);
          if($row){ 
            if($row['rate'] > 0){
              $rate = '<button type="button" class="btn btn-info btn-lg" >You Rate: '.$row['rate'].' 
          <span class="fa fa-star checked"></span></button>'; 
            }
            
          }
          else{
            $sqll = "SELECT * FROM interested  WHERE user_id = '$user_id'";
          $ress = mysqli_query($conn, $sqll);
          $roww = mysqli_fetch_assoc($ress);
            if($roww){
              if ($id != $user_id) {
                $rate = '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Rate</button>';
              }
                
            }
          }

  
      }
      
   ?>
   <div class="container-fluid m-t-100">
        <div class="ltext-102 cl5 m-l-100">
          <h4>User Profile</h4>
        </div>
    <div class="row justify-content-center ">

      <div class="col-md-5 ">
        
        <div class="row border mt-5">
          <div class="col-md-3 p-2 " style="height: 150px;"> 
            <?php
            $sql23 = "SELECT * FROM account WHERE accountid = '$id'";
            $res23 = mysqli_query($conn, $sql23);
            while ($row23 = mysqli_fetch_assoc($res23)){ 
           ?>
            <img src="../images/<?php echo $row23['userpic']  ?>" class="rounded-circle">
            <?php 
              }
             ?>
          </div>
          <div class="offset-md-1 ml-5">
            <div class="row justify-content-center">
              <label class=""><h4><?php echo $name ?></h4></label>  
            </div>
            <div class="row justify-content-center">
               <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
            </div>  
              <div class="row justify-content-center">
                  <label class="text-center"><p><?php echo number_format($ave_rate,2); ?> Average rate base on <?php echo $count_user; ?> reviews.</p></label>
                  
              </div>
              <div class="text-center">
                  <p><?php echo $rate; ?></p>
                  </div>
          </div>
        </div>  
        <hr class="mt-5">
        <div class="row mt-2">
          <label>Feedback:</label>
        </div>          
        <div class="row">
          <div class="col d-flex ">
            
            <div class="row offset-md-0">
              <?php echo $feedback; ?>
            </div>  
          </div>
        </div>  
      </div>
    </div>
  </div>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" style="margin-top: 100px">

        <!-- Modal content-->
        <div class="modal-content">
        <form method="post" action="save_rate.php">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Modal Header</h4> -->
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="text-center">
                  <?php
                $sql5 = "SELECT * FROM account WHERE accountid = '$id'";
                $res5 = mysqli_query($conn, $sql5);
                while ($row5 = mysqli_fetch_assoc($res5)){ 
               ?>
                <img src="../images/<?php echo $row5['userpic']  ?>" class="rounded-circle" width="100" height="100">
                <?php 
                  }
                 ?>

                </div>
                <h3 class="ltext-103 cl5 text-center">
                  <?php echo $name ?>
                </h3><br>
                <div class="rating" role="optgroup">
                  <!-- in Rails just use 1.upto(5) -->  
                  <i class="fa fa-star-o fa-2x rating-star" id="rating-1" data-rating="1" tabindex="0" aria-label="Rate as one out of 5 stars" role="radio"></i>
                  <i class="fa fa-star-o fa-2x rating-star" id="rating-2" data-rating="2" tabindex="0" aria-label="Rate as two out of 5 stars" role="radio"></i>
                  <i class="fa fa-star-o fa-2x rating-star" id="rating-3" data-rating="3" tabindex="0" aria-label="Rate as three out of 5 stars" role="radio"></i>
                  <i class="fa fa-star-o fa-2x rating-star" id="rating-4" data-rating="4" tabindex="0" aria-label="Rate as four out of 5 stars" role="radio"></i>
                  <i class="fa fa-star-o fa-2x rating-star" id="rating-5" data-rating="5" tabindex="0" aria-label="Rate as five out of 5 stars" role="radio"></i>
            </div>
                <!-- hide the input -->  
                <div class="row">
                    <div class="col-md-3">
                    <p>Rate:</p>
                    </div>
                    <div class="col-md-3">
                      <input type="number" name="rating" id="rating-input" min="1" max="5" required="" />
                    </div>

                </div>
                <input type="hidden" name="buyer_id" value="<?php echo $user_id ?>" />
                <input type="hidden" name="seller_id" value="<?php echo $id ?>" />
                <p>Feed Back</p>
                <textarea class="form-control" name="feedback"  style="background: #d0d0d0;"></textarea>
              
              </div>
              <div class="col-md-3"></div>
          </div>
        </div>
          <div class="modal-footer">
            <div class="col-md-4"></div>
              <div class="col-md-4">
                <button type="submit" name="saveRate" class="btn btn-primary" style="width: 100%;">Rate</button>
              </div>
            <div class="col-md-4"></div>
            
          </div>
        </form>
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
  <script src="../js/customJS.js"></script>

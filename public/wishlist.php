<?php  
$sql = null;
$getData = null;
$linkClass = null;
  if(!isset($_GET['display'])){
    header("location: wishlist.php?display=all_products");
  }
  
  if(isset($_GET['display'])){
    $getData = htmlentities($_GET['display']);
      switch ($getData) {
      case 'all_products':
        $sql = "SELECT * FROM `wishlist`";
        $linkClass = '*';
        break;
      case 'apparels':
        $sql = "SELECT * FROM `wishlist` WHERE `WLCategory` = 'Apparels'";
        $linkClass = '.apparels';
        break;
      case 'accessories':
        $sql = "SELECT * FROM `wishlist` WHERE `WLCategory` = 'Accessories'";
        $linkClass = '.accessories';
        break;
      case 'bag':
        $sql = "SELECT * FROM `wishlist` WHERE `WLCategory` = 'Bag'";
        $linkClass = '.bag';
        break;
      case 'computers':
        $sql = "SELECT * FROM `wishlist` WHERE `WLCategory` = 'Computers'";
        $linkClass = '.computers';
        break;
      case 'appliances':
        $sql = "SELECT * FROM `wishlist` WHERE `WLCategory` = 'Appliances'";
        $linkClass = '.appliances';
        break;
      case 'gadgets':
        $sql = "SELECT * FROM `wishlist` WHERE `WLCategory` = 'Gadgets'";
        $linkClass = '.gadgets';
        break;
      case 'vehicles':
        $sql = "SELECT * FROM `wishlist` WHERE `WLCategory` = 'Vehicles'";
        $linkClass = '.vehicles';
        break;

      
      default:
       header("location: wishlist.php?display=all_products");
        break;
      }
  }
  ?>

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

  <!-- Product -->
   <section class="bg0 p-t-23 p-b-140 m-t-100 bg-light">
    <div class="container">
      <div class="p-b-10">
        <h3 class="ltext-103 cl5">
          Wishlist
        </h3>
      </div>

      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" href="?display=all_products" data-filter="*">
            All Products
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=apparels" data-filter=".apparels">
            Apparels
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=accessories" data-filter=".accessories">
            Accessories
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=bag" data-filter=".bag">
            Bag
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=computers" data-filter=".computers">
            Computers
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=appliances" data-filter=".appliances">
            Appliances
          </a>

          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=gadgets" data-filter=".gadgets">
            Gadgets
          </a>
          <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="?display=vehicles" data-filter=".vehicles">
            Vehicles
          </a>
        </div>

        <div class="flex-w flex-c-m m-tb-10">
        
          <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
            Search
          </div>

          <div class="ml-2">
            <a href="addwishlist.php" class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4">Add Wishlist</a>
          </div>
        </div>
        
        <!-- Search product -->
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
          <div class="bor8 dis-flex p-l-15">
            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
              <i class="zmdi zmdi-search"></i>
            </button>

            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
          </div>  
        </div>
      </div>

      <?php 
      $builder = $dom = null; 
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){   
          $builder = 
          '

    <div class="row">
    <div class="shadow-lg col-sm-4 p-2 bg-white rounded mb-5 isotope-item '.$linkClass.'">
        <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Name:</label></strong>
        </div>
        <div class="col-sm-8 ">
          <label><strong>'.$row['WLName'].'</strong></label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
          <strong><label>Wanted:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$row['WLWant'].'</label>
        </div>
      </div>

      <div class="row stext-105 cl3 p-b-5">
        <div class="col-sm-3">
         <strong><label>Message:</label></strong>
        </div>
        <div class="col-sm-8">
          <label>'.$row['WLMessage'].'</label>
        </div>
      </div>

      <div class="row justify-content-center">
        <div>
          <button class="flex-c-m mtext-104 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
           <p>Communicate</p> 
          </button>
        </div>
      </div>
     </div>
    </div>

    '; 
          $dom = $dom."".$builder;
      }
      ?>

      <div class="row isotope-grid">
        <?php echo $dom; ?>
      </div>
  
    </div>
    <div class="flex-c-m flex-w w-full p-t-45">
        <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
          Load More
        </a>
      </div>
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


mnj
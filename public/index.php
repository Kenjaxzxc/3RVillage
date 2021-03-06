<?php 
	$sql = null;
	$getData = null;
	$linkClass = null;
  if(!isset($_GET['display'])){
    	header("location: index.php?display=all_products");
    /*echo "<script>window.location='home.php?display=all_products'</script>";*/
    
  }
  
  if(isset($_GET['display'])){
    $getData = htmlentities($_GET['display']);
      $builder = $dom = null; 
      switch ($getData) {
      case 'all_products':
        $category = null;
        $linkClass = '*';
        break;
      case 'apparels':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Apparels' &&  WLStatus = '1')";
        $category = "Apparels";
        $linkClass = '.apparels';
        break;
      case 'accessories':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Accessories' && WLStatus = '1')";
        $category = "Accessories";
        $linkClass = '.accessories';
        break;
      case 'bag':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Bag' && WLStatus = '1')";
        $category = "Bag";
        $linkClass = '.bag';
        break;
      case 'computers':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Computers' && WLStatus = '1')";
        $category = "Computers";
        $linkClass = '.computers';
        break;
      case 'appliances':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Appliances' && WLStatus = '1')";
        $category = "Appliances";
        $linkClass = '.appliances';
        break;
      case 'gadgets':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Gadgets' && WLStatus = '1')";
        $category = "Gadgets";
        $linkClass = '.gadgets';
        break;
      case 'vehicles':
        // $sql = "SELECT * FROM `wishlist` WHERE (`WLCategory` = 'Vehicles' && WLStatus = '1')";
        $category = "Vehicles";
        $linkClass = '.vehicles';
        break;

      
      default:
       header("location: index.php?display=all_products");
        break;
      }
  }
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>3RVillage</title>
	<?php include('link.php');?>
	</head>
<body class="animsition">

<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							<span class="fa fa-info-circle">&nbsp;</span> Help & FAQs
						</a>

						<a href="register.php" class="flex-c-m trans-04 p-lr-25">
							Register
						</a>

						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Login
						</a>
						<a href="#" class="dropdown-toggle flex-c-m trans-04 p-lr-25" data-toggle="dropdown">
			              NGO
			            </a>
			            <div class="dropdown-menu bg-dark " style="z-index:5000; position: relative;">
			                  <a class="dropdown-item" href="ngolog.php">Login</a>
			                  <a class="dropdown-item" href="donateereg.php">Register</a>
			                  <!--
			                  <a class="dropdown-item" href="cart.php"><span class="zmdi zmdi-shopping-cart"></span> My Cart</a> -->
			               </div>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="../images/icons/logo-33.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="login.php">Home</a>
							</li>

							<li>
								<a href="#products">Shop</a>
							</li>
    					<li>
								<a href="login.php">Wishlist</a>
							</li>
			              <li>
			                <a href="login.php">Donation</a>
			              </li>
						</ul>
					</div>	
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="menu-desktop">
		              <ul class="main-menu">
		                <li>
		                  <a href="login.php">Donate</a>
		               
		                </li>
		                <li>
		                   <a href="login.php">Post</a>
		                </li>
		              </ul>
		            </div>				
				</nav>
				
		</div>
	</header>

		<?php 
		include('cart.php');
		include('slider.php');
	    include('products.php');
		include('footer.php');
		include('sub_products.php');
	?>

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

</body>
</html>



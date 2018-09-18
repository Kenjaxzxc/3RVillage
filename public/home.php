<!-- Product -->
<?php 
	$sql = null;
	$getData = null;
	$linkClass = null;
  if(!isset($_GET['display'])){
    	header("location: home.php?display=all_products");
    
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
       header("location: home.php?display=all_products");
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
<body>

		<?php 
		include('header.php');
		include('cart.php');
		include('slider.php');
	    include('products.php');
		include('footer.php');
		include('sub_products.php');

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

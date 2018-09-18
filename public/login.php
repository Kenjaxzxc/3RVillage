<?php 
  session_start();
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
							Help & FAQs
						</a>

						<a href="register.php" class="flex-c-m trans-04 p-lr-25">
							Register
						</a>

						<a href="login.php" class="flex-c-m trans-04 p-lr-25">
							Login
						</a>
						<a href="donateereg.php" class="flex-c-m trans-04 p-lr-25">
							NGO
						</a>
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
								<a href="login.php">Shop</a>
							</li>

							<li>
								<a href="login.php">Sell</a>
							</li>

							<li>
								<a href="login.php">Donate</a>
							</li>

							<li>
								<a href="login.php">Wishlist</a>
							</li>
						</ul>
					</div>				
				</nav>
			</div>	
		</div>	
	</header>

	<?php 
if(isset($_POST['username']) and isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM account WHERE (username='$username' || contactno='$username') and (password='$password')"; 

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {  
    	if($username == "admin" && $password == "admin"){
    	 $_SESSION['accountid'] = $row['username'];
    	 $_SESSION['accountid'] = "Admin";
    	 header("location:home.php");
    	}
    	else{
    		echo "<script>toastr.error('Your username or password is incorrect!');</script>";
    		
    	}
	}
	else{
    $_SESSION['accountid'] = $row['username'];
    echo "<script>window.location='home.php'</script>";
	}
  }
 ?>
	
	<div class="container m-t-100 m-b-50">
	<div class="row justify-content-center">
    <div class="shadow-lg col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 p-lr-25 p-tb-25 bg-white rounded">
		<form role="form" method="POST">
			<h2 class="text-center">Sign In</h2>
			<div class="stext-105 float-right">
				<a href="register.php">Sign Up</a>
			</div>
			<hr class="mt-5">
			
		    <div class="input-group mb-3">
		    	<span class="input-group-addon p-r-25"><i class="fa fa-user"></i></span>
				<input type="text" name="username" class="form-control input-lg" placeholder="Username or Phone" tabindex="1" required>
			</div>
														
			<div class="input-group mb-3">
				<span class="input-group-addon p-r-27"><i class="fa fa-lock"></i></span>
				<input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="2" required>
			</div>
			<div class="form-check m-l-20 mb-3">
			  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
			  <label>Remember me on this computer</label>
			  <a class="float-right mt-2" href="#">Forgot Password?</a>
			</div>
    	
			<div class="row m-t-60">
				<div class="col-xs-12 col-md-12"><input type="submit" value="Login" name="btnSubmit" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
			</div>	

		</form>
	</div>
	</div>
	
</div>


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


<?php 
  session_start();
?>

<?php 
	include('connection.php'); 
?>

<?php 
	if(isset($_POST['btnSubmit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	if($password != $cpassword){
		echo "<script>alert('Password did not match.');</script>";
	}
	else{
    $sql = "INSERT INTO account (firstname, lastname, username, password, email, contactno) VALUES ('$firstname','$lastname','$username','$password','$email','$contact')";
            $result = mysqli_query ($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['accountid'] = $username;
            header("location:home.php");
    	}
  }
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

							<li class="label1" data-label1="Hot">
								<a href="login.php">Features</a>
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

	<div class="container m-t-100 m-b-50">
	<div class="row justify-content-center">
    <div class="shadow-lg col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 p-lr-25 p-tb-25 bg-white rounded">
		<form role="form" method="POST">
			<h2 class="text-center">Sign up</h2>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="firstname" class="form-control input-lg" placeholder="First Name" tabindex="1" required autofocus>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="lastname" class="form-control input-lg" placeholder="Last Name" tabindex="2" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control input-lg" placeholder="Email Address" tabindex="3" required>
			</div>
			<div class="form-group">
				<input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="4" required>
			</div>					
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="cpassword" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				<input type="text" name="contact" class="form-control input-lg border-right-0" placeholder="Phone Number" tabindex="7" required>
				 <div class="input-group-append">
				    <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right" style="border-color: #ccc;" type="button">Send</button>
				  </div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="verify" class="form-control input-lg" placeholder="Verification Code" tabindex="8">
			</div>
			<div class="row">
				
				<div class="col-xs-4 col-sm-9 col-md-12 text-center">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register" name="btnSubmit" class="btn btn-primary btn-block btn-lg" tabindex="9"></div>
				<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
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


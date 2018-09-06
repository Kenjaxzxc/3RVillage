<?php 
  session_start();
?>
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
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							<span class="fa fa-bell">&nbsp;</span> Notification
						</a>
						<a href="message.php" class="flex-c-m trans-04 p-lr-25">
							<span class="fa fa-comments">&nbsp;</span> Messages
						</a>
						

						<a href="#" class="dropdown-toggle flex-c-m trans-04 p-lr-25" data-toggle="dropdown">
							<?php echo $_SESSION['accountid'] ?>
						</a>
						<div class="dropdown-menu bg-dark " style="z-index:5000; position: relative;">
					        <a class="dropdown-item" href="editprofile.php"><span class="fa fa-user"></span> My Account</a>
					        <a class="dropdown-item" href="mypost.php"><span class="fa fa-plus-circle"></span> My Ads</a>
					        <a class="dropdown-item" href="mywishlist.php"><span class="fa fa-heart"></span> My Wishlist</a>
					        <div class="dropdown-divider"></div>
					        <a class="dropdown-item" href="logout.php"><span class="fa fa-sign-out"></span> Logout</a>
					     </div>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="home.php" class="logo">
						<img src="../images/icons/logo-33.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="home.php">Home</a>
							</li>

							<li>
								<a href="#products">Shop</a>
							</li>

							<li class="label1" data-label1="Hot">
								<a href="features.php">Features</a>
							</li>

							<li>
								<a href="sell.php">Sell</a>
							</li>

							<li>
								<a href="donate.php">Donate</a>
							</li>

							<li>
								<a href="wishlist.php">Wishlist</a>
							</li>
						</ul>
					</div>	
				</nav>
			</div>	
		</div>
	</header>
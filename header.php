<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
		<link rel="stylesheet" href="css/style.css">
</head>
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<?php if(strlen($_SESSION['login']))
    {   ?>
				<a href="#">Welcome -<?php echo htmlentities($_SESSION['username']);?></a>
				<?php } ?>
				<a href="index.php">Home</a>
			    <a href="my-wishlist.php">Wishlist</a>
			    <a href="my-cart.php">My Cart</a>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
	
<a href="login.php"></i>Login</a>
<?php }
else{ ?>
	
				<a href="logout.php">Logout</a>
				<?php } ?>	
				</ul>
			</div><!-- /.cnt-account -->

			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->



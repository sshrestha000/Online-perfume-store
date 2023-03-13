<?php
session_start();
error_reporting(0);
@include 'config.php';
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}
	else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product added in wishlist');</script>";
header('location:my-wishlist.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	    <title>Perfume/homepage</title>
         <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
		<link rel="stylesheet" href="css/style.css">
		<header >
<?php include('header.php');?>
</header>

	</head>
    <body>
	

		<div class="container">
		<section class="products">
		<h1 class="heading">latest products</h1>
		<div class="box-container">					
		<?php
		$ret=mysqli_query($con,"select * from products");
		while ($row=mysqli_fetch_array($ret)) 
		{
			# code...
		?>
			<div>
			<div class="products">			
			<div class="product">		
				<div class="product-image">
					<div class="image">
						<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1'] );?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
					</div><!-- /.image -->					   
				</div><!-- /.product-image -->
				<div class="product-info text-left">
					<h3 class="name"><?php  htmlentities($row['id']);?><?php echo htmlentities($row['productName']);?></a></h3>
					<div class="product-price">	
						<span class="price">
							Rs.<?php echo htmlentities($row['productPrice']);?>			</span>
													
											
					</div><!-- /.product-price -->
				</div><!-- /.product-info -->
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>
							
							<div class="pid"><a href="index.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist" class="lnk btn btn-primary">Add to Wishlist</a></div>
					</div><!-- /.product -->
			
					</div><!-- /.products -->
				</div><!-- /.item -->
			<?php } ?>

					</div><!-- /.home-owl-carousel -->
							</div><!-- /.product-slider -->
						</div>
						</div>

</section>				
<?php include('footer.php');?>
</body>
</html>
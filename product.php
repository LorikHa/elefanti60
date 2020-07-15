<?php 
include "includes/header.php";

if(!isset($_GET["id"])){
    header("location: products.php");
	exit;
}
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/ProductController.php";
require $root."/Model/ProductModel.php";
$ProductController=new ProductController();
$Product=$ProductController->getProduct($_GET["id"]);

if($Product->get_nostock()==0){
	$class = "out-of-stock";
}else
{
	$class = "in-stock";

}
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elefanti60</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/media.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">

    <div class="content">
        <!--<hr class="divider">-->
        <div class="Users-wrapper">
			<h2>Product: <?php echo $Product->get_name(); ?></h2>
        	<form action="#" method="post" name="edit">
			<h5>Price: <?php echo $Product->get_price();?></h5>
			<h5>Category: <?php echo $Product->get_category();?></h5>
			<h5>There are currently 
			<?php 
				echo $Product->get_nostock() . ' item';
				if($Product->get_nostock() > 1)
					echo 's';
			?> available</h5>
			
			<div class="product <?php echo $class; ?>">
				<a href="product.php?id=<?php echo $Product->get_id(); ?>" style = "background-color: unset !important; color: unset !important; text-decoration:none !important; ">
			<div class="product-image">
				<img class = "image100" src="<?php echo $Product->get_image(); ?>" alt="">
			</div>
			<hr class="product_divider">
			<div class="product-details">
				<div class="title">
					<h4><?php echo $Product->get_name(); ?></h4>
				</div>
				<div class="price">
					<p>Price: <?php echo $Product->get_price() ; ?>&#8364;</p>
					<p><?php echo $Product->get_nostock() ; ?> left in stock.</p>
				</div>
			</div>
			<div class="product_clone">
			</div></a>
		</div>
    	</div>
    </div>
	<hr class="divider">
</div>
<?PHP
include "includes/footer.php";
?>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

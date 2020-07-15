<?php 

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/ProductController.php";
require $root."/Model/ProductModel.php";
$ProductController=new ProductController();
$products=$ProductController->getAllProducts();

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elefanti60</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/media.css">
</head>
<body>
    <?PHP
        include"includes/header.php";
    ?>
<div class="wrapper">

    <div class="content">
        <!--<hr class="divider">-->
        <div class="products-wrapper">
            <h2>Products</h2>
            <?php              
             $count=0;
             foreach($products as $item){
                     $count++;
                     if($item->get_nostock()==0){
                         $class = "out-of-stock";
                     }else
                     {
                         $class = "in-stock";
             
                     }
                     
                     echo '<div class="product '.$class.'"><a href="product.php?id='.$item->get_id().'" style = "background-color: unset !important; color: unset !important; text-decoration:none !important; ">
                     <div class="product-image">
                         <img class = "image100" src="'. $item->get_image().'" alt="">
                     </div>
                     <hr class="product_divider">
                     <div class="product-details">
                         <div class="title">
                             <h4>'. $item->get_name().'</h4>
                         </div>
                         <div class="price">
                             <p>Price: '. $item->get_price() .'&#8364;</p>
                             <p>'. $item->get_nostock() .' left in stock.</p>
                         </div>
                     </div>
                     <div class="product_clone">
                     </div></a>
                 </div>';
             }
             if($count==0){
                 echo "0 results";
             }
            ?>
    </div>
    </div>

</div>
<?PHP
include "includes/footer.php";
?>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

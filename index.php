<?php 

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/ProductController.php";
require $root."/Model/ProductModel.php";
$ProductController=new ProductController();
$userData=$ProductController->getIndexProducts();
?>

<!DOCTYPE html>
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
    include "includes/header.php";
    ?>
<div class="slider">
    <div class="mySlides">
        <img src="https://dummyimage.com/1200x500/8a838a/fff.png">
    </div>
    <div class="mySlides">
        <img src="https://dummyimage.com/1200x500/145541/fff.png">
    </div>
    <div class="mySlides">
        <img src="https://dummyimage.com/1200x500/as2544/fff.png">
    </div>
    <div class="slider-button prev-slide noselect" onclick="plusDivs(-1)">&#10094;</div>
    <div class="slider-button next-slide noselect" onclick="plusDivs(1)">&#10095;</div>

</div>
<div class="wrapper">

    <div class="content">
        <div class="category-wrapper">
            <div class="category">
                <h3>Laptops </h3>


                <?php
                $count=0;
foreach($userData as $item){
    if($item->get_category()==1){
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
}
if($count==0){
    echo "0 results";
}

            ?>
            
                <!-- <span><a href="#">View more </a></span> -->
                <button class="back"><</button>
                <button class="next">></button>
            </div>
            <hr class="divider">

            <div class="category">
                <h3>Monitors</h3>
                <?php

$count=0;
foreach($userData as $item){
    if($item->get_category()==3){
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
}
if($count==0){
    echo "0 results";
}

            ?>
                <!-- <span><a href="#">View more </a></span> -->
                <button class="back"><</button>
                <button class="next">></button>
            </div>
            <hr class="divider">
            
            <div class="category">
                <h3>Phones</h3>
                <?php

$count=0;
foreach($userData as $item){
    if($item->get_category()==2){
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
}
if($count==0){
    echo "0 results";
}
            ?>
                <!-- <span><a href="#">View more </a></span> -->
                <button class="back"><</button>
                <button class="next">></button>
            </div>
        </div>
     
    </div>

</div>
<?PHP
include "includes/footer.php";
?>
<script type="text/javascript" src="./js/jQuery.min.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

<?php include ('config.php'); ?>

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
    include"includes/header.php";
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


                <div class="product in-stock">
                    <div class="product-image">
                        <img src="./images/laptops.png" alt="">
                    </div>
                    <hr class="product_divider">
                    <div class="product-details">
                        <div class="title">
                            <h4>Laptops</h4>
                        </div>
                        <div class="price">
                            <p>Starting from: 499.99&#8364;</p>
                        </div>
                    </div>

                </div>



                <div class="product in-stock">
                    <div class="product-image">
                        <img src="./images/phones.png" alt="">
                    </div>
                    <hr class="product_divider">
                    <div class="product-details">
                        <div class="title">
                            <h4>Phones</h4>
                        </div>
                        <div class="price">
                            <p>Starting from: 179.99&#8364;</p>
                        </div>
                    </div>

                </div>
                <div class="product in-stock">
                    <div class="product-image">
                        <img src="./images/laptops.png" alt="">
                    </div>
                    <hr class="product_divider">
                    <div class="product-details">
                        <div class="title">
                            <h4>Laptops</h4>
                        </div>
                        <div class="price">
                            <p>Starting from: 499.99&#8364;</p>
                        </div>
                    </div>

                </div>
                <div class="product in-stock">
                    <div class="product-image">
                        <img src="./images/monitors.png" alt="">
                    </div>
                    <hr class="product_divider">
                    <div class="product-details">
                        <div class="title">
                            <h4>Monitors</h4>
                        </div>
                        <div class="price">
                            <p>Starting from: 159.99&#8364;</p>
                        </div>
                    </div>

                </div>
                <div class="product in-stock">
                    <div class="product-image">
                        <img src="./images/laptops.png" alt="">
                    </div>
                    <hr class="product_divider">
                    <div class="product-details">
                        <div class="title">
                            <h4>Laptops</h4>
                        </div>
                        <div class="price">
                            <p>Starting from: 499.99&#8364;</p>
                        </div>
                    </div>

                </div>
                <div class="product in-stock">
                    <div class="product-image">
                        <img src="./images/phones.png" alt="">
                    </div>
                    <hr class="product_divider">
                    <div class="product-details">
                        <div class="title">
                            <h4>Phones</h4>
                        </div>
                        <div class="price">
                            <p>Starting from: 179.99&#8364;</p>
                        </div>
                    </div>

                </div>

                <div class="product out-of-stock">
                    <div class="product-image">
                        <img src="./images/phones.png" alt="">
                    </div>
                    <hr class="product_divider">
                    <div class="product-details">
                        <div class="title">
                            <h4>Phones</h4>
                        </div>
                        <div class="price">
                            <p>Starting from: 179.99&#8364;</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <span><a href="#">View more </a></span> -->
                <button class="back"><</button>
                <button class="next">></button>
            </div>
        </div>
     
    </div>

</div>
<footer>
    <p>All rights reserved "Elefanti60" &#169; 2020.</p>
</footer>
<script type="text/javascript" src="./js/jQuery.min.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

<?php 
include "includes/header.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true &&  $_SESSION["role"]!=1)
{
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elefanti60</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/media.css">

    <script type="text/javascript" src="./js/jQuery.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>

    <script>
    $( document ).ready(function() {

        $('#add_product').on('click', function () {
        $('#productOptionsForm').show();
        $('#deleteProductForm').hide();
        $('#editProductForm').hide();
        $('.spacer').hide();
        $('#messageAlert').hide();

    });

    $('#delete_product').on('click', function () {
        $('#productOptionsForm').hide();
        $('#editProductForm').hide();
        $('.spacer').hide();
        $('#deleteProductForm').show();
        $('#messageAlert').hide();
    });

    $('#edit_product').on('click', function () {
        $('#productOptionsForm').hide();
        $('#editProductForm').show();
        $('.spacer').hide();
        $('#deleteProductForm').hide();
        $('#messageAlert').hide();
    });

    $('#edit_product_select').on('change', function () {
    var name = $('#edit_product_select option:selected').data('name');
    var price = $('#edit_product_select option:selected').data('price');
    var category = $('#edit_product_select option:selected').data('category');
    var number = $('#edit_product_select option:selected').data('number');
    $('#editProductForm input[name="id"]').val($(this).val());
    $('#editProductForm input[name="name"]').val(name);
    $('#editProductForm input[name="price"]').val(price);
    $('#edit_category').val(category).change();
    $('#editProductForm input[name="number"]').val(number);
});


    });

    </script>
</head>
<body>
<?PHP

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["role"] != 1) {
    header("location: index.php");
}

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/ProductController.php";
require $root."/Model/ProductModel.php";
$ProductController=new ProductController();
$products=$ProductController->getAllProducts();



?>
<div class="wrapper">

    <div class="content">
        <?php
        if (isset($_SESSION["message"])) {
            echo '<div id="messageAlert" class="alert alert-success" role="alert" style="margin-top:20px;">
              '. $_SESSION["message"] .'
            </div>';
            unset($_SESSION["message"]);
        }
        ?>
        <div class="buttons">
            <button type="button" class="button" id="add_product">Add product</button>
            <button type="button" class="button" id="edit_product">Edit product</button>
            <button type="button" class="button" id="delete_product">Delete product</button>
        </div>

        <hr class="divider">
        <div class="spacer"></div>
        <div class="productOptionsForm" id="productOptionsForm" hidden>
            <h2>Add new Product</h2>
            <!-- kur ki me bo upload e shton enctype="multipart/form-data" -->
            <form method="POST" action="/addNewProduct.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-label">
                        <label>Name:</label>
                    </div>
                    <div class="form-element">
                        <input name="name" required type="text"
                               title="Name should contain only letters."
                               pattern="[A-Za-z0-9\s]{2,}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label">
                        <label>Category:</label>
                    </div>
                    <div class="form-element">
                        <select name="category">
                            <option value="1">Laptop</option>
                            <option value="2">Phone</option>
                            <option value="3">Monitor</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label">
                        <label>Price:</label>
                    </div>
                    <div class="form-element">
                        <input name="price" required type="number" step="0.01">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">
                        <label>Number:</label>
                    </div>
                    <div class="form-element">
                        <input name="number" required type="number" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">
                        <label>Photo:</label>
                    </div>
                    <div class="form-element">
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                    </div>
                </div>
                <div class="form-group button-wrapper">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>


        </div>
        <div class="editProductForm" id="editProductForm" hidden>
            <h2>Edit new Product</h2>
            <!-- kur ki me bo upload e shton enctype="multipart/form-data" -->
            <form method="POST" action="/editProduct.php" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-label">
                        <label>Product:</label>
                    </div>
                    <div class="form-element">
                        <select name="product" id="edit_product_select">
                            <option value="">Select..</option>
                            <?php
                                $count=0;
                                foreach($products as $item){
                                        $count++;
                                        echo '<option value="' . $item->get_id() . '" data-name="' . $item->get_name() . '" data-category="' . 
                                        $item->get_category() . '" data-number="' . $item->get_nostock() . '" data-price="' . $item->get_price() . '">' . $item->get_name() . '</option>';
                                    
                                }
                                if($count==0){
                                    echo "0 results";
                                }                            
                            ?>
                        </select>
                    </div>
                </div>
                <input name="id" required type="hidden" value="">
                <div class="form-group">
                    <div class="form-label">
                        <label>Name:</label>
                    </div>
                    <div class="form-element">
                        <input name="name" required type="text"
                               title="Name should contain only letters."
                               pattern="[A-Za-z0-9\s]{2,}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label">
                        <label>Category:</label>
                    </div>
                    <div class="form-element">
                        <select id="edit_category" name="category">
                            <option value="1">Laptop</option>
                            <option value="2">Phone</option>
                            <option value="3">Monitor</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label">
                        <label>Price:</label>
                    </div>
                    <div class="form-element">
                        <input name="price" required type="number" step="0.01">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">
                        <label>Number:</label>
                    </div>
                    <div class="form-element">
                        <input name="number" required type="number" min="0">
                    </div>
                </div>
                <div class="form-group button-wrapper">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>


        <div class="deleteProductForm" id="deleteProductForm" hidden>
            <h2>Delete Product</h2>

            <!-- kur ki me bo upload e shton enctype="multipart/form-data" -->
            <form method="POST" action="/deleteProduct.php">
                <div class="form-group">
                    <div class="form-label">
                        <label>Product:</label>
                    </div>
                    <div class="form-element">
                        <select name="product">

                            <?php
                            $count=0;
                            foreach($products as $item){
                                    $count++;
                                    echo '<option value="' . $item->get_id() . '">' . $item->get_name() . '</option>';
                                
                            }
                            if($count==0){
                                echo "0 results";
                            } 

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group button-wrapper">
                    <button type="submit" name="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?PHP
include "includes/footer.php";
?>
</body>
</html>

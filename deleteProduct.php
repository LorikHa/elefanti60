<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true &&  $_SESSION["role"]!=1)
{ 
    header("location: index.php");
}

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/ProductController.php";
require $root."/Model/ProductModel.php";
$ProductController=new ProductController();

$id = $_POST["product"];
$product = $ProductController->getProduct($id);
$response = $ProductController->deleteProduct($id);

if ($response == 'success') {
    // Redirect to contact us
    // header("location: contactUs.php");
    $_SESSION["message"] = 'Product '.$product->get_name().' successfully deleted!';
    header('Location: productOptions.php');
}
else {
     echo "Something's wrong with the query";
}
?>
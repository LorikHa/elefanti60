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

	$name =  "";
	$nameError =  "";
	$category ="";
	$categoryError ="";
	$price ="";
	$priceError ="";
	$number ="";
	$numberError ="";




        $id = $_POST["id"];

 if(!empty(trim($_POST["name"]))){
 	if(preg_match('/[A-Za-z0-9\s]+/', $_POST["name"])){
        $name = $_POST["name"];
 	}else{
    	$nameError="Please enter a valid product name";
 	}
    }else{
    	$nameError="Please enter product name.";
    }


    if(!empty(trim($_POST["category"]))){
        if(in_array($_POST["category"],[1,2,3])){
        $category = $_POST["category"];        	
        }else{
    	$categoryError="Please select a valid category.";

        }
    }
    else{
    	$categoryError="Please select a category.";
    }



    if(isset($_POST["price"])){
    if(!empty(trim($_POST["price"]))){
     	if($_POST["price"]>0){
        $price = $_POST["price"];
    }else{
    	$priceError="Please select a valid price.";

     	}
    }

    }  

    if(isset($_POST["number"])){
    if(!empty(trim($_POST["number"]))){
        if($_POST["number"]>0){
        $number = $_POST["number"];
    }else{
        $numberError="Please select a valid number.";

        }
    }
    }

	if($nameError ===  "" && $categoryError === "" && $numberError === "" && $priceError ===""){
        $response = $ProductController->EditProduct($name, $price, $category, $number, $photo, $id);
         
        if($response == 'success'){
            $_SESSION["message"] = "Product $name successfully edited!";
            header('Location: productOptions.php');
        }
        else {
            echo "Something's wrong with the query: " . mysqli_error($link);
        }
         
        // Close statement
    }else{
    	$dataSend=array();

    if($nameError!=""){
    	$dataSend[]="nameError=".$nameError;
    }
	if($priceError!=""){
$dataSend[]="priceError=".$priceError;
	}
	if($categoryError!=""){
$dataSend[]="categoryError=".$categoryError;
	}
	if($numberError!=""){
$dataSend[]="numberError=".$numberError;
	}
        $_SESSION["message"] = implode('<br>', $dataSend);
    	header('Location: productOptions.php?'.$dataSend);
    
	  }
    
    // Close connection
    mysqli_close($link);
	
?>  
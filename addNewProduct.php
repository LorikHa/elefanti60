<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true &&  $_SESSION["role"]!=1){
    header("location: index.php");
}
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/ProductController.php";
require $root."/Model/ProductModel.php";
$ProductController=new ProductController();

$name = "";
$nameError = "";
$category = "";
$categoryError = "";
$price = "";
$priceError = "";
$number = "";
$numberError = "";


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 2;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else if($uploadOk == 1){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$photo = $_FILES["fileToUpload"]["name"];


if (!empty(trim($_POST["name"]))) {
    if (preg_match('/[A-Za-z0-9\s]+/', $_POST["name"])) {
        $name = $_POST["name"];
    } else {
        $nameError = "Please enter a valid product name";
    }
} else {
    $nameError = "Please enter product name.";
}


if (!empty(trim($_POST["category"]))) {
    if (in_array($_POST["category"], [1, 2, 3])) {
        $category = $_POST["category"];
    } else {
        $categoryError = "Please select a valid category.";

    }
} else {
    $categoryError = "Please select a category.";
}


if (isset($_POST["price"])) {
    if (!empty(trim($_POST["price"]))) {
        if ($_POST["price"] > 0) {
            $price = $_POST["price"];
        } else {
            $priceError = "Please select a valid price.";

        }
    }

}

if (isset($_POST["number"])) {
    if (!empty(trim($_POST["number"]))) {
        if ($_POST["number"] > 0) {
            $number = $_POST["number"];
        } else {
            $numberError = "Please select a valid number.";

        }
    }
}

if ($nameError === "" && $categoryError === "" && $numberError === "" && $priceError === "") {
    //parandalon sql-injection


    $ProductController->AddNewProduct($name, $price, $category, $number, $photo);

    $_SESSION["message"] = "Product $name form successfully added!";
    header('Location: productOptions.php');
} else {
    $dataSend = array();

    if ($nameError != "") {
        $dataSend[] = "nameError=" . $nameError;
    }
    if ($priceError != "") {
        $dataSend[] = "priceError=" . $priceError;
    }
    if ($categoryError != "") {
        $dataSend[] = "categoryError=" . $categoryError;
    }
    if ($numberError != "") {
        $dataSend[] = "numberError=" . $numberError;
    }
    $_SESSION["message"] = implode('<br>', $dataSend);
    header('Location: productOptions.php?' . $dataSend);

}

// Close connection
mysqli_close($link);

?>
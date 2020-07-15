<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include($root.'/Model/ProductDS.php');
class ProductController{

	
	public function getIndexProducts()
	{
	  $ProductDS=new ProductDS();
	  return $ProductDS->getIndexProducts();
	}
	
	public function AddNewProduct($name, $price, $category, $number_in_stock, $photo)
	{
	  $ProductDS=new ProductDS();
	  return $ProductDS->AddNewProduct($name, $price, $category, $number_in_stock, $photo);
	}
	
	public function EditProduct($name, $price, $category, $number_in_stock, $photo, $id)
	{
	  $ProductDS=new ProductDS();
	  return $ProductDS->EditProduct($name, $price, $category, $number_in_stock, $photo, $id);
	}

	public function getAllProducts()
	{
	  $ProductDS=new ProductDS();
	  return $ProductDS->getAllProducts();
	}

	public function deleteProduct($id)
	{
	  $ProductDS=new ProductDS();
	  return $ProductDS->deleteProduct($id);
	}

	public function getProduct($id)
	{
	  $ProductDS=new ProductDS();
	  return $ProductDS->getProduct($id);
	}
}
?>
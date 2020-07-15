<?php
class ProductDS
{
	function getIndexProducts(){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare("(select * from products where category = 1 order by id desc limit 3) ".
			'UNION'.
			'(select * from products where category = 2 order by id desc limit 3)'.
			'UNION'.
			'(select * from products where category = 3 order by id desc limit 3)'
		);
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$products = [];
			if(isset($rez)&&!empty($rez)){
				foreach($rez as $row){
					$products[] = ProductModel::convertJSON($row);
				}
			}
			return $products;

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	public function AddNewProduct($name, $price, $category, $number_in_stock, $photo)
	{
		try{
			require('db_config.php');
			$photoLocation='images/'.$photo;
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('INSERT INTO products (name, price, category, number_in_stock, photo) VALUES (?, ?, ? ,?, ?)');
			$stmt->bindParam(1, $name,PDO::PARAM_STR);
			$stmt->bindParam(2, $price,PDO::PARAM_STR);
			$stmt->bindParam(3, $category,PDO::PARAM_STR);
			$stmt->bindParam(4, $number_in_stock,PDO::PARAM_STR);
			$stmt->bindParam(5, $photoLocation,PDO::PARAM_STR);
			$stmt->execute();
			return 'success';

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	public function EditProduct($name, $price, $category, $number_in_stock, $photo, $id)
	{
		try{
			$photoText = '';
			if(isset($photo)&&!empty($photo))
				$photoText=', photo = ?';
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('UPDATE products SET name = ?, price = ?, category = ?, number_in_stock = ?'. $photoText .' WHERE id = ?');
			$stmt->bindParam(1, $name,PDO::PARAM_STR);
			$stmt->bindParam(2, $price,PDO::PARAM_STR);
			$stmt->bindParam(3, $category,PDO::PARAM_STR);
			$stmt->bindParam(4, $number_in_stock,PDO::PARAM_STR);
			if(isset($photo)&&!empty($photo)){
				$stmt->bindParam(5, 'images/'.$photo,PDO::PARAM_STR);
				$stmt->bindParam(6, $id,PDO::PARAM_STR);
			}else{
				$stmt->bindParam(5, $id,PDO::PARAM_STR);
			}
			$stmt->execute();
			return 'success';

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function getAllProducts(){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('select * from products order by id desc');
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$products = [];
			if(isset($rez)&&!empty($rez)){
				foreach($rez as $row){
					$products[] = ProductModel::convertJSON($row);
				}
			}
			return $products;

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function getProduct($id){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('SELECT * FROM products WHERE id=?');
			$stmt->bindParam(1, $id,PDO::PARAM_STR);
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if(isset($rez)&&isset($rez[0]))
				return ProductModel::convertJSON($rez[0]);
			else
				return new ProductModel(-1,'empty','empty','empty','empty','empty');

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function deleteProduct($id){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('DELETE FROM products WHERE id=?');
			$stmt->bindParam(1, $id,PDO::PARAM_STR);
			$stmt->execute();
			return 'success';

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

}

?>
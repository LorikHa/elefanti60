<?php
class UserDS
{
	function getLogin($username){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare("SELECT id, username, role, password FROM users WHERE username = ?");
			$stmt->bindParam(1, $username,PDO::PARAM_STR);
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if(isset($rez)&&isset($rez[0]))
				return UserModel::convertJSON($rez[0]);
			else
				return new UserModel(-1,'empty','empty','empty');

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function userExists($username){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
			$stmt->bindParam(1, $username,PDO::PARAM_STR);
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if(isset($rez)&&isset($rez[0]))
				return $rez[0]["id"];
			else
				return '';

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function registerUser($username, $password){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 2)");
			$stmt->bindParam(1, $username,PDO::PARAM_STR);
			$stmt->bindParam(2, $password,PDO::PARAM_STR);
			$stmt->execute();
			return 'success';
		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function getAllUsers(){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare("SELECT id, username, role, password FROM users");
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$users = [];
			if(isset($rez)){
				foreach($rez as $row){
					$users[] = UserModel::convertJSON($row);
				}
			}
			else
				return new UserModel(-1,'empty','empty','empty');
			return $users;
		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function getUser($id){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare("SELECT id, username, role, password FROM users WHERE id = ?");
			$stmt->bindParam(1, $id,PDO::PARAM_STR);
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if(isset($rez)&&isset($rez[0]))
				return UserModel::convertJSON($rez[0]);
			else
				return new UserModel(-1,'empty','empty','empty');

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function editUser($id, $role){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare("UPDATE users set role = ? WHERE id = ?");
			$stmt->bindParam(1, $role,PDO::PARAM_STR);
			$stmt->bindParam(2, $id,PDO::PARAM_STR);
			$stmt->execute();
			return 'Success';
		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

}

?>
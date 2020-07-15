<?php
class ContactDS
{
	function getAll(){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('SELECT * FROM contact_us ORDER BY id DESC');
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$contactUs = [];
			if(isset($rez)&&!empty($rez)){
				foreach($rez as $row){
					$contactUs[] = ContactModel::convertJSON($row);
				}
			}
			return $contactUs;

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}

	function insertComment($name, $last_name, $email, $birthDate, $rateUs, $phones, $monitors, $laptops, $comment){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('INSERT INTO contact_us (name, last_name, email, birthDate,rateUs,phones,monitors,laptops,comment) VALUES (?, ?, ? , ? , ? , ? , ? , ? ,?)');
			$stmt->bindParam(1, $name,PDO::PARAM_STR);
			$stmt->bindParam(2, $last_name,PDO::PARAM_STR);
			$stmt->bindParam(3, $email,PDO::PARAM_STR);
			$stmt->bindParam(4, $birthDate,PDO::PARAM_STR);
			$stmt->bindParam(5, $rateUs,PDO::PARAM_STR);
			$stmt->bindParam(6, $phones,PDO::PARAM_STR);
			$stmt->bindParam(7, $monitors,PDO::PARAM_STR);
			$stmt->bindParam(8, $laptops,PDO::PARAM_STR);
			$stmt->bindParam(9, $comment,PDO::PARAM_STR);
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
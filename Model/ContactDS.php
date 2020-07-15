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
}

?>
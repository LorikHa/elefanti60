<?php
class AboutDS
{
	function getAboutUs(){
		try{
			require('db_config.php');
			$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$passwd);
			$stmt = $pdo->prepare('SELECT * FROM about_us');
			$stmt->execute();
			$rez=$stmt->fetchAll(PDO::FETCH_ASSOC);
			$aboutUs = [];
			if(isset($rez)&&!empty($rez)){
				foreach($rez as $row){
					$aboutUs[] = AboutModel::convertJSON($row);
				}
			}
			return $aboutUs;

		}
		catch(PDOException $pe){
			die();
			$pdo=null;
			return "Gabim gjate kyqjes.";
		}
	}
}

?>
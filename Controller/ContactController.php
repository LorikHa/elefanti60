<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include($root.'/Model/ContactDS.php');
class ContactController{

	
	public function getAll()
	{
	  $ContactDS=new ContactDS();
	  return $ContactDS->getAll();
	}
	
	public function insertComment($name, $last_name, $email, $birthDate, $rateUs, $phones, $monitors, $laptops, $comment)
	{
	  $ContactDS=new ContactDS();
	  return $ContactDS->insertComment($name, $last_name, $email, $birthDate, $rateUs, $phones, $monitors, $laptops, $comment);
	}
}
?>
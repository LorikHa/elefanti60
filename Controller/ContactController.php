<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include($root.'/Model/ContactDS.php');
class ContactController{

	
	public function getAll()
	{
	  $ContactDS=new ContactDS();
	  return $ContactDS->getAll();
	}
}
?>
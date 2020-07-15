<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include($root.'/Model/AboutDS.php');
class AboutController{

	
	public function getAboutUs()
	{
	  $AboutDS=new AboutDS();
	  return $AboutDS->getAboutUs();
	}
}
?>
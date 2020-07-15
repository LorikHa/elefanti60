<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include($root.'/Model/UserDS.php');
class UserController{

	
	public function getLogin($username)
	{
	  $UserDS=new UserDS();
	  return $UserDS->getLogin($username);
	}
	
	public function registerUser($username, $password)
	{
	  $UserDS=new UserDS();
	  return $UserDS->registerUser($username, $password);
	}
	
	public function userExists($username)
	{
	  $UserDS=new UserDS();
	  return $UserDS->userExists($username);
	}
	
	public function getAllUsers()
	{
	  $UserDS=new UserDS();
	  return $UserDS->getAllUsers();
	}
	
	public function getUser($id)
	{
	  $UserDS=new UserDS();
	  return $UserDS->getUser($id);
	}
	
	public function editUser($id, $role)
	{
	  $UserDS=new UserDS();
	  return $UserDS->editUser($id, $role);
	}
}
?>
<?php 
include "includes/header.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true &&  $_SESSION["role"]!=1)
{
    header("location: index.php");
}
if(!isset($_GET["id"])){
    header("location: users.php");
	exit;
}
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/UserController.php";
require $root."/Model/UserModel.php";
$UserController=new UserController();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$response=$UserController->editUser($_GET["id"], $_POST["role"]);
	if(isset($response)&&$response!='An error occurred'){
		$username=$UserController->getUser($_GET["id"])->get_username();
		$_SESSION["userMesazh"] = "The role for $username have been modified successfully!";
	}
	else
		$_SESSION["userMesazh"] = $response;
    header("location: users.php");
	exit;
}
$Users=$UserController->getUser($_GET["id"]);

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elefanti60</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/media.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">

    <div class="content">
        <!--<hr class="divider">-->
        <div class="Users-wrapper">
			<h2>Users</h2>
        	<form action="#" method="post" name="edit">
			<h5>Select Role for "<?php echo $Users->get_username();?>"</h5>
				<select id="role" name="role" style="width:200px; margin-bottom: 10px;">
				<option value="1" <?php if($Users->get_role()==1) echo ' selected';?>>Administrator</option>
				<option value="2" <?php if($Users->get_role()==2) echo ' selected';?>>User</option>
				</select>
				<br>
                <input type="submit" class="btn btn-primary" value="Submit">
			</form>
    </div>
    </div>

</div>
<?PHP
include "includes/footer.php";
?>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

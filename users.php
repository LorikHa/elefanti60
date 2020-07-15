<?php 
include "includes/header.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true &&  $_SESSION["role"]!=1)
{
	header("location: index.php");
}
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/UserController.php";
require $root."/Model/UserModel.php";
$UserController=new UserController();
$Users=$UserController->getAllUsers();

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
		<?php
			if(isset($_SESSION["userMesazh"])){
				
				echo '
				<div class="alert alert-success" role="alert" style="margin-top:20px;">
				  '. $_SESSION["userMesazh"] .'
				</div>';
				unset($_SESSION["userMesazh"]);
			}
		?>
        <div class="Users-wrapper">
            <h2>Users</h2>
            <?php              
			 $count=0;
			 echo '<table class="table table-hover">
			 <thead>
			   <tr>
				 <th scope="col">#</th>
				 <th scope="col">Username</th>
				 <th scope="col">Role</th>
				 <th scope="col">Action</th>
			   </tr>
			 </thead>
			 <tbody>';
			 $counter=1;
             foreach($Users as $item){
				 $role = 'User';
				if($item->get_role() == 1)
					$role = 'Administrator';
				echo '<tr>
				<th scope="row">'.$counter++.'</th>
				<td>'.$item->get_username()."</td>
				<td>$role</td>
				<td><a href = \"user.php?id=".$item->get_id().'" class="btn btn-primary">Edit</a></td>
			  	</tr>';
			 }
			 echo '
			 </tbody>
		   </table>';
            ?>
    </div>
    </div>

</div>
<?PHP
include "includes/footer.php";
?>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

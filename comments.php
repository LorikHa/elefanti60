<?php 
include "includes/header.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true &&  $_SESSION["role"]!=1)
{
    header("location: index.php");
}
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/ContactController.php";
require $root."/Model/ContactModel.php";
$ContactController=new ContactController();
$contactData=$ContactController->getAll();

?>
<!DOCTYPE html>
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
        <h3>Comments</h3>


        <?php
			 echo '<table class="table table-hover">
			 <thead>
			   <tr>
				 <th scope="col">#</th>
				 <th scope="col">First Name</th>
				 <th scope="col">Last Name</th>
				 <th scope="col">Rate Us</th>
				 <th scope="col">Comment</th>
			   </tr>
			 </thead>
			 <tbody>';
			 $counter=1;
             foreach($contactData as $item){
				echo '<tr>
				<th scope="row">'.$counter++.'</th>
				<td>'.$item->get_name().'</td>
				<td>'.$item->get_last_name().'</td>
				<td>'.$item->get_rateUs().'</td>
				<td>'.$item->get_comment().'</td>
			  	</tr>';
			 }
			 echo '
			 </tbody>
           </table>';
        if($counter==0){
            echo "0 results";
        }

        ?>
    </div>
</div>

</div>


</div>

</div>
<?PHP
include "includes/footer.php";
?>
<script type="text/javascript" src="./js/jQuery.min.js"></script>
<script type="text/javascript" src="./js/validator.min.js"></script>
<script src="js/form-validation.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

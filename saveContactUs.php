<?php
require_once "config.php";

	$name =  "";
	$nameError =  "";
	$lastName ="";
	$lastNameError ="";
	$email ="";
	$emailError ="";
	$birthDate ="";
	$birthDateError ="";
	$rateUs ="";
	$rateUsError ="";
	$phones ="";
	$phonesError ="";
	$monitors ="";
	$monitorsError ="";
	$laptops ="";
	$laptopsError ="";
	$comment ="";
	$commentError ="";


 if(!empty(trim($_POST["name"]))){
 	if(preg_match('/[A-Za-z]{2,20}/', $_POST["name"])){
        $name = $_POST["name"];
 	}else{
    	$nameError="Please enter a valid name";
 	}
    }else{
    	$nameError="Please enter name.";
    }

    if(!empty(trim($_POST["lastName"]))){
 	if(preg_match('/[A-Za-z]{2,20}/', $_POST["lastName"])){

        $lastName = $_POST["lastName"];
    }else{
    	$lastNameError="Please enter a valid last name.";

    }
    }else{
    	$lastNameError="Please enter last name.";
    }

    if(!empty(trim($_POST["email"]))){
 	if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

        $email = $_POST["email"];
    }else{
    	$emailError="Please enter a valid email.";

    }
    }else{
    	$emailError="Please enter email.";
    }

    if(!empty(trim($_POST["rateUs"]))){
        if(in_array($_POST["rateUs"],[1,2,3,4,5])){
        $rateUs = $_POST["rateUs"];        	
        }else{
    	$rateUsError="Please select a valid number.";

        }

    }
    else{
    	$rateUsError="Please select a number.";
    }

     if(isset($_POST["phones"])){
     if(!empty(trim($_POST["phones"]))){
     	if($_POST["phones"]==='phones'){
        $phones = 1;     		
     	}else{
    	$phonesError="Please select a valid value.";

     	}
    }
    }

    if(isset($_POST["laptops"])){
    if(!empty(trim($_POST["laptops"]))){
     	if($_POST["laptops"]==='laptops'){
        $laptops = 1;
    }else{
    	$laptopsError="Please select a valid value.";

     	}
    }
    }

    if(isset($_POST["monitors"])){
    if(!empty(trim($_POST["monitors"]))){
     	if($_POST["monitors"]==='monitors'){
        $monitors = 1;
    }else{
    	$monitorsError="Please select a valid value.";

     	}
    }
    }

    if(!empty(trim($_POST["comment"]))){
    	$comment = filter_var(trim($_POST["comment"]), FILTER_SANITIZE_STRING);
    }
     if(!empty(trim($_POST["birthDate"]))){
     	if(validateDate($_POST["birthDate"],$format = 'Y-m-d')){

        $birthDate = $_POST["birthDate"];

     	}else{
    	$birthDateError="Please enter a valid date.";

     	}
    }else{
    	$birthDateError="Please enter a date.";
    }
function validateDate($date, $format){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
   

	if($nameError ===  "" && $lastNameError === "" && $emailError === "" && $birthDateError ==="" &&
	$rateUsError ==="" && $phonesError ==="" && $monitorsError === "" && $laptopsError ==="" &&
	$commentError ===""){
		//parandalon sql-injection
			$sql = "INSERT INTO contact_us (name, last_name, email, birthDate,rateUs,phones,monitors,laptops,comment) VALUES (?, ?, ? , ? , ? , ? , ? , ? ,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_name, $param_lastname,$param_email,$param_birthDate,
                $param_rateUs,$param_phones, $param_monitors, $param_laptops, $param_comment);
            
            // Set parameters
            $param_name = $name;
            $param_lastname = $lastName;
            $param_email = $email;
            $param_rateUs = $rateUs;
            $param_phones = $phones;
            $param_monitors = $monitors;
            $param_laptops = $laptops;
            $param_comment = $comment;
            $param_birthDate = $birthDate;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to contact us
                // header("location: contactUs.php");
                $dataSend="message=Contact form successfully sent!";
                header('Location: contactUs.php?'.$dataSend);
            }
            else {
   				 echo "Something's wrong with the query: " . mysqli_error($link);
			}
        mysqli_stmt_close($stmt);

        }else {
    echo "Something's wrong with the query: " . mysqli_error($link);
}
         
        // Close statement
    }else{
    	$dataSend=array();

    if($nameError!=""){
    	$dataSend[]="nameError=".$nameError;
    }
	if($lastNameError!=""){
$dataSend[]="lastNameError=".$lastNameError;
	}
	if($emailError!=""){
$dataSend[]="emailError=".$emailError;
	}
	if($birthDateError!=""){
$dataSend[]="birthDateError=".$birthDateError;
	}
	if($rateUsError!=""){
$dataSend[]="rateUsError=".$rateUsError;
	}
	if($phonesError!=""){
$dataSend[]="phonesError=".$phonesError;
	}
	if($monitorsError!=""){
$dataSend[]="monitorsError=".$monitorsError;
	}
	if($laptopsError!=""){
$dataSend[]="laptopsError=".$laptopsError;
	}
	if($commentError!=""){
$dataSend[]="commentError=".$commentError;
	}
    	$dataSend=implode("&", $dataSend);
    	header('Location: contactUs.php?'.$dataSend);
    
	  }
    
    // Close connection
    mysqli_close($link);
	
?>
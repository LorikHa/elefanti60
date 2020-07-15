<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elefanti60</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/media.css">
</head>
<body>
      <?PHP
        include"includes/header.php";
    ?>

<div class="wrapper">

    <div class="content">
		<?php
			if(isset($_SESSION["message"])){
				
				echo '
				<div class="alert alert-success" role="alert" style="margin-top:20px;">
				  '. $_SESSION["message"] .'
				</div>';
				unset($_SESSION["message"]);
			}
		?>
        <!--<hr class="divider">-->
        <form method="POST" action="/saveContactUs.php" name="contactForm">
            <div class="form-group">
                <div class="form-label">
                    <label>Name:</label>
                </div>
                <div class="form-element">
                    <input name="name" id="name" type="text" placeholder="Filan">
                            <?php 
                           if(isset($_GET["nameError"])){
                                echo "<p class='error'>".$_GET["nameError"]."</p>";
                           }
                            ?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label">
                    <label>Last name:</label>
                </div>
                <div class="form-element">
                    <input name="lastName" id="lastName" type="text" placeholder="Fisteku"
                           >
                           <?php 
                           if(isset($_GET["lastNameError"])){
                                echo "<p class='error'>".$_GET["lastNameError"]."</p>";
                           }
                            ?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label">
                    <label>Email:</label>
                </div>
                <div class="form-element">
                    <input name="email" id="email" type="text" placeholder="example@example.com">
                      <?php 
                           if(isset($_GET["emailError"])){
                                echo "<p class='error'>".$_GET["emailError"]."</p>";
                           }
                            ?>
                </div>
                </div>

            <div class="form-group">
                <div class="form-label">
                    <label for="start">Birth date:</label>
                </div>
                <div class="form-element">
                    <input type="date" id="birthDate" name="birthDate"
                           value="2001-01-01"
                           min="1910-01-01" max="2019-12-31">
                           <?php 
                           if(isset($_GET["birthDateError"])){
                                echo "<p class='error'>".$_GET["birthDateError"]."</p>";
                           }
                            ?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label">
                    <label>Rate us:</label>
                </div>
                <div class="form-element">
                    <div class="radioButton">
                        <input type="radio" id="rateUs" name="rateUs" value="1" >
                        <label for="veryBad">1</label>
                    </div>

                    <div class="radioButton">
                        <input type="radio" id="rateUs" name="rateUs" value="2" >
                        <label for="bad">2</label>
                    </div>
                    <div class="radioButton">
                        <input type="radio" id="rateUs" name="rateUs" value="3" >
                        <label for="good">3</label>
                    </div>
                    <div class="radioButton">
                        <input type="radio" id="rateUs" name="rateUs" value="4" >
                        <label for="veryGood">4</label>
                    </div>
                    <div class="radioButton">
                        <input type="radio" id="rateUs" name="rateUs" value="5" >
                        <label for="excellent">5</label>
                    </div>
                </div>
                 <?php 
                           if(isset($_GET["rateUsError"])){
                                echo "<p class='error'>".$_GET["rateUsError"]."</p>";
                           }
                            ?>
            </div>

            <div class="form-group">
                <div class="checkBoxGroup">
                    <div class="form-label">
                        <label>Interested in: </label>
                    </div>
                    <div class="form-element">
                        <div class="checkBox">
                            <input type="checkbox" name="phones" value="phones"> Phones
                        </div>
                        <div class="checkBox">
                            <input type="checkbox" name="laptops" value="laptops"> Laptops
                        </div>
                        <div class="checkBox">
                            <input type="checkbox" name="monitors" value="monitors"> Monitors
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label">
                    <label>Comment:</label>
                </div>
                <div class="form-element">
                    <textarea name="comment" placeholder="Write your comment" rows="5" cols="47"></textarea>
                </div>
            </div>

            <div class="form-group button-wrapper">
                    <button type="submit" id="contactFormSubmit" name="submit">Submit</button>
            </div>
        </form>
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

<?php 

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root."/Controller/AboutController.php";
require $root."/Model/AboutModel.php";
$AboutController=new AboutController();
$userData=$AboutController->getAboutUs();
?>
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
include "includes/header.php";
?>
<div class="wrapper">
    <div class="content">
            <div class="text-aboutUs overall">
                <div class="block">
                    <div class="text-aboutUs member f-left">
                        <?php
                        $counter=0;
                        foreach($userData as $item){
                            echo '<img style = " width:200px; height: 200px; margin-bottom: 10px "src=' . $item->get_image() . '>';
                            echo '<h3>' . $item->get_title() . '</h3>';
                            echo '<p>' . $item->get_text() . '</p>';
                            echo '<hr class="divider">';
                            $counter++;
                        }
                        if($counter==0){
                            echo '0 Results';
                        }

                        ?>

                    </div>
                </div>
        </div>



</div>
<?PHP
include "includes/footer.php";
?>
<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

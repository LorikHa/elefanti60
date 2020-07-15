    <?php
    // Initialize the session
    session_start();
    ?>
<nav>

            <div class="nav-bar">
                <div class="logo">
                    <a href="./index.php">
                        <img src="./images/logo.png" alt="page logo">
                    </a>
        
                </div>
                <div class="hamburger-menu">
                    <a href="javascript:void(0);" onclick="showNavBar()">
                        <img src="./images/hamburger-menu.png" alt="page logo">
                    </a>
                </div>
                <div class="menu-box">
                    <div class="menu">
                        <ul>
                            <li><a href="./index.php"> Home</a></li>
                            <li><a href="./products.php"> Products</a></li>

                            <?php
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true &&  $_SESSION["role"]==1)
                            {
                            echo '<li><a href="./productOptions.php">Product Options</a></li>';
                            echo '<li><a href="./comments.php">Comments</a></li>';
                            echo '<li><a href="./users.php">Users</a></li>';
                            }
                            ?>
                            <li><a href="./aboutUs.php"> About us</a></li>
                            <li><a href="./contactUs.php"> Contact us</a></li>
                        </ul>
                    </div>
                    <div class="action-menu">
                        <ul>
                            <?php
                            // Initialize the session
                            // session_start();
                            // Check if the user is already logged in, if yes then redirect him to welcome page
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
                            echo '<li><a style = "background-color: unset !important; color: unset !important;">Logged in as: '.$_SESSION["username"] . '</a></li><li><a href="logout.php">Logout</a></li>';
                            }else{
                                echo '<li><a href="./login.php">Login</a></li>';
                            }
                            ?>
                            
                        </ul>
        
                    </div>
                </div>
                <div class="menu-box-clone" id="menu-box">
                    <div class="menu">
                        <ul>
                            <li><a href="./index.php"> Home</a></li>
                            <li><a href="./products.php"> Products</a></li>
                            <?php
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true &&  $_SESSION["role"]==1)
                            {
                            echo '<li><a href="./productOptions.php">Product Options</a></li>';
                            echo '<li><a href="./comments.php">Comments</a></li>';
                            echo '<li><a href="./users.php">Users</a></li>';
                            }
                            ?>
                            <li><a href="./aboutUs.php"> About us</a></li>
                            <li><a href="./contactUs.php"> Contact us</a></li>
                        </ul>
                    </div>
                    <div class="action-menu">
                        <ul>
                            <?php
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true ){
                            echo '<li><a style = "background-color: unset !important; color: unset !important;">Logged in as: '.$_SESSION["username"].'</a></li><li><a href="logout.php">Logout</a></li>';
                            }else{
                                echo '<li><a href="./login.php">Login</a></li>';
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
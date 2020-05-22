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
                            echo "Logged in as: ",$_SESSION["username"]," ";
                            // echo $_SESSION["role"];
                            echo '<li><a href="logout.php">Logout</a></li>';
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
                            <li><a href="./aboutUs.php"> About us</a></li>
                            <li><a href="./contactUs.php"> Contact us</a></li>
                        </ul>
                    </div>
                    <div class="action-menu">
                        <ul>
                            <li><a href="./login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
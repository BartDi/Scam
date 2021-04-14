<?php
    session_start();
    //! security if we are logged in and we go to the login form it will take us to the panel where we can log out
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == True ){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shortcut icon" href="./pictures/login.png">
<link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" href="css/nav.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#MenuBut").click(function(){
        $("#LeftNav").toggle();
    });
    });
    </script>
<title>Sign in/sign up form</title>
</head>
<body>
<nav>
        <div id="MenuBut" onclick="ShowMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div id="LeftNav">
        <ul>
            <a href="index.php">
                <li>Strona Główna</li>
            </a><a href="about.php">
                <li>O nas</li>
            </a><a href="RzutM-index.php">
                <li>Dla gości</li>
            </a><a href="contact.php">
                <li>Kontakt</li>
            </a>
            </a><a href="destroy.php">
            <li><?php if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']) == True) {echo "Wyloguj";} else{echo"Zaloguj";}?></li>
        </a>
        </ul>
    </div>
    <div class="container">
        <div class="container-forms">
            <div class="container-info">
                <div class="info-item">
                    <div class="table">
                        <div class="table-cell">
                            <p>
                            Zaloguj się
                            </p>
                            <button type = 'submit' class="info-btn">
                            Zaloguj się
                            </button>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="table">
                        <div class="table-cell">
                            <p>
                            Nie masz jeszcze konta?
                            </p>
                            <button type = 'submit' class="info-btn">
                            Zarejestruj się
                            </button>
                        </div>
                    </div>
                </div>
                </div>
                <form action="login.php" method = 'post'>
                <div class="container-form">
                    <?php
                        //!error and logout messages
                        if(isset($_SESSION['error'])){
                            echo '<p id="blad">'.$_SESSION["error"].'</p>';
                            unset($_SESSION['error']);
                        }
                    ?>
                <div class="form-item log-in">
                    <div class="table">
                        <div class="table-cell">
                            <input name="login" placeholder="Nazwa" type="text" required />
                            <input name="pass" placeholder="Hasło" type="Password" required />
                            <button type = 'submit' class="btn">
                            Zaloguj się
                            </button>
                        </div>
                    </div>
                </div>
                </form>
                <form action="register.php" method = 'post'>
                <div class="form-item sign-up">
                    <div class="table">
                        <div class="table-cell">
                            <input name="Rlogin" placeholder="Nazwa" type="text" required  />
                            <input name="Rpass" placeholder="Hasło" type="Password" required  />
                            <button type = 'submit' class="btn">
                            Zarejestruj się
                            </button>
                        </div>
                    </div>
                </div></form>
            </div>
        </div>
    </div>
<script src="js/form.js"></script>
</body>
</html>


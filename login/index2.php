<?php
    session_start();
    //! security if we are logged in and we go to the login form it will take us to the panel where we can log out
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == True ){
        header("Location: panel.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="style.css">
<title>Sign in/sign up form</title>
</head>
<body>
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
    <?php
        //!error and logout messages
        if(isset($_SESSION['error'])){
            echo '<p id="blad">'.$_SESSION["error"].'</p>';
            unset($_SESSION['error']);
        }
    ?>
<script src="form.js"></script>
</body>
</html>


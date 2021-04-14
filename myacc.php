<?php
    session_start();
    //! sprawdzenie czy uzytkownik jest zalogowany
    if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']) == True){
    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./photos/profil.png">
    <link rel="stylesheet" href="css/myacc.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>Twoje konto</title>
</head>
<body>
    <?php
        require('template-navbar.php');
    ?>
    <main class="main">
        <content class="content">
            <header class="header">
                <h1>Twoje konto</h1>
            </header>
                <div class="backinfo">
                    <div class="info">
                        <p><h1>Nazwa użytkownika: </h1></p>
                        <span><h2><?php echo $_SESSION['login']?></h2></span>
                    </div>
                </div>
        </content>
    </main>
</body>
</html>
<?php
    }
    else{
        $_SESSION['error'] = "Proszę się zalogować";
        header('Location: index2.php');
        exit();
    }
?>
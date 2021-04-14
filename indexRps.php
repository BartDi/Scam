<?php
    session_start();
    //! security if we are logged in and we go to the login form it will take us to the panel where we can log out
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == True ){

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamień_Papier_Nożyce</title>
    <link rel="shortcut icon" href="./pictures/kamien.png">
    <link rel="stylesheet" href="css/rps-css.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <?php
    require('template-navbar.php');
    ?>
    <div class = "tablica-wynikow">
        <div id = "user-tab" class = "gracz">User</div>
        <div id = "bot-tab" class = "gracz">Comp</div>
        <span id = "user-pkt">0</span>:<span id = "bot-pkt">0</span>
    </div>
    <div class = "wynik">
        <p>Papier pokonuje kamień. Wygrałeś!</p>
    </div>
    <div class = "wybory">
        <div class = "wybor" id = "kamien">
            <img src="./pictures/kamien2.png" alt="kamien">
        </div>
        <div class = "wybor" id = "papier">
            <img src="./pictures/papier2.png" alt="papier">
        </div>
        <div class = "wybor" id = "nozyce">
            <img src="./pictures/nozyce2.png" alt="nozyce">
        </div>
    </div>
    <p id = "akcja-mess"T>Teraz twój ruch.</p>
    <script src="js/rps-game.js"></script>
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
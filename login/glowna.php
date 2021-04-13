<?php
    session_start();
    //! security if we are logged in and we go to the login form it will take us to the panel where we can log out
    if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']) == True){
    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="glowna.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#MenuBut").click(function(){
        $("#LeftNav").toggle();
    });
    });
    </script>
</head>
<body>
    <nav>
        <div id="MenuBut" onclick="ShowMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    
        <div id="glow">
            <div class="GameBox" id="Roulette">
                <a href="ruletka.php"><img src="ruletka.png" alt="Ruletka"></a>
            </div>
            <div class="GameBox" id="Hangman">
                <a href="hangMan.php"><img src="wisielec.png" alt="Wisielec"></a>
            </div>
            <div class="GameBox" id="Rock">
                <a href="IndexRps.php"><img src="nozyce.png" alt="KamieńPapier"></a>
            </div>
            <div class="GameBox" id="Coin">
                <a href="RzutM-index.php"><img src="moneta.png" alt="RzutMonetą"></a>
            </div>
        </div>

    <div id="LeftNav">
        <ul>
            <a href="#">
                <li>Strona Główna</li>
            </a><a href="#">
                <li>O nas</li>
            </a><a href="#">
                <li>Kontakt</li>
            </a>
        </a><a href="#">
            <li>Ustawienia</li>
        </a>
        </ul>
    </div>
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

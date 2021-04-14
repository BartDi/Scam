<?php
session_start();
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="css/glowna.css">
    <link rel="shortcut icon" href="./pictures/home.png">
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
        <a href="myacc.php">
            <div class="Account2" id="Account2">
                <img id="accountimg2" src="./photos/profil.png" alt="Profil">
            </div>
        </a>
    </nav>
    <div id="glow">
        <div class="GameBox" id="Roulette">
            <a href="ruletka.php"><img src="./photos/ruletka.png" alt="Ruletka"></a>
        </div>
        <div class="GameBox" id="Hangman">
            <a href="hangMan.php"><img src="./photos/wisielec.png" alt="Wisielec"></a>
        </div>
        <div class="GameBox" id="Rock">
            <a href="IndexRps.php"><img src="./photos/nozyce.png" alt="KamieńPapier"></a>
        </div>
        <div class="GameBox" id="Coin">
            <a href="RzutM-index.php"><img src="./photos/moneta.png" alt="RzutMonetą"></a>
        </div>
    </div>
    <div id="LeftNav">
        <ul>
            <a href="#">
                <li>Strona Główna</li>
            </a><a href="about.php">
                <li>O nas</li>
            </a><a href="contact.php">
                <li>Kontakt</li>
            </a>
            </a><a href="destroy.php">
            <li><?php if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']) == True) {echo "Wyloguj";} else{echo"Zaloguj";}?></li>
        </a>
        </ul>
    </div>
</body>
</html>
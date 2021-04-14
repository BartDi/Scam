<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/RzutM-styl.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="shortcut icon" href="./pictures/ikona.png">
    <script type="text/javascript" src="js/RzutM-script.js"></script>
    <title>Rzut Monetą</title>
</head>
<body>
    <?php 
        require('template-navbar.php');
    ?>
    <container class="container">
        <div class="left"></div>
        <div class="main">
            <header class="header">
                <h1>Rzut Monetą</h1>
            </header>
            <div class='whit'>
                <div>
                    <p>Rzuć monetą i sprawdź swoje szczęście!</p>
                        <div class="center">
                            <div id="Moneta" class=''>
                                <div id="orzel" class="orzel"></div>
                                <div id="reszka" class="reszka"></div>
                            </div>
                            <button class="zakrec">Rzuć monetą</button>
                        </div>
                    <p class="wynik">Orzeł: <span id="liczbaOrzel">0</span>
                        | Reszka: <span id="liczbaReszka">0</span></p>
                </div>
            </div>
            <div class="stopka"></div>
        </div>
        <div class="right"></div>
    </container>
</body>
</html>

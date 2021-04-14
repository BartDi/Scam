<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#MenuBut").click(function(){
        $("#LeftNav").toggle();
    });
    });
    </script>
<div id="UppNav">
        <div id="MenuBut" onclick="ShowMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <a href="ruletka.php">
        <div class="GameBox" id="Roulette">
            <img src="./photos/ruletka.png" alt="Ruletka">
        </div>
        </a><a href="hangMan.php">
            <div class="GameBox" id="Hangman">
                <img src="./photos/wisielec.png" alt="Wisielec">
            </div>
        </a><a href="indexRps.php">
            <div class="GameBox" id="Rock">
                <img src="./photos/nozyce.png" alt="KamienPapier">
            </div>
        </a><a href="RzutM-index.php">
            <div class="GameBox" id="Coin">
                <img src="./photos/moneta.png" alt="RzutMoneta">
            </div>
        </a>

        <a href="myacc.php">
            <div class="Account" id="Account">
                <img id="accountimg" src="./photos/profil.png" alt="Profil">
            </div>
        </a>
    </div>
    <div id="LeftNav">
        <ul>
            <a href="index.php">
                <li>Strona Główna</li>
            </a><a href="about.php">
                <li>O nas</li>
            </a><a href="contact.php">
                <li>Kontakt</li>
            </a>
        </a><a href="destroy.php">
            <li><?php if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']) == True) {echo "Wyloguj";} else{echo "Zaloguj";}  ?></li>
        </a>
        </ul>
    </div>
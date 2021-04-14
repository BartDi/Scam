<?php
    session_start();
    //! security if we are logged in and we go to the login form it will take us to the panel where we can log out
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == True ){

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ruletka</title>
    <link rel="shortcut icon" href="./photos/ruletka.png">
    <link rel="stylesheet" href="css/ruletka.css">
    <link rel="stylesheet" href="css/nav.css">
    <script>
(function (loader) {
    document.addEventListener("DOMContentLoaded", loader[0], false);
})([
    function (eventLoadedPage) {
        "use strict";

        function rand(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }

        var wrap, colors;
        // colors = ["red"]
        var pallete = [
            "r18",
            "b8",
            "r19",
            "g2",
            "r20",
            "r21",
            "b9",
            "r10",
            "g3",
            "r11",
            "b4",
            "r12",
            "b5",
            "r13",
            "b6",
            "r14",
            "g0",
            "r15",
            "b7",
            "r16",
            "g1",
            "r17"
        ];

        var bets = {
            green: [2, 3, 0, 1],
            red: [18, 19, 20, 21, 10, 11, 12, 13, 14, 15, 16, 17],
            black: [8, 9, 4, 5, 6, 7]
        };

        var width = 80;

        wrap = document.querySelector(".roulette-container .wrap");

        function spin_promise(color, number) {
            return new Promise((resolve, reject) => {
                if (
                    ((color === "green" || color === "g") &&
                        number >= 0 &&
                        number <= 3) ||
                    ((color === "black" || color === "b") &&
                        number >= 4 &&
                        number <= 9) ||
                    ((color === "red" || color === "r") &&
                        number >= 10 &&
                        number <= 21)
                ) {
                    let index, pixels, circles, pixelsStart;

                    color = color[0];
                    index = pallete.indexOf(color + "" + number);
                    pixels = width * (index + 1);
                    circles = 1760 * 15; //15 circles

                    pixels -= 80;
                    pixels = rand(pixels + 2, pixels + 79);
                    pixelsStart = pixels;
                    pixels += circles;
                    pixels *= -1;

                    wrap.style.backgroundPosition =
                        pixels + wrap.offsetWidth / 2 + "" + "px";

                    setTimeout(() => {
                        wrap.style.transition = "none";
                        let pos =
                            (pixels * -1 - circles) * -1 + wrap.offsetWidth / 2;
                        wrap.style.backgroundPosition = String(pos) + "px";
                        setTimeout(() => {
                            wrap.style.transition = "background-position 5s";
                            resolve();
                        }, 510);
                    }, 5000 + 700);
                }
            });
        }

        var i = 0;

        function play() {
            let color;
            let r = rand(1, 1000);
            if (1 <= r && r < 30) color = "green";
            else if (30 <= r && r < 530) color = "red";
            else if (530 <= r && r < 1000) color = "black";
            let bet = bets[color][rand(0, bets[color].length)];
            spin_promise(color, bet).then(() => {
                console.log("[Ended]");
                let colorBeted = document.getElementById('loso');
                colorBeted.setAttribute("class", "color-beted " + color[0]);
                colorBeted.innerHTML = "";
                colorBeted.innerHTML = bet;
                document.body.appendChild(colorBeted);

            });
        }
        var but = document.getElementById('ww');
        but.addEventListener('click', play);
    }
]);
    </script>
</head>
<body>
    <?php
        require('template-navbar.php');
    ?>
    <div class="roulette">
        <div class="roulette-container">
          <div class="wrap">
            <div class="controller"></div>
          </div>
        </div>
      </div>
      <div>
          <button id="ww">Graj</button>
      </div>
      <div id="Wy">
        <h1>Wylosowałeś:</h1>
      </div>
      <div id='loso'>
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
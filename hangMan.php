<?php
    session_start();
    //! security if we are logged in and we go to the login form it will take us to the panel where we can log out
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == True ){

?>
<!DOCTYPE html>
<html lang="pl" >
<head>
  <meta charset="UTF-8">
  <title>HangMan</title>
  <link rel="shortcut icon" href="./photos/wisielec.png">
  <link rel="stylesheet" href="css/hangMan.css">
  <link rel="stylesheet" href="css/nav.css">
</head>
<body>
<?php
  require('template-navbar.php');
?>
<!-- partial:index.partial.html -->
<!-- <div class="rapper">
  <h1>Wisielec</h1>
  <p>Użyj alfabetu poniżej, aby odgadnąć hasło, albo wykorzystaj podpowiedź. </p>
</div> -->
<div class="all-in">
  <div class="wrapper">
      <div id="buttons">
      </div>  
      <p id="catagoryName"></p>
      <div id="hold">
      </div>
      <p id="mylives"></p>
      <p id="clue">Podpowiedź -</p>  
      <canvas id="stickman">Niestety twoja przeglądarka nie wspomaga HTML5. Przykro nam!</canvas>
      <div class="container">
        <button id="hint">Chcę podpowiedź</button>
        <button id="reset">Zagraj jeszcze raz</button>
      </div>
  </div>
</div>

<!-- partial -->
  <script  src="js/hangMan.js"></script>

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

window.onload = function () {

  var alphabet = ['a', 'ą', 'b', 'c', 'ć', 'd', 'e', 'ę', 'f', 'g', 'h',
        'i', 'j', 'k', 'l','ł', 'm', 'n', 'ń', 'o', 'ó', 'p', 'q', 'r', 's', 'ś',
        't', 'u', 'v', 'w', 'x', 'y', 'z', 'ź', 'ż'];
  
  var categories;         // Array of topics
  var chosenCategory;     // Selected catagory
  var getHint ;          // Word getHint
  var word ;              // Selected word
  var guess ;             // Geuss
  var geusses = [ ];      // Stored geusses
  var lives ;             // Lives
  var counter ;           // Count correct geusses
  var space;              // Number of spaces in word '-'

  // Get elements
  var showLives = document.getElementById("mylives");
  var showCatagory = document.getElementById("scatagory");
  var getHint = document.getElementById("hint");
  var showClue = document.getElementById("clue");



  // create alphabet ul
  var buttons = function () {
    myButtons = document.getElementById('buttons');
    letters = document.createElement('ul');

    for (var i = 0; i < alphabet.length; i++) {
      letters.id = 'alphabet';
      list = document.createElement('li');
      list.id = 'letter';
      list.innerHTML = alphabet[i];
      check();
      myButtons.appendChild(letters);
      letters.appendChild(list);
    }
  }
    
  
  // Select Catagory
  var selectCat = function () {
    if (chosenCategory === categories[0]) {
      catagoryName.innerHTML = "Kategoria: Państwa";
    } else if (chosenCategory === categories[1]) {
      catagoryName.innerHTML = "Kategoria: Filmy";
    } else if (chosenCategory === categories[2]) {
      catagoryName.innerHTML = "Kategoria: Miasta";
    } else if (chosenCategory === categories[3]) {
      catagoryName.innerHTML = "Kategoria: Zwierzęta";
    } else if (chosenCategory === categories[4]) {
      catagoryName.innerHTML = "Kategoria: Gry";
    } else if (chosenCategory === categories[5]) {
      catagoryName.innerHTML = "Kategoria: Jedzenie";
    } else if (chosenCategory === categories[6]) {
      catagoryName.innerHTML = "Kategoria: Imiona";
    }
  }

  // Create geusses ul
   result = function () {
    wordHolder = document.getElementById('hold');
    correct = document.createElement('ul');

    for (var i = 0; i < word.length; i++) {
      correct.setAttribute('id', 'my-word');
      guess = document.createElement('li');
      guess.setAttribute('class', 'guess');
      if (word[i] === "-") {
        guess.innerHTML = "-";
        space = 1;
      } else {
        guess.innerHTML = "_";
      }

      geusses.push(guess);
      wordHolder.appendChild(correct);
      correct.appendChild(guess);
    }
  }
  
  // Show lives
   comments = function () {
    if(lives > 2)
      showLives.innerHTML = "Masz " + lives + " żyć";
    if(lives == 2)
    showLives.innerHTML = "Masz " + lives + " życia";
    if(lives == 1)
      showLives.innerHTML = "Masz " + lives + " życie";
    if (lives < 1) {
      showLives.innerHTML = "Przegrałeś :C";
    }
    for (var i = 0; i < geusses.length; i++) {
      if (counter + space === geusses.length) {
        showLives.innerHTML = "Wygrałeś! :D";
      }
    }
  }

      // Animate man
  var animate = function () {
    var drawMe = lives ;
    drawArray[drawMe]();
  }

  
   // Hangman
  canvas =  function(){

    myStickman = document.getElementById("stickman");
    context = myStickman.getContext('2d');
    context.beginPath();
    context.strokeStyle = "#fff";
    context.lineWidth = 2;
  };
  
    head = function(){
      myStickman = document.getElementById("stickman");
      context = myStickman.getContext('2d');
      context.beginPath();
      context.arc(60, 25, 10, 0, Math.PI*2, true);
      context.stroke();
    }
    
  draw = function($pathFromx, $pathFromy, $pathTox, $pathToy) {
    
    context.moveTo($pathFromx, $pathFromy);
    context.lineTo($pathTox, $pathToy);
    context.stroke(); 
}

   frame1 = function() {
     draw (0, 150, 150, 150);
   };
   
   frame2 = function() {
     draw (10, 0, 10, 600);
   };
  
   frame3 = function() {
     draw (0, 5, 70, 5);
   };
  
   frame4 = function() {
     draw (60, 5, 60, 15);
   };
  
   torso = function() {
     draw (60, 36, 60, 70);
   };
  
   rightArm = function() {
     draw (60, 46, 100, 50);
   };
  
   leftArm = function() {
     draw (60, 46, 20, 50);
   };
  
   rightLeg = function() {
     draw (60, 70, 100, 100);
   };
  
   leftLeg = function() {
     draw (60, 70, 20, 100);
   };
  
  drawArray = [rightLeg, leftLeg, rightArm, leftArm,  torso,  head, frame4, frame3, frame2, frame1]; 


  // OnClick Function
   check = function () {
    list.onclick = function () {
      var geuss = (this.innerHTML);
      this.setAttribute("class", "active");
      this.onclick = null;
      for (var i = 0; i < word.length; i++) {
        if (word[i] === geuss) {
          geusses[i].innerHTML = geuss;
          counter += 1;
        } 
      }
      var j = (word.indexOf(geuss));
      if (j === -1) {
        lives -= 1;
        comments();
        animate();
      } else {
        comments();
      }
    }
  }
  
    
  // Play
  play = function () {
    categories = [
        ["czechy", "polska", "usa", "wielka-brytania", "niemcy"],
        ["obcy", "gladiator", "matrix", "szczęki", "harry-potter"],
        ["białystok", "olsztyn", "poznań", "kraków", "warszawa"],
        ["owca", "pies", "koń", "wydra", "krowa"],
        ["wiedźmin", "kangurek-kao", "mario", "tetris", "cyberpunk"],
        ["makaron", "tort", "kebab", "pierogi", "pizza"],
        ["maciej", "bartosz", "mateusz", "szymon", "aleksander"]
    ];

    chosenCategory = categories[Math.floor(Math.random() * categories.length)];
    word = chosenCategory[Math.floor(Math.random() * chosenCategory.length)];
    word = word.replace(/\s/g, "-");
    console.log(word);
    buttons();

    geusses = [ ];
    lives = 10;
    counter = 0;
    space = 0;
    result();
    comments();
    selectCat();
    canvas();
  }

  play();
  
  // Hint

    hint.onclick = function() {

      hints = [
        ["Powstała z rozpadu Czechosłowacji", ".... gurom", "Byłym prezydentem byl facet z tupecikiem", "Wyszła niedawno z Unii Europejskiej", "Są sławni ze swoich kiełbas"],
        ["Walczyli z Predatorem", "Walczy na arenie", "Kule go nie dosięgną", "Rekin to mało powiedziane", "Ma rudego kolegę"],
        ["Miasto z najlepszą szkołą w województwie", "Miasto studenckie", ".... - miasto doznań", "miasto na prawach powiatu położone w południowej Polsce nad Wisłą, drugie co do liczby mieszkańców i powierzchni miasto kraju, formalna stolica Polski do 1795 r. i miasto koronacyjne oraz nekropolia królów Polski", "Drogie!"],
        ["Więcej niż jedno zwierze to: ...", "W powiedzeniu - nie dla niego kiełbasa", "Gdy baba z wozu to mają lżej", "Podobno aktor Benedict Cumberbatch wygląda jak to zwierze", "Daje mleko"],
        ["Ulubiona gra nauczyciela wychowawcy 2GT (stan na rok 2021)", "Przygody walecznego torbacza", "Najlepszy hydraulik we wszechświcie", "Napopularniejsza sowiecka gra", "Nie działa ...."],
        ["Użyty do spaghetti", "Słodki na weselu (nie chodzi o męża)", "Idziemy na .....", "Słynne w polsce", "Najlepsza jest hawajska"],
        ["Imie aktora grającego Sir Lazlo w serialu Netflixa", ".... Kurek - polski siatkarz", "Polski menedżer, bankowiec i polityk. Od 2017 prezes Rady Ministrów stojący na czele pierwszego i drugiego swojego gabinetu", "Polski dziennikarz, pisarz, publicysta, prezenter telewizyjny, działacz społeczny i polityk. Kandydat na urząd prezydenta RP w pierwszych i drugich wyborach w 2020", "Polski polityk i dziennikarz. Prezydent Rzeczypospolitej Polskiej w latach 1995–2005"]
    ];

    var catagoryIndex = categories.indexOf(chosenCategory);
    var hintIndex = chosenCategory.indexOf(word);
    showClue.innerHTML = "Clue: - " +  hints [catagoryIndex][hintIndex];
  };

   // Reset

  document.getElementById('reset').onclick = function() {
    correct.parentNode.removeChild(correct);
    letters.parentNode.removeChild(letters);
    showClue.innerHTML = "";
    context.clearRect(0, 0, 400, 400);
    play();
  }
}
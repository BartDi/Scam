const punktyU = document.getElementById("user-pkt");
const punktyC = document.getElementById("bot-pkt");
const kamien_div = document.getElementById("kamien");
const papier_div = document.getElementById("papier");
const nozyce_div = document.getElementById("nozyce");
const wynik_div = document.querySelector(".wynik>p");
//const tabelaWynikow = document.querySelector(".tablica-wynikow");
var compPkt = 0;
var userPkt = 0;

function gra(wyborU){
    const wyborC = CompWyb();
    //console.log("wybor gracza = "+wyborU);
    //console.log("wybor komp = "+wyborC);
    if(wyborU+wyborC =="kamiennozyce"){
        console.log("wygrales");
        userPkt++;
        punktyU.innerHTML = userPkt;
        wynik_div.innerHTML = "Kamień bije nożyce. Wygrałeś !";
    }else if(wyborU+wyborC =="papierkamien"){
        console.log("wygrales");
        userPkt++;
        punktyU.innerHTML = userPkt;
        wynik_div.innerHTML = "Papier bije kamień. Wygrałeś !";
    }else if(wyborU+wyborC =="nozycepapier"){
        console.log("wygrales");
        userPkt++;
        punktyU.innerHTML = userPkt;
        wynik_div.innerHTML = "Nożyce biją papier. Wygrałeś !";
    }else if(wyborU+wyborC =="kamienpapier"){
        console.log("przegrales");
        compPkt++;
        punktyC.innerHTML = compPkt;
        wynik_div.innerHTML = "Papier bije kamień! Przegrałeś !";
    }else if(wyborU+wyborC =="papiernozyce"){
        console.log("przegrales");
        compPkt++;
        punktyC.innerHTML = compPkt;
        wynik_div.innerHTML = "Nożyce biją na papier! Przegrałeś !";
    }else if(wyborU+wyborC =="papierkamien"){
        console.log("przegrales");
        compPkt++;
        punktyC.innerHTML = compPkt;
        wynik_div.innerHTML = "Papier bije kamień! Przegrałeś !";
    }else{
        wynik_div.innerHTML = "Tym razem remis :/";
        // compPkt++;
        // userPkt++;
        // punktyC.innerHTML = compPkt;
        // punktyU.innerHTML = userPkt;
    }
}
function CompWyb(){
    const wybory = ['kamien','papier','nozyce'];
    const losowanie = Math.floor(Math.random()*3);
    return wybory[losowanie];
}

kamien_div.addEventListener('click', function(){
    gra("kamien");
})
papier_div.addEventListener('click', function(){
    gra("papier");
})
nozyce_div.addEventListener('click',function(){
    gra("nozyce");
})

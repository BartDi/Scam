window.onload = function()
{
    const moneta = document.getElementById('Moneta');
    const button = document.querySelector('.zakrec');
    const status = document.getElementById('status');
    const orzel = document.getElementById('liczbaOrzel');
    const reszka = document.getElementById('liczbaReszka');

    var liczbaOrzel = 0;
    var liczbaReszka = 0;
    var wynik;


    function Slowdown(callback, ms) 
    {
        setTimeout(callback, ms); 
    }

    function Rezultat(wynik) 
    {
        if (wynik == 'orzel') 
        {
            liczbaOrzel++;
            orzel.innerText = liczbaOrzel;
        } 
        else 
        {
            liczbaReszka++;
            reszka.innerText = liczbaReszka;
        }
        status.innerText = wynik.toUpperCase();
    }

    function flipCoin() 
    {
        moneta.setAttribute('class', '');
        moneta.setAttribute('class', 'Moneta');
        const random = Math.random();
        if(random < 0.5)
        {
            wynik = 'orzel';
            //moneta.setAttribute('class', 'animacjaFlip-orzel');
        }

        else
        {
            wynik = 'reszka';
            //moneta.setAttribute('class', 'animacjaFlip-reszka');
        }

        //moneta.setAttribute('class', 'animacjaFlip-' + wynik);
        //Slowdown(Rezultat.bind(null, wynik), 3000);
        Slowdown(function() 
        {
            moneta.setAttribute('class', 'animacjaFlip-' + wynik);
            Slowdown(Rezultat.bind(null, wynik), 2900);
        }, 100);
    }

    button.onclick = flipCoin;
    //button.addEventListener('click', flipCoin);

}


const coin = document.getElementById('Moneta');
const button = document.querySelector('zakrec');
const status = document.getElementById('status');
const heads = document.getElementById('liczbaOrzel');
const tails = document.getElementById('liczbaReszka');

let headsCount = 0;
let tailsCount = 0;

button.onclick = flipCoin;

function deferFn(callback, ms) {
  setTimeout(callback, ms); 
}

function processResult(result) {
   if (result === 'heads') {
      headsCount++;
      heads.innerText = headsCount;
    } else {
      tailsCount++;
      tails.innerText = tailsCount;
    }
    status.innerText = result.toUpperCase();
}

function flipCoin() {
  coin.setAttribute('class', '');
  const random = Math.random();
  const result = random < 0.5 ? 'heads' : 'tails';
 deferFn(function() {
   coin.setAttribute('class', 'animate-' + result);
   deferFn(processResult.bind(null, result), 2900);
 }, 100);
}


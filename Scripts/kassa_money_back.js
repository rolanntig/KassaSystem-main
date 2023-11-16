// takes the finalPrice from document and make the value visable, splits of the rest
let price = parseFloat(document.getElementById("price").textContent.split(' ')[0]);
// hämtar en tom <p>
let payBack = document.getElementById("payBack");
// sätter en variabel på input i kontant diven
let payed = document.getElementById("payed");

// funktion som sätter en string i paragrafen (payed)
function moneyBack() {
  let växel = payed.value - price;
  payBack.textContent = "Växel: " + växel + "kr";
}

// när inputden förändras så kallar den funktionen ovanför
payed.addEventListener("input", moneyBack);

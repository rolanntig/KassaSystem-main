// takes the finalPrice from document and make the value visable, splits of the rest
let price = parseFloat(document.getElementById("price").textContent.split(' ')[0]);
// hämtar en tom <p>
let payBack = document.getElementById("payBack");
// sätter en variabel på input i kontant diven
let payed = document.getElementById("payed");
// 
/* let checkoutBtn = document.getElementById("checkout-btn-kontant");
checkoutBtn.disabled = true; */

// funktion som sätter en string i paragrafen (payed)
function moneyBack() {
  //skillnad mellan penagr som betalats och priset
  let växel = payed.value - price;
  //En array med alla slags kontanter som finns (i vår kod) + det högsta numret, så att man kan modulus 200 och få 200 :D
  let moneyType = [1,5,10,20,50,100,200,Math.pow(10,1000)];
  // lagar alla errors(ultimate fix)
  try {
  /* takes modulus of previous bill on current bill, then divides it and floors it to see the amount, and continues untill all money 
  has gone throught the processs*/
    if (price <= payed.value) {
      payBack.textContent = "Växel: " + växel + "kr";
  
      for(i=0;i <= moneyType.length;i++){
  
        document.getElementById(`kr${moneyType[i]}`).textContent=Math.floor((växel%moneyType[i+1])/moneyType[i]);
  
      }
  
    } else {
      payBack.textContent = "Växel: 0kr";
  
      //makes empty string for = 0
      for(i=0;i <= moneyType.length;i++){
        document.getElementById(`kr${moneyType[i]}`).textContent="";
      }
  
    }
 
  if (price <= payed.value) {
    payBack.textContent = "Växel: " + växel + "kr";
    /* checkoutBtn.disabled = false; */

    for(i=0;i <= moneyType.length;i++){

      document.getElementById(`kr${moneyType[i]}`).textContent=Math.floor((växel%moneyType[i+1])/moneyType[i]);

    }

  } else {
    payBack.textContent = "Växel: 0kr";
  
    //makes empty string for = 0
    for(i=0;i <= moneyType.length;i++){
      document.getElementById(`kr${moneyType[i]}`).textContent="";
    }

  }
} catch (error) {
  
}

}

// när inputden förändras så kallar den funktionen ovanför
payed.addEventListener("input", moneyBack);
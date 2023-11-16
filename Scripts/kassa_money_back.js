// takes the finalPrice from document and make the value visable, splits of the rest
let price = parseFloat(document.getElementById("price").textContent.split(' ')[0]);
// hämtar en tom <p>
let payBack = document.getElementById("payBack");
// sätter en variabel på input i kontant diven
let payed = document.getElementById("payed");

let bills = document.getElementById("bills");

// funktion som sätter en string i paragrafen (payed)
function moneyBack() {
  let växel = payed.value - price;
  let moneyType = [1,5,10,20,50,100,200,100000000000000000000000];
  if (price <= payed.value) {
    payBack.textContent = "Växel: " + växel + "kr";
    // bills.textContent = Math.floor(växel/200) + "*200kr " + Math.floor((växel%200)/100) + "*100kr " + 
    // Math.floor((växel%100)/50) + "*50kr " + Math.floor((växel%50)/20) + "*20kr " + 
    // Math.floor((växel%20)/10) + "*10kr " + Math.floor((växel%10)/5) + "*5kr "
    // + " + " +växel % 5 + "kr";

    for(i=0;i <= moneyType.length;i++){

      document.getElementById(kr${moneyType[i]}).textContent=Math.floor((växel%moneyType[i+1])/moneyType[i]);

    }

  } else {
    payBack.textContent = "KILL YOURSELF NOW";

    //makes empty string for = 0
    for(i=0;i <= moneyType.length;i++){
      document.getElementById(kr${moneyType[i]}).textContent="";
    }

  }

  if (document.getElementById(`kr${moneyType[i]}`)==0){
    document.getElementById(`kr${moneyType[i]}`).textContent="";
  }

}

// när inputden förändras så kallar den funktionen ovanför
payed.addEventListener("input", moneyBack);
let cost = document.getElementById("cost");
let newCostInt = Number((0,cost.search("kr")));

let payed = Number(document.getElementById("payed"));
let newPayedInt = payed.value;

let payBack= document.getElementById("payBack");

const calculate = ()=>{

  payBack = (cost-payed);
} 

payed.addEventListener(oninput, ()=> calculate());
let cost = document.getElementById("cost");
let newCostInt = Number((cost.slice(cost.search(" "),cost.search("kr"))));

let payed = document.getElementById("payed");
let newPayedInt=Number((payed.slice(payed.search(" "),payed.search("kr"))));

let payBack= document.getElementById("payBack");

const calculate = ()=>{

  payBack = (cost-payed);
} 

payed.addEventListener(oninput, ()=> calculate());
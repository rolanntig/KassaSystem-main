let money = document.getElementById("payed");
let newMoney = money.slice(money.search(" "));
let newMoneyInt= Number(newMoney.slice(newMoney.search("4"),newMoney.search("k")));

// Checks if the value of an input has been changed
// If it has it checks so that the value does not exeed the max amount
// if it does then alert and update the value, otherwise update a cookie and set the value of it to the 
// input value while also updating the cash total of the item. (not full total done yet!)
$(".kassaAmountInput").on("change", (event) => {
  let thing = event.target.id.split("_counter")[0];
  if (parseInt(event.target.value) <= parseInt(event.target.max)) {
    document.cookie = `${event.target.id}=${event.target.value}`;
    $(`#${thing}_prices`).text(
      parseInt(event.target.name) * parseInt(event.target.value) + "kr"
    );
    
  } else{
    event.target.value = event.target.max;
    alert("Max amount of item is " + event.target.max + "!");
  }
});
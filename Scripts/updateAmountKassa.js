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
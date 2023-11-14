// Get containers for swish and kontant methods
const swishDiv = document.getElementById('swishDiv');
const kontantDiv = document.getElementById('kontantDiv');

// Get the radio button elements by their IDs
var swishRadio = document.getElementById("swish");
var kontantRadio = document.getElementById("kontant");

// Add event listener to the radio buttons
swishRadio.addEventListener("change", radioChangeHandler);
kontantRadio.addEventListener("change", radioChangeHandler);

// Event handler function
function radioChangeHandler() {
  // Check which radio button is selected
  if (swishRadio.checked) {
    kontantDiv.style.display = "none";
    swishDiv.style.display = "flex";
  } else if (kontantRadio.checked) {
    swishDiv.style.display = "none";
    kontantDiv.style.display = "flex";
  }
}
// select container in html code with the following class
const div = document.querySelector(".itemContainer");
// select the "select" tag with the following id
let selectElement = document.getElementById("category");

// function that changes the id of the container
function handleCategoryChange() {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    div.id = selectedValue;
}

// calls the function above when the select tag is changed
selectElement.addEventListener("change", handleCategoryChange);
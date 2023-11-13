const div = document.querySelector(".itemContainer")
let selectElement = document.getElementById("category");

function handleCategoryChange() {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    div.id = selectedValue;
    console.log(selectedValue);
}

selectElement.addEventListener("change", handleCategoryChange);
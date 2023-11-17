// select container in html code with the following class
const con = document.querySelector(".itemContainer");
// select the "select" tag with the following id
let selectElement = document.getElementById("category");
let elemByBarcode = document.getElementById("barcode");

let divs = document.querySelectorAll('.itemContainer>form>div');
let btns = document.querySelectorAll('.itemContainer>form>div>button');

// function that changes the id of the container
function handleCategoryChange() {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;
    var elemByBarcodeValue = elemByBarcode.value;

    // if option's value is not "" the following will happen
    if (selectedValue !== "") {
        divs.forEach((div, index) => {
            // if the class is the same as selectedValue
            if (btns[index].className !== selectedValue) {
                div.style.display = "none";
            } else {
                div.style.display = "flex";
            }
        });
    } 
    // if barcode input is not empty the following will happen
    else if (elemByBarcodeValue !== "") {
        divs.forEach((div, index) => {
            // if id is not the same as elemByBarcodeValue (selected barcode)
            if (btns[index].id !== elemByBarcodeValue) {
                div.style.display = "none";
            } else {
                div.style.display = "flex";
            }
        });
    } else {
        divs.forEach((div) => {
            div.style.display = "flex";
        });
    }

    con.id = selectedValue;
}

// calls the function above when the select tag is changed
selectElement.addEventListener("change", handleCategoryChange);

// calls the funtion when barcode input has detected a change
elemByBarcode.addEventListener("input", handleCategoryChange);
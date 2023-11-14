// select container in html code with the following class
const con = document.querySelector(".itemContainer");
// select the "select" tag with the following id
let selectElement = document.getElementById("category");

let divs = document.querySelectorAll('.itemContainer>form>div');
let btns = document.querySelectorAll('.itemContainer>form>div>button');

// function that changes the id of the container
function handleCategoryChange() {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var selectedValue = selectedOption.value;

    if (selectedValue !== "") {
        divs.forEach((div, index) => {
            if (btns[index].className !== selectedValue) {
                div.style.display = "none";
            } else {
                div.style.display = "block";
            }
        });
    } else {
        divs.forEach((div) => {
            div.style.display = "block";
        });
    }

    con.id = selectedValue;
}

// calls the function above when the select tag is changed
selectElement.addEventListener("change", handleCategoryChange);
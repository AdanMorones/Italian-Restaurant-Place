// Ashley Rivera Ruiz updated 11/10/2026

/* function closePopup(popup){
    if (popup == null) return
    popup.classList.remove('active')
    overlay.classList.remove('active')
} */

function closePopup(id) {
  var x = document.getElementById(id);
  var overlay = document.getElementById('overlay')
  x.classList.remove('active')
  overlay.classList.remove('active')
} 


// menu item object stores all its information
class menuItem {
    constructor(name, description, price){
        this.name = name;
        this.description = description;
        this.price = price;
        // currently not worrying about the image
    }
}

const menuItemArray = [];

// push in all the menu items present in the database (potentially with a loop?)
// one singular menu item will be hard coded for proof of concept
// this is because I am not sure how to implement this concept with our actual database yet

// create and store item in array
const spaghetti = new menuItem("Spaghetti", "This item is spaghetti.", 14);
menuItemArray.push(spaghetti);

// display item in html
const test = document.getElementById("testTitle");
const test2 = document.getElementById("testDesc");
const test3 = document.getElementById("testPrice");
test.innerHTML = menuItemArray[0].name;
test2.innerHTML = menuItemArray[0].description;
test3.innerHTML = "$" + menuItemArray[0].price.toFixed(2); //toFixed(2) is important for price

// login
function confirmInput() {
  lgName = document.forms[0].lgName.value;
  lgPass = document.forms[0].lgPass.value;
  alert("Hello " + lgName + " with password " + lgPass + ", you will now be logged in")
}

//connect php
fetch(/php/restaurant.php)
    .then(function() {
    })

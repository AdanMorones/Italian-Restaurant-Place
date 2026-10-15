// Ashley Rivera Ruiz initialized on October 14

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

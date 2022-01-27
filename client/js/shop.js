import { shoppyProducts } from '../js/shoppyProducts.js';

const productsRow = document.getElementById("productsRow");

function displayProducts(){
    shoppyProducts.forEach((shoppyProduct) => {
        console.log(shoppyProduct);
    });
}

displayProducts();
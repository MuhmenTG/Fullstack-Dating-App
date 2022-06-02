import { setCartToLocalStorage } from "./utilities/localStorage/localstorage.js";
import { HttpRequest } from "./utilities/serverHttpRequest.js";
const productsRow = document.getElementById("gallery");

async function getProducts(){
    let response = await HttpRequest.server('../api/shoppingCart/getAllBuybleProducts.php', 'POST');
    console.log(response);
    if(response){
        await displayProducts(response);   
    }
    else{
        //errorhandling
    }
}

function displayProducts(response){
    response.map((v, i) => {
    productsRow.innerHTML += `
    <div class="content">
        <img src="shoes.png">
        <h3>${v.productName}</h3>
        <p>${v.productDescription}</p>
        <h6>${v.prodctPrice} DKK</h6>
        <button data-cart="${v}" class="buy-1 addToCart">Add to Cart</button>
    </div>
    `;
    })
    sendSpecificProductInfo("data-cart", "addToCart", addToCart);
}
getProducts();



function sendSpecificProductInfo(product, btnClass, callback) {
    const mButtons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
            callback(this.getAttribute(product)); 
        });
    }
}

function addToCart(product){
   setCartToLocalStorage(product)
}

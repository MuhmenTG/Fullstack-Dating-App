import { setCartToLocalStorage } from "../utilities/localStorage/localstorage.js";
import { HttpRequest } from "../utilities/serverHttpRequest.js";
const productsRow = document.getElementById("gallery");
let products = []

async function getProducts(){
    let response = await HttpRequest.server("../api/shoppingCart/getAllBuybleProducts.php", "POST")
    if(response){
        await displayProducts(response);   
    }
    else{
        //errorhandling
    }
}
getProducts();

function displayProducts(response){
    response.map((v, i) => {
    console.log(typeof v);
    productsRow.innerHTML += `
    <div class="content">
        <img src="shoes.png">
        <h3>${v.productName}</h3>
        <p>${v.productDescription}</p>
        <h6>${v.prodctPrice} DKK</h6>
        <button 
        data-productId="${v.productId}" 
        data-productName="${v.productName}" 
        data-productDescription="${v.productDescription}" 
        data-prodctPrice="${v.prodctPrice}" 
        class="btn addToCart-btn">Add to Cart</button>
    </div>
    `;
    })
    sendSpecificProductInfo("data-productId", "data-productName", "data-productDescription",  "data-prodctPrice",  "addToCart-btn", addToCart);
}

function sendSpecificProductInfo(productId, productName, productDescription, prodctPrice, btnClass, callback) {
    const mButtons = document.getElementsByClassName(btnClass);
    for (let i = 0; i < mButtons.length; i++) {
        mButtons[i].addEventListener("click", function () {
            callback(this.getAttribute(productId), this.getAttribute(productName), this.getAttribute(productDescription), this.getAttribute(prodctPrice)); 
        });
    }
}

function addToCart(productId, productName, productDescription, prodctPrice)
{
    let product = {productId, productName, productDescription, prodctPrice}
    products.push(product);
    setCartToLocalStorage(products);
}

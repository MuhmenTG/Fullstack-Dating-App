import { shoppyProducts } from "./shoppyProducts.js";
const productsRow = document.getElementById("productsRow");

function displayProducts(){
    shoppyProducts.forEach((shoppyProduct) => {
        productsRow.innerHTML += `
        <div class="col-md-3">
            <div class="wsk-cp-product">
                <div class="wsk-cp-img">
                    <img src="${shoppyProduct.pruductImage}"
                        alt="Product" class="img-responsive" />
                </div>
                <div class="wsk-cp-text">
                    <div class="title-product">
                        <h3>${shoppyProduct.productName}</h3>
                    </div>
                    <div class="description-prod">
                        <p>${shoppyProduct.productDescription}</p>
                    </div>
                    <div class="card-footer">
                        <div class="wcf-left"><span class="price">${shoppyProduct.prodctPrice}</span></div>
                        <button class="btn btn-info btn-md" onclick="addProductToCart(${shoppyProduct.productId})">Add to cart!</button>
                    </div>
                </div>
            </div>
        </div>
        `;
    });
}

displayProducts();
//Using window because otherwise it will not call the onclick in the display funtion.
let myBasket = [];

window.addProductToCart = async (productId) => {
  const oneProduct = shoppyProducts.find((product) => product.productId === productId);
    myBasket.push({
        ...oneProduct,
    })
    saveIntoCart();
}

function saveIntoCart(){
    localStorage.setItem('basket', JSON.stringify(myBasket))
}


function getBasketData(){
   let data = localStorage.getItem('basket');
   console.log(data);
}





$(window).on('shown.bs.modal', function() { 
    $('#modal').modal('show');
    console.log('shown');
});
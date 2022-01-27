import { shoppyProducts } from "./shoppyProducts.js";
const productsRow = document.getElementById("productsRow");

function displayProducts(){
    shoppyProducts.forEach((shoppyProduct) => {
        console.log(shoppyProduct);
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
                        <button id="${shoppyProduct.productId}" class="c-btn btn1">Add to cart!</button>
                    </div>
                </div>
            </div>
        </div>
        
        `;
    });
}

displayProducts();
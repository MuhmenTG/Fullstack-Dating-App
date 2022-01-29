import { serverHttpRequest } from './utilities/serverHttpRequest.js';
const productsRow = document.getElementById("productsRow");

async function getProducts(){
    let response = await serverHttpRequest('../api/getAllProducts.php', 'POST');
    await displayProducts(response);    
}

function displayProducts(response){
    response.map((v, i) => {
     productsRow.innerHTML += `
        <div class="col-md-3">
            <div class="wsk-cp-product">
                    <img src=""
                        alt="Product" class="img-responsive" />
                <div class="wsk-cp-text">
                    <div class="title-product">
                        <h3>${v[1]}</h3>
                    </div>
                    <div class="description-prod">
                        <p>${v[3]}</p>
                    </div>
                    <div class="card-footer">
                        <div class="wcf-left"><span class="price">${v[2]}</span></div>
                        <button class="btn btn-info btn-md" onclick="addProductToCart(${v[0]})">Add to cart!</button>
                    </div>
                </div>
            </div>
        </div>
        `;

    })
}
getProducts();


window.addProductToCart = async (productId) => {
    const response = await serverHttpRequest('../api/getSpecificProduct.php', 'POST', {productId})
    console.log(response);
   /* const oneProduct = shoppyProducts.find((product) => product.productId === productId);
      myBasket.push({
          ...oneProduct,
      })
      saveIntoCart();*/
}  
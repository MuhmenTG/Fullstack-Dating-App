import { getCartFromLocalStorage, setCartToLocalStorage } from "../utilities/localStorage/localstorage.js";

let productBasket = document.getElementById("productBasket");

function getItems(){
    productBasket.innerHTML = "";
    const data = getCartFromLocalStorage();
    if(data){
        data.map((v, i)=>{
            productBasket.innerHTML += `
            <tr>
                <td>
                    <figure class="itemside align-items-center">
                        <figcaption class="info"> <a href="#" class="title text-dark"
                                data-abc="true">${v.productName}</a>
                            <p class="text-muted small">${v.productName}</p>
                        </figcaption>
                    </figure>
                </td>
                <td> 
                <select data-quantity="${this}" class="form-control setQuantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                </td>
                <td>
                    <div class="price-wrap"> <var class="price">DKK</var> <small
                            class="text-muted">${v.prodctPrice} DKK</small> </div>
                </td>
                <td class="text-right d-none d-md-block"> 
                <button data-productId="${v.productId}" class="btn-light">remove</button>
                
                </td>
            </tr>
            `;
        })
   //     modifyItem("data-productId", "btn-light", removeItemFromCart)
        modifyItem("data-quantity", "setQuantity", editQuantity)

    }
    else{
        productBasket.innerHTML = `No items found`;
    }
    
}
getItems();

function modifyItem(productId, btnClass, callback) {
    const buttons = document.getElementsByClassName(btnClass);
  
    for (let i = 0; i < buttons.length; i++) {
        console.log(btnClass);
        switch (btnClass) {
            case "btn-light":
                buttons[i].addEventListener("click", function () {
                    callback(this.getAttribute(productId)); 
                });
            break;
            case "setQuantity":
                buttons[i].addEventListener("change", function() {
                    console.log(this.value);return;
                });
                break;
            } 
    }
}

function removeItemFromCart(productId){
    const items = getCartFromLocalStorage();
    items.splice(productId, 1);
    setCartToLocalStorage(items);
    getItems();
}

function editQuantity(){

}
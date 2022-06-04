let productBasket = document.getElementById("productBasket");

function getItems(){
    if(JSON.parse(localStorage.getItem("CART_KEY")) === null){
        console.log('No items found');
    }
    else{
        JSON.parse(localStorage.getItem("CART_KEY")).map((v, i)=>{
            console.log(productBasket);return;
            productBasket += `
            <tr>
                <td>
                    <figure class="itemside align-items-center">
                        <figcaption class="info"> <a href="#" class="title text-dark"
                                data-abc="true">${v.productName}</a>
                            <p class="text-muted small">SIZE: L <br> Brand: MAXTRA</p>
                        </figcaption>
                    </figure>
                </td>
                <td> <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select> </td>
                <td>
                    <div class="price-wrap"> <var class="price">$10.00</var> <small
                            class="text-muted"> $9.20 each </small> </div>
                </td>
                <td class="text-right d-none d-md-block"> <a href=""
                        class="btn btn-light" data-abc="true"> Remove</a> </td>
            </tr>
   

            `
        })
    }
}
getItems();
import { CART_KEY } from "../../api/index.js";


function setToLocalStorage(key, value){
    localStorage.setItem(key, JSON.stringify(value));
}

function getFromLocalStorage(key){
   return JSON.parse(localStorage.getItem(key))
}

export function setCartToLocalStorage(value){
    setToLocalStorage(CART_KEY, value)
}

export function getCartFromLocalStorage(){
   return getFromLocalStorage(CART_KEY)
}

